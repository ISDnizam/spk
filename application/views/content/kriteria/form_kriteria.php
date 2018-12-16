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
            <label for="kt">Kode Kriteria</label>
            <input type="text" class="form-control" id="kt" name="kriteria[kode_kriteria]"  value="<?php if(!empty($edit)){ echo $edit->kode_kriteria; }?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="kt">Nama Kriteria</label>
            <input type="text" class="form-control" id="kt" name="kriteria[nama_kriteria]"  value="<?php if(!empty($edit)){ echo $edit->nama_kriteria; }?>" required>
          </div>
        </div>
           <div class="col-md-6">
          <div class="form-group">
            <label for="kt">Prioritas</label>
            <input type="number" class="form-control" id="kt" name="kriteria[prioritas]"  value="<?php if(!empty($edit)){ echo $edit->prioritas; }?>" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="kt">Aspek</label>
            <select name="kriteria[id_groupaspek]"  class="form-control" >
              <option value="1"  <?php if(!empty($edit)){  if($edit->id_groupaspek==1){ echo 'selected'; } } ?>>Kemuhammadiyahan</option>
              <option value="2"  <?php if(!empty($edit)){  if($edit->id_groupaspek==2){ echo 'selected'; } } ?>>Kinerja</option>
            </select>
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
