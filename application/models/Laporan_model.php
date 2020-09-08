<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }


public function getBarangMasuk($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bm.user_id = u.id');
      
        $this->db->join('barang b', 'bm.barang_id = b.kode_brg');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        if ($limit != null) {
            $this->db->limit($limit);
        }

        if ($kode_brg != null) {
            $this->db->where('kode_brg', $kode_brg);
        }

        if ($range != null) {
            $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
            $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
        }

        $this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get('barang_masuk bm')->result_array();
    }

public function getBarangKeluar($limit = null, $kode_brg = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('user u', 'bk.user_id = u.id');
        $this->db->join('barang b', 'bk.barang_id = b.kode_brg');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($kode_brg != null) {
            $this->db->where('kode_brg', $kode_brg);
        }
        if ($range != null) {
            $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get('barang_keluar bk')->result_array();
    }



    public function getBarang()
    {
        $this->db->join('jenis j', 'b.jenis_id = j.id_jenis');
        $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
        $this->db->order_by('kode_brg');
        return $this->db->get('barang b')->result_array();
    }

    



}

