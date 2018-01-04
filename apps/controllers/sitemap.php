<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = "frontend/sitemap";
		$data['dataPage'] = $this->dataPage;
		$data['isHomepage'] = false;
		$this->tabel->_table = "newsticker";
		$data['newsticker'] = $this->tabel->NewstickerSelectListAll();
		$this->load->view('frontend/page_new', $data);
	}
}

/* End of file page.php */
/* Location: ./apps/controllers/page.php */