<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filemanager extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = array();

		$data['title'] = "File Manager";
		$this->load->view('backend/filemanager', $data);
	}
	
}

/* End of file users.php */
/* Location: ./apps/controllers/users.php */