<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// inherits from MY_Controller from the core folder
class User extends MY_Controller
{
	// constructor that calls the ion_auth library
	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
	}

	// the index function, first function to be called
	public function index()
	{
	}

	// login function
	public function login()
	{
		// sets the page title to be Login
		$this->data['page_title'] = 'Login';

		// conditional to verify the inputs
		if($this->input->post())
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('identity', 'Identity', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('remember','Remember me','integer');
			if($this->form_validation->run()===TRUE)
			{
				$remember = (bool) $this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
				{
				        redirect('admin', 'refresh');
				}
				else
				{
					$this->session->set_flashdata('message',$this->ion_auth->errors());
					redirect('admin/user/login', 'refresh');
				}
			}
				     
		}
		// loads the helper form
		$this->load->helper('form');
		// uses the render function to render the view for the login page which was inherited from the MY_Controller from core folder
		$this->render('admin/login_view','admin_master');
	}
	// logout function
	public function logout()
	{
		$this->ion_auth->logout();
		redirect('admin/user/login', 'refresh');
        }
}
