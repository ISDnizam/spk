<?php



	if (!function_exists('get_nilai_per_kriteria')) {
	  function get_nilai_per_kriteria($id_kriteria, $id_karyawan){
		$CI = & get_instance();
	    $nilai_per_kriteria=$CI->db->query("SELECT sum(tbl_penilaian.nilai) as jumlah_nilai FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria." and  tbl_penilaian.id_karyawan=".$id_karyawan."")->row();
		$total_sub_kriteria = $CI->GlobalModel->get_sub_kriteria('',$id_kriteria)->num_rows();
		$result = $nilai_per_kriteria->jumlah_nilai/$total_sub_kriteria;
		return $result;
		}
	}
		if (!function_exists('get_pembagi')) {
	  function get_pembagi($id_kriteria){
		$CI = & get_instance();
	    $nilai_per_kriteria=$CI->db->query("SELECT sum(tbl_penilaian.nilai) as jumlah_nilai FROM tbl_penilaian join tbl_sub_kriteria on  tbl_sub_kriteria.id_sub_kriteria=tbl_penilaian.id_sub_kriteria WHERE tbl_sub_kriteria.id_kriteria=".$id_kriteria."")->row();
		$total_sub_kriteria = $CI->GlobalModel->get_sub_kriteria('',$id_kriteria)->num_rows();
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