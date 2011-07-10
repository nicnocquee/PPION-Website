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
		
		$user = $this->em->find('models\User','5');
		
		if ($user) {
			/* Now, use some of the methods that we created in our User Model
		   to change the entry's data */
			$user->setUsername('Bob');
			// Also, since Doctrine uses transactions, we've got to tell to execute the query
			$this->em->persist($user);
			$this->em->flush();
		
			/* Now that we're changed the "username" column in the "user" table
			   go ahead and grab it and pass it into our view for testing. */
			$message = $user->getUsername();
		} else {
			$message = 'No user.';
				 
		}
		$data['message'] = $message;
		$this->load->view('home', $data);
		
	}
	
	function newuser() {
		/* Same as before, except we have to reference our User model
		   This shows how to add new entries */
		$user = new models\User;
		$user->setEmail('2@ppion.com');
		$user->setName('Dua');
		$user->setPassword(md5('password'));
		$user->setHometown('Bandung');
		$user->setAffiliation('Osaka City University');
		$user->setArrivalDate(new DateTime('2008-04-01'));
		$user->setBirthday(new DateTime('1985-01-21'));
		$user->setMarriageStatus(1);
		$user->setGender('M');
		$user->setReligion('Islam');
		$user->setIntroduction('Lorem ipsum bla bla bla');
		$user->setUndergradUniversity('Institut Teknologi Bandung');
		$user->setUndergradDepartment('Teknik Elektro');
		$user->setUndergradGraduationYear('2006');
		$user->setMasterUniversity('Osaka City University');
		$user->setMasterDepartment('Communication System');
		$user->setMasterGraduationYear('2011');
		$user->setPhdUniversity('Osaka City University');
		$user->setPhdDepartment('Communication System');
		$user->setPhdGraduationYear('2014');
		$user->setInformalSkill('iOS development');
		$user->setLeftTheCountry(0);
		$user->setPosition('Web developer');
		$user->setCreatedAt(new DateTime());
		$this->em->persist($user);
		$this->em->flush();
		
		// Test the new entry, grab the new username
		$message = $user->getIntroduction();
				 
		$data['message'] = $message;
		$this->load->view('home', $data);
	}

}