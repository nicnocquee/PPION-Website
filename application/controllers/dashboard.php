<?php

use Doctrine\ORM\Query;

class Dashboard extends MY_Controller {
	function  __construct()  {
		/* Inherit the CI_Controller construct because we're using a 
		   custom controller with $this->em for Doctrine already set */
		parent::__construct();
	}
            
    function index() {
    	$data['activities'] = $this->_fetchActivities();
		$this->template->build('dashboard', $data);
	}
	
	function activities() {
		$data['activities'] = $this->_fetchActivities();
		$this->load->view('activities', $data);
	}
	
	function mypostsbody($start=0) {
		$data['posts'] = $this->_fetchMyArticles($start);
		$this->load->helper('date');
		$this->load->view('my_posts_body', $data);
	}
	
	function myposts() {
		$this->load->view('my_posts');
	}
	
	function myevents() {
		$this->load->view('my_events');
	}
	
	function myfavoriteposts() {
		$data['favorites'] = $this->_fetchMyFavorites();
		$this->load->view('my_favorite_posts', $data);
	}
	
	private function _fetchActivities() {
		$this->load->helper('date');
		$q = $this->em->createQuery('select p.id as post_id, p.title, u.id as user_id, u.name as user_name, p.created_at from models\Post p LEFT JOIN p.user u WHERE p.flag IS NULL ORDER BY p.created_at DESC');
		$q->setMaxResults(20);
		$posts = $q->getResult(Query::HYDRATE_ARRAY);
		foreach ($posts as $key => $value) {
			$posts[$key]['type'] = 'post';
			$posts[$key]['action'] = 'posted';
			$posts[$key]['_created_at'] = time_diff(now() - strtotime($value['created_at']));
		}
		
		$q = $this->em->createQuery('select p.id as post_id, p.title, c.created_at, u.id as user_id, u.name as user_name from models\Comment c LEFT JOIN c.post p LEFT JOIN c.user u ORDER BY c.created_at DESC');
		$q->setMaxResults(20);
		$comments = $q->getResult(Query::HYDRATE_ARRAY);
		foreach ($comments as $key => $value) {
			$comments[$key]['type'] = 'comment';
			$comments[$key]['action'] = 'commented on';
			$comments[$key]['_created_at'] = time_diff(now() - strtotime($value['created_at']));
		}
		
		$q = $this->em->createQuery('select f.created_at, p.id as post_id, p.title, u.id as user_id, u.name as user_name from models\Favorite f LEFT JOIN f.post p LEFT JOIN f.user u ORDER BY f.created_at DESC');
		$q->setMaxResults(20);
		$favorites = $q->getResult(Query::HYDRATE_ARRAY);
		foreach ($favorites as $key => $value) {
			$favorites[$key]['type'] = 'favorite';
			$favorites[$key]['action'] = 'liked';
			$favorites[$key]['_created_at'] = time_diff(now() - strtotime($value['created_at']));
		}
		//die(print_r($favorites));
		$activities = array_merge($posts, $comments, $favorites);
		foreach ($activities as $key => $value) {
			$activity[$key] = $value['created_at'];	
		}
		array_multisort($activity, SORT_DESC, $activities);
		//die(print_r(json_encode($activities)));
		return $activities;
	}
	
	private function _fetchMyArticles($startPage) {
		$user = models\Current_User::user();
		$posts = array();
		if ($user) {
			$query = $this->em->createQuery('SELECT p FROM models\Post p WHERE p.user = ?1 AND p.flag IS NULL ORDER BY p.created_at DESC');
			$query->setParameter(1, $user->getId());
			$query->setFirstResult($startPage);
			$query->setMaxResults(10);
			
			$posts = $query->getResult();
		}
		
		return $posts;
	}
	
	private function _fetchMyFavorites() {
		$this->load->helper('date');
		$user = models\Current_User::user();
		if ($user) {
			$q = $this->em->createQuery('select f.created_at, p.id as post_id, p.title from models\Favorite f LEFT JOIN f.post p WHERE f.user = ?1 ORDER BY f.created_at DESC');
			$q->setParameter(1, $user->getId());
			$favorites = $q->getResult(Query::HYDRATE_ARRAY);
			foreach ($favorites as $key => $value) {
				$favorites[$key]['_created_at'] = time_diff(now() - strtotime($value['created_at']));
			}
		}
		return $favorites;
	}
}