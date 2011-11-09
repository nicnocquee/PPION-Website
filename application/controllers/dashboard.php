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
				$target_title = $post->getTitle();
				$target_link = base_url().'posts/'.$post->getId();
				$target_type = 'artikel';
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
			$thisActivity['activity_date'] = $activity->getCreatedAt()->format('l F j, Y g:i a e');;
			
			$return[] = $thisActivity;
		}
		return $return;
	}
}