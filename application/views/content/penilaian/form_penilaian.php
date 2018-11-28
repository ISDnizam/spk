<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-2">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8">
    <div class="page-header">
      <h5><?php echo $title;?></h5>
    </div>
    <form method="post">
      <input type="hidden" name="id_kriteria" value="<?php if(!empty($edit)){ echo $edit->id_kriteria; }?>">
      <div class="col-md-6">
        <div class="form-group">
          <label for="kt">NIK</label>
          <select name="penilaian[id_karyawan]" class="form-control">
            <?php foreach ($list_karyawan as $key) { ?>
              <option value="<?php echo $key->id_karyawan;?>" <?php if(!empty($edit)){  if($edit->id_karyawan==$key->id_karyawan){ echo 'selected'; } } ?>><?php echo $key->nik;?> - <?php echo $key->nama_karyawan;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="kt">Kriteria</label>
          <select  class="form-control" id="id_kriteria" onchange="form_sub_kriteria()">
            <?php foreach ($list_kriteria as $key) { ?>
              <option value="<?php echo $key->id_kriteria;?>" <?php if(!empty($edit)){  if($edit->id_kriteria==$key->id_kriteria){ echo 'selected'; } } ?>><?php echo $key->nama_kriteria;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="kt">Sub Kriteria</label>
          <span id="form_sub_kriteria"></span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="kt">Nilai</label>
          <input type="number" class="form-control" id="kt" name="penilaian[nilai]"  value="<?php if(!empty($edit)){ echo $edit->nilai; }?>" required>
        </div>
      </div>

      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    
  </div>
  <div class="col-xs-12 col-sm-12 col-md-2">
  </div>
</div>
