<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tes extends CI_Controller{
   function __construct(){
      parent::__construct();
   }


  function index(){
      $data['title'] = "Data Kriteria";
      $list_karyawan = $this->GlobalModel->get_data('tbl_karyawan')->result();
      foreach ($list_karyawan as $key) {
        echo $key->nik;
      }
   }
}
