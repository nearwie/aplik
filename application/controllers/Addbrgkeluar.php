<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Addbrgkeluar  extends CI_Controller
{

	

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Transaksi_model');
        $this->load->model('Barang_model', 'barangm');
        $this->load->library('form_validation');
		//$this->load->model('leave_model');
	}





   private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'barang_id', 'required');

        $input = $this->input->post('barang_id', true);
        $stok = $this->barangm->get('barang', ['kode_brg' => $input])['stok'];
        $stok_valid = $stok + 1;

        $this->form_validation->set_rules(
            'jumlah_keluar',
            'Jumlah Keluar',
            "required|trim|numeric|greater_than[0]|less_than[{$stok_valid}]",
            [
                'less_than' => "Jumlah Keluar tidak boleh lebih dari {$stok}"
            ]
        );
    }


    public function index()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Barang Keluar";
            $data['barang'] = $this->barangm->get('barang', null, ['stok >' => 0]);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'T-BK-' . date('ymd');
            $kode_terakhir = $this->barangm->getMax('barang_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

           
            $this->load->view('user/add_bk', $data);
        
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->barangm->insert('barang_keluar', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('barangkeluar');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('addbrgkeluar');
            }
        }
    }


     public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang keluar</div>');
        redirect( base_url() . 'barangkeluar'); 
        }
                
        $a = $this->barang_model->get_brgklr_by_id($id);
        
        $this->barang_model->delete_brgklr($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang keluar</div>');
        redirect( base_url() . 'barangkeluar');        
    }


    
    



	

}