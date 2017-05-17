<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends Admin_Controller
{

	// if the visitor of the group page is not an admin or superuser return a message
	function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->in_group('admin'))
		{
			$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
			redirect('admin','refresh');
		}
	}
	
	// gets all groups from the ion_auth and passes them to list_groups_view
	public function index()
	{
		$this->data['page_title'] = 'Groups';
		$this->data['groups'] = $this->ion_auth->groups()->result();
		$this->render('admin/groups/list_groups_view');
	}

}
