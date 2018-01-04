<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsticker extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = "Newsticker";
        $this->tabel->_table = "newsticker";
        $data['newsticker'] = $this->tabel->NewstickerSelectListAll();
        $data['page'] = "backend/newsticker";
        $this->load->view('backend/page', $data);
    }

    public function add() {

        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['lang'] = $lang;
        
        $data['title'] = "Newsticker - Add";
        $data['page'] = "backend/newstickeradd";
        $this->load->view('backend/page', $data);
    }

    public function addsave() {

        $data = $this->input->post('data');
        $dataSave = array();
        $dataSave['tag'] = $data['tag'] == "" ? null : $data['tag'];
        if ( get_magic_quotes_gpc() ){
            $dataSave['content'] = htmlspecialchars( stripslashes(str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content'])) );
        }
        else{
            $dataSave['content'] = htmlspecialchars( str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content']));
        }
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_create'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "newsticker";
        $dataSave['sorter'] = $this->tabel->SelectNextSorter($dataSave['lang_id'], "newsticker");
        $this->tabel->insert($dataSave);
                        
        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data Newsticker (tag: ". $data['tag'] .") is added succesfully.";
   
        echo json_encode($msgBack);
    }

    public function edit($param = null) {

        $id = $param;
        $this->tabel->_table = "newsticker";
        $newsticker = $this->tabel->find_by_id($id);
        $this->tabel->_table = "lang";
        $lang = $this->tabel->find_all();
        
        $data['newsticker'] = $newsticker[0];
        $data['lang'] = $lang;
        $data['id'] = $id;
        
        $data['title'] = "Newsticker - Edit";
        $data['page'] = "backend/newstickeredit";
        $this->load->view('backend/page', $data);
    }

    public function editsave($param = null) {

        $id = $param;
        $data = $this->input->post('data');
        $dataSave = array();
        $dataSave['tag'] = $data['tag'] == "" ? null : $data['tag'];
        if ( get_magic_quotes_gpc() ){
            $dataSave['content'] = htmlspecialchars( stripslashes(str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content'])) );
        }
        else{
            $dataSave['content'] = htmlspecialchars( str_replace($this->session->userdata('bpom_ppid_content_url'), "{{contenturl}}", (string)$data['content']) );
        }
        $dataSave['lang_id'] = $data['lang_id'];
        $dataSave['date_update'] = date('Y-m-d H:i:s');

        $this->tabel->_table = "newsticker";
        $this->tabel->update_where(array('id' => $id), $dataSave);
                        
        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Data Newsticker (tag: ". $data['tag'] .") is edited succesfully.";
   
        echo json_encode($msgBack);
    }

    public function delete($param = null) {

        $id = $param;
                
        $this->tabel->_table = "newsticker";
        $this->tabel->delete_where(array('id' => $id));

        redirect('backend/newsticker');
    }

    public function sortnewsticker() {

        $ids = $this->input->post('ids');
        //var_dump($ids);
        $this->tabel->_table = "newsticker";
        for($i = 0; $i < count($ids); $i++){

            $this->tabel->update_where(array("id"=>$ids[$i]), array("sorter" => ($i+1)));
        }

        $msgBack = array();
        
        $msgBack['IsError'] = false;
        $msgBack['Msg'] = "Succesfully.";
   
        echo json_encode($msgBack);
    }

}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */