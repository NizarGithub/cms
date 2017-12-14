<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // List of classes that can be accessed when the user is not authenticated
    protected $_open_controllers = array('auth', 'home', 'page');
    protected $_admin_controllers = array();
	protected $data_redirect;
    protected $dataPage = array();
    protected $language = 'ina';

    public function __construct()
    {
		parent::__construct();
		
		$this->load->model("mtabel","tabel");
		/*
        // set a config item to toggle the profiler on/off globally
        $this->output->enable_profiler($this->config->item('enable_profiler'));
		*/
        // Check auth
        $this->_check_auth(); 
		
		$this->data_redirect = ($this->session->userdata('data_redirect')) ? $this->session->userdata('data_redirect') : "backend/dashboard";
		
		//$this->AddRequestVar();

        $this->_getDataPageFrontend();
        $this->_getMenu();
    }

    // ----------------------------------------------------------------
	
	private function AddRequestVar()
	{
		switch($_SERVER['REQUEST_METHOD'])
		{
			case 'GET': $_REQUEST = &$_GET; break;
			case 'POST': $_REQUEST = &$_POST; break;
			default: break;
		}
	}

    private function _check_auth()
    {
        if ( ! $this->session->userdata('bpom_ppid_logged_in'))
        {
            if ( ! in_array($this->router->class, $this->_open_controllers))
            {
                // Save the page we are on now to redirect if the user successfully authenticates
                $this->session->set_userdata('data_redirect', uri_string());

                // You're gone, buddy.
                redirect('login');
            }
        }
		else
		{
			if ( $this->session->userdata('bpom_ppid_level') == "2" && in_array($this->router->class, $this->_admin_controllers) )
			{	
				// Save the page we are on now to redirect if the user 
                // successfully authenticates
                $this->session->set_userdata('data_redirect', uri_string());

                // You're gone, buddy.
                redirect('dashboard');
			}
		}
    }

    private function _getDataPageFrontend()
    {
        $this->tabel->_table = "static";
        $footer = $this->tabel->find_where(array('page' => 'page', 'key' => 'footer'));
        $this->dataPage['footer'] = count($footer) > 0 ? nl2br($footer[0]->value) : '';
    }

    private function _getMenu()
    {
        $lang = $this->language;
        $list = $this->tabel->SelectList($lang);
        $menu = "";
        $idx = 1;
        foreach ($list as $row){
            $result = $this->tabel->SelectMenu($row->parent_id, $lang);
            $nav = ($idx == 1) ? '<ul>' : '<ul>';
            foreach ($result as $res){
                $classLi = "";
                $submenu = "";
                $deskripsi = nl2br($res->deskripsi);
                $link = $res->is_hyperlink == 1 ? $res->link : base_url() . 'page/view/' . ($res->link_static == null ? '#' : $res->link_static);
                if ($res->child > 0)
                {
                    if ($idx == 1)
                        $classLi = "first";
                    $submenu = $deskripsi . '<span class="'. ($idx == 1 ? "down-arrow" : "right-arrow") .'"></span>' . 'submenu-' . $res->id;
                }
                else
                {
                    $submenu = '<a href="'. $link .'" '. ($res->is_hyperlink == 1 ? 'target="_blank"' : '') .'>'. $deskripsi .'</a>';
                }
                

                $nav .= '<li class="'. $classLi .'">'. $submenu .'</li>';
            }
            $nav .= '</ul>';
            $menu = ($menu == "") ? $nav : str_replace("submenu-$row->parent_id", $nav, $menu);
            //$menu[$row->parent_id] = $nav;
            $idx++;
        }
        
        $this->dataPage['menu'] = $menu;
    } 
}