<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = array();

		$data['title'] = "Designer";
		$data['page'] = "backend/designerembed";
		$this->load->view('backend/page', $data);
	}

	public function view()
	{
		$data = array();

		$data['title'] = "Designer";
		$this->load->view('backend/designer', $data);
	}

	public function save()
	{
		/*$data = array();

		$data['title'] = "Designer";
		$this->load->view('backend/designer', $data);*/
	}
	
}

/* End of file users.php */
/* Location: ./apps/controllers/users.php */