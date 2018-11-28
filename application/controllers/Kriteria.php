<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
      if(empty($this->session->userdata('id_user'))){
        redirect('');
      }
   }


  function index(){
      $data['title'] = "Data Kriteria";
      $data['list'] = $this->GlobalModel->get_data('tbl_kriteria')->result();
      template_interface('kriteria/parent', $data);
   }

   function form_kriteria($id_kriteria=false){
      if($id_kriteria){
      $data['title'] = "Edit Kriteria";
      $data['edit'] = $this->GlobalModel->get_data('tbl_kriteria', ['id_kriteria' =>$id_kriteria])->row();
      }else{
      $data['title'] = "Tambah Kriteria";
      }
      $data['list_group'] = $this->GlobalModel->get_data('tbl_group')->result();
      $kriteria = $this->input->post('kriteria');
      if($kriteria){
         if($id_kriteria){
          $this->db->where('id_kriteria', $id_kriteria)->update('tbl_kriteria', $kriteria);
          $message= flash_info('kriteria telah berhasil diupdate','get');
         }else{
         $this->db->insert('tbl_kriteria', $kriteria);
          $message= flash_info('kriteria telah berhasil dibuat','get');
         }

        $this->session->set_flashdata('message', $message);
        redirect('kriteria');
      }
      template_interface('kriteria/form_kriteria', $data);
   }

   function hapus_kriteria($id_kriteria){
      if($id_kriteria){
      $this->db->where('id_kriteria', $id_kriteria)->delete('tbl_kriteria');
      $message= flash_info('kriteria telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('kriteria');
      }
   }

    function sub_kriteria(){
      $data['title'] = "Data Sub Kriteria";
      $data['list'] = $this->GlobalModel->get_sub_kriteria()->result();
      template_interface('kriteria/sub_kriteria',$data);
    }
    function form_sub_kriteria($id_sub_kriteria=false){
      if($id_sub_kriteria){
      $data['title'] = "Edit Sub Kriteria";
      $data['edit'] = $this->GlobalModel->get_data('tbl_sub_kriteria', ['id_sub_kriteria' =>$id_sub_kriteria])->row();
      }else{
      $data['title'] = "Tambah Sub Kriteria";
      }
      $data['list_kriteria'] = $this->GlobalModel->get_data('tbl_kriteria')->result();
      $sub_kriteria = $this->input->post('sub_kriteria');
      if($sub_kriteria){
         if($id_sub_kriteria){
          $this->db->where('id_sub_kriteria', $id_sub_kriteria)->update('tbl_sub_kriteria', $sub_kriteria);
          $message= flash_info('sub kriteria telah berhasil diupdate','get');
         }else{
         $this->db->insert('tbl_sub_kriteria', $sub_kriteria);
          $message= flash_info('sub kriteria telah berhasil dibuat','get');
         }

        $this->session->set_flashdata('message', $message);
        redirect('kriteria/sub_kriteria');
      }
      template_interface('kriteria/form_sub_kriteria', $data);
   }

   function hapus_sub_kriteria($id_sub_kriteria){
      if($id_sub_kriteria){
      $this->db->where('id_sub_kriteria', $id_sub_kriteria)->delete('tbl_sub_kriteria');
      $message= flash_info('sub kriteria telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('kriteria/sub_kriteria');
      }
   }

    function get_form_sub_kriteria($id_kriteria){
      $data['list'] = $this->GlobalModel->get_sub_kriteria('',$id_kriteria)->result();
      $this->load->view('content/kriteria/get_form_sub_kriteria', $data);
    }
}
