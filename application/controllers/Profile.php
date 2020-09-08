<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		
	}



	public function index()
	{
		$data['title'] = 'My Profile';
		$this->load->library('form_validation');
		
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();


		
		$this->load->view('user/profile', $data);
	
		

		
	}

}