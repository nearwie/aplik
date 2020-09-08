<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Barang_model', 'barangm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Daftar jenis';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Barang_model');
        
        
        $data['jeniss'] =  $this->barangm->get('jenis');
		
		
		
		$this->load->view('user/dtjenis', $data);
		
		
	}



	public function add_jenis()
    {
       
       
        
		
		$this->form_validation->set_rules('nama_jenis', 'nama_jenis', 'required|trim', [
			'required' => 'Kolom jenis wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah jenis';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

			
			$this->load->view('user/add_jenisbrg', $data);
		
 
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->barangm->insert('jenis', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('jenis');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('jenis/add_jenisbrg');
            }
        }
    }
        

    public function edit_jenis()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('jenis');
        }
        
        $this->load->helper('url');
      
        
        $data['title'] = 'Edit jenis';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$data['jeniss'] = $this->db->get('jenis')->result_array();
		$this->load->model('Barang_model');
        
        $data['a'] = $this->barangm->get_jenis_by_id($id);

  
		$this->form_validation->set_rules('nama_jenis', 'nama_jenis', 'required|trim', [
			'required' => 'Kolom jenis wajib diisi'
		]);
 
        if ($this->form_validation->run() === FALSE)
        {
            
			$this->load->view('user/edit_jenis', $data);
			
 
        }
        else
        {
            $this->barangm->set_jenis($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit data jenis</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'jenis');
        }
    }




    public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus jenis </div>');
        redirect( base_url() . 'jenis'); 
        }
                
        $a = $this->barangm->get_jenis_by_id($id);
        
        $this->barangm->delete_jenis($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus jenis </div>');
        redirect( base_url() . 'jenis');        
    }


 
}