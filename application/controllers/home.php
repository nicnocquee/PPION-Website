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
	
	public function addExpertises() {
		$user1 = $this->em->find('models\User','1');
		
		$contact1 = new models\Expertise;
		$contact1->setUser($user1);
		$contact1->setName('biology');
		$this->em->persist($contact1);
		$this->em->flush();
		
		$contact1 = new models\Expertise;
		$contact1->setUser($user1);
		$contact1->setName('math');
		$this->em->persist($contact1);
		$this->em->flush();
		
		$contacts = $user1->getExpertises();
		$message = 'Expertises are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getName()."</br>";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function getExpertises() {
		$user1 = $this->em->find('models\User','1');
		$contacts = $user1->getExpertises();
		$message = 'Expertises are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getName()."</br>";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function addPhotos() {
		$user1 = $this->em->find('models\User','1');
		
		$photo1 = new models\Photo;
		$photo1->setUser($user1);
		$photo1->setUrl('http://something.jpg');
		$photo1->setDirection('left');
		$photo1->setProfile(0);
		$this->em->persist($photo1);
		$this->em->flush();
		
		$photo1 = new models\Photo;
		$photo1->setUser($user1);
		$photo1->setUrl('http://something2.jpg');
		$photo1->setDirection('right');
		$photo1->setProfile(1);
		$this->em->persist($photo1);
		$this->em->flush();
		
		$contacts = $user1->getPhotos();
		$message = 'Photos are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getUrl()."</br>";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function getPhotos() {
		$user1 = $this->em->find('models\User','1');
		$contacts = $user1->getPhotos();
		$message = 'Photos are '.$contacts->count().' ';
		foreach ($contacts as $member) {
			$message = $message.$member->getUrl()."</br>";
		}
		
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function addPosts() {
		$user1 = $this->em->find('models\User','1');
		
		$post = new models\Post;
		$post->setUser($user1);
		$post->setTitle("First Post");
		$post->setContent("Lorem ipsum first post bla bla bla");
		
		$tag1 = new models\Tag;
		$tag1->setName('iseng');
		$tag2 = new models\Tag;
		$tag2->setName('first');
		$tag3 = new models\Tag;
		$tag3->setName('ppion');
		$this->em->persist($tag1);
		$this->em->persist($tag2);
		$this->em->persist($tag3);
		
		$post->setTags(array($tag1, $tag2, $tag3));
		
		$this->em->persist($post);
		$this->em->flush();
		
		$data['message'] = 'done';
		$this->load->view('home', $data);
	}
	
	public function getPosts(){
		$post = $this->em->find('models\Post','1');
		$message = 'Post title: '.$post->getTitle().'</br>';
		$message = $message.'Post Author: '.$post->getUser()->getName().'</br>';
		$message = $message.'Post Content: '.$post->getContent().'</br>';
		$message = $message.'Created at: '.$post->getCreatedAt()->format('Y/m/d H:i:s').'</br>';
		$message = $message.'Tags: ';
		$tags = $post->getTags();
		foreach ($tags as $tag) {
			$message = $message.$tag->getName().' ';
		}
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
	
	public function addComments() {
		$post = $this->em->find('models\Post','1');
		$user = $this->em->find('models\User','2');
		$user2 = $this->em->find('models\User','3');
		
		$comment = new models\Comment;
		$comment->setPost($post);
		$comment->setUser($user);
		$comment->setContent("Ugly article ....");
		$this->em->persist($comment);
		
		$comment = new models\Comment;
		$comment->setPost($post);
		$comment->setUser($user2);
		$comment->setContent("I agree ....");
		$this->em->persist($comment);
		
		$this->em->flush();
		
		$data['message'] = 'done';
		$this->load->view('home', $data);
	}
	
	public function getComments(){
		$post = $this->em->find('models\Post','1');
		$message = 'Post title: '.$post->getTitle().'</br>';
		$message = $message.'Post Author: '.$post->getUser()->getName().'</br>';
		$message = $message.'Post Content: '.$post->getContent().'</br>';
		$message = $message.'Created at: '.$post->getCreatedAt()->format('Y/m/d H:i:s').'</br>';
		$message = $message.'Tags: ';
		$tags = $post->getTags();
		foreach ($tags as $tag) {
			$message = $message.$tag->getName().' ';
		}
		$message = $message.'</br>Comments: </br>';
		$comments = $post->getComments();
		foreach ($comments as $comment) {
			$message = $message.'  '.'By: '.$comment->getUser()->getName().'</br>';
			$message = $message.'  '.'On: '.$comment->getCreatedAt()->format('Y/m/d H:i:s').'</br>';
			$message = $message.'  '.'Says: '.$comment->getContent().'</br></br>';
		}
		$data['message'] = $message;
		$this->load->view('home', $data);
	}
}