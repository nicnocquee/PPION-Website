<?php

class Members extends MY_Controller {
	private $methodsArray;
	
	function  __construct()  {
		parent::__construct();
		$this->methodsArray = array('index');
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
	
	function show($id){
		$user = $this->em->find('models\User', $id);
		if ($user) {
			$data['member'] = $user;
			$this->load->view('show_user', $data);
		} else {
			$data['message'] = 'Invalid user id.';
			$this->load->view('error', $data);
		}
	}
	
	public function _remap($method)
	{
		if (in_array($method, $this->methodsArray))
		{
			$this->$method();
		} else {
			$this->show($method);
		}
	}
}
?>