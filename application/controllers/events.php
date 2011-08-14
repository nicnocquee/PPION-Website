<?php

class Events extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		
		$this->load->helper(array('form','url'));
        $this->load->library('form_validation');
	}
            
    function index() {
    	$query = $this->em->createQuery('SELECT p, t, u FROM models\Event p LEFT JOIN p.tags t LEFT JOIN p.members u ORDER BY p.created_at DESC');
		//$query->setMaxResults(5);
		$posts = $query->getResult();
    	$data['events'] = $posts;
		$this->load->view('events', $data);	
	}
	
	function show($id) {
		$event = $this->em->find('models\Event', $id);
		if ($event) {
			$data['event'] = $event;
			$this->load->view('show_event', $data);
		} else {
			$data['message'] = 'Invalid event id.';
			$this->load->view('error', $data);
		}
	}
	
	public function submit() {
		/*$this->load->library('unit_test');
		echo $this->unit->run($this->input->post('number_of_contacts'), 4);
		return;*/
		
		if ($this->_submit_validate() === FALSE) {
			$this->add();
			return;
		}
		
		$tags = explode(',', $this->input->post('tags'));
		$tagsArray = array();
		foreach ($tags as $tag) {
			$tag1 = $this->em->getRepository('models\\EventTag')->findOneBy(array('name' => trim($tag)));
			if (!($tag1)){
				$tag1 = new models\EventTag;
				$tag1->setName(trim($tag));
				$this->em->persist($tag1);
				$this->em->flush();
			}
			$tagsArray[] = $tag1;
		}
		
		// dummy!! should get the currently logged in user
		$user1 = $this->em->find('models\User','1');
		
		$event= new models\Event;
		$event->setUser($user1);
		$event->setName($this->input->post('name'));
		$event->setDescription($this->input->post('description'));
		$event->setPlace($this->input->post('place'));
		$event->setDeadline(new DateTime(str_replace('/', '-', $this->input->post('deadline'))));
		$event->setTimestart($this->processDateTimeInput($this->input->post('time-start')));
		$event->setTimeend($this->processDateTimeInput($this->input->post('time-end')));
		$event->setCost($this->input->post('cost'));
		$event->setLimitation($this->input->post('limitation'));
		$event->setTags($tagsArray);
		$this->em->persist($event);
		$this->em->flush();

		$this->index();

	}
	
	private function _submit_validate() {

		// validation rules
		$this->form_validation->set_rules('name', 'Nama',
			'trim|required');

		$this->form_validation->set_rules('description', 'Deskripsi',
			'trim|required');
			
		$this->form_validation->set_rules('place', 'Tempat',
			'trim|required');
		
		$this->form_validation->set_rules('deadline', 'Tenggat waktu',
			'trim|required|date');
		
		$this->form_validation->set_rules('time-start', 'Waktu mulai',
			'trim|required|datetime');
			
		$this->form_validation->set_rules('time-end', 'Waktu selesai',
			'trim|required|datetime');
		
		$this->form_validation->set_rules('cost', 'Biaya',
			'trim|numeric');
		
		$this->form_validation->set_rules('limitation', 'Batasan',
			'');
			
		$this->form_validation->set_rules('tags', 'Tags',
			'');

		return $this->form_validation->run();

	}
	
	public function add() {
		$this->load->view('new_event_form');
	}
	
	private function processDateTimeInput($datetime) {
		$date = str_replace("/", "-", $datetime);
		return DateTime::createFromFormat('Y-m-d H:i', $date);
	}
}