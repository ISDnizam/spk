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
            <label for="kt">Group</label>
            <select name="kriteria[id_group]"  class="form-control" >
              <?php foreach ($list_group as $key) { ?>
              <option value="<?php echo $key->id_group;?>"  <?php if(!empty($edit)){  if($edit->id_group==$key->id_group){ echo 'selected'; } } ?>><?php echo $key->nama_group; ?></option>
              <?php } ?>
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
