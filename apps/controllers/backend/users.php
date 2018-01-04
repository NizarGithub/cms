<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = array();

		$data['title'] = "Users";
		$data['page'] = "backend/users";
        $this->load->view('backend/page', $data);
	}
	
	public function actionuser($act)
	{
		$data = array();
		switch($act)
		{
			case "list":
			
				$this->tabel->_table = "user";
				$param = $this->input->post('param');
				$operator = $this->tabel->find_all();
				echo json_encode($operator);
			
				break;
				
			case "saveoperator":
			
				$data = array();
				$this->tabel->_table = "user";
				$param = $this->input->post('param');
				if ($param['action'] == "add")
				{
                    $cekOperator = $this->tabel->find_where(array('username' => $param['username']));
                    if (empty($cekOperator[0]->Hash)) {
                        $param['hash'] = uniqid();
                        $param['password'] = md5($param['hash'] . $param['password']);
                    } 

                    foreach ($param as $key => $value) {
                        if (trim($value) == '')
                            $this->$key = NULL;
                    }
	
					if (count($cekOperator) > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data User dengan Username <strong>'. $param['username'] .'</strong> sudah ada.';
					}
					else
					{
						unset($param['action']);
						$param['isaktif'] = $param['isaktif'] == "1" ? true : false;
						$this->tabel->insert($param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data User dengan Username <strong>'. $param['username'] .'</strong> dan Nama <strong>'. $param['realname'] .'</strong> berhasil disimpan.';
					}
				}
				else if ($param['action'] == "edit")
				{
                    $PasswordLama = $this->tabel->find_where(array('id' => $param['id']));
                    if ($param['password'] != $PasswordLama[0]->password){
                        $param['password'] = md5($PasswordLama[0]->hash . $param['password']);
                    }
					$jmOperator = $this->tabel->SelectJmlOperatorCekForUpdate($param);
                                        
					if ($jmOperator > 0)
					{
						$data['IsError'] = true;
						$data['Msg'] = 'Data User dengan Username <strong>'. $param['Username'] .'</strong> sudah ada.';
					}
					else
					{
						$idUser = $param['id'];
						unset($param['action']);
						unset($param['id']);
						$param['isaktif'] = $param['isaktif'] == "1" ? true : false;
						$this->tabel->update_where(array('id' => intval($idUser)), $param);
						$data['IsError'] = false;
						$data['Msg'] = 'Data User dengan Username <strong>'. $param['username'] .'</strong> dan Nama <strong>'. $param['realname'] .'</strong> berhasil diubah.';
					}
				}
				echo json_encode($data);
			
				break;
				
			case "deloperator":
			
				$data = array();
				$this->tabel->_table = "user";
				$param = $this->input->post('param');
				
			
				$data['IsError'] = false;
				$data['Msg'] = '';

				$this->tabel->update_where(array('id' => $param['id']), array('isaktif' => false));
				$data['Msg'] = 'Data User dengan Username <strong>'. $param['username'] .'</strong> berhasil dihapus.';
				
				echo json_encode($data);
			
				break;
		}
	}
	
}

/* End of file users.php */
/* Location: ./apps/controllers/users.php */