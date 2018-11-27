<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
   function __construct(){
      parent::__construct();
      $this->id_user = $this->session->userdata('id_user');
   }

   function index(){
      $data['title'] = "Hommepage";
      $data['list_karyawan'] = $this->GlobalModel->get_data('tbl_karyawan')->result();
      if($this->id_user){
      template_interface('dashboard/parent', $data);
	    }else{
      template_interface('login', $data);
	    }
   }
}
