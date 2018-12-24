<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK PENETAPAN KENAIKAN GOLONGAN</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
  </head>
  <body>
  
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">SPK</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if(!empty($user)){ ?>
      <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url();?>">Home</a></li>
      <?php if($user->level=='admin'){ ?>
      <li><a href="<?php echo base_url();?>karyawan"> Karyawan</a></li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Kriteria </a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo base_url();?>kriteria"> Data Kriteria</a></li>
        <li><a href="<?php echo base_url();?>kriteria/sub_kriteria">Data Sub Kriteria</a></li>
        </ul>
      </li>
      <?php } ?>
  
      <?php if($user->level=='pdm' or $user->level=='direksi'){ ?>
      <li><a href="<?php echo base_url();?>penilaian">Penilaian</a></li>
      <?php } ?>
      <li><a href="<?php echo base_url();?>perhitungan/smart">Perhitungan Smarter</a></li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Perhitungan Topsis </a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo base_url();?>perhitungan/topsis?aspek=kemuhammadiyahan&type=1">Kemuhammadiyahan</a></li>
        <li><a href="<?php echo base_url();?>perhitungan/topsis?aspek=kinerja&type=1">Kinerja</a></li>
        </ul>
      </li>

      <li><a href="<?php echo base_url();?>perhitungan/borda?type=1">Perhitungan Borda</a></li>


      <li><a href="<?php echo base_url();?>akurasi">Check Akurasi</a></li>

      <?php if($user->level=='admin'){ ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Lainnya </a>
        <ul class="dropdown-menu">
        <li><a href="#"  onclick="alert('Under Development')"> Data Golongan</a></li>
        <li><a href="#"  onclick="alert('Under Development')">Data Users</a></li>
        </ul>
      </li>
    <?php } ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $user->username; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <!-- <li><a href="<?php echo base_url();?>pages/profil">Profil</a></li> -->
        <li role="separator" class="divider"></li>
        <li><a href="<?php echo base_url();?>pages/logout">Logout</a></li>
        </ul>
      </li>
      </ul>
    <?php } ?>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  
    <div class="container">