
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GlobalModel extends CI_Model{


   public function get_data($table, $where=false){
      $this->db->select('*');
      $this->db->from($table);
      if($where){
      $this->db->where($where);
      }
      $data = $this->db->get();
      return $data;
   }


   public function get_karyawan($id_karyawan=false){
      $this->db->select('*');
      $this->db->from('tbl_karyawan');
      $this->db->join('tbl_golongan', 'tbl_golongan.id_golongan=tbl_karyawan.id_golongan');
      $this->db->join('tbl_group_karyawan', 'tbl_group_karyawan.id_group_karyawan=tbl_karyawan.id_group_karyawan');
      $this->db->join('tbl_group', 'tbl_group.id_group=tbl_group_karyawan.id_group');
      if($id_karyawan){
      $this->db->where('tbl_karyawan.id_karyawan', $id_karyawan);
      }
      $this->db->order_by('id_karyawan','desc');
      $data = $this->db->get();
      return $data;
   }

   public function get_group_karyawan($id_group_karyawan=false){
      $this->db->select('*');
      $this->db->from('tbl_group_karyawan');
      $this->db->join('tbl_group', 'tbl_group.id_group=tbl_group_karyawan.id_group');
      if($id_group_karyawan){
      $this->db->where('tbl_group_karyawan.id_group_karyawan', $id_group_karyawan);
      }
      $data = $this->db->get();
      return $data;
   }
   public function get_sub_kriteria($id_sub_kriteria=false){
      $this->db->select('*, tbl_kriteria.prioritas as prioritas_kriteria, tbl_sub_kriteria.prioritas as prioritas');
      $this->db->from('tbl_sub_kriteria');
      $this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria');
      if($id_sub_kriteria){
      $this->db->where('tbl_sub_kriteria.id_sub_kriteria', $id_sub_kriteria);
      }
      $this->db->order_by('id_sub_kriteria','desc');
      $data = $this->db->get();
      return $data;
   }

}
?>