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
		/*$this->load->library('unit_test');
		echo $this->unit->run($this->input->post('number_of_contacts'), 4);
		return;*/
		/*for ($i=0; $i<$this->input->post('number_of_contacts'); $i++) {
			$address = $this->input->post('address'.($i+1));
			echo $address;
			if(!(is_null($address)) && $address!='') {
				echo 'not null';
			}
		}
		return;*/
		
		if ($this->_submit_validate() === FALSE) {
			$this->index();
			return;
		}
		
		$user = new models\User;
		$user->setEmail($this->input->post('email'));
		$user->setName($this->input->post('name'));
		$user->setPassword(md5($this->input->post('password')));
		$user->setHometown($this->input->post('hometown'));
		$user->setAffiliation($this->input->post('affiliation'));
		$user->setArrivalDate(new DateTime(str_replace('/', '-', $this->input->post('arrival_date'))));
		$user->setBirthday(new DateTime(str_replace('/', '-', $this->input->post('birthday'))));
		$user->setMarriageStatus($this->input->post('status'));
		$user->setGender($this->input->post('gender'));
		$user->setReligion($this->input->post('religion'));
		$user->setIntroduction($this->input->post('introduction'));
		$user->setUndergradUniversity($this->input->post('undergrad_university'));
		$user->setUndergradDepartment($this->input->post('undergrad_department'));
		$user->setUndergradGraduationYear($this->input->post('undergrad_graduation_year'));
		$user->setMasterUniversity($this->input->post('master_university'));
		$user->setMasterDepartment($this->input->post('master_department'));
		$user->setMasterGraduationYear($this->input->post('master_graduation_year'));
		$user->setPhdUniversity($this->input->post('phd_university'));
		$user->setPhdDepartment($this->input->post('phd_department'));
		$user->setPhdGraduationYear($this->input->post('phd_graduation_year'));
		$user->setInformalSkill($this->input->post('informal_skill'));
		$user->setLeftTheCountry($this->input->post('left_the_country'));
		$user->setPosition($this->input->post('position'));
		$this->em->persist($user);
		$this->em->flush();
		
		for ($i=0; $i<$this->input->post('number_of_contacts'); $i++) {
			$address = $this->input->post('address'.($i+1));
			if(!(is_null($address)) && $address!='') {
				$contact1 = new models\Contact;
				$contact1->setUser($user);
				$contact1->setAddress($address);
				$contact1->setType($this->input->post('addresstype'.($i+1)));
				$contact1->setVisibility(0);
				$this->em->persist($contact1);
				$this->em->flush();
			}
		}

		$this->load->view('submit_success');

	}
	
	private function _submit_validate() {

		// validation rules
		$this->form_validation->set_rules('name', 'Nama',
			'trim|required');

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
			'trim|required|date');
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