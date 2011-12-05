<?php

use DoctrineExtensions\Paginate\Paginate;

class Posts extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		
		$this->load->helper(array('form','url'));
        $this->load->library('form_validation');
         $this->form_validation->set_error_delimiters('', '');
	}
            
    function index() {   
    	$this->load->library('mymarkdown');
    	$query = $this->em->createQuery('SELECT p, t FROM models\Post p LEFT JOIN p.tags t ORDER BY p.created_at DESC');
		$count = Paginate::getTotalQueryResults($query);
		$per_page = 5;
		$this->load->library('pagination', array('total' => $count, 'base_url' => 'posts/index', 'per_page' => $per_page));
		
		$offset = $this->uri->segment(3);
		if (!$offset) $offset = 0;
		$paginateQuery = Paginate::getPaginateQuery($query, $offset, $per_page); // Step 2 and 3
		$posts = $paginateQuery->getResult();
    	$data['posts'] = $posts;
    	$data['pagination'] = $this->pagination->create_links();
		$this->template->title('Articles');
		$this->template->build('posts', $data);
	}
	
	function show ($id) {
		$this->load->library('mymarkdown');
		$post = $this->em->find('models\Post', $id);
		if ($post) {
			$data['post'] = $post;
			$comments = $post->getComments();
			if ($comments && count($comments)>0) $data['comments'] = $comments;
			$this->template->title($post->getTitle());
			$data['show_title'] = 0;
			
			$user = models\Current_User::user();
			$favorite = NULL;
			if ($user) {
				$favorite = $this->em->getRepository('models\\Favorite')->findOneBy(array('user' => $user->getId(), 'post' => $id));
			}
			
			if ($favorite) {
				$data['liked'] = 1;
			} else {
				$data['liked'] = 0;
			}
			$this->template->build('show_post', $data);
		} else {
			$data['message'] = 'Invalid post id.';
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
			$tag1 = $this->em->getRepository('models\\Tag')->findOneBy(array('name' => trim($tag)));
			if (!($tag1)){
				$tag1 = new models\Tag;
				$tag1->setName(trim($tag));
				$this->em->persist($tag1);
				$this->em->flush();
			}
			$tagsArray[] = $tag1;
		}
		
		$user = models\Current_User::user();
		$post = NULL;
		if ($this->input->post('edit') == 0) {
			$post = new models\Post;
		} else {
			$post = $this->em->find('models\Post', $this->input->post('post_id'));
		}
		
		$post->setUser($user);
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
		//$this->load->view('new_post_form');
		$this->template->title('Artikel Baru');
		$this->template->build('new_post_form', array('show_title' => 1));
	}
	
	public function edit($id) {
		$post = $this->em->find('models\Post', $id);
		if ($post) {
			$this->template->title('Editing '.$post->getTitle());
			$data['post'] = $post;
			$data['show_title'] = 1;
			$this->template->build('new_post_form', $data);
		}
	}
}