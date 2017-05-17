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
	      $this->render('admin/dashboard_view');
	  }
}
