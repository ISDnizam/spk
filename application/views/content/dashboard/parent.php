<?php if($user->level=='user'){ ?>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="page-header">
        <h4><?php echo $title;?></h4>
      </div>

    <div class="col-md-12">
    <?php echo $this->session->flashdata('message'); ?>
    </div>
        <form method="post">
          <div class="col-md-6">
            <div class="page-header">
              <h5>Data Diri</h5>
            </div>
            <input type="hidden" name="id_karyawan" value="<?php if(!empty($edit)){ echo $edit->id_karyawan; }?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">NIK</label>
                  <input type="text" class="form-control" id="nik" name="karyawan[nik]"  value="<?php if(!empty($edit)){ echo $edit->nik; }?>" onchange="set_username(this.value)" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Nama karyawan</label>
                  <input type="text" class="form-control"  name="karyawan[nama_karyawan]"  value="<?php if(!empty($edit)){ echo $edit->nama_karyawan; }?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Tahun Masuk</label>
                  <input type="number" class="form-control"  name="karyawan[tahun_masuk]"  value="<?php if(!empty($edit)){ echo $edit->tahun_masuk; }?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Masa Kerja</label>
                  <input type="text" class="form-control"  name="karyawan[masa_kerja]"  value="<?php if(!empty($edit)){ echo $edit->masa_kerja; }?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Jenis Kelamin</label>
                  <select name="karyawan[jenis_kelamin]"  class="form-control" >
                    <option value="Laki-Laki" <?php if(!empty($edit)){  if($edit->jenis_kelamin=='Laki-Laki'){ echo 'selected'; } } ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php if(!empty($edit)){  if($edit->jenis_kelamin=='Perempuan'){ echo 'selected'; } } ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Pendidikan Terakhir</label>
                  <select name="karyawan[id_golongan]"  class="form-control" >
                    <?php foreach ($list_golongan as $key) { ?>
                      <option value="<?php echo $key->id_golongan;?>"  <?php if(!empty($edit)){  if($edit->id_golongan==$key->id_golongan){ echo 'selected'; } } ?>><?php echo $key->pendidikan.' ('.$key->golongan_awal.'-'.$key->golongan_akhir.')'; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Jabatan</label>
                  <select name="karyawan[id_group_karyawan]"  class="form-control" >
                    <?php foreach ($list_group_karyawan as $key) { ?>
                      <option value="<?php echo $key->id_group_karyawan;?>"  <?php if(!empty($edit)){  if($edit->id_group_karyawan==$key->id_group_karyawan){ echo 'selected'; } } ?>><?php echo $key->nama_group_karyawan.' ('.$key->nama_group.')'; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <?php if(!empty($edit)){ ?>
               <div class="col-md-6">
                <div class="form-group">
                  <label for="kt">Status Karyawan</label>
                  <select name="karyawan[status_karyawan]"  class="form-control" >
                    <option value="aktif" <?php if(!empty($edit)){  if($edit->status_karyawan=='aktif'){ echo 'selected'; } } ?>>Aktif</option>
                    <option value="non aktif" <?php if(!empty($edit)){  if($edit->status_karyawan=='non aktif'){ echo 'selected'; } } ?>>Non Aktif</option>
                  </select>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        

        <div class="col-md-5">
          <div class="col-md-12">
            <div class="page-header">
              <h5>Akses Login</h5>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Username</label>
              <input type="text" class="form-control" id="username" name="user[username]"  value="<?php if(!empty($edit)){ echo $edit->username; }?>" required readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="kt">Email</label>
              <input type="email" class="form-control" id="email" name="user[email]"  value="<?php if(!empty($edit)){ echo $edit->email; }?>" required>
            </div>
          </div>
          <?php if(!empty($edit)){ ?>
            <div class="col-md-12">
              <div class="form-group">
                <label for="kt"><a id="show_password" onclick="show_password()" style="cursor:pointer">Ganti Passwrod</a></label>
              </div>
            </div>


          <div id="form_password" style="display: none">
            <div class="col-md-12">
              <div class="form-group">
                <label for="kt">Password Baru</label>
                <input type="password" class="form-control"  name="password"   >
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="kt">Ulangi Password Baru</label>
                <input type="password" class="form-control"  name="repassword"   >
              </div>
            </div>
          </div>

          <?php }else{ ?>

            <div class="col-md-12">
              <div class="form-group">
                <label for="kt">Password</label>
                <input type="password" class="form-control"  name="password"   >
              </div>
            </div>

          <?php } ?>
        </div>


        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </form>
    </div>
  </div>
<?php } ?>
<script type="text/javascript">
  function set_username(nik){
    $('#username').val(nik);
  }

  function show_password(){
    $('#form_password').show();
    $('#show_password').hide();
  }
</script>