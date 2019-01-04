<?php 
$uri1= $this->uri->segment(1);
$uri2= $this->uri->segment(2);
?>
<footer class="text-center">SPK PENETAPAN KENAIKAN GOLONGAN KARYAWAN &copy; 2018</footer>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#tabeldata').DataTable();
    });
</script>
  </body>
</html>