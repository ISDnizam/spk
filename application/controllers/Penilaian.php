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
      $karyawan = $this->GlobalModel->get_karyawan($this->id_user)->row();
<<<<<<< Updated upstream
      if(!empty($_GET['aspek'])){
         if($_GET['aspek']=='kemuhammadiyahan'){
          $level = 'pdm';
        }elseif($_GET['aspek']=='kinerja'){
          $level = 'direksi';
        }
      }else{
          $level ='';
      }
      if($user->level=='user'){
      $data['list'] = $this->GlobalModel->get_penilaian('',$level, $karyawan->id_karyawan)->result();
=======
      if($user->level=='user'){
      $data['list'] = $this->GlobalModel->get_penilaian('','', $karyawan->id_karyawan)->result();
>>>>>>> Stashed changes
      }else{
      $data['list'] = $this->GlobalModel->get_penilaian('',$user->level)->result();
      }
      template_interface('penilaian/parent', $data);
    }

   function form_penilaian($id_penilaian=false){
      if($id_penilaian){
      $data['title'] = "Edit Nilai";
      $data['edit'] = $this->GlobalModel->get_penilaian($id_penilaian)->row();
      $view='form_penilaian_edit';
      }else{
      $view='form_penilaian';
      $data['title'] = "Input Nilai";
      }
      $user = $this->GlobalModel->get_data('tbl_users', ['id_user' => $this->id_user])->row();
      $data['level'] = $user->level;
      $data['list_karyawan'] = $this->GlobalModel->get_karyawan()->result();
      $data['list_kriteria'] = $this->GlobalModel->get_kriteria($user->level)->result();
      $data['list_sub_kriteria'] = $this->GlobalModel->get_sub_kriteria()->result();
            $data['list_golongan'] = $this->GlobalModel->get_data('tbl_golongan')->result();
      $data['list_group_karyawan'] = $this->GlobalModel->get_group_karyawan()->result();
      $data['list_tahun'] = $this->GlobalModel->get_data('tbl_tahun')->result();
      $penilaian = $this->input->post('penilaian');
      if($penilaian){
        if($id_penilaian){
          $this->db->where('id_penilaian', $id_penilaian)->update('tbl_penilaian', $penilaian);
          $message= flash_info('Nilai Karyawan telah berhasil diupdate','get');
        }else{
          $id_karyawan = $this->input->post('id_karyawan');
          foreach ($data['list_kriteria'] as $key) {
            $form['nilai'] = $penilaian[$key->id_kriteria]['nilai'];
            $form['id_sub_kriteria'] = $penilaian[$key->id_kriteria]['id_sub_kriteria'];
            $form['id_karyawan'] = $id_karyawan;
            $form['id_user'] = $this->id_user;
            $form['id_tahun'] = $this->input->post('id_tahun');
            $this->db->insert('tbl_penilaian', $form);
          }
          $message= flash_info('Nilai Karyawan telah berhasil diinput','get');
        }
        $this->session->set_flashdata('message', $message);
        redirect('penilaian');
      }
      template_interface('penilaian/'.$view, $data);
   }

   function hapus_penilaian($id_penilaian){
      if($id_penilaian){
      $this->db->where('id_penilaian', $id_penilaian)->delete('tbl_penilaian');
      $message= flash_info('Nilai telah berhasil dihapus','get');
      $this->session->set_flashdata('message', $message);
      redirect('penilaian');
      }
   }

   function get_nilai(){
    $id_sub_kriteria = $this->input->post('id');
    $id_kriteria = $this->GlobalModel->get_sub_kriteria($id_sub_kriteria)->row()->id_kriteria;
    $jml_kriteria = get_count_sub_kriteria($id_kriteria);
    $prioritas = $this->GlobalModel->get_sub_kriteria($id_sub_kriteria)->row()->prioritas;
      if($jml_kriteria==3){
        if($prioritas==1){
        $prioritas =3;
        }elseif($prioritas==2){
        $prioritas =2;
        }elseif($prioritas==3){
        $prioritas =1;
        }
      }
      else if ($jml_kriteria==2) {
        if($prioritas==1){
        $prioritas =2;
        }elseif($prioritas==2){
        $prioritas =1;
        }
      }
      else{
        if($prioritas==1){
        $prioritas =4;
        }elseif($prioritas==2){
        $prioritas =3;
        }elseif($prioritas==3){
        $prioritas =2;
        }elseif($prioritas==4){
        $prioritas =1;
        }
      }
    if($id_sub_kriteria){
    echo $prioritas;
    }else{
      echo '0';
    }
   }
}
