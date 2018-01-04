<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // List of classes that can be accessed when the user is not authenticated
    protected $_open_controllers = array('auth', 'home', 'page');
    protected $_admin_controllers = array();
	protected $data_redirect;
    protected $dataPage = array();
    protected $language = 'ina';
    protected $ftpParam = array("host" => "127.0.0.1", "username" => "danukidd", "password" => "danukidd");

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
        $this->_setSettingSite();
        $this->_setVisitor();
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
        $infoPage = $this->tabel->find_where(array('page' => 'page'));
        if (count($infoPage) > 0)
            foreach ($infoPage as $k => $v) {
                $this->dataPage[$v->key] = str_replace("{{Year}}", date("Y"), htmlspecialchars_decode(nl2br($v->value)));
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
            $nav = ($idx == 1) ? '<ul id="e_primary_menu" class="sf-menu e_mega clearfix"><li class="menu-item"><a href="'. base_url() . '"><i class="e_icon fa fa-home" style="font-size: 16pt"></i></a></li>' : '<ul class="sub-menu">';
            foreach ($result as $res){
                $classLi = "";
                $submenu = "";
                $deskripsi = nl2br($res->deskripsi);
                $link = $res->is_hyperlink == 1 ? $res->link : base_url() . 'page/view/' . ($res->link_static == null ? '#' : $res->link_static);
                if ($res->child > 0)
                {
                    /*if ($idx == 1)
                        $classLi = "first";*/
                    $classLi = "menu-item-has-children";
                    $submenu = '<a href="javascript:void(0)" itemprop="url">'. $deskripsi .'</a>' . 'submenu-' . $res->id;
                }
                else
                {
                    $submenu = '<a href="'. $link .'" '. ($res->is_hyperlink == 1 ? 'target="_blank"' : '') .' itemprop="url">'. $deskripsi .'</a>';
                }
                

                $nav .= '<li class="menu-item '. $classLi .'">'. $submenu .'</li>';
            }
            $nav .= '</ul>';
            $menu = ($menu == "") ? $nav : str_replace("submenu-$row->parent_id", $nav, $menu);
            //$menu[$row->parent_id] = $nav;
            $idx++;
        }
        
        $this->dataPage['menuSide'] = str_replace(array('e_primary_menu', 'sf-menu e_mega', '<li class="menu-item"><a href="'. base_url() . '"><i class="e_icon fa fa-home" style="font-size: 16pt"></i></a></li>'), array('e_side_menu', 'e_style_01', '<li class="menu-item"><a href="'. base_url() . '">Beranda</a></li>'), $menu);
        $this->dataPage['menu'] = $menu;
    } 

    private function _setSettingSite()
    {
        $this->tabel->_table = "static";
        $contentUrl = $this->tabel->find_where(array('page' => 'setting', 'key' => 'content_url'));
        $this->session->set_userdata('bpom_ppid_content_url', count($contentUrl) > 0 ? $contentUrl[0]->value : '');
    }

    private function _setVisitor()
    {
        $this->tabel->_table = "statistics";
        $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
        $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
        $waktu   = time(); //

        $whereData = array("ip" => $ip, "access_date" => $tanggal);

        $data = $this->tabel->find_where($whereData);
        if (count($data) > 0)
        {
            $this->tabel->update_where($whereData, array("hits" => $data[0]->hits + 1, "online" => $waktu));
        }
        else
        {
            $whereData["hits"] = 1;
            $whereData["online"] = $waktu;
            $this->tabel->insert($whereData);
        }

        $this->dataPage['visitorToday'] = $this->tabel->SelectVisitorToday($tanggal);
        $bataswaktu = time() - 300;
        $this->dataPage['visitorOnline'] = $this->tabel->SelectVisitorOnline($bataswaktu);
        $this->dataPage['visitorTotal'] = $this->tabel->SelectVisitorTotal();
        $this->dataPage['visitorYear'] = $this->tabel->SelectVisitorYear(date("Y"));
    }
}