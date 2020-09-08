<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Addasetkeluar extends CI_Controller
{

    

    public function __construct()
    {
        parent::__construct();
        //$this->permission->is_logged_in();
        //load model
        $this->load->helper('url');
        $this->load->helper('form');
      
        $this->load->model('Aset_model', 'asetm');
        $this->load->library('form_validation');
        //$this->load->model('leave_model');
    }




   private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'tanggal_keluar', 'required|trim');
        $this->form_validation->set_rules('aset_id', 'aset_id', 'required');

        $input = $this->input->post('aset_id', true);
        $stok = $this->asetm->get('tbl_brg', ['kode_brg' => $input])['stok']; 
        $stok_valid = $stok + 1;

         $this->form_validation->set_rules('jumlah_keluar', 'jumlah_keluar', 'required|trim|numeric|greater_than[0]');
    }


    public function index()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Input Aset Keluar";
            $data['aset'] = $this->asetm->get('tbl_brg', null);
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')]) -> row_array();

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-AK-' . date('ymd');
            $kode_terakhir = $this->asetm->getMax('aset_keluar', 'id_aset_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -4, 4);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT);
            $data['id_aset_keluar'] = $kode . $number;

            
            $this->load->view('user/add_ak', $data);
            
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->asetm->insert('aset_keluar', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan.');
                redirect('asetkeluar');
            } else {
                set_pesan('Opps ada kesalahan!');
                redirect('user/add_ak');
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