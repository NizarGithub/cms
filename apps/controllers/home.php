<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = "frontend/home";
		$data['dataPage'] = $this->dataPage;
		$this->load->view('frontend/page', $data);
	}
	
	
}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */