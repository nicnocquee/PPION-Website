<?php

class Home extends MY_Controller {
	### Extended CI_Controller /application/core/MY_Controller.php

 
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
	}
            
    function index() {
		//Just pass in a basic variable into an HTML view
		$data['message'] = "My Test message";
		$this->load->view('home', $data);
		
	}
	
	function test() {
		/* Use Doctrine's Entity manager to find a user based off 
		   the annoted Model called "User" where the db entry's ID
		   is 7 */
		
		$user = $this->em->find('models\User','7');
		
		/* Now, use some of the methods that we created in our User Model
		   to change the entry's data */
		$user->setUsername('Bob');
		// Also, since Doctrine uses transactions, we've got to tell to execute the query
		$this->em->persist($user);
		$this->em->flush();
		
		/* Now that we're changed the "username" column in the "user" table
		   go ahead and grab it and pass it into our view for testing. */
		$message = $user->getUsername();		 
		$data['message'] = $message;
		$this->load->view('home', $data);
		
	}
	
	function newuser() {
		/* Same as before, except we have to reference our User model
		   This shows how to add new entries */
		$user = new models\User;
		$user->setUsername('my username');
		$this->em->persist($user);
		$this->em->flush();
		
		// Test the new entry, grab the new username
		$message = $user->getUsername();
				 
		$data['message'] = $message;
		$this->load->view('home', $data);
	}

}