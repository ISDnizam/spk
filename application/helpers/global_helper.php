<?php

if (!function_exists('normalisasi')) {
  function normalisasi($id_karyawan, $id_kriteria, $nilai_normalisasi, $bobot_normalisasi){
	$CI = & get_instance();
		$where['id_karyawan']= $id_karyawan;
		$where['id_kriteria']= $id_kriteria;
		$rangking['nilai_normalisasi']= $nilai_normalisasi;
		$rangking['bobot_normalisasi']= $bobot_normalisasi;
        $CI->db->where($where)->update('rangking', $rangking);
		return true;
	}
}

	if (!function_exists('get_max')) {
		function get_max($id_kriteria){
				$CI = & get_instance();
		        $query=$CI->db->query("SELECT max(nilai_rangking) as nilai_max FROM rangking WHERE id_kriteria=".$id_kriteria."")->row();
				return $query;
			}
	}

	if (!function_exists('get_min')) {
		function get_min($id_kriteria){
				$CI = & get_instance();
		        $query=$CI->db->query("SELECT min(nilai_rangking)  as nilai_min FROM rangking WHERE id_kriteria=".$id_kriteria."")->row();
				return $query;
			}
	}

	if (!function_exists('read_hasil_kandidat')) {
		function read_hasil_karyawan($id_karyawan){
				$CI = & get_instance();
		        $query=$CI->db->query("SELECT sum(bobot_normalisasi) as bobot_normalisasi FROM rangking WHERE id_karyawan=".$id_karyawan."")->row();
				return $query;
			}
	}
	if (!function_exists('set_hasil_karyawan')) {
		function set_hasil_karyawan($id_karyawan,$nilai_karyawan){
				$CI = & get_instance();
				$karyawan['nilai_karyawan'] = $nilai_karyawan;
        		$CI->db->where('id_karyawan', $id_karyawan)->update('karyawan', $karyawan);
				return true;
			}
	}
	if (!function_exists('flash_info')) {
   function flash_info($value,$type=false){
      $alert = '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success !</strong> '.$value.'
                </div>
                ';
      if ($type==false) {
         echo $alert;
      }elseif($type=='get' or $type == TRUE){
         return $alert;
      }
   }

   if (!function_exists('flash_danger')) {
   function flash_danger($value,$type=false){
      $alert =
         '<div class="alert alert-danger alert-dismissable">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Caution!</strong> '.$value.'
         </div>';
	   if ($type==false) {
	      echo $alert;
	   }elseif($type=='get' or $type == TRUE){
	      return $alert;
	   }
   }
	}

   function template_interface($file_name, $data){
   $CI =& get_instance();
   $CI->load->model(array('GlobalModel'));
   $id_user = $CI->session->userdata('id_user');
   if(!empty($id_user)){
    $data['user'] = $CI->GlobalModel->get_data('tbl_users', ['id_user' => $CI->id_user])->row();
   }
   $CI->load->view('layout/header', $data);
   $CI->load->view('content/'.$file_name, $data);
   $CI->load->view('layout/footer');
	}


}
?>