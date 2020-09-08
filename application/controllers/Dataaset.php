<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataaset extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Aset_model', 'asetm');
		$this->load->model('Databrg_model', 'databrgm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'Detail Aset';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
		$this->load->library('session');
	
		$this->load->library('form_validation');
		 $this->load->database();

		 
		 $this->load->model('Databrg_model');
        
        
        $data['databrgs'] =  $this->databrgm->getBarang();
		
	
		$this->load->view('user/data_barang', $data);
		
		
	}


	public function tambah()
    {
       
       
        
	
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
		$this->form_validation->set_rules('type_id', 'type', 'required', [
			'required' => 'Kolom Type Barang wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('no_seri', 'no_seri', 'required', [
			'required' => 'Kolom Serial Number  wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Aset';        
       		 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

        	$data['type'] = $this->databrgm->get('tbl_type', null);
        
           

            $kode_terakhir = $this->databrgm->getMax('tbl_brg', 'kode_brg');
            $kode_tambah = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['kode_brg'] = 'BA' . $number;

          
			$this->load->view('user/add_listbrg', $data);
			
        }
        else
        {	$kode_brg	 = $this->input->post('kode_brg');
			$nama_brg	 = $this->input->post('nama_brg');
			$type_id	 = $this->input->post('type_id');
			$merk 		= $this->input->post('merk');
			$no_seri 	= $this->input->post('no_seri');
			$stok 	= $this->input->post('stok');
			$gambar 	= $_FILES['gambar']['name'];

			if($gambar=''){}else{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|tiff';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/upload/';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar')){
					echo "Gambar Gagal Diupload!";
				} else{
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = [
				'kode_brg' => $kode_brg,
				'nama_brg' => $nama_brg,
				'type_id' => $type_id,
				'merk' => $merk,
				'no_seri' => $no_seri,
				'stok' => $stok,
				'gambar' => $gambar,

			];
			

		


            $insert = $this->databrgm->insert('tbl_brg', $data);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('dataaset');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dataaset/tambah');
            }
        }
    }



    public function edit($getId)
    {
        $id = encode_php_tags($getId);
      
        
        $data['title'] = 'Edit Barang';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();
        
        
		$this->form_validation->set_rules('nama_brg', 'nama_brg', 'required', [
			'required' => 'Kolom Nama Barang wajib diisi' 
		]);
		$this->form_validation->set_rules('type_id', 'type', 'required', [
			'required' => 'Kolom Type Barang wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('no_seri', 'no_seri', 'required', [
			'required' => 'Kolom Serial Number  wajib diisi'
		]);
		$data['type'] = $this->databrgm->get('tbl_type', null);
		
 
        if ($this->form_validation->run() === FALSE)
        {

           
            $data['barang'] = $this->databrgm->get('tbl_brg', ['kode_brg' => $id]);
           
			$this->load->view('User/edit_brgaset', $data);
		
 
        }
        else
        {

            $input = $this->input->post(null, true);
            $update = $this->databrgm->update('tbl_brg', 'kode_brg', $id, $input);
            
           if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('dataaset');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('dataaset/edit/' . $id);
            }
        }
    }



    public function delete()
    {   $this->load->model('Databrg_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang </div>');
        redirect( base_url() . 'databarang'); 
        }
                
        $a = $this->databrgm->get_brg_by_id($id);
        
        $this->databrgm->delete_brg($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang </div>');
        redirect( base_url() . 'databarang');        
    }


	public function getstok($getId)
	    {
	        $id = encode_php_tags($getId);
	        $query = $this->asetm->cekStok($id);
	        output_json($query);
	    }



	public function get_barang(){
	        $kode=$this->input->post('kode');
	        $data=$this->m_pos->get_data_barang_bykode($kode);
	        echo json_encode($data);
	    }




    


}
