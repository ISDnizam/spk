
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


   public function get_karyawan($id_user=false){
      $this->db->select('*');
      $this->db->from('tbl_karyawan');
      $this->db->join('tbl_golongan', 'tbl_golongan.id_golongan=tbl_karyawan.id_golongan');
      $this->db->join('tbl_group_karyawan', 'tbl_group_karyawan.id_group_karyawan=tbl_karyawan.id_group_karyawan');
      $this->db->join('tbl_group', 'tbl_group.id_group=tbl_group_karyawan.id_group');
      $this->db->join('tbl_users', 'tbl_users.id_user=tbl_karyawan.id_user');
      if($id_user){
      $this->db->where('tbl_users.id_user', $id_user);
      }
      $this->db->order_by('tbl_users.id_user','desc');
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
   public function get_kriteria($level=false){
      $this->db->select('*');
      $this->db->from('tbl_kriteria');
      if($level=='pdm'){
      $this->db->where('tbl_kriteria.id_kriteria', 1);
      }elseif($level=='direksi'){
      $this->db->where('tbl_kriteria.id_kriteria !=', 1);
      }
      $data = $this->db->get();
      return $data;
   }
   public function get_sub_kriteria($id_sub_kriteria=false, $id_kriteria=false){
      $this->db->select('*, tbl_kriteria.prioritas as prioritas_kriteria, tbl_sub_kriteria.prioritas as prioritas');
      $this->db->from('tbl_sub_kriteria');
      $this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria');
      if($id_sub_kriteria){
      $this->db->where('tbl_sub_kriteria.id_sub_kriteria', $id_sub_kriteria);
      }
      if($id_kriteria){
      $this->db->where('tbl_sub_kriteria.id_kriteria', $id_kriteria);
      }
      $this->db->order_by('id_sub_kriteria','desc');
      $data = $this->db->get();
      return $data;
   }
   public function get_penilaian($id_penilaian=false, $level=false, $id_karyawan=false, $id_sub_kriteria=false){
      $this->db->select('*');
      $this->db->from('tbl_penilaian');
      $this->db->join('tbl_karyawan', 'tbl_karyawan.id_karyawan=tbl_penilaian.id_karyawan');
      $this->db->join('tbl_sub_kriteria', 'tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria');
      $this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria');
      $this->db->join('tbl_users', 'tbl_users.id_user=tbl_penilaian.id_user');
      if($id_penilaian){
      $this->db->where('tbl_penilaian.id_penilaian', $id_penilaian);
      }
      if($id_karyawan){
      $this->db->where('tbl_penilaian.id_karyawan', $id_karyawan);
      }
      if($id_sub_kriteria){
      $this->db->where('tbl_penilaian.id_sub_kriteria', $id_sub_kriteria);
      }
      if($level=='pdm'){
      $this->db->where('tbl_kriteria.id_kriteria', 1);
      }elseif($level=='direksi'){
      $this->db->where('tbl_kriteria.id_kriteria !=', 1);
      }
      $this->db->order_by('tbl_penilaian.id_penilaian','desc');
      $data = $this->db->get();
      return $data;
   }
}
?>