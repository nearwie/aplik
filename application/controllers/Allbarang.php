<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allbarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Allbarang_model', 'abarangm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Daftar Barang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

	
        
        $data['barangtkns'] =  $this->abarangm->get_data('tbl_brg')->result();
		
	
		$this->load->view('user/data_barang', $data);
	}
}
