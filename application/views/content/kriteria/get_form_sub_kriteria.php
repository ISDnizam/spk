<select name="penilaian[id_sub_kriteria]" class="form-control" <?php if($id_sub_kriteria){ echo 'disabled'; } ?>>
<?php foreach ($list as $key) { ?>
  <option value="<?php echo $key->id_sub_kriteria;?>" <?php  if($id_sub_kriteria==$key->id_sub_kriteria){ echo 'selected'; }  ?>><?php echo $key->nama_sub_kriteria;?></option>
<?php } ?>
</select>