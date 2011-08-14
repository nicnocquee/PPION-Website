<?php

class Error extends MY_Controller {
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
	}
            
    public function index() {
		$this->load->view('alert');
	}
}