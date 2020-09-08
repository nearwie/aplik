<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library(array('form_validation', 'session','email'));
	}

	
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}


		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');



		if ($this->form_validation->run ()== false) {
			$data['title'] = 'Login Menu';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi success
			$this->_login ();
		}
	}


	private function _login()
 	{
 		$email = $this->input->post('email');
	 	$password = $this->input->post('password');

	 	$user = $this->db->get_where('user', ['email' => $email]) -> row_array ();

	 	// jk user ada
	 	if ($user) {
	 		// user aktf
	 		if ($user['is_active'] == 1) {
	 			// cek password
	 			if (password_verify($password, $user['password'])) {
	 				$data = [
	 					'email' => $user['email'],
	 					'id' => $user['id'],
	 					'name' => $user['name'],
	 					'role_id' => $user['role_id'],
	 					
	 				];

	 				$this->session->set_userdata($data);
	 				if ($user['role_id'] == 1) {
	 					$this->db->where('email', $user['email'])->update('user',['last_login' => date('Y-m-d H:i:s')]);
	 					redirect('admin');
	 				} else {
	 					$this->db->where('email', $user['email'])->update('user',['last_login' => date('Y-m-d H:i:s')]);
	 					redirect('user');
	 				}
	 				

	 			} else {
	 				$this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Password salah.</div>');
	 				redirect('auth');
	 			}
	 		} else {
	 			$this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Email anda belum teraktivasi. Silahkan aktivasi terlebih dahulu.</div>');
	 			redirect('auth');
	 		}

	 	} else {
	 		$this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Email belum terdaftar. Silahkan registrasi terlebih dahulu.</div>');
	 		redirect('auth');
	 	}
 	}


	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}



		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run ()== false) {
		
		$data['title'] = 'Registrasi';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()

			];

			
			$this->db->insert('user', $data);
			


			$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Selamat! akun anda berhasil dibuat. Silahkan aktivasi akun.</div>');
			redirect('auth');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('role_id');
		

		$this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Anda telah logout.</div>');
			redirect('auth');

	}



}

