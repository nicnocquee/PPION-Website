<?php

## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller  {

public $em; 

function __construct()  {
		parent::__construct();
		
		//$config = array('userID' => 12);
		$this->load->library('acl');
		$controller = $this->router->class;
		$method = $this->router->fetch_method();
		$con_met = $controller.'_'.$method;
		
		$allPerms = $this->acl->getAllPerms('full');
		
		if (array_key_exists($con_met, $allPerms)) {
			$user = models\Current_User::user();
			if (!$user) {
				$next = '/'.$controller.'/'.$method;
				$this->session->set_userdata('next', $next);
				redirect('/login/');
				return;
			}
			$config['userID'] = $user->getId();
			$this->acl->init($config);
			if ( !$this->acl->hasPermission($con_met) ) {
				//if ($controller != 'login') redirect('/login/');
				redirect('/error/');
				return;
			}
		}

		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		$this->em = $this->doctrine->em;
		
	}

}  