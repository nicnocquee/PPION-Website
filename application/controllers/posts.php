<?php

class Posts extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		
		$this->load->helper(array('form','url'));
        $this->load->library('form_validation');
	}
            
    function index() {
    	$query = $this->em->createQuery('SELECT p, t FROM models\Post p LEFT JOIN p.tags t ORDER BY p.created_at DESC');
		//$query->setMaxResults(5);
		$posts = $query->getResult();
    	$data['posts'] = $posts;
		$this->load->view('posts', $data);
		
	}
	
	public function submit() {
		/*$this->load->library('unit_test');
		echo $this->unit->run($this->input->post('number_of_contacts'), 4);
		return;*/
		
		if ($this->_submit_validate() === FALSE) {
			$this->new();
			return;
		}
		
		$tags = explode(',', $this->input->post('tags'));
		$tagsArray = array();
		foreach ($tags as $tag) {
			$tag1 = $this->em->getRepository('models\\Tag')->findOneBy(array('name' => trim($tag)));
			if (!($tag1)){
				$tag1 = new models\Tag;
				$tag1->setName(trim($tag));
				$this->em->persist($tag1);
				$this->em->flush();
			}
			$tagsArray[] = $tag1;
		}
		
		// dummy!! should get the currently logged in user
		$user1 = $this->em->find('models\User','1');
		
		$post = new models\Post;
		$post->setUser($user1);
		$post->setTitle($this->input->post('title'));
		$post->setContent($this->input->post('content'));
		$post->setTags($tagsArray);
		$this->em->persist($post);
		$this->em->flush();

		$this->index();

	}
	
	private function _submit_validate() {

		// validation rules
		$this->form_validation->set_rules('title', 'Judul',
			'trim|required');

		$this->form_validation->set_rules('content', 'Isi',
			'trim|required');

		$this->form_validation->set_rules('tags', 'Tags',
			'');

		return $this->form_validation->run();

	}
	
	public function add() {
		$this->load->view('new_post_form');
	}
}