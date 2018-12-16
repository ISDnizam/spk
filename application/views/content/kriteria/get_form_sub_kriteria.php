<select name="penilaian[id_sub_kriteria]" onchange="check_nilai(this.value)" class="form-control">
<?php $i=0; foreach ($list as $key) { $i++; ?>
  <option value="<?php echo $key->id_sub_kriteria;?>" <?php  if($id_sub_kriteria==$key->id_sub_kriteria){ echo 'selected'; }  ?>><?php echo $key->nama_sub_kriteria;?></option>
<?php } ?>
</select>