<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penilaian extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
      if(empty($this->session->userdata('id_user'))){
        redirect('');
      }
   }

   function index(){
      $data['title'] = "Data Penilaian";
      $user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      $data['list'] = $this->GlobalModel->get_penilaian('',$user->level)->result();
      template_interface('penilaian/parent', $data);
   }

   function form_penilaian($id_penilaian=false){
      if($id_penilaian){
      $data['title'] = "Edit Nilai";
      $data['edit'] = $this->GlobalModel->get_penilaian($id_penilaian)->row();
      }else{
      $data['title'] = "Input Nilai";
      }
      $user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      $data['list_karyawan'] = $this->GlobalModel->get_karyawan()->result();
      $data['list_kriteria'] = $this->GlobalModel->get_kriteria($user->level)->result();
      $data['list_sub_kriteria'] = $this->GlobalModel->get_sub_kriteria()->result();
      $penilaian = $this->input->post('penilaian');
      if($penilaian){
        $penilaian['id_user'] = $this->id_user;
        if($id_penilaian){
          $this->db->where('id_penilaian', $id_penilaian)->update('tbl_penilaian', $penilaian);
          $message= flash_info('Nilai Karyawan telah berhasil diupdate','get');
        }else{
          $check_nilai = $this->GlobalModel->get_penilaian('','',$penilaian['id_karyawan'], $penilaian['id_sub_kriteria'])->row();
          if($check_nilai){
            $message= flash_danger('Nilai untuk sub kriteria tersebut sudah ada','get');
            $this->session->set_flashdata('message', $message);
            redirect('penilaian/form_penilaian');
          }else{
            $this->db->insert('tbl_penilaian', $penilaian);
            $message= flash_info('Nilai Karyawan telah berhasil diinput','get');
          }
        }
        $this->session->set_flashdata('message', $message);
        redirect('penilaian');
      }
      template_interface('penilaian/form_penilaian', $data);
   }

   function hapus_penilaian($id_penilaian){
      if($id_penilaian){
      $this->db->where('id_penilaian', $id_penilaian)->delete('tbl_penilaian');
      $message= flash_info('Nilai telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('penilaian');
      }
   }
}
