<?php

	if (!function_exists('get_count_sub_kriteria')) {
	  function get_count_sub_kriteria($id_kriteria=false){
		$CI = & get_instance();
	    $query=$CI->db->query("SELECT *  FROM tbl_sub_kriteria  WHERE id_kriteria=".$id_kriteria."")->num_rows();
		return $query;
		}
	}


	if (!function_exists('update_roc')) {
		function update_roc($id_sub_kriteria, $bobot_roc){
			$CI = & get_instance();
			$data['bobot_roc'] 		   	= $bobot_roc;
          	$CI->db->where('id_sub_kriteria', $id_sub_kriteria)->update('tbl_sub_kriteria', $data);
			return true;
		}
	}

	if (!function_exists('update_bobot_akhir')) {
		function update_bobot_akhir($id_kriteria=false, $bobot_akhir){
			$CI = & get_instance();
			$data['bobot_akhir'] 		   	= $bobot_akhir;
          	$CI->db->where('id_kriteria', $id_kriteria)->update('tbl_kriteria', $data);
			return true;
		}
	}
	if (!function_exists('update_nilai_preferensi')) {
		function update_nilai_preferensi($id_karyawan, $colomn, $nilai_pref){
			$CI = & get_instance();
			$data[$colomn] 		   	= $nilai_pref;
          	$CI->db->where('id_karyawan', $id_karyawan)->update('tbl_karyawan', $data);
			return true;
		}
	}

	if (!function_exists('update_poin_borda')) {
		function update_poin_borda($id_karyawan, $id_groupaspek, $poin_borda){
			$CI = & get_instance();
			$data['poin_borda'] = $poin_borda;
			$data['id_groupaspek'] = $id_groupaspek;
			$data['id_karyawan'] = $id_karyawan;
     		$check = $CI->GlobalModel->get_poin_borda($id_karyawan, $id_groupaspek)->row();
     		if($check){
          	$CI->db->where(array('id_karyawan' => $id_karyawan, 'id_groupaspek' => $id_groupaspek))->update('tbl_perhitungan_borda', $data);
     		}else{
          	$CI->db->insert('tbl_perhitungan_borda', $data);
     		}

			return true;
		}
	}



	if (!function_exists('get_nilai_utility')) {
	  function get_nilai_utility($id_kriteria){
		$CI = & get_instance();
	    $nilai_per_kriteria=$CI->db->query("SELECT sum(tbl_sub_kriteria.bobot_roc) as bobot_roc FROM tbl_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria."")->row();
		return round($nilai_per_kriteria->bobot_roc,3);
		}
	}


	if (!function_exists('get_nilai_kriteria')) {
	  function get_nilai_kriteria($id_kriteria, $id_karyawan){
		$CI = & get_instance();
	    $query=$CI->db->query("SELECT  * FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria." and  tbl_penilaian.id_karyawan=".$id_karyawan."")->row();
		if($query){
			$nilai = $query->nilai;
		}else{
			$nilai = 0;
		}
		return $nilai;
		}
	}



	if (!function_exists('get_nilai_per_kriteria')) {
	  function get_nilai_per_kriteria($id_kriteria, $id_karyawan){
		$CI = & get_instance();
	    $nilai_per_kriteria=$CI->db->query("SELECT sum(tbl_penilaian.nilai) as jumlah_nilai FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria." and  tbl_penilaian.id_karyawan=".$id_karyawan."")->row();
		$total_sub_kriteria = $CI->GlobalModel->get_sub_kriteria('',$id_kriteria)->num_rows();
		if(empty($total_sub_kriteria)){
			$total_sub_kriteria =1;
		}
		$result = $nilai_per_kriteria->jumlah_nilai/$total_sub_kriteria;
		return $result;
		}
	}
		if (!function_exists('get_pembagi')) {
	  function get_pembagi($id_kriteria){
		$CI = & get_instance();
	    $nilai_per_kriteria=$CI->db->query("SELECT sum(tbl_penilaian.nilai) as jumlah_nilai FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria."")->row();
		$total_sub_kriteria = $CI->GlobalModel->get_sub_kriteria('',$id_kriteria)->num_rows();
		if(empty($total_sub_kriteria)){
			$total_sub_kriteria =1;
		}
		$result = $nilai_per_kriteria->jumlah_nilai/$total_sub_kriteria;
		// $result = round(sqrt($result),3);
		return $result;
		}
	}


	if (!function_exists('get_nilai_per_sub_kriteria')) {
	  function get_nilai_per_sub_kriteria($id_sub_kriteria, $id_karyawan){
		$CI = & get_instance();
	    $query=$CI->db->query("SELECT sum(tbl_penilaian.nilai) as jumlah_nilai FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_sub_kriteria=".$id_sub_kriteria." and  tbl_penilaian.id_karyawan=".$id_karyawan."")->row();
		return $query;
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