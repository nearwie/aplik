<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Barangkeluar extends CI_Controller
{

	

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		
        $this->load->model('Barang_model', 'barangm');
        $this->load->library('form_validation');
		//$this->load->model('leave_model');
	}



	public function index ()
	{	
		$data['title'] = 'Daftar Barang Keluar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
         $data['barangkeluar'] = $this->barangm->getBarangKeluar();
		 
        
      
		$this->load->view('user/barangkeluar', $data);
	

	}



  

     public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang keluar</div>');
        redirect( base_url() . 'barangkeluar'); 
        }
                
        $a = $this->barangm->get_brgklr_by_id($id);
        
        $this->barangm->delete_brgklr($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang keluar</div>');
        redirect( base_url() . 'barangkeluar');        
    }


  



	

}