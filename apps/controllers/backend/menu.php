<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        $data['title'] = "Menu";
        $data['menuAll'] = $this->_getMenu();
        $data['page'] = "backend/menu";
        $this->load->view('backend/page', $data);
    }

    public function staticpages() {
        
        $id = $this->input->post('id');
        $this->tabel->_table = "page_static";
        $data['pagestatic'] = $this->tabel->find_all();
        if ($id != 0)
        {
            $this->tabel->_table = "menu";
            $data['datamenu'] = $this->tabel->find_by_id($id)[0];
        }
        echo json_encode($data);
    }

    public function save()
    {
        $data = array();
        $this->tabel->_table = "menu";
        $param = $this->input->post('param');
        $param['lang_id'] = "ina";
        $param['parent_id'] = $param['parent_id'] == "" ? null : $param['parent_id'];
        $param['id_pagestatic'] = $param['id_pagestatic'] == "" ? null : $param['id_pagestatic'];
        $param['link'] = $param['link'] == "" ? null : $param['link'];
        $param['is_hyperlink'] = $param['is_hyperlink'] == "1" ? true : false;
        if ($param['action'] == "add")
        {
            if ($param['parent_id'] == null)
            {
                $param['level'] = 1;
            }
            else
            {
                $dataParent = $this->tabel->find_by_id($param['parent_id']);
                $param['level'] = intval($dataParent[0]->level) + 1;
            }
            $dataSibling = $this->tabel->find_by_parent_id($param['parent_id']);
            $param['sorter'] = count($dataSibling) + 1;
            $param['date_create'] = date('Y-m-d H:i:s');

            unset($param['action']);
            $this->tabel->insert($param);
            $data['IsError'] = false;
            $data['Msg'] = 'Data menu dengan Deskripsi <strong>'. $param['deskripsi'] .'</strong> berhasil disimpan.';
        }
        else if ($param['action'] == "edit")
        {
            $param['date_update'] = date('Y-m-d H:i:s');
            $id = $param['parent_id'];
            unset($param['action']);
            unset($param['parent_id']);
            $this->tabel->update_where(array('id' => $id), $param);
            $data['IsError'] = false;
            $data['Msg'] = 'Data menu dengan Deskripsi <strong>'. $param['deskripsi'] .'</strong> berhasil diedit.';
        }
        $data['menuAll'] = $this->_getMenu();
        echo json_encode($data);
    }

    public function delete($param = null) {

        $id = $param;
                
        $this->tabel->_table = "menu";
        $this->tabel->delete_where(array('id' => $id));

        redirect('backend/menu');
    }

    public function updateOrder() {

        $param = $this->input->post('param');

        $this->tabel->_table = "menu";
        $dataSave = array();
        if (count($param) > 0)
        {
            $dataSave['level'] = 1;
            $dataSave['parent_id'] = null;
            $idx = 1;
            foreach ($param as $p) {
                $dataSave['sorter'] = $idx;
                if (isset($p['children']))
                {
                    $this->updateChild($p['children'], 2, $p['id']);
                }

                $this->tabel->update_where(array('id' => $p['id']), $dataSave);

                $idx++;
            }
        }

        //var_dump($param);
                
        //$this->tabel->_table = "menu";
        //$this->tabel->delete_where(array('id' => $id));

        $data = array();
        
        $data['IsError'] = false;
        $data['Msg'] = 'Data menu berhasil di-reorder.';

        echo json_encode($data);
    }

    private function updateChild($param, $level, $parentId)
    {
        $this->tabel->_table = "menu";
        $dataSave = array();
        $dataSave['level'] = $level;
        $dataSave['parent_id'] = $parentId;
        $idx = 1;
        foreach ($param as $p) {
            $dataSave['sorter'] = $idx;

            if (isset($p['children']))
            {
                $this->updateChild($p['children'], $dataSave['level'] + 1, $p['id']);
            }

            $this->tabel->update_where(array('id' => $p['id']), $dataSave);

            $idx++;
        }
    }

    private function _getMenu()
    {
        $lang = $this->language;
        $list = $this->tabel->SelectList($lang);
        $menu = "";
        $idx = 1;
        foreach ($list as $row){
            $result = $this->tabel->SelectMenu($row->parent_id, $lang);
            $nav = ($idx == 1) ? '<ol class="dd-list">' : '<ol class="dd-list" >';
            foreach ($result as $res){
                $submenu = "";
                $deskripsi = htmlspecialchars(nl2br($res->deskripsi));
                if ($res->child > 0)
                {
                    $submenu = '{submenu-' . $res->id . '}';
                }
                $link = $res->is_hyperlink == 1 ? $res->link : ($res->link_static == null ? '#' : $res->link_static);
                $nav .= '<li class="dd-item" data-id="'. $res->id .'" data-deskripsi="'. $deskripsi .'">
                            <div>
                                <a href="' . base_url() . 'backend/menu/delete/' . $res->id .'" type="button" class="delete-menu ml-xs btn btn-xs btn-danger pull-right"><i class="fa fa-times"></i> </a>
                                <button type="button" class="edit-menu ml-xs btn btn-xs pull-right"><i class="fa fa-pencil"></i> </button>
                                <button type="button" class="add-menu btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> </button>
                            </div>
                            <div class="dd-handle">'. $deskripsi .' [<span class="text-primary">'. $link .'</span>]
                            </div> '. $submenu .'
                        </li>';
            }
            $nav .= '</ol>';
            $menu = ($menu == "") ? $nav : str_replace("{submenu-$row->parent_id}", $nav, $menu);
            //$menu[$row->parent_id] = $nav;
            $idx++;
        }
        
        return $menu;
    } 
}

/* End of file home.php */
/* Location: ./apps/controllers/home.php */