<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

	  function __construct()
	  {
	      parent::__construct();
	  }

	  // simply renders the dashboard_view under the admin folder in the views
	  public function index()
    {
        $this->load->model('Session_model');
        $this->data['objects'] = $this->Session_model->get();
        $this->data['user'] = $this->ion_auth->user()->row();
	      $this->render('admin/dashboard_view');
	  }
}
