<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
   }


   // MODULE LOGIN START
   function login(){
   $username = $this->input->post('username');
   $password = $this->input->post('password');
      if($username){
      $where = array(
              'username' => $username,
              'password' => md5($password)
      );
      $check_user = $this->GlobalModel->get_data('tbl_users', $where)->row();
        if($check_user){
         $data_session = array(
                 'id_user' => $check_user->id_user,
                 'email' => $check_user->email,
         );
         $this->session->set_userdata($data_session);
         redirect('');
         }else{
          $message= flash_danger('Username atau Password Salah','get');
          $this->session->set_flashdata('message', $message);
          redirect('');
         }
      }
   }

   function logout(){
   $this->session->unset_userdata('status');
   $this->session->sess_destroy();
   redirect('');
   }
}
