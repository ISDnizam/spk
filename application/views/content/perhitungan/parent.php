  
    <div id="container" class="container">
        <h3><?php echo $title;?></h3>

  <div>
  
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Laporan Perangkingan</a></li>
      <li role="presentation" style="cursor: pointer;"><a onclick="window.print()" role="tab">Cetak Laporan</a></li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="rangking">
        <br/>

        <b>Penilaian</b>
        <div style="overflow-x: auto">
       <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: middle" class="text-center" width="5%">No</th>
                    <th rowspan="2" style="vertical-align: middle" class="text-center"  width="5%">Alternatif</th>
                    <th colspan="<?php echo count($list_sub_kriteria); ?>" class="text-center">Sub Kriteria</th>
                </tr>
                <tr>
            <?php $no=0; foreach ($list_sub_kriteria as $key) { $no++;?>
                <th><?php echo 'SK'.$no; ?></th>
                <?php } ?>
                </tr>
            </thead>
    
            <tbody>
            <?php $no=0; foreach ($list_karyawan as $karyawan) { $no++;?>
                <tr>
                    <th><?php echo $no; ?></th>
                    <th><?php echo 'A'.$no; ?></th>
                    <?php
                     foreach ($list_sub_kriteria as $kriteria) { 
                     $nilai_per_subkriteria = get_nilai_per_sub_kriteria($kriteria->id_sub_kriteria,$karyawan->id_karyawan);
                      ?>
                      <td>
                      <?php echo $nilai_per_subkriteria->jumlah_nilai; ?>
                      </td>
                    <?php } ?>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
  <hr>
  <b>Matriks Nilai Kriteria</b>
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
                <th><?php echo $key->nama_kriteria; ?></th>
                <?php } ?>
                </tr>
            </thead>
    
            <tbody>
            <?php $no=0; 
            for($i=1;$i<=count($list_kriteria);$i++){
            $pembagi[$i]=0;
            }; 
            foreach ($list_karyawan as $karyawan) { $no++; ?>
                <tr>
                    <th><?php echo $no; ?></th>
                    <th><?php echo $karyawan->nik; ?></th>
                    <th><?php echo 'A'.$no; ?></th>
                    <?php  foreach ($list_kriteria as $kriteria) { 
                     $nilai_per_kriteria = get_nilai_per_kriteria($kriteria->id_kriteria,$karyawan->id_karyawan);
                     $nilai_per_kriteria_kuadrat = $nilai_per_kriteria*$nilai_per_kriteria;
                    ?>
                      <td>
                      <?php  echo $nilai_per_kriteria;  ?>
                      </td>
                    <?php $pembagi[$kriteria->id_kriteria] +=$nilai_per_kriteria_kuadrat;  }   ?>
                </tr>
            <?php } ?>
    
        </table>
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
                <th><?php echo $key->nama_kriteria; ?></th>
                <?php } ?>
                </tr>
            </thead>
    
            <tbody>
                <tr>
                    <th><b>Pembagi</b></th>
                    <?php
                     foreach ($list_kriteria as $kriteria) { 
                     $nilai_per_kriteria = get_pembagi($kriteria->id_kriteria);
                       $nilai_per_kriteria_kuadrat = $nilai_per_kriteria*$nilai_per_kriteria;
                      ?>
                      <td>
                      <?php  $result_pembagi[$kriteria->id_kriteria] = round(sqrt($pembagi[$kriteria->id_kriteria]),3);
                      echo $result_pembagi[$kriteria->id_kriteria]; ?>
                      </td>
                    <?php } ?>
                </tr>
    
        </table>
     

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
                      <?php 
                      if(empty($result_pembagi[$id_kriteria])){
                      $nilai_matriks[$id_kriteria][$id_karyawan] = 0;
                      }else{
                      $nilai_matriks[$id_kriteria][$id_karyawan] = $nilai_per_kriteria/$result_pembagi[$id_kriteria];
                      }  ?><br>
                      <?php  echo round($nilai_matriks[$id_kriteria][$id_karyawan],3); ?>
                      </td>
                    <?php } ?>
                </tr>
            <?php } ?>
    
        </table>


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
                      <?php  $bobot_ternormalisasi[$id_kriteria][$id_karyawan] = $nilai_matriks[$id_kriteria][$id_karyawan]*$kriteria->prioritas;
                       echo round($bobot_ternormalisasi[$id_kriteria][$id_karyawan],3); ?>
                      </td>
                    <?php } ?>
                </tr>
            <?php } ?>
    
        </table>
        <hr>
        <b>Solusi Ideal Positif dan Solusi Ideal Negatif</b>
         <table class='table table-striped table-bordered table-hover'>
          <thead><tr><th></th>
         <?php   foreach ($list_kriteria as $key) { 
              echo "<th>".$key->kode_kriteria."</th>";
            }
          echo "</tr></thead>";
          echo "<tr><td><b>A+</b></td>";
             foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $aplus[$id_kriteria] = max($bobot_ternormalisasi[$id_kriteria]);
              echo "<td>".round($aplus[$id_kriteria],3)."</td>";
            }
          echo "</tr>";
          echo "<tr><td><b>A-</b></td>";
             foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $amin[$id_kriteria] = min($bobot_ternormalisasi[$id_kriteria]);
              echo "<td>".round($amin[$id_kriteria],3)."</td>";
            }
          echo "</tr>";
          echo "</table><hr>"; ?>

   <?php  echo "<b>Jarak Solusi Ideal Positif dan Jarak Solusi Ideal Negatif</b></br>";
          echo "<table class='table table-striped table-bordered table-hover'>";
          echo "<thead><tr><th>Alternatif</th><th>D+</th><th>D-</th></tr></thead>";
          $no=0; 
              
          foreach ($list_karyawan as $karyawan) { $no++;
            $dplus[1]=0;
            $dplus[2]=0;
            $dplus[3]=0;
            $dplus[4]=0;
            $dplus[5]=0;
            $dplus[6]=0;
            $dplus[7]=0;
            $dplus[8]=0;
            $dplus[9]=0;
            $dplus[10]=0;        

            $dmin[1]=0;
            $dmin[2]=0;
            $dmin[3]=0;
            $dmin[4]=0;
            $dmin[5]=0;
            $dmin[6]=0;
            $dmin[7]=0;
            $dmin[8]=0;
            $dmin[9]=0;
            $dmin[10]=0;
            $id_karyawan= $karyawan->id_karyawan;
            echo "<tr><td><b>".$karyawan->nik."</b></td>";
           
            foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $dplus[$id_karyawan]+=$aplus[$id_kriteria]-$bobot_ternormalisasi[$id_kriteria][$id_karyawan];

            }
            $dplus[$id_karyawan] = round(sqrt($dplus[$id_karyawan]),3);
            echo "<td>".$dplus[$id_karyawan]."</td>";
           

            foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $dmin[$id_karyawan]+=$amin[$id_kriteria]-$bobot_ternormalisasi[$id_kriteria][$id_karyawan];

            }
            $dmin[$id_karyawan] = round($dmin[$id_karyawan],3);
            echo "<td>".$dmin[$id_karyawan]."</td>";
            echo "</tr>";
          }
          echo "</table><hr>"; ?> 


            <?php  echo "<b>Nilai Preferensi</b></br>";
          echo "<table class='table table-striped table-bordered table-hover'>";
          echo "<thead><tr><th>Alternatif</th><th>Nilai</th></tr></thead>";
          $no=0; 
              
          foreach ($list_karyawan as $karyawan) { $no++;
            $dplus[1]=0;
            $dplus[2]=0;
            $dplus[3]=0;
            $dplus[4]=0;
            $dplus[5]=0;
            $dplus[6]=0;
            $dplus[7]=0;
            $dplus[8]=0;
            $dplus[9]=0;
            $dplus[10]=0;        


            $dmin[1]=0;
            $dmin[2]=0;
            $dmin[3]=0;
            $dmin[4]=0;
            $dmin[5]=0;
            $dmin[6]=0;
            $dmin[7]=0;
            $dmin[8]=0;
            $dmin[9]=0;
            $dmin[10]=0;

            $nilai_pref[1]=0;
            $nilai_pref[2]=0;
            $nilai_pref[3]=0;
            $nilai_pref[4]=0;
            $nilai_pref[5]=0;
            $nilai_pref[6]=0;
            $nilai_pref[7]=0;
            $nilai_pref[8]=0;
            $nilai_pref[9]=0;
            $nilai_pref[10]=0;
            $id_karyawan= $karyawan->id_karyawan;
            echo "<tr><td><b>".$karyawan->nik."</b></td>";
           
            foreach ($list_kriteria as $kriteria) { 
              $id_kriteria= $kriteria->id_kriteria;
              $nilai_pref[$id_karyawan]=$dmin[$id_karyawan];
            }
            echo "<td>".$nilai_pref[$id_karyawan]."</td>";
           
            echo "</tr>";
          }
          echo "</table><hr>"; ?> 