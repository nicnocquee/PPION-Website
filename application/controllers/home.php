<?php

class Home extends MY_Controller {
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
	}
            
    function index() {
	    $q = $this->em->createQuery("select p from models\Post p where p.flag is null");
	    $q->setMaxResults(9);
    	$recentPosts = $q->getResult();
    	//$q = $this->em->createQuery("select e from models\Event e");
    	//$q->setMaxResults(9);
    	//$recentEvents = $q->getResult();
		$data['posts'] = $recentPosts;
		$data['events'] = array();
		//$this->load->view('home', $data);
		$this->template->build('home', $data);
		
	}
}