<?php

use DoctrineExtensions\Paginate\Paginate;

class Favorites extends MY_Controller {
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
	}
            
    function index() {
		$user = models\\Current_User::user();
		if ($user) {
			$query = $this->em->createQuery('SELECT f FROM models\Favorite f WHERE f.user = ?1 ORDER BY f.created_at DESC');
			$query->setParameter(1, $user->getId());
			$count = Paginate::getTotalQueryResults($query);
			$per_page = 5;
			$this->load->library('pagination', array('total' => $count, 'base_url' => 'favorites/index', 'per_page' => $per_page));
			
			$offset = $this->uri->segment(3);
			if (!$offset) $offset = 0;
			$paginateQuery = Paginate::getPaginateQuery($query, $offset, $per_page);
			$favorites = $paginateQuery->getResult();
			$data['favorites'] = $favorites;
			$data['pagination'] = $this->pagination->create_links();
			$this->template->title('Favorites');
			$this->template->build('favorites', $data);
		}
	}
	
	function add() {
		log_message('debug', 'add');
		if ($post_id = $this->input->post('post_id', TRUE)) {
			log_message('debug', 'add favorites');
			$user = models\\Current_User::user();
			if ($user) {
				$post = $this->em->find('models\Post', $post_id);
				log_message('debug', 'add favorites - we got the user');
				if ($post) {
					log_message('debug', 'add favorites - we got the post');
					$favorite = new models\Favorite;
					$favorite->setUser($user);
					$favorite->setPost($post);
					
					$this->em->persist($favorite);
					$this->em->flush();
					
					$result = array('result' => 1);
					echo json_encode($result);
					die();
				}
			}
		} else {
			echo 'no post';
		}
	}
}