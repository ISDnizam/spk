  <div class="row">
    <div class="col-md-6 text-left">
      <h4><?php echo $title;?></h4>
    </div>
    <div class="col-md-6 text-right">
      <a href="<?php echo base_url();?>akurasi/form_akurasi" class="btn btn-primary">Input akurasi</a>
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
        <th>Nilai A </th>
        <th>Nilai B </th>
        <th>Nilai C </th>
        <th>Nilai D </th>
        
        <th width="100px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($list as $key) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $key->nilai_a; ?></td>
          <td><?php echo $key->nilai_b; ?></td>
          <td><?php echo $key->nilai_c; ?></td>
          <td><?php echo $key->nilai_d; ?></td>
          
          <td class="text-center">
            
            <a href="<?php echo base_url();?>akurasi/hapus_akurasi/<?php echo $key->id_akurasi; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>    
<hr>


<b>Check Akurasi</b>  
 <table width="100%" class="table table-striped table-bordered" id="tabeldata">
    <thead>
      <tr>
        <th width="30px">No</th>
        <th>Recall </th>
        <th>Precision </th>
        <th>Accuracy</th>
        <th>Error Rate</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($list as $key) { 
        $recall = $key->nilai_d/($key->nilai_c+$key->nilai_d);
        $precision = $key->nilai_d/($key->nilai_b+$key->nilai_d);
        $accuracy = ($key->nilai_a+$key->nilai_c)/($key->nilai_a+$key->nilai_b+$key->nilai_c+$key->nilai_d);
        $error_rate = ($key->nilai_b+$key->nilai_c)/($key->nilai_a+$key->nilai_b+$key->nilai_c+$key->nilai_d);
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo round($recall,4); ?></td>
          <td><?php echo round($precision,4); ?></td>
          <td><?php echo round($accuracy,4); ?></td>
          <td><?php echo round($error_rate,4); ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>    

