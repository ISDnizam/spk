  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="rangking">
      <br/>
      <b>Penilaian</b>
      <div style="overflow-x: auto">
        <table width="100%" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th rowspan="2" style="vertical-align: middle" class="text-center" width="5%">#</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">NIP</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Alternatif</th>
              <th colspan="<?php echo count($list_kriteria); ?>" class="text-center"> Rangking</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Poin Borda</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Nilai Borda</th>

            </tr>
            <tr>
            <?php $no=0; 
            for($n=1;$n<=10;$n++){ ?>
                <th><?php echo $n; ?></th>
            <?php } ?>

            </tr>
          </thead>
          <tbody>
              <?php $no=0; foreach ($list_preferensi_kemuhammadiyahan as $karyawan) { $no++;?>
              <tr>
                <th><?php echo $no; ?></th>
                <th><?php echo $karyawan->nik ?></th>
                <th><?php echo 'A'.$no; ?></th>
                <?php
                for($n=1;$n<=10;$n++){ ?>
                <td> <?php 
                if($n==$no){ 
                  echo $karyawan->nilai_preferensi_kemuhammadiyahan; 
                }else{ 
                  echo 0; 
                }
                $bobot_rangking =10-$n;
                $poin_borda[$no] =  $karyawan->nilai_preferensi_kemuhammadiyahan*$bobot_rangking;?></td>
                <?php } ?>
                </td>
              </tr>
            <?php } ?>

              <?php $no=10; foreach ($list_preferensi_kinerja as $karyawan) { $no++;?>
              <tr>
                <th><?php echo $no; ?></th>
                <th><?php echo $karyawan->nik ?></th>
                <th><?php echo 'A'.$no; ?></th>
                <?php
                for($n=1;$n<=10;$n++){ ?>
                <td><?php echo $karyawan->nilai_preferensi_kinerja;?></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>


