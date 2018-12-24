<?php $uri2 = $this->uri->segment(2);?>
<div id="container" class="container">
  <h3><?php echo $title;?></h3>
<div>

<!-- Nav tabs -->

<ul class="nav nav-tabs" role="tablist">
<?php if($uri2=='topsis'){ ?>
  <li  class="<?php if($type==1){ echo 'active'; }?>"><a href="<?php echo base_url();?>perhitungan/topsis?aspek=<?php echo $aspek;?>&type=1">Medis</a></li>
  <li role="presentation" class="<?php if($type==2){ echo 'active'; }?>"><a href="<?php echo base_url();?>perhitungan/topsis?aspek=<?php echo $aspek;?>&type=2">Non Medis</a></li>
<?php }elseif($uri2=='borda'){ ?>
  <li  class="<?php if($type==1){ echo 'active'; }?>"><a href="<?php echo base_url();?>perhitungan/borda?type=1">Medis</a></li>
  <li role="presentation" class="<?php if($type==2){ echo 'active'; }?>"><a href="<?php echo base_url();?>perhitungan/borda?type=2">Non Medis</a></li>
<?php }else{ ?>
  <li role="presentation" class="active"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Perhitungan</a></li>
  <li role="presentation" style="cursor: pointer;"><a onclick="window.print()" role="tab">Cetak</a></li>
<?php } ?>

</ul>

<?php $this->load->view('content/perhitungan/metode_'.$category);?>