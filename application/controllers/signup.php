<?php

class Signup extends MY_Controller {
	function  __construct()  {
		parent::__construct();
		
		$this->load->helper(array('form','url'));
        $this->load->library('form_validation');
	}
            
    function index() {
		$this->load->view('signup_form');
		
	}
	
	public function submit() {

		if ($this->_submit_validate() === FALSE) {
			$this->index();
			return;
		}

		$this->load->view('submit_success');

	}
	
	private function _submit_validate() {

		// validation rules
		$this->form_validation->set_rules('name', 'Nama',
			'trim|required|alpha_numeric');

		$this->form_validation->set_rules('password', 'Password',
			'required|min_length[6]|max_length[12]');

		$this->form_validation->set_rules('passconf', 'Confirm Password',
			'required|matches[password]');

		$this->form_validation->set_rules('email', 'E-mail',
			'required|valid_email|unique[User.email]');
			
		$this->form_validation->set_rules('hometown', 'Asal',
			'trim|required|alpha_numeric');
		
		$this->form_validation->set_rules('affiliation', 'Afiliasi',
			'');
		
		$this->form_validation->set_rules('arrival_date', 'Tahun tiba di Jepang',
			'trim|required|numeric|exact_length[4]');
		$this->form_validation->set_rules('birthday', 'Tanggal lahir',
			'trim|date');
		$this->form_validation->set_rules('marriage_status', 'Status',
			'');
		$this->form_validation->set_rules('gender', 'Jenis kelamin',
			'required');
		$this->form_validation->set_rules('religion', 'Agama',
			'');
		$this->form_validation->set_rules('introduction', 'Bio',
			'trim|required|max_length[140]|xss_clean|encode_php_tags');
		$this->form_validation->set_rules('undergrad_university', 'Universitas S1',
			'');
		$this->form_validation->set_rules('undergrad_department', 'Jurusan S1',
			'');
		$this->form_validation->set_rules('undergrad_graduation_year', 'Tahun lulus S1',
			'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('master_university', 'Universitas S2',
			'');
		$this->form_validation->set_rules('master_department', 'Jurusan S2',
			'');
		$this->form_validation->set_rules('master_graduation_year', 'Tahun lulus S2',
			'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('phd_university', 'Universitas S3',
			'');
		$this->form_validation->set_rules('phd_department', 'Jurusan S3',
			'');
		$this->form_validation->set_rules('phd_graduation_year', 'Tahun lulus S3',
			'trim|numeric|exact_length[4]');
		
		$this->form_validation->set_rules('informal_skill', 'Keahlian informal',
			'');
		$this->form_validation->set_rules('left_the_country', 'Masih berada di Jepang',
			'');
		$this->form_validation->set_rules('position', 'Posisi',
			'');

		return $this->form_validation->run();

	}
}