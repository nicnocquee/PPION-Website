<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {
	function __construct($params)  {
		parent::__construct();
		
		$config['base_url'] = base_url($params['base_url']);
		$config['total_rows'] = $params['total'];
		$config['per_page'] = $params['per_page'];
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';		
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';		
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$this->initialize($config);
	}
	
}

