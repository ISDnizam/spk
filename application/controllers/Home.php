<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
   }

   function index(){
      $data['title'] = "Profile";
      if($this->id_user){
      $data['list_golongan'] = $this->GlobalModel->get_data('tbl_golongan')->result();
      $data['list_group_karyawan'] = $this->GlobalModel->get_group_karyawan()->result();
      $id_user = $this->id_user;
      $data_user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      if($data_user->level=='user'){ 
         $data_karyawan = $this->GlobalModel->get_data('tbl_karyawan', ['id_user' =>$this->id_user])->row();
         $data['edit'] = $this->GlobalModel->get_karyawan($data_karyawan->id_karyawan)->row();
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
                 redirect('');
               }else{
                 $user['password'] = md5($password);
               }
             }
             $this->db->where('id_user', $id_user)->update('tbl_karyawan', $karyawan);
             $this->db->where('id_user', $id_user)->update('tbl_users', $user);
             $message= flash_info('Profile telah berhasil diupdate','get');
            }
           $this->session->set_flashdata('message', $message);
           redirect('');
         }
      }
      template_interface('dashboard/parent', $data);
	   }else{
      template_interface('login', $data);
	  }
   }
}
