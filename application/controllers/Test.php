<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
	
		$this->load->model('Databrg_model', 'databrgm');
		//$this->load->model('leave_model');
	}



	public function index ()
	{
		$data['title'] = 'List Barang';
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
		$this->form_validation->set_rules('type', 'type', 'required', [
			'required' => 'Kolom Type Barang wajib diisi'
		]);
		$this->form_validation->set_rules('merk', 'merk', 'required', [
			'required' => 'Kolom Merk wajib diisi'
		]);
		$this->form_validation->set_rules('no_seri', 'no_seri', 'required', [
			'required' => 'Kolom Nomor Seri wajib diisi'
		]);
		
		
 
        if ($this->form_validation->run() === FALSE)
        {
        	 $data['title'] = 'Tambah Barang';        
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
			$id_type	 = $this->input->post('id_type');
			$merk 		= $this->input->post('merk');
			$no_seri 	= $this->input->post('no_seri');
			$status 	= $this->input->post('status');
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
				'id_type' => $id_type,
				'merk' => $merk,
				'no_seri' => $no_seri,
				'status' => $status,
				'gambar' => $gambar,

			];
			

		


            $insert = $this->databrgm->insert('tbl_brg', $data);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('databarang');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('databarang/tambah');
            }
        }
    }
}
