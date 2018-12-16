  <?php  // =================================PENILAIAN======================================= // ?>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="rangking">
      <br/>
      <b>Penilaian</b>
      <div style="overflow-x: auto">
        <table width="100%" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th rowspan="2" style="vertical-align: middle" class="text-center" width="5%">No</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">NIP</th>
              <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Alternatif</th>
              <th colspan="<?php echo count($list_kriteria); ?>" class="text-center"> Kriteria</th>
            </tr>
            <tr>
            <?php $no=0; foreach ($list_kriteria as $key) { 
                $c[$key->id_kriteria]=0;
              $no++;?>
                <th><?php echo 'K'.$no; ?></th>
            <?php } ?>
            </tr>
          </thead>
          <tbody>
              <?php $no=0; foreach ($list_karyawan as $karyawan) { $no++;?>
              <tr>
                <th><?php echo $no; ?></th>
                <th><?php echo $karyawan->nik ?></th>
                <th><?php echo 'A'.$no; ?></th>
                <?php
                foreach ($list_kriteria as $kriteria) { 
                $nilai_kriteria = get_nilai_kriteria($kriteria->id_kriteria,$karyawan->id_karyawan);
                $nilai_kriteria_kuadrat = $nilai_kriteria*$nilai_kriteria;

                 ?>
                <td><?php echo $nilai_kriteria;
                $c[$kriteria->id_kriteria] += $nilai_kriteria_kuadrat; ?></td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>




    <?php  // =================================PEMBAGI======================================= // ?>
    <hr>
    <b> Pembagi</b>
    <table width="100%" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="vertical-align: middle" class="text-center" ></th>
          <th colspan="<?php echo count($list_kriteria); ?>" class="text-center">Kriteria</th>
        </tr>
        <tr>
          <?php foreach ($list_kriteria as $key) {?>
            <th><?php echo $key->kode_kriteria; ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><b>Pembagi</b></th>
          <?php
          foreach ($list_kriteria as $kriteria) { 
           ?>
          <td>
            <?php  $result_pembagi[$kriteria->id_kriteria] = sqrt($c[$kriteria->id_kriteria]);
            echo round($result_pembagi[$kriteria->id_kriteria],4); ?>
          </td>
          <?php } ?>
        </tr>
      </tbody>
    </table>


    <?php  // =================================MATRIKS TERNORMALISASI======================================= // ?>
    <hr>
    <b>Matriks Ternormalisasi</b>
    <table width="100%" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="vertical-align: middle" class="text-center" width="5%">No</th>
          <th rowspan="2" style="vertical-align: middle" class="text-center">NIP</th>
          <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Alternatif</th>
          <th colspan="<?php echo count($list_kriteria); ?>" class="text-center">Kriteria</th>
        </tr>
        <tr>
          <?php foreach ($list_kriteria as $key) {?>
            <th><?php echo $key->kode_kriteria; ?></th>
          <?php } ?>
        </tr>
      </thead>

      <tbody>
        <?php $no=0; foreach ($list_karyawan as $karyawan) { $no++;?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $karyawan->nik; ?></td>
          <td><?php echo 'A'.$no; ?></td>
          <?php
          $id_karyawan= $karyawan->id_karyawan;
          foreach ($list_kriteria as $kriteria) { 
            $id_kriteria= $kriteria->id_kriteria;
            $nilai_kriteria = get_nilai_kriteria($kriteria->id_kriteria,$karyawan->id_karyawan);
            ?>
            <td>
              <?php 
              if(empty($result_pembagi[$id_kriteria])){
                $nilai_matriks[$id_kriteria][$id_karyawan] = 0;
              }else{
                $nilai_matriks[$id_kriteria][$id_karyawan] = $nilai_kriteria/$result_pembagi[$id_kriteria];
              }  ?><br>
              <?php  echo round($nilai_matriks[$id_kriteria][$id_karyawan],4); ?>
            </td>
          <?php } ?>
        </tr>
        <?php } ?>
      </tbody>
    </table>


    <?php  // =========================MATRIKS BOBOT TERNORMALISASI================================ // ?>
    <hr>
    <b>Matriks Bobot Ternormalisasi</b>
    <table width="100%" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2" style="vertical-align: middle" class="text-center" width="5%">No</th>
          <th rowspan="2" style="vertical-align: middle" class="text-center">NIP</th>
          <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Alternatif</th>
          <th colspan="<?php echo count($list_kriteria); ?>" class="text-center">Kriteria</th>
        </tr>
        <tr>
          <?php foreach ($list_kriteria as $key) {?>
            <th><?php echo $key->kode_kriteria; ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($list_karyawan as $karyawan) { $no++;?>
          <tr>
            <th><?php echo $no; ?></th>
            <th><?php echo $karyawan->nik; ?></th>
            <th><?php echo 'A'.$no; ?></th>
            <?php
            $id_karyawan= $karyawan->id_karyawan;
            foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $nilai_per_kriteria = get_nilai_per_kriteria($id_kriteria,$id_karyawan);
              ?>
              <td>
                <?php  $bobot_ternormalisasi[$id_kriteria][$id_karyawan] = $nilai_matriks[$id_kriteria][$id_karyawan]*$kriteria->bobot_akhir;
                echo round($bobot_ternormalisasi[$id_kriteria][$id_karyawan],4); ?>
              </td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    

    <?php  // ====================SOLUSI IDEAL +/- ============================ // ?>
    <hr>
    <b>Solusi Ideal Positif dan Solusi Ideal Negatif</b>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th></th>
          <?php   foreach ($list_kriteria as $key) { ?>
          <th><?php echo $key->kode_kriteria;?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>A+</b></td>
          <?php foreach ($list_kriteria as $kriteria) { 
            $id_kriteria= $kriteria->id_kriteria;
            $aplus[$id_kriteria] = max($bobot_ternormalisasi[$id_kriteria]);
            echo "<td>".round($aplus[$id_kriteria],4)."</td>";
          } ?>
        </tr>
        <tr>
          <td><b>A-</b></td>
          <?php foreach ($list_kriteria as $kriteria) { 
            $id_kriteria= $kriteria->id_kriteria;
            $amin[$id_kriteria] = min($bobot_ternormalisasi[$id_kriteria]);
            echo "<td>".round($amin[$id_kriteria],4)."</td>";
          } ?>
        </tr>
      </tbody>
    </table>


    <?php  // ======================JARAK SOLUSI IDEAL +/- ========================== // ?>
    <hr>
    <b>Jarak Solusi Ideal Positif dan Jarak Solusi Ideal Negatif</b></br>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th>NIP</th>
          <th>Alternatif</th>
          <th>D+</th>
          <th>D-</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; 
        foreach ($list_karyawan as $karyawan) { $no++;
        $id_karyawan= $karyawan->id_karyawan;
        $dplus[$id_karyawan]=0;
        $dmin[$id_karyawan]=0; ?>
        <tr>
          <td><b><?php echo $karyawan->nik;?></b></td>
          <th><?php echo 'A'.$no; ?></th>

          <?php foreach ($list_kriteria as $kriteria) { 
          $id_kriteria= $kriteria->id_kriteria;
          $dplus[$id_karyawan]+=pow($aplus[$id_kriteria]-$bobot_ternormalisasi[$id_kriteria][$id_karyawan],2);
          }
          $dplus[$id_karyawan] = sqrt($dplus[$id_karyawan]);
          echo "<td>".round($dplus[$id_karyawan],4)."</td>";

          foreach ($list_kriteria as $kriteria) { 
          $id_kriteria= $kriteria->id_kriteria;
          $dmin[$id_karyawan]+=pow($amin[$id_kriteria]-$bobot_ternormalisasi[$id_kriteria][$id_karyawan],2);
          }
          $dmin[$id_karyawan] = sqrt($dmin[$id_karyawan]);
          echo "<td>".round($dmin[$id_karyawan],4)."</td>";
          if($dplus[$id_karyawan]){
          $nilai_pref[$id_karyawan] = $dmin[$id_karyawan]/($dmin[$id_karyawan]+$dplus[$id_karyawan]);
          }else{
          $nilai_pref[$id_karyawan] = $dmin[$id_karyawan]/($dmin[$id_karyawan]+1);
          }
          echo "</tr>";
        } ?>
      </tbody>
    </table>


    <?php  // =================================NILAI PREFERENSI ======================================= // ?>
    <hr><b>Nilai Preferensi</b></br>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th>NIP</th>
          <th>Alternatif</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; 
        foreach ($list_karyawan as $karyawan) { $no++;
        $id_karyawan= $karyawan->id_karyawan; ?>
        <tr>
          <td><b><?php echo $karyawan->nik;?></b></td>
          <th><?php echo 'A'.$no; ?></th>
          <td><?php echo round($nilai_pref[$id_karyawan],4);?></td>
        </tr>
        <?php 
          if($aspek){
            $colom = 'nilai_preferensi_'.$aspek;
            update_nilai_preferensi($id_karyawan, $colom, $nilai_pref[$id_karyawan]);
          }
        } ?>
      </tbody>
    </table>
    <hr> 