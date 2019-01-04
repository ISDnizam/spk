<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akurasi extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
   }

   function index(){
      $data['title'] = "Data Akurasi";
      $data['list'] = $this->GlobalModel->get_data('tbl_akurasi')->result();
      template_interface('akurasi/parent', $data);
   }

   function hapus_akurasi($id_akurasi){
      if($id_akurasi){
      $this->db->where('id_akurasi', $id_akurasi)->delete('tbl_akurasi');
      $message= flash_info('akurasi telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('akurasi');
      }
   }

  function form_akurasi($id_akurasi=false){
      if($id_akurasi){
      $data['title'] = "Edit Nilai Akurasi";
      }else{
      $data['title'] = "Input Nilai Akurasi";
      }
      $akurasi = $this->input->post('akurasi');
      if($akurasi){
      $this->db->insert('tbl_akurasi', $akurasi);
      $message= flash_info('Nilai Akuurasi telah berhasil diinput','get');
      $this->session->set_flashdata('message', $message);
      redirect('akurasi');
      }
      template_interface('akurasi/form_akurasi', $data);
  }
}
