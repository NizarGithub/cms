<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

    
	public function __construct()
	{
            
		parent::__construct();
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
            if ($this->session->userdata('bpom_ppid_logged_in'))
            {
                redirect('backend/dashboard');
            }
		
            $viewBag['title'] = "Login";
            $viewBag['data_redirect'] = $this->data_redirect;

            $seccode = $this->getRandomString(10);
            $viewBag['seccode'] = $seccode;

            if ($this->input->post('username') && $this->input->post('password') && $this->input->post('seccode'))
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $seccodeIn = $this->input->post('seccode');
                $msgBack = array();
                if ($this->session->userdata('bpom_ppid_seccode') != $seccodeIn)
                {
                        $msgBack['isSukses'] = false;
                        $msgBack['msg'] = "Permintaan halaman tidak diperbolehkan. Silahkan ulangi lagi.";
                }
                else
                {
                        $this->tabel->_table = "user";
                        $user = $this->tabel->find_where(array('username' => $username, 'isaktif' => '1'));//'Password' => $password, 
                        //print_r($user);exit;
                        if (count($user) > 0){
                            
                            if (!$this->isValidPassword($password, $user[0]->hash, $user[0]->password)) {
                                $msgBack['isSukses'] = false;
                                $msgBack['msg'] = "Kombinasi username and password tidak valid.";
                            } else {
                                $msgBack['isSukses'] = true;
                                $msgBack['msg'] = "Login sistem berhasil. Tunggu sebentar. Sedang mengalihkan halaman ...";

                                $sessData = array(
                                        'bpom_ppid_logged_in'  => true,
                                        'bpom_ppid_username'  => $user[0]->username,
                                        'bpom_ppid_password'  => $user[0]->password,
                                        'bpom_ppid_level'  => $user[0]->level,
                                        'bpom_ppid_id'  => $user[0]->id,
                                        'bpom_ppid_nama'  => $user[0]->realname
                                );

                                $this->session->set_userdata($sessData);
                            }
                                
                        }
                        else{
                                $msgBack['isSukses'] = false;
                                $msgBack['msg'] = "Kombinasi username and password tidak valid.";
                        }
                }

                $msgBack['seccode'] = $seccode;
                $this->session->set_userdata('bpom_ppid_seccode', $seccode);
                echo json_encode($msgBack);
            }
            else
            {
                $this->session->set_userdata('bpom_ppid_seccode', $seccode);
                $viewBag['page'] = "backend/login";
                $this->load->view('backend/page', $viewBag);
            }
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("login", 'refresh');
	}
	
	public function create($user = "")
	{
        $this->load->library('encrypt');
		$encrypted_string = $this->encrypt->decode("aaWSJxN8XQFYgHnL4s8HTwhRFD4vC8Oh6hAkVSQKPaEPRV2kY06Lpfl4Rz1d3cwLcKtkM98vzFfHr/GSPX0p/A==", "Promed-Key");
		echo $encrypted_string .'<br>';
	}
	
	private function getRandomString($length = 5) {

		$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ0123456789";
		$validCharNumber = strlen($validCharacters);

		$result = "";

		for ($i = 0; $i < $length; $i++) {

			$index = mt_rand(0, $validCharNumber - 1);

			$result .= $validCharacters[$index];

		}

		return $result;
	}
        
    public function isValidPassword($plainPassword, $hash, $password) {
        
        return md5($hash . $plainPassword) === $password;
        
    }

        
}

