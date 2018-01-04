<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        


        $data['title'] = "Dashboard";
        $this->tabel->_table = "user";
        $jmlUser = $this->tabel->find_all();
        $data['jmlUser'] = count($jmlUser);
        $this->tabel->_table = "page_static";
        $jmlPages = $this->tabel->find_all();
        $data['jmlPages'] = count($jmlPages);
        $this->tabel->_table = "slideshow";
        $jmlSlide = $this->tabel->find_all();
        $data['jmlSlide'] = count($jmlSlide);
        $this->tabel->_table = "newsticker";
        $jmlNews = $this->tabel->find_all();
        $data['jmlNews'] = count($jmlNews);
        $data['page'] = "backend/dashboard";
        $this->load->view('backend/page', $data);
    }

}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */