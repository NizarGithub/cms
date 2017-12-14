<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MY_Controller {

	private $tahun; 
	public $client;
        public $key;
        public $wsdl;

	public function __construct()
	{
		parent::__construct();
		
		$this->tahun = 2015; //date('Y');
                $this->load->library('my_nusoap');
                $this->key = 'ae115499f82b35cc32a4301b827cbf5e';
                $this->wsdl = 'http://api.bps.go.id/community/index.php?wsdl';

                $this->client = new nusoap_client($this->wsdl, true);
	}

	public function index()
	{
		
	}
	
	public function wilayah()
	{
		$data = array();
		
		$this->tabel->_table = "MProv";
		if ($this->session->userdata('shped_prov') != null && $this->session->userdata('shped_prov') != "")
		{
			$data['prov'] = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov'), 'Tahun' => $this->tahun));
			$this->tabel->_table = "MKab";
			if ($this->session->userdata('shped_kab') != null && $this->session->userdata('shped_kab') != "")
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')
													, 'KodeKab' => $this->session->userdata('shped_kab')
													, 'Tahun' => $this->tahun));
			else
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov'), 'Tahun' => $this->tahun));
		}
		else
		{
			$data['prov'] = $this->tabel->find_by_Tahun($this->tahun);
			$this->tabel->_table = "MKab";
			$kab = $this->tabel->find_by_Tahun($this->tahun);
		}
		
		$kabByProv = array();		
		if (is_array($data['prov']) && count($data['prov']) > 0){
			foreach ($data['prov'] as $p){
				$kabByProv[$p->KodeProv] = array_values(array_filter($kab, 
					function ($element) use ($p) { return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv; } ));
			}
		}

		$data['kabByProv'] = $kabByProv;
		$data['title'] = "Master Wilayah";
		$data['page'] = "masterwilayah";
		$this->load->view('page', $data);
	}
	
	public function action($act)
	{
		$data = array();
		switch($act)
		{
			case "kec":
			
				$param = $this->input->post('param');
				$this->tabel->_table = "MKec";
				$data['kec'] = $this->tabel->find_where(array('Tahun' => $this->tahun, 'KodeProv' => $param['KodeProv'], 'KodeKab' => $param['KodeKab']));
				echo json_encode($data);
				
				break;
				
			case "list":
			
				$this->load->model("mpetugas","petugas");
				$param = $this->input->post('param');
				$petugas = $this->petugas->SelectDaftarPetugas($param);
				echo json_encode($petugas);
			
				break;
				
			case "savepetugas":
			
				$data = array();
				$this->load->model("mpetugas","petugas");
				$param = $this->input->post('param');
				if ($param['action'] == "add")
				{
					$cekPetugas = $this->petugas->find_where(array('KodeProv' => $param['KodeProv'], 'KodeKab' => $param['KodeKab'], 'Kode' => $param['Kode']));
					if (count($cekPetugas) > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah terpilih sudah ada.';
					}
					else
					{
						unset($param['action']);
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$param['CreatedBy'] = $this->session->userdata('shped_id');
						$this->petugas->insert($param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah <strong>'. $param['KodeProv'] . $param['KodeKab'] .'</strong> berhasil disimpan.';
					}
				}
				else if ($param['action'] == "edit")
				{
					$jmlPetugas = $this->petugas->SelectJmlPetugasCekForUpdate($param);
					if ($jmlPetugas > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah terpilih sudah ada.';
					}
					else
					{
						$idPetugas = $param['IdPetugas'];
						unset($param['action']);
						unset($param['IdPetugas']);
						$param['DateModified'] = date('Y-m-d h:i:s');
						$param['ModifiedBy'] = $this->session->userdata('shped_id');
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$this->petugas->update_where(array('IdPetugas' => intval($idPetugas)), $param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah <strong>'. $param['KodeProv'] . $param['KodeKab'] .'</strong> berhasil diubah.';
					}
				}
				echo json_encode($data);
			
				break;
				
			case "delpetugas":
			
				$data = array();
				$this->load->model("mpetugas","petugas");
				$param = $this->input->post('param');
				
				$dataCekK = array();
				$this->tabel->_table = 'TKonsumen';
				if ($param['Status'] == '1')
					$dataCekK = $this->tabel->find_by_IdPencacah($param['IdPetugas']);
				else
					$dataCekK = $this->tabel->find_by_IdPemeriksa($param['IdPetugas']);
				
				$dataCekP = array();
				$this->tabel->_table = 'TPetani';
				if ($param['Status'] == '1')
					$dataCekP = $this->tabel->find_by_IdPencacah($param['IdPetugas']);
				else
					$dataCekP = $this->tabel->find_by_IdPemeriksa($param['IdPetugas']);
				
				$data['IsError'] = false;
				$data['Msg'] = '';
				$dokExist = array();
				if (count($dataCekP) > 0)
					array_push($dokExist, '<li>Harga Perdesaan</li>');
				if (count($dataCekK) > 0)
					array_push($dokExist, '<li>Harga Konsumen Perdesaan</li>');
				
				if (count($dokExist) > 0)
				{
					$data['IsError'] = true;
					$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah <strong>'. $param['KodeProv'] . 
						$param['KodeKab'] .'</strong> tidak dapat dihapus karena mempunyai dokumen<br/>' . implode('', $dokExist);
				}
				else
				{
					$this->petugas->update_where(array('IdPetugas' => $param['IdPetugas']), array('IsAktif' => false));
					$data['Msg'] = 'Data Petugas dengan Kode <strong>'. $param['Kode'] .'</strong> pada wilayah <strong>'. $param['KodeProv'] . $param['KodeKab'] .'</strong> berhasil dihapus.';
				}
				
				echo json_encode($data);
			
				break;
				
			case "listkualitas":
			
				$this->load->model("mkualitas","kualitas");
				$param = $this->input->post('param');
				$kualitas = $this->kualitas->SelectDaftarKualitas($param);
				echo json_encode($kualitas);
			
				break;
			
			case "delkualitas":
			
				$data = array();
				$this->load->model("mkualitas","kualitas");
				$this->load->model("mkecdokmkualitas","keckualitas");
				$param = $this->input->post('param');
				
				$jmlUsed = $this->keckualitas->SelectJumlahByKualitas($param['IdKualitas']);
				
				$data['IsError'] = false;
				$data['Msg'] = '';
			
				if ($jmlUsed > 0)
				{
					$data['IsError'] = true;
					$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> dan Nama <strong>'. $param['NamaKualitas'] . 
						'</strong> tidak dapat dihapus karena sudah digunakan';
				}
				else
				{
					$this->kualitas->update_where(array('IdKualitas' => $param['IdKualitas']), array('IsAktif' => false));
					$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> dan Nama <strong>'. $param['NamaKualitas'] .'</strong> berhasil dihapus (diubah menjadi tidak aktif).';
				}
				
				echo json_encode($data);
			
				break;
			
			case "savekualitas":
			
				$data = array();
				$this->load->model("mkualitas","kualitas");
				$param = $this->input->post('param');
				if ($param['action'] == "add")
				{
                                        $param['KodeKualitas'] = $param['IdKomoditas'].$param['NmrKualitas'];
					$cekKualitas = $this->kualitas->find_where(array('KodeKualitas' => $param['KodeKualitas']));
					if (count($cekKualitas) > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> sudah ada.';
					}
					else
					{
						unset($param['action']);
						unset($param['IdKomoditas']);
						unset($param['NmrKualitas']);
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$param['CreatedBy'] = $this->session->userdata('shped_id');
                                                if($param['CreatedBy']==1) $param['IsApproved'] = true;
						$this->kualitas->insert($param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> dan Nama <strong>'. $param['NamaKualitas'] . '</strong> berhasil disimpan.';
					}
				}
				else if ($param['action'] == "edit")
				{
					$jmlKualitas = $this->kualitas->SelectJmlCekForUpdate($param);
					if ($jmlKualitas > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> sudah ada.';
					}
					else
					{
						$idKualitas = $param['IdKualitas'];
						unset($param['action']);
						unset($param['IdKualitas']);
						$param['DateModified'] = date('Y-m-d h:i:s');
						$param['ModifiedBy'] = $this->session->userdata('shped_id');
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$this->kualitas->update_where(array('IdKualitas' => intval($idKualitas)), $param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> dan Nama <strong>'. $param['NamaKualitas'] .'</strong> berhasil diubah.';
					}
				}
				echo json_encode($data);
			
				break;
                                
                            case "appkualitas":
			
				$data = array();
				$this->load->model("mkualitas","kualitas");
				$param = $this->input->post('param');
                                $idKualitas = $param['IdKualitas'];
				$param['ApprovedBy'] = $this->session->userdata('shped_id');
                                $param['DateApproved'] = date('Y-m-d h:i:s');
				
				$data['IsError'] = false;
				$data['Msg'] = '';
				
                                $this->kualitas->update_where(array('IdKualitas' => $param['IdKualitas']), array('IsApproved' => true,'ApprovedBy' => $param['ApprovedBy'],'DateApproved' => $param['DateApproved']));
                                $data['Msg'] = 'Data Kualitas dengan Kode <strong>'. $param['KodeKualitas'] .'</strong> dan Nama <strong>'. $param['NamaKualitas'] .'</strong> berhasil disetujui.';
				
				echo json_encode($data);
			
				break;
                            
                            case "getkodekom":
			
                                $data = array();
				$this->load->model("mkomoditas","komoditas");
                                $this->load->model("mkualitas","kualitas");
				$param = $this->input->post('param');
				$komoditas = $this->komoditas->find_where(array('IdKom' => $param));
                                $data['KodeKomoditas']=$komoditas[0]->KodeKom;
                                
                                $kualitas = $this->kualitas->SelectMaxKode($komoditas[0]->KodeKom);
                                $maxkodekualitas = (int) substr($kualitas,6,3);
                                $newkode=$maxkodekualitas+1;
                                if(strlen($newkode)==1) {$kodekual='00'.$newkode;}
                                else if(strlen($newkode)==2) {$kodekual='0'.$newkode;}
                                else if(strlen($newkode)==3) {$kodekual=$newkode;}
                                $data['NewKode']=$kodekual;
                                
				echo json_encode($data);
			
				break;
		}
	}
	
	public function petugas()
	{
		$data = array();
		
		$this->tabel->_table = "MProv";
		if ($this->session->userdata('shped_prov') != null && $this->session->userdata('shped_prov') != "")
		{
			$data['prov'] = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
			$this->tabel->_table = "MKab";
			if ($this->session->userdata('shped_kab') != null && $this->session->userdata('shped_kab') != "")
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')
													, 'KodeKab' => $this->session->userdata('shped_kab')));
			else
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
		}
		else
		{
			$data['prov'] = $this->tabel->find_all();
			$this->tabel->_table = "MKab";
			$kab = $this->tabel->find_all();
		}
		
		$kabByProv = array();		
		if (is_array($data['prov']) && count($data['prov']) > 0){
			foreach ($data['prov'] as $p){
				$kabByProv[$p->KodeProv] = array_values(array_filter($kab, 
					function ($element) use ($p) { return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv; } ));
			}
		}

		$data['kabByProv'] = $kabByProv;
		$data['wilUser'] = array("prov" => $this->session->userdata('shped_prov'),
                                  "kab" => $this->session->userdata('shped_kab'));
		$data['userLevel'] = $this->session->userdata('shped_level');
		$data['title'] = "Master Petugas";
		$data['page'] = "masterpetugas";
		$this->load->view('page', $data);
	}
	
	public function actionoper($act)
	{
		$data = array();
		switch($act)
		{
			case "kec":
			
				$param = $this->input->post('param');
				$this->tabel->_table = "MKec";
				$data['kec'] = $this->tabel->find_where(array('Tahun' => $this->tahun, 'KodeProv' => $param['KodeProv'], 'KodeKab' => $param['KodeKab']));
				echo json_encode($data);
				
				break;
				
			case "list":
			
				$this->load->model("moperator","operator");
				$param = $this->input->post('param');
				$operator = $this->operator->SelectDaftarOperator($param);
				echo json_encode($operator);
			
				break;
				
			case "saveoperator":
			
				$data = array();
				$this->load->model("moperator","operator");
				$param = $this->input->post('param');
				if ($param['KodeProv'] == "") $param['KodeProv'] = null;
				if ($param['KodeKab'] == "") $param['KodeKab'] = null;
				if ($param['action'] == "add")
				{
                                    $cekOperator = $this->operator->find_where(array('Username' => $param['Username']));
                                    if (empty($cekOperator[0]->Hash)) {
                                        $param['Hash'] = uniqid();
                                        $param['Password'] = md5($param['Hash'] . $param['Password']);
                                    } 

                                    //cek level yang di input
                                    if ($param['Level']=='1' || $param['Level']=='2' || $param['Level']=='3') {
                                        $param['KodeProv'] = null;
                                        $param['KodeKab'] = null;
                                    }

                                    if (in_array($param['Level'], array(4,5,6))) {
                                        $param['KodeKab'] = null;
                                    }

                                    foreach ($param as $key => $value) {
                                        if (trim($value) == '')
                                            $this->$key = NULL;
                                    }
					
//                                        print_r($cekOperator[0]->Password);exit;
					if (count($cekOperator) > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> sudah ada.';
					}
					else
					{
						unset($param['action']);
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$param['CreatedBy'] = $this->session->userdata('shped_id');
						$this->operator->insert($param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> dan Nama <strong>'. $param['Nama'] .'</strong> berhasil disimpan.';
					}
				}
				else if ($param['action'] == "edit")
				{
                                    $PasswordLama = $this->operator->find_where(array('Username' => $param['Username']));
                                    if (empty($param['Hash'])) {
                                        $param['Hash'] = uniqid();
                                        $param['Password'] = md5($param['Hash'] . $param['Password']);
                                    } 
                                    else if ($param['Password'] != $PasswordLama[0]->Password){
                                        $param['Password'] = md5($param['Hash'] . $param['Password']);
                                    }
					$jmOperator = $this->operator->SelectJmlOperatorCekForUpdate($param);
                                        
					if ($jmOperator > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> sudah ada.';
					}
					else
					{
						$idUser = $param['IdUser'];
						unset($param['action']);
						unset($param['IdUser']);
						$param['DateModified'] = date('Y-m-d h:i:s');
						$param['ModifiedBy'] = $this->session->userdata('shped_id');
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$this->operator->update_where(array('IdUser' => intval($idUser)), $param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> dan Nama <strong>'. $param['Nama'] .'</strong> berhasil diubah.';
					}
				}
				echo json_encode($data);
			
				break;
				
			case "deloperator":
			
				$data = array();
				$this->load->model("moperator","operator");
				$param = $this->input->post('param');
				
				$dataCekK = array();
				$this->tabel->_table = 'TKonsumen';
				$dataCekK = $this->tabel->find_by_CreatedBy($param['IdUser']);
				if (count($dataCekK) == 0)
					$dataCekK = $this->tabel->find_by_ModifiedBy($param['IdUser']);
				
				$dataCekP = array();
				$this->tabel->_table = 'TPetani';
				$dataCekP = $this->tabel->find_by_CreatedBy($param['IdUser']);
				if (count($dataCekP) == 0)
					$dataCekP = $this->tabel->find_by_ModifiedBy($param['IdUser']);
				
				$data['IsError'] = false;
				$data['Msg'] = '';
				$dokExist = array();
				if (count($dataCekP) > 0)
					array_push($dokExist, '<li>Harga Perdesaan</li>');
				if (count($dataCekK) > 0)
					array_push($dokExist, '<li>Harga Konsumen Perdesaan</li>');
				
				if (count($dokExist) > 0)
				{
					$data['IsError'] = true;
					$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> tidak dapat dihapus karena mempunyai dokumen<br/>' . implode('', $dokExist);
				}
				else
				{
					$this->operator->update_where(array('IdUser' => $param['IdUser']), array('IsAktif' => false));
					$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> berhasil dihapus.';
				}
				
				echo json_encode($data);
			
				break;
                        case "sync":
                                $param = $this->input->post('param');
                                $this->load->library('my_nusoap');

                                $data['IsError'] = false;
				$data['Msg'] = '';
                                if (strlen($param) == 18) {
                                    $jenisinput = 'nipbaru';
                                } else {
                                    $jenisinput = 'niplama';
                                }

                                //create client object
                                $client = new nusoap_client($this->wsdl, true);
                                $err = $client->getError();
                                if ($err) {
                                    return $err;
                                    Yii::app()->end();
                                } else {
                                    $result = $client->call('pegawai_data', array('jenisinput' => $jenisinput, 'input' => $param, 'key' => $this->key));
                                    if ($result['kode'] == 0) {
                                        $data['IsError'] = true;
                                        $data['Msg'] = 'Gagal Synchronize';
                                        $data['Keterangan'] = $result['keterangan'];
                                    } else {
                                        $data['IsError'] = false;
                                        $data['Msg'] = 'Berhasil Synchronize';
                                        $tempusername = explode('@', $result['email']);
                                        $username = $tempusername[0];
                                        $data['niplama'] = $result['niplama'];
                                        $data['unitkerja'] = $result['unitkerja'];
                                        $data['email'] = $result['email'];
                                        $data['urlfoto'] = $result['url_foto'];
                                        $data['nama'] = $result['nama'];
                                        $data['nipbaru'] = $result['nipbaru'];
                                        $data['wilayah'] = $result['wilayah'];
                                        $data['wilayah_id'] = $result['wilayah_id'];
                                        $data['username'] = $username;
                                    }
                                }
                                unset($client);
                                
                                echo json_encode($data);
                                break;
		}
	}
	
        
	public function operator()
	{
		$data = array();
		
		$this->tabel->_table = "MProv";
		if ($this->session->userdata('shped_prov') != null && $this->session->userdata('shped_prov') != "")
		{
			$data['prov'] = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
			$this->tabel->_table = "MKab";
			if ($this->session->userdata('shped_kab') != null && $this->session->userdata('shped_kab') != "")
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')
													, 'KodeKab' => $this->session->userdata('shped_kab')));
			else
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
		}
		else
		{
			$data['prov'] = $this->tabel->find_all();
			$this->tabel->_table = "MKab";
			$kab = $this->tabel->find_all();
		}
		
		$kabByProv = array();		
		if (is_array($data['prov']) && count($data['prov']) > 0){
			foreach ($data['prov'] as $p){
				$kabByProv[$p->KodeProv] = array_values(array_filter($kab, 
					function ($element) use ($p) { return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv; } ));
			}
		}

		$data['kabByProv'] = $kabByProv;
		$data['userProv'] = $this->session->userdata('shped_prov');
		$data['userKab'] = $this->session->userdata('shped_kab');
		$data['userLevel'] = $this->session->userdata('shped_level');
		$data['wilUser'] = array("prov" => $this->session->userdata('shped_prov'),
                                  "kab" => $this->session->userdata('shped_kab'));
		$data['title'] = "Master Operator";
		$data['page'] = "masteroperator";
		$this->load->view('page', $data);
	}
	
	public function komoditas()
	{
		$this->load->model("mkomoditas","komoditas");
		$data['komoditas'] = $this->komoditas->SelectDaftarKomoditas();
		$data['wilUser'] = array("prov" => $this->session->userdata('shped_prov'),
                                  "kab" => $this->session->userdata('shped_kab'));
		$data['title'] = "Master Komoditas";
		$data['page'] = "masterkomoditas";
		$this->load->view('page', $data);
	}
	
	public function kualitas()
	{
		$data = array();
		
		$this->load->model("mdok","dok");
		$this->load->model("mgroup","group");
		$this->load->model("mkomoditas","kom");
		
		$data['dok'] = $this->dok->SelectData();
		$group = $this->group->SelectData();
		$kom = $this->kom->SelectData();
		
		$groupByDok = array();		
		if (is_array($data['dok']) && count($data['dok']) > 0){
			foreach ($data['dok'] as $d){
				$groupByDok["_".$d['IdDok']] = array_values(array_filter($group, 
					function ($element) use ($d) { return isset($element['IdDok']) && $element['IdDok'] == $d['IdDok']; } ));
			}
		}
		
		$komByGroup = array();		
		if (is_array($group) && count($group) > 0){
			foreach ($group as $g){
				$komByGroup[$g['IdGroup']] = array_values(array_filter($kom, 
					function ($element) use ($g) { return isset($element['IdGroup']) && $element['IdGroup'] == $g['IdGroup']; } ));
			}
		}

		$data['groupByDok'] = $groupByDok;
		$data['komByGroup'] = $komByGroup;
		$data['wilUser'] = array("prov" => $this->session->userdata('shped_prov'),
                                  "kab" => $this->session->userdata('shped_kab'));
		$data['userLevel'] = $this->session->userdata('shped_level');
		$data['title'] = "Master Kualitas";
		$data['page'] = "masterkualitas";
		$this->load->view('page', $data);
	}
	
	public function kecamatankualitas()
	{
		$data = array();
		
		$this->tabel->_table = "MProv";
		if ($this->session->userdata('shped_prov') != null && $this->session->userdata('shped_prov') != "")
		{
			$data['prov'] = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
			$this->tabel->_table = "MKab";
			if ($this->session->userdata('shped_kab') != null && $this->session->userdata('shped_kab') != "")
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')
													, 'KodeKab' => $this->session->userdata('shped_kab')));
			else
				$kab = $this->tabel->find_where(array('KodeProv' => $this->session->userdata('shped_prov')));
		}
		else
		{
			$data['prov'] = $this->tabel->find_all();
			$this->tabel->_table = "MKab";
			$kab = $this->tabel->find_all();
		}
		
		$kabByProv = array();		
		if (is_array($data['prov']) && count($data['prov']) > 0){
			foreach ($data['prov'] as $p){
				$kabByProv[$p->KodeProv] = array_values(array_filter($kab, 
					function ($element) use ($p) { return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv; } ));
			}
		}
		
		$this->tabel->_table = "MDok";
		$dok = $this->tabel->find_all();

		$data['kabByProv'] = $kabByProv;
		$data['dok'] = $dok;
		$data['title'] = "Master Kecamatan - Kualitas";
		$data['page'] = "masterkeckualitas";
		$this->load->view('page', $data);
	}
	
	public function actionkeckualitas($act)
	{
		$data = array();
		switch($act)
		{
			case "list":
			
				$this->load->model("mkecdok","kecdok");
				$param = $this->input->post('param');
				$kecdok = $this->kecdok->SelectDaftarKecDok($param);
				echo json_encode($kecdok);
			
				break;
				
			case "saveoperator":
			
				$data = array();
				$this->load->model("moperator","operator");
				$param = $this->input->post('param');
				if ($param['KodeProv'] == "") $param['KodeProv'] = null;
				if ($param['KodeKab'] == "") $param['KodeKab'] = null;
				if ($param['action'] == "add")
				{
					$cekOperator = $this->operator->find_where(array('Username' => $param['Username']));
					if (count($cekOperator) > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> sudah ada.';
					}
					else
					{
						unset($param['action']);
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$param['CreatedBy'] = $this->session->userdata('shped_id');
						$this->operator->insert($param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> dan Nama <strong>'. $param['Nama'] .'</strong> berhasil disimpan.';
					}
				}
				else if ($param['action'] == "edit")
				{
					$jmOperator = $this->operator->SelectJmlOperatorCekForUpdate($param);
					if ($jmOperator > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> sudah ada.';
					}
					else
					{
						$idUser = $param['IdUser'];
						unset($param['action']);
						unset($param['IdUser']);
						$param['DateModified'] = date('Y-m-d h:i:s');
						$param['ModifiedBy'] = $this->session->userdata('shped_id');
						$param['IsAktif'] = $param['IsAktif'] == "1" ? true : false;
						$this->operator->update_where(array('IdUser' => intval($idUser)), $param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> dan Nama <strong>'. $param['Nama'] .'</strong> berhasil diubah.';
					}
				}
				echo json_encode($data);
			
				break;
				
			case "deloperator":
			
				$data = array();
				$this->load->model("moperator","operator");
				$param = $this->input->post('param');
				
				$dataCekK = array();
				$this->tabel->_table = 'TKonsumen';
				$dataCekK = $this->tabel->find_by_CreatedBy($param['IdUser']);
				if (count($dataCekK) == 0)
					$dataCekK = $this->tabel->find_by_ModifiedBy($param['IdUser']);
				
				$dataCekP = array();
				$this->tabel->_table = 'TPetani';
				$dataCekP = $this->tabel->find_by_CreatedBy($param['IdUser']);
				if (count($dataCekP) == 0)
					$dataCekP = $this->tabel->find_by_ModifiedBy($param['IdUser']);
				
				$data['IsError'] = false;
				$data['Msg'] = '';
				$dokExist = array();
				if (count($dataCekP) > 0)
					array_push($dokExist, '<li>Harga Perdesaan</li>');
				if (count($dataCekK) > 0)
					array_push($dokExist, '<li>Harga Konsumen Perdesaan</li>');
				
				if (count($dokExist) > 0)
				{
					$data['IsError'] = true;
					$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> tidak dapat dihapus karena mempunyai dokumen<br/>' . implode('', $dokExist);
				}
				else
				{
					$this->operator->update_where(array('IdUser' => $param['IdUser']), array('IsAktif' => false));
					$data['Msg'] = 'Data Operator dengan Username <strong>'. $param['Username'] .'</strong> berhasil dihapus.';
				}
				
				echo json_encode($data);
			
				break;
		}
	}
}

/* End of file master.php */
/* Location: ./apps/controllers/master.php */