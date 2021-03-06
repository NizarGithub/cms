<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = "frontend/home";
		$data['dataPage'] = $this->dataPage;
		$this->load->view('frontend/page_new', $data);
	}
	
	public function view($link = "", $parentName = "", $parentLink = "")
	{
		$this->tabel->_table = "page_static";
		$staticPage = $this->tabel->find_where(array("link" => $link, "lang_id" => $this->language));
		
		if (count($staticPage) == 0)
		{
			$staticPage = $this->tabel->find_where(array("link" => "page-404", "lang_id" => $this->language));
			if (count($staticPage) == 0)
				show_404($link);
			//$this->view('page-404');
		}

		$staticPage = $staticPage[0];
		
		$data['dataPage'] = $this->dataPage;
		$data['titlePage'] = $staticPage->title;
		$data['content'] = str_replace("{{contenturl}}", $this->session->userdata('bpom_ppid_content_url'), htmlspecialchars_decode($staticPage->content)) . htmlspecialchars_decode($staticPage->short_desc);
		$data['parentName'] = urldecode($parentName);
		$data['parentLink'] = str_replace("_","/",$parentLink);
		$data['page'] = "frontend/staticpage";
		$data['isHomepage'] = $staticPage->id == 1 ? true : false;
		$data['isSharing'] = $staticPage->is_sharing;

		$this->tabel->_table = "slideshow";
		$data['slides'] = $this->tabel->SlideshowSelectListAll();

		$this->tabel->_table = "newsticker";
		$data['newsticker'] = $this->tabel->NewstickerSelectListAll();
		
		$this->load->view('frontend/page_new', $data);
	}
}

/* End of file page.php */
/* Location: ./apps/controllers/page.php */