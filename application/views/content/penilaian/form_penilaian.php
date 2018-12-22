<?php if(!empty($edit)){
  $form = '';
}else{
  $form ='';
}  ?>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-2">
  </div>
  <div class="col-xs-12 col-sm-12 col-md-8">
    <?php echo $this->session->flashdata('message'); ?>
    <div class="page-header">
      <h5><?php echo $title;?></h5>
    </div>

    <form method="post">
      <input type="hidden" name="id_kriteria" value="<?php if(!empty($edit)){ echo $edit->id_kriteria; }?>">
      <div class="row">
        <div class="col-md-12">


        <?php if($level=='direksi'){ ?>
        <div class="col-md-6">
          <div class="form-group">
            <label for="kt">Jabatan</label>
            <select name="" id="id_group_karyawan"  class="form-control" onchange="show_karyawan(this.value)">
              <option value="">Pilih Jabatan</option>
              <?php foreach ($list_group_karyawan as $key) { ?>
                <option value="<?php echo $key->id_group_karyawan;?>" ><?php echo $key->nama_group_karyawan.' ('.$key->nama_group.')'; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      <?php } ?>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kt">NIK</label>
                <div id="form_karyawan">
                <select name="id_karyawan" class="form-control" <?php echo $form;?>>
                  <?php foreach ($list_karyawan as $key) { ?>
                    <option value="<?php echo $key->id_karyawan;?>" <?php if(!empty($edit)){  if($edit->id_karyawan==$key->id_karyawan){ echo 'selected'; } } ?>><?php echo $key->nik;?> - <?php echo $key->nama_karyawan;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

        </div>
        <hr>
      </div>
      <?php foreach ($list_kriteria as $key) { ?>
        <div style="margin-bottom:30px">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="kt"><b><?php echo $key->nama_kriteria;?></b></label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Sub Kriteria</label>
                  <?php $sub_kriteria = get_count_sub_kriteria($key->id_kriteria,'array');?>
                  <select name="penilaian[<?php echo $key->id_kriteria;?>][id_sub_kriteria]" onchange="check_nilai_<?php echo $key->id_kriteria;?>(this.value)" class="form-control">
                    <option value="">Pilih sub kriteria</option>
                    <?php $i=0; foreach ($sub_kriteria as $ro) { $i++; ?>
                      <option value="<?php echo $ro->id_sub_kriteria;?>"><?php echo $ro->nama_sub_kriteria;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Nilai</label>
                  <input type="number" class="form-control" id="nilai<?php echo $key->id_kriteria;?>" name="penilaian[<?php echo $key->id_kriteria;?>][nilai]"  value="" required readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          function check_nilai_<?php echo $key->id_kriteria;?>(id) {
            $.ajax({
              url: '<?php echo site_url('penilaian/get_nilai'); ?>',
              type: 'POST',
              dataType: 'json',
              data: {id: id},
            })
            .done(function(data) {
              $('#nilai<?php echo $key->id_kriteria;?>').val(data);
            })
          }
        </script>

      <?php } ?>
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    
  </div>
  <div class="col-xs-12 col-sm-12 col-md-2">
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    form_sub_kriteria();
  });


  function form_sub_kriteria(){
    var id_kriteria = $('#id_kriteria').val();
    <?php if(!empty($edit)){ ?>

      $('#form_sub_kriteria').load('<?php echo base_url();?>kriteria/get_form_sub_kriteria/'+id_kriteria+'/<?php echo $edit->id_sub_kriteria;?>');
    <?php }else{ ?>
      $('#nilai').val(1);
      $('#form_sub_kriteria').load('<?php echo base_url();?>kriteria/get_form_sub_kriteria/'+id_kriteria);
    <?php } ?>
  }

  function show_karyawan(id){
    $('#form_karyawan').load('<?php echo base_url();?>karyawan/get_form_karyawan/'+id);
  }
</script>