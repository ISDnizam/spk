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
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Nilai A</label>
                <div id="form_karyawan">
                <input type="" class="form-control" name="akurasi[nilai_a]">
              </div>
            </div>
          </div>

                    <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Nilai B</label>
                <div id="form_karyawan">
                <input type="" class="form-control"  name="akurasi[nilai_b]">
              </div>
            </div>
          </div>

                    <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Nilai C</label>
                <div id="form_karyawan">
                <input type="" class="form-control"  name="akurasi[nilai_c]">
              </div>
            </div>
          </div>


                    <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Nilai D</label>
                <div id="form_karyawan">
                <input type="" class="form-control"  name="akurasi[nilai_d]">
              </div>
            </div>
          </div>

                    
          </div>
        </div>
        <hr>
      </div>
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