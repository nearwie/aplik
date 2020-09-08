<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller
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
		$data['title'] = 'Data Satuan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Barang_model');
        
        
        $data['satuans'] =  $this->barangm->get('satuan');
		
		
		
		$this->load->view('user/dtsatuan', $data);
		
		
	}



	public function add_satuan()
    {
       
       
        
		
		$this->form_validation->set_rules('nama_satuan', 'nama_satuan', 'required|trim', [
			'required' => 'Kolom Satuan wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Satuan';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        	

            
			$this->load->view('user/add_satuanbrg', $data);
			
 
        }
        else
        {

        	$input = $this->input->post(null, true);
            $insert = $this->barangm->insert('satuan', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('satuan');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('satuan/add_satuanbrg');
            }
        }
    }
        

    public function edit_satuan()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            redirect('satuan');
        }
        
        $this->load->helper('url');
      
        
        $data['title'] = 'Edit satuan';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
		$data['satuans'] = $this->db->get('satuan')->result_array();
		$this->load->model('Barang_model');
        
        $data['a'] = $this->Barang_model->get_satuan_by_id($id);

  
		$this->form_validation->set_rules('nama_satuan', 'nama_satuan', 'required|trim', [
			'required' => 'Kolom satuan wajib diisi'
		]);
 
        if ($this->form_validation->run() === FALSE)
        {
           
			$this->load->view('user/edit_satuan', $data);
			
 
        }
        else
        {
            $this->barangm->set_satuan($id);
            $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil edit data satuan</div>');
            //$this->load->view('news/success');
            redirect( base_url() . 'satuan');
        }
    }




    public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus satuan </div>');
        redirect( base_url() . 'satuan'); 
        }
                
        $a = $this->barangm->get_satuan_by_id($id);
        
        $this->barangm->delete_satuan($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus satuan </div>');
        redirect( base_url() . 'satuan');        
    }


 
}