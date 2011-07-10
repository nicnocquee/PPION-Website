<?php

## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller  {

public $em; 

function __construct()  {
		parent::__construct();
		
		/* Instantiate Doctrine's Entity manage so we don't have
		   to everytime we want to use Doctrine */
		   
		$this->em = $this->doctrine->em;
	}

}  