  <div class="row">
    <div class="col-md-6 text-left">
      <h4><?php echo $title;?></h4>
    </div>
    <div class="col-md-6 text-right">
<<<<<<< Updated upstream
      <?php if($user->level=='pdm' or $user->level=='direksi'){ ?>
      <a href="<?php echo base_url();?>penilaian/form_penilaian" class="btn btn-primary">Input Nilai</a>
      <?php } ?>
=======
      <?php if ($user->level !='user'){?>
      <a href="<?php echo base_url();?>penilaian/form_penilaian" class="btn btn-primary">Input Nilai</a>
      <?php }?>
>>>>>>> Stashed changes
    </div>
    <div class="col-md-12">
    <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
  <br/>
  <table width="100%" class="table table-striped table-bordered" id="tabeldata">
    <thead>
      <tr>
        <th width="30px">No</th>
        <th>NIK </th>
        <th>Nama </th>
        <th>Kriteria</th>
        <th>Sub Kriteria</th>
        <th>Nilai</th>
<<<<<<< HEAD
<<<<<<< Updated upstream
=======
>>>>>>> master
        <?php if($user->level!='user'){ ?>
        <th width="100px">Aksi</th>
        <?php } ?>
=======
        <?php if ($user->level !='user'){?>
        <th width="100px">Aksi</th>
      <?php }?>
>>>>>>> Stashed changes
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($list as $key) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $key->nik; ?></td>
          <td><?php echo $key->nama_karyawan; ?></td>
          <td><?php echo $key->nama_kriteria; ?></td>
          <td><?php echo $key->nama_sub_kriteria; ?></td>
          <td><?php echo $key->nilai; ?></td>
<<<<<<< HEAD
<<<<<<< Updated upstream
          <?php if($user->level!='user'){ ?>
=======

          <?php if ($user->level !='user'){?>
>>>>>>> Stashed changes
=======
          <?php if($user->level!='user'){ ?>
>>>>>>> master
          <td class="text-center">
            <a href="<?php echo base_url();?>penilaian/form_penilaian/<?php echo $key->id_penilaian; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a href="<?php echo base_url();?>penilaian/hapus_penilaian/<?php echo $key->id_penilaian; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
<<<<<<< Updated upstream
            <?php } ?>
=======
          <?php } ?>
>>>>>>> Stashed changes
        </tr>
      <?php } ?>
    </tbody>
  </table>    
