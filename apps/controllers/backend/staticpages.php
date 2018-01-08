<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staticpages extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = "Static Pages";
        $this->tabel->_table = "page_static";
        $data['staticpages'] = $this->tabel->find_all();
        $data['page'] = "backend/staticpages";
        $this->load->view('backend/page', $data);
    }

    public function add() {

        $menu = $this->tabel->SelectListMenuStatic();
        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['lang'] = $lang;
        $data['menu'] = $menu;
        
        $data['title'] = "Static Pages - Add";
        $data['page'] = "backend/staticpagesadd";
        $this->load->view('backend/page', $data);
    }

    public function addsave() {

        $data = $this->input->post('data');
        $dataSave = array();
        $dataSave['title'] = $data['title'];
        $dataSave['link'] = $data['link'];
        if ( get_magic_quotes_gpc() ){
            $dataSave['content'] = htmlspecialchars( stripslashes(str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content'])) );
        }
        else{
            $dataSave['content'] = htmlspecialchars( str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content']));
        }
        if ( get_magic_quotes_gpc() ){
            $dataSave['short_desc'] = htmlspecialchars( stripslashes((string)$data['short_desc']) );
        }
        else{
            $dataSave['short_desc'] = htmlspecialchars( (string)$data['short_desc']);
        }
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_create'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "page_static";
        $this->tabel->insert($dataSave);
                        
        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data static pages (title: ". $data['title'] .") is added succesfully.";
   
        echo json_encode($msgBack);
    }

    public function edit($param = null) {

        $id = $param;
        $this->tabel->_table = "page_static";
        $staticpages = $this->tabel->find_by_id($id);
        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['staticpages'] = $staticpages[0];
        $data['lang'] = $lang;
        $data['id'] = $id;
        
        $data['title'] = "Static Pages - Edit";
        $data['page'] = "backend/staticpagesedit";
        $this->load->view('backend/page', $data);
    }

    public function editsave($param = null) {

        $id = $param;
        $data = $this->input->post('data');
        $dataSave = array();
        $dataSave['title'] = $data['title'];
        $dataSave['link'] = $data['link'];
        if ( get_magic_quotes_gpc() ){
            $dataSave['content'] = htmlspecialchars( stripslashes(str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content'])) );
        }
        else{
            $dataSave['content'] = htmlspecialchars( str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content']) );
        }
        if ( get_magic_quotes_gpc() ){
            $dataSave['short_desc'] = htmlspecialchars( stripslashes((string)$data['short_desc']) );
        }
        else{
            $dataSave['short_desc'] = htmlspecialchars( (string)$data['short_desc']);
        }
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_update'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "page_static";
        $this->tabel->update_where(array('id' => $id), $dataSave);
                        
        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data static pages (title: ". $data['title'] .") is edited succesfully.";
   
        echo json_encode($msgBack);
    }

    public function delete($param = null) {

        $id = $param;
                
        $this->tabel->_table = "page_static";
        $this->tabel->delete_where(array('id' => $id));

        redirect('backend/staticpages');
    }

}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */