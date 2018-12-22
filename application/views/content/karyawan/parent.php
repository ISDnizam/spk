  <div class="row">
    <div class="col-md-6 text-left">
      <h4><?php echo $title;?></h4>
    </div>
    <div class="col-md-6 text-right">
      <a href="<?php echo base_url();?>karyawan/form_karyawan" class="btn btn-primary">Tambah Data</a>
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
        <th>J-K </th>
        <th>Pendidikan Terakhir</th>
        <th>Kelompok</th>
        <th>Status</th>
        <th width="100px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($list as $key) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $key->nik; ?></td>
          <td><?php echo $key->nama_karyawan; ?></td>
          <td><?php echo $key->jenis_kelamin; ?></td>
          <td><?php echo $key->pendidikan.' ('.$key->golongan_awal.'-'.$key->golongan_akhir.')'; ?></td>
          <td><?php echo $key->nama_group_karyawan.' ('.$key->nama_group.')'; ?></td>
          <td><?php echo $key->status_karyawan; ?></td>
          <td class="text-center">
            <a href="<?php echo base_url();?>karyawan/form_karyawan/<?php echo $key->id_user; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            <a href="<?php echo base_url();?>karyawan/hapus_karyawan/<?php echo $key->id_user; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $key->nama_karyawan; ?> sebagai karyawan ?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>    
