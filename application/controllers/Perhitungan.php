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
      if(!empty($_GET['aspek'])){
         $data['aspek'] = $_GET['aspek'];
      }else{
         $data['aspek'] = '';
      }
      if(!empty($_GET['type'])){
         $data['type'] = $_GET['type'];
      }else{
         $data['type'] = '';
      }
         if($data['type']==1){
            $group ='Medis';
         }else{
            $group ='Non Medis';
         }
      $data['title'] = "Perhitung ".$category;
      $user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      $data['aspek_kemuhammadiyahan'] = $this->GlobalModel->get_kriteria('',1)->result();
      $data['list_aspek_kemuhammadiyahan_prioritas'] = $this->GlobalModel->get_sub_kriteria_by_prioritas('',1)->result();
      $data['aspek_kinerja_non_medis'] = $this->GlobalModel->get_kriteria('',2,'Non Medis')->result();
      $data['list_aspek_kinerja_non_medis'] = $this->GlobalModel->get_sub_kriteria_by_prioritas('',2,'Non Medis')->result();
      $data['aspek_kinerja_medis'] = $this->GlobalModel->get_kriteria('',2)->result();
      $data['list_aspek_kinerja_medis'] = $this->GlobalModel->get_sub_kriteria_by_prioritas('',2)->result();


      $data['kriteria_kemuhammadiyahan'] = $this->GlobalModel->get_kriteria('',1)->result();
      $data['list_sub_kriteria_kemuhammadiyahan_prioritas'] = $this->GlobalModel->get_sub_kriteria_by_prioritas('',1)->result();
      $data['list_nilai'] = $this->GlobalModel->get_data('tbl_penilaian')->result();
      if($data['aspek']=='kemuhammadiyahan'){

      $data['list_kriteria'] = $this->GlobalModel->get_kriteria('',1,$group)->result();
      }else{
      $data['list_kriteria'] = $this->GlobalModel->get_kriteria('',2,$group)->result();
      }
      // echo count($data['list_kriteria']);die();
      $data['list_kriteria_prioritas'] = $this->GlobalModel->get_kriteria_by_prioritas()->result();
      $data['list_karyawan'] = $this->GlobalModel->get_karyawan('', $data['type'],'','',2)->result();
      $data['list_preferensi_kemuhammadiyahan'] = $this->GlobalModel->get_nilai_preferensi(1,$data['type'],10)->result();
      $data['list_preferensi_kinerja'] = $this->GlobalModel->get_nilai_preferensi(2,$data['type'],10)->result();
      $data['list_poin_borda'] = $this->GlobalModel->get_poin_borda('','', $data['type'])->result();
      $data['category'] = $category;
      template_interface('perhitungan/parent', $data);
   }
}
