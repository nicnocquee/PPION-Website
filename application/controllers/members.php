<?php

class Members extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		
		//$this->load->helper(array('form','url'));
        //$this->load->library('form_validation');
	}
            
    function index() {
    	$query = $this->em->createQuery('SELECT u, p FROM models\User u LEFT JOIN u.contacts p');
		$query->setMaxResults(5);
		$users = $query->getResult();
		$data['members'] = $users;
		$this->load->view('members', $data);
	}
}
?>