<?php defined('BASEPATH') OR exit('No direct script access allowed');

// controller that inherits from the CI_Controller. Added the render function to render templates and load views
class MY_Controller extends CI_Controller
{

	protected $data =array();

	// sets all the page's parameters
	function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = '153 App';

		// data that is added before closing the head such as bootstrap links etc.
		$this->data['before_head'] = '';
		// data that is added before closing the body such as javascript indludes
		$this->data['before_body'] ='';
	}

	protected function render($the_view = NULL, $template = 'master')
	{
		// processes json files	
		if($template == 'json' || $this->input->is_ajax_request())
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		
		}

		// renders data by loading the view from the templates folder so in the we don't need to load views in the controllers folder we just call render
		else{
		
			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
			$this->load->view('templates/'.$template.'_view', $this->data);
		
		}
	
	}
}

// controller for the admin
class Admin_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		//loads ion_auth for authentication
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('admin/user/login', 'refresh');
		}
		// puts admin in the dashboard of the admin page
		$this->data['current_user'] = $this->ion_auth->user()->row();
		$this->data['current_user_menu'] = '';
		if($this->ion_auth->in_group('admin'))
		{
			$this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
		}
		$this->data['page_title'] = 'Admin - Dashboard';
	}
	
	// changes the inherited render function
	protected function render($the_view = NULL, $template = 'admin_master')
	{
		parent::render($the_view, $template);
	}
}

class Public_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
}
