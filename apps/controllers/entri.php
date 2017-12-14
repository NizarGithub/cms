<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entri extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($type = "hd", $iddok = 99)
	{
		$data = array();
		$this->tabel->_table = "MTahun";
		$data['tahun'] = $this->tabel->find_all();
		$this->tabel->_table = "MBulan";
		$data['bulan'] = $this->tabel->find_all();
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
		$this->tabel->_table = "MDok";
		$data['dok'] = $this->tabel->find_where(array('IdParent' => $iddok));
		
		$kabByProv = array();		
		if (is_array($data['prov']) && count($data['prov']) > 0){
			foreach ($data['prov'] as $p){
				$kabByProv[$p->KodeProv] = array_values(array_filter($kab, 
					function ($element) use ($p) { return isset($element->KodeProv) && $element->KodeProv == $p->KodeProv; } ));
			}
		}

		$data['title'] = "Entri " . strtoupper($type);
		$data['page'] = "dok" . $type;
		$data['kabByProv'] = $kabByProv;
		$data['wilUser'] = array("prov" => $this->session->userdata('shped_prov'),
								  "kab" => $this->session->userdata('shped_kab'));
		$this->load->view('page', $data);
	}
	
	public function hd($act = '')
	{
		if ($act == '')
			$this->index("hd");
		else if ($act == 'list')
		{
			$this->load->model("mkecdok","kecdok");
			
			$param = $this->input->post('param');
			
			$dataBack = array();
			
			$dataBack = $this->kecdok->SelectDataAllDok($param);
			
			echo json_encode($dataBack);
		}
		else if ($act == 'delete')
		{
			$param = $this->input->post('param');
			$this->tabel->_table = 'TPetaniHarga';
			$this->tabel->delete_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			$this->tabel->_table = 'TPetani';
			$this->tabel->delete_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));

			echo json_encode(array('msg' => 'Data berhasil dihapus.'));
		}
		else if ($act == 'edit')
		{
			$this->load->model("mpetugas","petugas");
			$this->load->model("mresponden","responden");
			
			$param = $this->input->post('param');
			$this->tabel->_table = 'MDok';
			$dok = $this->tabel->find_by_IdDok($param['IdDok']);
			$this->tabel->_table = 'MBulan';
			$bulan = $this->tabel->find_by_IdBulan($param['Bulan']);
			$this->tabel->_table = 'TPetani';
			$dataHD = $this->tabel->find_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			if (count($dataHD) == 0)
				$this->tabel->insert(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
											, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			$dataHD = $this->tabel->SelectDataHD($param);
			$pencacah = $this->petugas->SelectPetugas($dataHD[0]['KodeProv'], $dataHD[0]['KodeKab'], '1');
			$pengawas = $this->petugas->SelectPetugas($dataHD[0]['KodeProv'], $dataHD[0]['KodeKab'], '2');
			$responden = $this->responden->SelectResponden($param['IdKec']);
			
			$tblok4 = $this->tabel->SelectDataBlok4($param);
			$blok4 = array();
			if (count($tblok4) > 0)
			{
				foreach ($tblok4 as $b4)
				{
					$blok4[($b4['IdKualitas'] == 0 ? $b4['IdGroup'] : $b4['IdKualitas'])] = $b4;
				}
			}
			$tblok5 = $this->tabel->SelectDataBlok5($param);
			$blok5 = array();
			if (count($tblok5) > 0)
			{
				foreach ($tblok5 as $b5)
				{
					$blok5[($b5['IdKualitas'] == 0 ? $b5['IdGroup'] : $b5['IdKualitas'])] = $b5;
				}
			}
			$tblokUpah = $this->tabel->SelectDataBlokUpah($param);
			$blokUpah = array();
			if (count($tblokUpah) > 0)
			{
				foreach ($tblokUpah as $bu)
				{
					$blokUpah[($bu['IdKualitas'] == 0 ? $bu['IdGroup'] : $bu['IdKualitas'])] = $bu;
				}
			}
			
			$tqBlok4 = $this->tabel->SelectKualitasBlok4($param);
			$qBlok4 = array();
			if (count($tqBlok4) > 0)
			{
				foreach ($tqBlok4 as $b4)
				{
					$qBlok4[$b4['IdKualitas']] = $b4;
				}
			}
			$tqBlok5 = $this->tabel->SelectKualitasBlok5($param);
			$qBlok5 = array();
			if (count($tqBlok5) > 0)
			{
				foreach ($tqBlok5 as $b5)
				{
					$qBlok5[$b5['IdKualitas']] = $b5;
				}
			}
			$tqBlokUpah = $this->tabel->SelectKualitasBlokUpah($param);
			$qBlokUpah = array();
			if (count($tqBlokUpah) > 0)
			{
				foreach ($tqBlokUpah as $bu)
				{
					$qBlokUpah[$bu['KodeKualitas'] . '-' . $bu['IdKualitas']] = $bu;
				}
			}
			
			$dataBack = array();
			$dataBack['Dok'] = $dok[0];
			$dataBack['Data'] = $dataHD[0];
			$dataBack['Pencacah'] = $pencacah;
			$dataBack['Pengawas'] = $pengawas;
			$dataBack['Responden'] = $responden;
			$dataBack['Blok4'] = $blok4;
			$dataBack['Blok5'] = $blok5;
			$dataBack['BlokUpah'] = $blokUpah;
			$dataBack['QBlok4'] = $qBlok4;
			$dataBack['QBlok5'] = $qBlok5;
			$dataBack['QBlokUpah'] = $qBlokUpah;
			echo json_encode($dataBack);
		}
		else if ($act == 'save')
		{
			$data = $this->input->post('data');
			$blok4 = json_decode($this->input->post('blok4'), true);
			$blok5 = json_decode($this->input->post('blok5'), true);
			$blokUpah = json_decode($this->input->post('blokUpah'), true);

			//var_dump($data);
			
			$keyPetani = array('IdKec' => $data['IdKec'], 'Tahun' => $data['Tahun'], 'Bulan' => $data['Bulan'], 'IdDok' => $data['IdDok']);
			$dataPetani = array('NamaResponden' => ($data['NamaResponden'] == "" ? null : $data['NamaResponden'])
							, 'NamaDesa' => ($data['NamaDesa'] == "" ? null : $data['NamaDesa']), 'JenisKomoditas' => ($data['JenisKomoditas'] == "" ? null : $data['JenisKomoditas'])
							, 'Catatan' => ($data['Catatan'] == "" ? null : $data['Catatan']), 'IdPencacah' => ($data['IdPencacah'] == "" ? null : $data['IdPencacah'])
							, 'IdPemeriksa' => ($data['IdPemeriksa'] == "" ? null : $data['IdPemeriksa'])
							, 'TglCacah' => ($data['TglCacah'] == "" ? null : $data['TglCacah']), 'TglPeriksa' => ($data['TglPeriksa'] == "" ? null : $data['TglPeriksa'])
							, 'StatusDok' => $data['StatusDok']);
			
			
			$this->tabel->_table = 'TPetani';
			$dataCek = $this->tabel->find_where($keyPetani);
			if ($dataCek[0]->CreatedBy == null || $dataCek[0]->CreatedBy == "")
				$dataPetani['CreatedBy'] = $this->session->userdata('shped_id');
			$this->tabel->update_where($keyPetani, $dataPetani);
			
			$keyPetaniHarga = $keyPetani;
			foreach($blok4 as $key => $val)
			{
				if ($val['IdKualitas'] != "0")
				{
					if ($val['IsUsed'] == "0")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => true, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					else if ($val['IsUsed'] == null || $val['IsUsed'] == "")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->insert(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'], 
											'IsUsed' => true, 'CreatedBy' => $this->session->userdata('shped_id')));
					}

					if ($val['IsDeleted'] == 1)
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => false, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					
					$this->tabel->_table = 'TPetaniHarga';
					$keyPetaniHarga['IdKualitas'] = $val['IdKualitas'];
					$dataCek = $this->tabel->find_where($keyPetaniHarga);
					if (count($dataCek) == 0)
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = $keyPetaniHarga;
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['CreatedBy'] = $this->session->userdata('shped_id');
							$this->tabel->insert($dataPetaniHarga);
						}
					}
					else
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = array();
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['DateModified'] = date('Y-m-d');
							$dataPetaniHarga['ModifiedBy'] = $this->session->userdata('shped_id');
							$this->tabel->update_where($keyPetaniHarga, $dataPetaniHarga);
						}
						else
						{
							$this->tabel->delete_where($keyPetaniHarga);
						}
					}
				}
			}
			foreach($blok5 as $key => $val)
			{
				if ($val['IdKualitas'] != "0")
				{
					if ($val['IsUsed'] == "0")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => true, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					else if ($val['IsUsed'] == null || $val['IsUsed'] == "")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->insert(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'], 
											'IsUsed' => true, 'CreatedBy' => $this->session->userdata('shped_id')));
					}

					if ($val['IsDeleted'] == 1)
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => false, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					
					$this->tabel->_table = 'TPetaniHarga';
					$keyPetaniHarga['IdKualitas'] = $val['IdKualitas'];
					$dataCek = $this->tabel->find_where($keyPetaniHarga);
					if (count($dataCek) == 0)
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = $keyPetaniHarga;
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['CreatedBy'] = $this->session->userdata('shped_id');
							$this->tabel->insert($dataPetaniHarga);
						}
					}
					else
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = array();
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['DateModified'] = date('Y-m-d');
							$dataPetaniHarga['ModifiedBy'] = $this->session->userdata('shped_id');
							$this->tabel->update_where($keyPetaniHarga, $dataPetaniHarga);
						}
						else
						{
							$this->tabel->delete_where($keyPetaniHarga);
						}
					}
				}
			}
			foreach($blokUpah as $key => $val)
			{
				if ($val['IdKualitas'] != "0")
				{
					if ($val['IsUsed'] == "0")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => true, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					else if ($val['IsUsed'] == null || $val['IsUsed'] == "")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->insert(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'], 
											'IsUsed' => true, 'CreatedBy' => $this->session->userdata('shped_id')));
					}

					if ($val['IsDeleted'] == 1)
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => false, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					
					$this->tabel->_table = 'TPetaniHarga';
					$keyPetaniHarga['IdKualitas'] = $val['IdKualitas'];
					$dataCek = $this->tabel->find_where($keyPetaniHarga);
					if (count($dataCek) == 0)
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = $keyPetaniHarga;
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['NilaiSatuan'] = $val['NilaiSatuan'];
							$dataPetaniHarga['NilaiSatuan2'] = $val['NilaiSatuan2'];
							$dataPetaniHarga['CreatedBy'] = $this->session->userdata('shped_id');
							$this->tabel->insert($dataPetaniHarga);
						}
					}
					else
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataPetaniHarga = array();
							$dataPetaniHarga['IdResponden'] = $val['IdResponden'] == "" ? null : $val['IdResponden'];
							$dataPetaniHarga['HargaPrev'] = $val['HargaPrev'];
							$dataPetaniHarga['Harga'] = $val['Harga'];
							$dataPetaniHarga['NilaiSatuan'] = $val['NilaiSatuan'];
							$dataPetaniHarga['NilaiSatuan2'] = $val['NilaiSatuan2'];
							$dataPetaniHarga['DateModified'] = date('Y-m-d');
							$dataPetaniHarga['ModifiedBy'] = $this->session->userdata('shped_id');
							$this->tabel->update_where($keyPetaniHarga, $dataPetaniHarga);
						}
						else
						{
							$this->tabel->delete_where($keyPetaniHarga);
						}
					}
				}
			}
			echo json_encode(array('msg' => 'Data berhasil disimpan dengan status : ' . $data['StatusDok']));
		}
	}
	
	public function hkd($act = '')
	{
		if ($act == '')
			$this->index("hkd", 98);
		else if ($act == 'list')
		{
			$this->load->model("mkecdok","kecdok");
			
			$param = $this->input->post('param');
			
			$dataBack = array();
			
			$dataBack = $this->kecdok->SelectDataAllDokHKD($param);
			
			echo json_encode($dataBack);
		}
		else if ($act == 'delete')
		{
			$param = $this->input->post('param');
			$this->tabel->_table = 'TKonsumenHarga';
			$this->tabel->delete_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			$this->tabel->_table = 'TKonsumen';
			$this->tabel->delete_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));

			echo json_encode(array('msg' => 'Data berhasil dihapus.'));
		}
		else if ($act == 'edit')
		{
			$this->load->model("mpetugas","petugas");
			
			$param = $this->input->post('param');
			$this->tabel->_table = 'MDok';
			$dok = $this->tabel->find_by_IdDok($param['IdDok']);
			$this->tabel->_table = 'MBulan';
			$bulan = $this->tabel->find_by_IdBulan($param['Bulan']);
			$this->tabel->_table = 'TKonsumen';
			$dataHKD = $this->tabel->find_where(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
													, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			if (count($dataHKD) == 0)
				$this->tabel->insert(array('IdKec' => $param['IdKec'], 'Tahun' => $param['Tahun']
											, 'Bulan' => $param['Bulan'], 'IdDok' => $param['IdDok']));
			$dataHKD = $this->tabel->SelectDataHKD($param);
			$pencacah = $this->petugas->SelectPetugas($dataHKD[0]['KodeProv'], $dataHKD[0]['KodeKab'], '1');
			$pengawas = $this->petugas->SelectPetugas($dataHKD[0]['KodeProv'], $dataHKD[0]['KodeKab'], '2');
			
			$tblok4 = $this->tabel->SelectDataBlok4HKD($param);
			$blok4 = array();
			if (count($tblok4) > 0)
			{
				foreach ($tblok4 as $b4)
				{
					$blok4[($b4['IdKualitas'] == 0 ? $b4['IdGroup'] : $b4['IdKualitas'])] = $b4;
				}
			}

			$tqBlok4 = $this->tabel->SelectKualitasBlok4HKD($param);
			$qBlok4 = array();
			if (count($tqBlok4) > 0)
			{
				foreach ($tqBlok4 as $b4)
				{
					$qBlok4[$b4['IdKualitas']] = $b4;
				}
			}
			
			$dataBack = array();
			$dataBack['Dok'] = $dok[0];
			$dataBack['Data'] = $dataHKD[0];
			$dataBack['Pencacah'] = $pencacah;
			$dataBack['Pengawas'] = $pengawas;
			$dataBack['Blok4'] = $blok4;
			$dataBack['QBlok4'] = $qBlok4;
			echo json_encode($dataBack);
		}
		else if ($act == 'save')
		{
			$data = $this->input->post('data');
			$blok4 = json_decode($this->input->post('blok4'), true);

			//var_dump($data);
			
			$keyKonsumen = array('IdKec' => $data['IdKec'], 'Tahun' => $data['Tahun'], 'Bulan' => $data['Bulan'], 'IdDok' => $data['IdDok']);
			$dataKonsumen = array('NamaPasar' => ($data['NamaPasar'] == "" ? null : $data['NamaPasar']), 'HariPasar' => ($data['HariPasar'] == "" ? null : $data['HariPasar']), 'Catatan' => ($data['Catatan'] == "" ? null : $data['Catatan']), 'IdPencacah' => ($data['IdPencacah'] == "" ? null : $data['IdPencacah']), 'IdPemeriksa' => ($data['IdPemeriksa'] == "" ? null : $data['IdPemeriksa'])
							, 'TglCacah' => ($data['TglCacah'] == "" ? null : $data['TglCacah']), 'TglPeriksa' => ($data['TglPeriksa'] == "" ? null : $data['TglPeriksa'])
							, 'StatusDok' => $data['StatusDok']);
			
			
			$this->tabel->_table = 'TKonsumen';
			$dataCek = $this->tabel->find_where($keyKonsumen);
			if ($dataCek[0]->CreatedBy == null || $dataCek[0]->CreatedBy == "")
				$dataKonsumen['CreatedBy'] = $this->session->userdata('shped_id');
			$this->tabel->update_where($keyKonsumen, $dataKonsumen);
			
			$keyKonsumenHarga = $keyKonsumen;
			foreach($blok4 as $key => $val)
			{
				if ($val['IdKualitas'] != "0")
				{
					if ($val['IsUsed'] == "0")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => true, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					else if ($val['IsUsed'] == null || $val['IsUsed'] == "")
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->insert(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'], 
											'IsUsed' => true, 'CreatedBy' => $this->session->userdata('shped_id')));
					}

					if ($val['IsDeleted'] == 1)
					{
						$this->tabel->_table = 'MKecDokMKualitas';
						$this->tabel->update_where(array('IdKec' => $data['IdKec'], 'IdKualitas' => $val['IdKualitas'])
												, array('IsUsed' => false, 'DateModified' => date('Y-m-d'), 'ModifiedBy' => $this->session->userdata('shped_id')));
					}
					
					$this->tabel->_table = 'TKonsumenHarga';
					$keyKonsumenHarga['IdKualitas'] = $val['IdKualitas'];
					$dataCek = $this->tabel->find_where($keyKonsumenHarga);
					if (count($dataCek) == 0)
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataKonsumenHarga = $keyKonsumenHarga;
							$dataKonsumenHarga['HargaPrev'] = $val['HargaPrev'];
							$dataKonsumenHarga['Harga'] = $val['Harga'];
							$dataKonsumenHarga['CreatedBy'] = $this->session->userdata('shped_id');
							$this->tabel->insert($dataKonsumenHarga);
						}
					}
					else
					{
						if ($val['IsDeleted'] == 0)
						{
							$dataKonsumenHarga = array();
							$dataKonsumenHarga['HargaPrev'] = $val['HargaPrev'];
							$dataKonsumenHarga['Harga'] = $val['Harga'];
							$dataKonsumenHarga['DateModified'] = date('Y-m-d');
							$dataKonsumenHarga['ModifiedBy'] = $this->session->userdata('shped_id');
							$this->tabel->update_where($keyKonsumenHarga, $dataKonsumenHarga);
						}
						else
						{
							$this->tabel->delete_where($keyKonsumenHarga);
						}
					}
				}
			}
			
			echo json_encode(array('msg' => 'Data berhasil disimpan dengan status : ' . $data['StatusDok']));
		}
	}
	
}

/* End of file entri.php */
/* Location: ./apps/controllers/entri.php */