<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perhitungan extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
      if(empty($this->session->userdata('id_user'))){
        redirect('');
      }
   }

   function category($category){
      $data['title'] = "Perhitung ".$category;
      $user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      $data['list_nilai'] = $this->GlobalModel->get_data('tbl_penilaian')->result();
      $data['list_kriteria'] = $this->GlobalModel->get_data('tbl_kriteria')->result();
      $data['list_sub_kriteria'] = $this->GlobalModel->get_data('tbl_sub_kriteria')->result();
      $data['list_karyawan'] = $this->GlobalModel->get_data('tbl_karyawan')->result();
      $data['list_penilaian'] = $this->GlobalModel->get_penilaian()->result();
      
     
      foreach ($data['list_karyawan'] as $karyawan) {
         foreach ($data['list_kriteria'] as $kriteria) {
         $data['nilai'][$karyawan->id_karyawan][$kriteria->id_kriteria] = $this->GlobalModel->get_penilaian('','',$karyawan->id_karyawan,'', $kriteria->id_kriteria)->row();

         }
      }

      template_interface('perhitungan/parent', $data);
   }
}
