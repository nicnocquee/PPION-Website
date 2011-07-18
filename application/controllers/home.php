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
		
		$user = $this->em->find('models\User','1');
		
		if ($user) {
			/* Now, use some of the methods that we created in our User Model
		   to change the entry's data */
			$user->setName('Bob');
			// Also, since Doctrine uses transactions, we've got to tell to execute the query
			$this->em->persist($user);
			$this->em->flush();
		
			/* Now that we're changed the "username" column in the "user" table
			   go ahead and grab it and pass it into our view for testing. */
			$message = $user->getName();
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
		//$user->setCreatedAt(new DateTime());
		$this->em->persist($user);
		$this->em->flush();
		
		// Test the new entry, grab the new username
		$message = $user->getIntroduction();
				 
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	function newuser2() {
		/* Same as before, except we have to reference our User model
		   This shows how to add new entries */
		$user = new models\User;
		$user->setEmail('3@ppion.com');
		$user->setName('Tiga');
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
		//$user->setCreatedAt(new DateTime());
		$this->em->persist($user);
		$this->em->flush();
		
		// Test the new entry, grab the new username
		$message = $user->getIntroduction();
				 
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	function newuser3() {
		/* Same as before, except we have to reference our User model
		   This shows how to add new entries */
		$user = new models\User;
		$user->setEmail('4@ppion.com');
		$user->setName('Empat');
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
		//$user->setCreatedAt(new DateTime());
		$this->em->persist($user);
		$this->em->flush();
		
		// Test the new entry, grab the new username
		$message = $user->getIntroduction();
				 
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	function newusers() {
		$this->newuser();
		$this->newuser2();
		$this->newuser3();
	}
	
	function makefamily() {
		$user1 = $this->em->find('models\User','1');
		$user2 = $this->em->find('models\User','2');
		$user3 = $this->em->find('models\User','3');
		
		$family1 = new models\Family;
		$family1->setUser($user1);
		$family1->setMember($user2->getId());
		$family1->setRelationship("son");
		$family1->setConfirmed(1);
		//$family1->setCreatedAt(new DateTime());
		$this->em->persist($family1);
		$this->em->flush();
		
		$family2 = new models\Family;
		$family2->setUser($user1);
		$family2->setMember($user3->getId());
		$family2->setRelationship("daughter");
		$family2->setConfirmed(1);
		//$family2->setCreatedAt(new DateTime());
		$this->em->persist($family2);
		$this->em->flush();
		
		$fam = $user1->getFamilies();
		$message = 'Family members are '.$fam->count().' ';
		foreach ($fam as $member) {
			$mem = $this->em->find('models\User', $member->getMember());
			$message = $message.$mem->getName().', ';
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function getfamily() {
		$user1 = $this->em->find('models\User','1');
		$fam = $user1->getFamilies();
		$message = 'Family members of user1 are '.$fam->count().' ';
		foreach ($fam as $member) {
			$mem = $this->em->find('models\User', $member->getMember());
			$message = $message.$mem->getName().' relationship: '.$member->getRelationship().', ';
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function addContacts() {
		$user1 = $this->em->find('models\User','1');
		
		$contact1 = new models\Contact;
		$contact1->setUser($user1);
		$contact1->setAddress('09017178823');
		$contact1->setType('phone');
		$contact1->setVisibility(0);
		$this->em->persist($contact1);
		$this->em->flush();
		
		$contact2 = new models\Contact;
		$contact2->setUser($user1);
		$contact2->setAddress('hirose mansion');
		$contact2->setType('address');
		$contact2->setVisibility(0);
		$this->em->persist($contact2);
		$this->em->flush();
		
		$contacts = $user1->getContacts();
		$message = 'Contacts are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getAddress().', '.$member->getType()."\n";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function getContacts() {
		$user1 = $this->em->find('models\User','1');
		$contacts = $user1->getContacts();
		$message = 'Contacts are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getAddress().', '.$member->getType()."</br>";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
}