 <?php $this->load->view('admin/general/top_scr')?>
 <body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
      <?php 
      $this->load->view('admin/general/navigation',$active,$hak)?>
      <div class="main-panel">
        <!-- Navbar -->
        <?php $this->load->view('admin/general/panel',$active)?>
        <?php echo $this->notification->display(); ?>
        <?php $this->load->view($content)?>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assets/admin/js/core/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/core/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/core/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/admin/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/admin/js/plugins/chartjs.min.js')?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('assets/admin/js/plugins/bootstrap-notify.js')?>"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url('assets/admin/js/paper-dashboard.min.js?v=2.0.0')?>" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url('assets/admin/demo/demo.js')?>"></script>
    <script>
      $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
      function hidden_sweet() {
		//document.getElementById("sweet_success").remove();
		document.getElementById("sweet_success").remove();
	};

	jQuery(window).keypress(function (e) {
		if (e.which === 13 || e.which === 27) {
			jQuery("#event_sweet").click();
		}
	});
</script>

</body>