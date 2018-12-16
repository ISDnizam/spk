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
              <th colspan="10" class="text-center"> Rangking</th>
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
              <?php 
              $no=0; foreach ($list_preferensi_kemuhammadiyahan as $karyawan) {
               $no++;?>
              <tr>
                <th><?php echo $no; ?></th>
                <th><?php echo $karyawan->nik ?></th>
                <th><?php  $alternatif =  'A'.$no; echo $alternatif; 
                $jumlah_nilai[$alternatif]=0;
                $total_poin_porda =0;
                ?></th>
                <?php
                for($n=1;$n<=10;$n++){ ?>
                <td> <?php 
                if($n==$no){ 
                  $nilai = $karyawan->nilai_preferensi_kemuhammadiyahan; 
                }else{ 
                  $nilai =0; 
                }
                echo $nilai;
                $bobot_rangking =10-$n;
                $jumlah_nilai[$alternatif] += $nilai; 
                if($n==$no){ 
                $poin_borda[$alternatif] =  $jumlah_nilai[$alternatif]*$bobot_rangking;
                }
                ?></td>
                <?php } ?>
                </td>
                <td><?php echo $poin_borda[$alternatif];
                ?></td>
                <td></td>
              </tr>
            <?php } ?>

              <?php $no=10; foreach ($list_preferensi_kinerja as $karyawan) { $no++;?>
              <tr>
                <th><?php echo $no; ?></th>
                <th><?php echo $karyawan->nik ?></th>
                <th><?php  $alternatif =  'A'.$no; echo $alternatif; 
                $jumlah_nilai[$alternatif]=0;
                ?></th>
                <?php
                for($n=11;$n<=20;$n++){ ?>
                <td> <?php 
                if($n==$no){ 
                  $nilai = $karyawan->nilai_preferensi_kinerja; 
                }else{ 
                  $nilai =0; 
                }
                echo $nilai;
                $bobot_rangking =10-$n;
                $jumlah_nilai[$alternatif] += $nilai; 
                if($n==$no){ 
                $poin_borda[$alternatif] =  $jumlah_nilai[$alternatif]*$bobot_rangking;
                }
                ?></td>
                <?php } ?>
                </td>
                <td><?php echo $poin_borda[$alternatif];?></td>
                <td></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="3"><center><b>Bobot Ranking</b></center></td>
              <?php for($n=1;$n<=10;$n++){ ?>
              <td><?php echo 10-$n;?></td>
              <?php } ?>
              <td><?php echo 0;?></td>
              <td><?php echo 0;?></td>

            </tr>
          </tbody>
        </table>
      </div>


