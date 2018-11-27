<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
      if(empty($this->session->userdata('id_user'))){
        redirect('');
      }
   }

   function index(){
      $data['title'] = "Data karyawan";
      $data['list'] = $this->GlobalModel->get_karyawan()->result();
      template_interface('karyawan/parent', $data);
   }

   function form_karyawan($id_karyawan=false){
      if($id_karyawan){
      $data['title'] = "Edit karyawan";
      $data['edit'] = $this->GlobalModel->get_karyawan($id_karyawan)->row();
      }else{
      $data['title'] = "Tambah karyawan";
      }
      $data['list_golongan'] = $this->GlobalModel->get_data('tbl_golongan')->result();
      $data['list_group_karyawan'] = $this->GlobalModel->get_group_karyawan()->result();
      $karyawan = $this->input->post('karyawan');
      if($karyawan){
         if($id_karyawan){
          $this->db->where('id_karyawan', $id_karyawan)->update('tbl_karyawan', $karyawan);
          $message= flash_info('Karyawan telah berhasil diupdate','get');
         }else{
         $this->db->insert('tbl_karyawan', $karyawan);
          $message= flash_info('Karyawan telah berhasil dibuat','get');
         }

        $this->session->set_flashdata('message', $message);
        redirect('karyawan');
      }
      template_interface('karyawan/form_karyawan', $data);
   }

   function hapus_karyawan($id_karyawan){
      if($id_karyawan){
      $this->db->where('id_karyawan', $id_karyawan)->delete('tbl_karyawan');
      $message= flash_info('Karyawan telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('karyawan');
      }
   }
}
