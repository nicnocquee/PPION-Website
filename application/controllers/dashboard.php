<?php

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
		$this->load->view('my_favorite_posts');
	}
	
	private function _fetchActivities() {
		$q = $this->em->createQuery("select a, u from models\Activity a LEFT JOIN a.user u ORDER BY a.created_at DESC");
		$q->setMaxResults(20);
		$recentActivities = $q->getResult();
		$return = array();
		foreach ($recentActivities as $activity) { 
			$user_name = $activity->getUser()->getName();
			$user_link = base_url().'members/'.$activity->getUser()->getId();
			$activity_name = $activity->getName();
			$target_type = $activity->getTargetType();
			
			$target_title = '';
			$target_link = '';
			
			if ($activity->getType() == 1) {
				$post = $this->em->find('models\Post', $activity->getTargetId());
				if ($post) {
					$target_title = $post->getTitle();
					$target_link = base_url().'posts/'.$post->getId();
					$target_type = 'artikel';	
				}
			} else if ($activity->getType() == 2) {
				$post = $this->em->find('models\Post', $activity->getTargetId());
				$target_title = $post->getTitle();
				$target_link = base_url().'posts/'.$post->getId();
				$target_type = 'artikel';
			}
			
			$thisActivity['user_name'] = $user_name;
			$thisActivity['user_link'] = $user_link;
			$thisActivity['activity_name'] = $activity_name;
			$thisActivity['target_type'] = $target_type;
			$thisActivity['target_title'] = $target_title;
			$thisActivity['target_link'] = $target_link;
			$this->load->helper('date');
			$thisActivity['activity_date'] = time_diff(now()-$activity->getCreatedAt()->getTimeStamp())." ago";
			
			$return[] = $thisActivity;
		}
		return $return;
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
}