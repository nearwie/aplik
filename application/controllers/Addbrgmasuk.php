<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Addbrgmasuk extends CI_Controller
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
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal_masuk', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'barang_id', 'required');

        $input = $this->input->post('barang_id', true);
        $stok = $this->barangm->get('barang', ['kode_brg' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_masuk', 'jumlah_masuk', 'required|trim|numeric|greater_than[0]');
    }


    public function index()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Barang Masuk";
            $data['barang'] = $this->barangm->get('barang', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->barangm->getMax('barang_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            
            $this->load->view('user/add_bm', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->barangm->insert('barang_masuk', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('barangmasuk');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('user/add_bm');
            }
        }
    }


     public function deletes($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->barangm->delete('barang_masuk', 'id_barang_masuk', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barangmasuk');
    }


    public function delete()
    {   $this->load->model('Barang_model');
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            $this->session->set_flashdata('message',  '<div class="alert alert-danger" role="alert">Gagal hapus data barang masuk</div>');
        redirect( base_url() . 'barangmasuk'); 
        }
                
        $a = $this->barang_model->get_brgmsk_by_id($id);
        
        $this->barang_model->delete_brgmsk($id);   
             $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert">Berhasil hapus data barang masuk</div>');
        redirect( base_url() . 'barangmasuk');        
    }


    



    

}