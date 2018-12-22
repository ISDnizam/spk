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

   function form_karyawan($id_user=false){
      if($id_user){
      $data['title'] = "Edit karyawan";
      $data['edit'] = $this->GlobalModel->get_karyawan($id_user)->row();
      }else{
      $data['title'] = "Tambah karyawan";
      }
      $data['list_golongan'] = $this->GlobalModel->get_data('tbl_golongan')->result();
      $data['list_group_karyawan'] = $this->GlobalModel->get_group_karyawan()->result();
      $karyawan = $this->input->post('karyawan');
      $user = $this->input->post('user');
      $password = $this->input->post('password');
      $repassword = $this->input->post('repassword');
      if($karyawan){
         if($id_user){
          if($password){
            if($password!=$repassword){
              $message= flash_danger('Paaword yang anda masukan tidak cocok','get');
              $this->session->set_flashdata('message', $message);
              redirect('karyawan/form_karyawan/'.$id_user);
            }else{
              $user['password'] = md5($password);
            }
          }
          $this->db->where('id_user', $id_user)->update('tbl_karyawan', $karyawan);
          $this->db->where('id_user', $id_user)->update('tbl_users', $user);
          $message= flash_info('Karyawan telah berhasil diupdate','get');
         }else{
         $user['password'] = md5($user['password']);
         $user['level'] = 'user';
         $this->db->insert('tbl_users', $user);
         $karyawan['id_user'] = $this->db->insert_id();
         $this->db->insert('tbl_karyawan', $karyawan);

          $message= flash_info('Karyawan telah berhasil dibuat','get');
         }

        $this->session->set_flashdata('message', $message);
        redirect('karyawan');
      }
      template_interface('karyawan/form_karyawan', $data);
   }

   function hapus_karyawan($id_user){
      if($id_user){
      $this->db->where('id_user', $id_user)->delete('tbl_karyawan');
      $this->db->where('id_user', $id_user)->delete('tbl_users');
      $message= flash_info('Karyawan telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('karyawan');
      }
   }
    function get_form_karyawan($id_group_karyawan=false){
      $data['list'] = $this->GlobalModel->get_karyawan('','','',$id_group_karyawan)->result();
      $this->load->view('content/karyawan/get_form_karyawan', $data);
    }
}
