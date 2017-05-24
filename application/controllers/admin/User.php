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

    // if user is already logged in redirect to the dashboard
    if ($this->ion_auth->logged_in()){
      redirect('admin/dashboard', 'refresh');
    }
		// conditional to verify the inputs
		if($this->input->post())
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('identity', 'Identity', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run()===TRUE)
			{
				$remember = (bool) $this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password') ))
				{
				  redirect('admin/dashboard', 'refresh');
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


	public function edit($user_id = NULL)
  {
    if(!$this->ion_auth->is_admin()  && $user_id == $this->ion_auth->user()->row()->id    ){

		$user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
		$this->data['page_title'] = 'Edit user';
		$this->load->library('form_validation');

		$this->form_validation->set_rules('first_name','First name','trim');
		$this->form_validation->set_rules('last_name','Last name','trim');
		$this->form_validation->set_rules('address','Address','trim');
    $this->form_validation->set_rules('birthday','Birthday','trim'); 

		if($this->form_validation->run() === FALSE)
		{
			if($user = $this->ion_auth->user((int) $user_id)->row())
			{
				$this->data['user'] = $user;
			}
			else
			{
				$this->session->set_flashdata('message', 'The user doesn\'t exist.');
				redirect('admin/dashboard', 'refresh');
			}
      
      $this->load->helper('form');
			$this->render('users/edit_user_view','admin_master');
		}
		else
		{
			$user_id = $this->input->post('user_id');
			$new_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'address' => $this->input->post('address'),
				'birthday' => $this->input->post('birthday')
			);

			$this->ion_auth->update($user_id, $new_data);

			//Update the groups user belongs to

			$this->session->set_flashdata('message',$this->ion_auth->messages());
			redirect('admin/dashboard','refresh');
		}
	}        

  else{
  
    $this->session->set_flashdata('message', 'You are not allowed to access the link. You have been redirected.');
	  redirect('admin/dashboard', 'refresh'); 
  
  
  
  }



}
  
  
  

	// logout function
	public function logout()
	{
		$this->ion_auth->logout();
		redirect('admin/user/login', 'refresh');
  }
}
