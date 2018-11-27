<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-2">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8">
    <div class="page-header">
    <h5><?php echo $title;?></h5>
    </div>
    <form method="post">
    <input type="hidden" name="id_sub_kriteria" value="<?php if(!empty($edit)){ echo $edit->id_sub_kriteria; }?>">
    <div class="col-md-6">
      <div class="form-group">
        <label for="kt">Kriteria</label>
        <select name="sub_kriteria[id_kriteria]"  class="form-control" >
          <?php foreach ($list_kriteria as $key) { ?>
          <option value="<?php echo $key->id_kriteria;?>"  <?php if(!empty($edit)){  if($edit->id_kriteria==$key->id_kriteria){ echo 'selected'; } } ?>><?php echo $key->nama_kriteria; ?></option>
          <?php } ?>
        </select>
    </div>
    </div>
        <div class="col-md-6">
      <div class="form-group">
        <label for="kt">Kode Sub Kriteria</label>
        <input type="text" class="form-control" id="kt" name="sub_kriteria[kode_sub_kriteria]"  value="<?php if(!empty($edit)){ echo $edit->kode_sub_kriteria; }?>" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="kt">Nama Sub Kriteria</label>
        <input type="text" class="form-control" id="kt" name="sub_kriteria[nama_sub_kriteria]"  value="<?php if(!empty($edit)){ echo $edit->nama_sub_kriteria; }?>" required>
      </div>
    </div>
       <div class="col-md-6">
      <div class="form-group">
        <label for="kt">Prioritas</label>
        <input type="number" class="form-control" id="kt" name="sub_kriteria[prioritas]"  value="<?php if(!empty($edit)){ echo $edit->prioritas; }?>" required>
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
