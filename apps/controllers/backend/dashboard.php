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
        $data['page'] = "backend/dashboard";
        $this->load->view('backend/page', $data);
    }

}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */