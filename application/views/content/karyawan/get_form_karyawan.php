<select name="id_karyawan" class="form-control">
  <?php foreach ($list as $key) { ?>
    <option value="<?php echo $key->id_karyawan;?>"><?php echo $key->nik;?> - <?php echo $key->nama_karyawan;?></option>
  <?php } ?>
</select>