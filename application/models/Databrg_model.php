<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databrg_model extends CI_Model
{
	

  public function __construct()
    {
        $this->load->database();
    }

    public function getBarang()
    {
        $this->db->join('tbl_type j', 'b.type_id = j.id_type');
       
        $this->db->order_by('kode_brg');
        return $this->db->get('tbl_brg b')->result_array();
    }

     public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

     public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    
     public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }
    
     public function update($table, $pk, $id, $data)
            {
                $this->db->where($pk, $id);
                return $this->db->update($table, $data);
            }

    public function update_data($table, $data, $where)
            {
               $this->db->update($table, $data, $where);
            }


    public function ambil_kode($id)
            {
              $hasil = $this->db->where('kode_brg, $id')->get('tbl_brg');
            }

public function get_brg_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('tbl_brg');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('tbl_brg', array('kode_brg' => $id));
        return $query->row_array();
    }


      public function delete_brg($id)
    {
        $this->db->where('kode_brg', $id);
        return $this->db->delete('tbl_brg');
    }





    

}