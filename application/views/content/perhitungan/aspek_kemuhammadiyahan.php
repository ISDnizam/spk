

 <?php  // =================================HITUNG KRITERIA ======================================= // ?>
    <br><br>
    <b>Kemuhammadiyahan (Medis dan Non Medis)</b></br>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th>K</th>
          <th>Kriteria</th>
          <th>SK</th>
          <th>Sub Kriteria</th>
          <th>Prioritas</th>
          <th>Bobot ROC</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; 
            $tt=0;

        foreach ($list_aspek_kemuhammadiyahan_prioritas as $key) { $no++;

        $total_kriteria = get_count_sub_kriteria($key->id_kriteria);

         ?>
        <tr>
          <td><b><?php if($key->prioritas==1){ echo $key->kode_kriteria; }?></b></td>
          <td ><?php if($key->prioritas==1){ echo $key->nama_kriteria; } ?></td>
          <td><?php echo $key->kode_sub_kriteria;?></td>
          <td><?php echo $key->nama_sub_kriteria;?></td>
          <td><?php echo $key->prioritas;?></td>
          <td>
            <?php 
            $total_bobot=0;
            for($i=1;$i<=$total_kriteria;$i++){

              $x[$i][$key->prioritas] =0;
                if($i >= $key->prioritas){

                  if($i==$total_kriteria){
                    $total = 1/$i;
                  }else{
                    $total = 1/$i;
                  }
                  $x[$i][$key->prioritas]+=$total;
                  $total_bobot += $x[$i][$key->prioritas];
                }
            } 
            $bobot_roc[$key->id_sub_kriteria] = round($total_bobot/$total_kriteria,3);
            echo $bobot_roc[$key->id_sub_kriteria];
            // update_roc($key->id_sub_kriteria, $bobot_roc[$key->id_sub_kriteria]);
             ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <hr>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th>Kode Kriteria</th>
          <th>Prioritas</th>
          <th>Bobot ROC</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; 
        foreach ($aspek_kemuhammadiyahan as $key) { $no++;
        $total_kriteria = count($aspek_kemuhammadiyahan);
         ?>
        <tr>
          <td><b><?php echo $key->kode_kriteria;?></b></td>
          <td><?php echo $key->prioritas;?></td>
          <td>
            <?php 
            $total_bobot=0;
            for($i=1;$i<=$total_kriteria;$i++){
              $x[$i][$key->prioritas] =0;
                if($i >= $key->prioritas){
                  if($i==$total_kriteria){
                    $total = 1/$i;
                  }else{
                    $total = 1/$i;
                  }
                  $x[$i][$key->prioritas]+=$total;
                  $total_bobot += $x[$i][$key->prioritas];
                }
            } 
            $bobot_roc[$key->id_kriteria] = round($total_bobot/$total_kriteria,3);
            echo $bobot_roc[$key->id_kriteria];
            // update_roc_kriteria($key->id_kriteria, $bobot_roc[$key->id_kriteria]); 
            ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>






        <hr>
    <b>Nilai Bobot Akhir Aspek Kemuhammadiyahan</b></br>
    <table class='table table-striped table-bordered table-hover'>
      <thead>
        <tr>
          <th>Kode Kriteria</th>
          <th>Prioritas</th>
          <th>Bobot ROC</th>
          <th>Nilai Utility</th>
          <th>W-Bobot</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; 
        foreach ($aspek_kemuhammadiyahan as $key) { $no++;
        $total_kriteria = count($aspek_kemuhammadiyahan);
         ?>
        <tr>
          <td><b><?php echo $key->kode_kriteria;?></b></td>
          <td><?php echo $key->prioritas;?></td>
          <td>
            <?php 
            $total_bobot=0;
            for($i=1;$i<=$total_kriteria;$i++){
              $x[$i][$key->prioritas] =0;
                if($i >= $key->prioritas){
                  if($i==$total_kriteria){
                    $total = 1/$i;
                  }else{
                    $total = 1/$i;
                  }
                  $x[$i][$key->prioritas]+=$total;
                  $total_bobot += $x[$i][$key->prioritas];
                }
            } 
            $bobot_roc[$key->id_kriteria] = round($total_bobot/$total_kriteria,3);
            echo $bobot_roc[$key->id_kriteria];?>
          </td>
          <td> <?php echo $nilai_utility = get_nilai_utility($key->id_kriteria); ?></td>
          <td><?php $nilai_bobot_kriteria[$key->id_kriteria] = round($nilai_utility*$bobot_roc[$key->id_kriteria],3);
            echo  $nilai_bobot_kriteria[$key->id_kriteria]; 
            update_bobot_akhir($key->id_kriteria, $nilai_bobot_kriteria[$key->id_kriteria]);?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

