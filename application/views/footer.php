
<br>
<br>

<footer class="fixed-bottom bg-white border-top">
<!-- Copyright -->
<div class="text-center" style="margin: 10px;font-size: .8em;">Copyright &copy; 
    <!--<?= pre( $_SERVER ); ?>-->
    <?php echo date("Y"); ?>
    
    <a href="<?= base_url() ?>"> <?= $_SESSION['user']['domain'] ?>. All Rights Reserved </a>
</div>
  <!-- Copyright -->
</footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js';?>"></script>
<script src="<?php echo base_url().'assets/draganddrop.js';?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js';?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url().'assets/plugins/chart.js/Chart.min.js';?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparklines/sparkline.js';?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url().'assets/plugins/jqvmap/jquery.vmap.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jqvmap/maps/jquery.vmap.usa.js';?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url().'assets/plugins/jquery-knob/jquery.knob.min.js';?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url().'assets/plugins/moment/moment.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js';?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url().'assets/plugins/summernote/summernote-bs4.min.js';?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url().'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.js';?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js';?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-buttons/js/dataTables.buttons.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jszip/jszip.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/pdfmake/pdfmake.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/pdfmake/vfs_fonts.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-buttons/js/buttons.html5.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-buttons/js/buttons.print.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables-buttons/js/buttons.colVis.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js'; ?>"></script>
  <script>
     $('ul.float, ul.inline').sortable({
      update: function(evt) {
        console.log(JSON.stringify($(this).sortable('serialize')));
      }
    });
$(function () {
  bsCustomFileInput.init();
});
var base_url = '<?= base_url() ?>';
$('#clusterId').change(function(){
    var request = new XMLHttpRequest();
    var id = $('#clusterId').val();
    // Instantiating the request object
    request.open("GET", base_url+"career-library/get-career-path/"+btoa(id));

    // Defining event listener for readystatechange event
    request.onreadystatechange = function() {
        // Check if the request is compete and was successful
        if(this.readyState === 4 && this.status === 200) {
            // Inserting the response from server into an HTML element
            var data = JSON.parse(this.responseText)
            // console.log(data.result)
            $("#careerPath").html(data.result)
        }
    };
    // Sending the request to the server
    request.send();
});

    $('.btn-image').click(function (){
        $('#myModal').addClass('show')
    })
    
    $('.img-select').click(function (){
        $('#imageId').val($(this).data('id'));
        $('#myModal').removeClass('show')
        $('.modal-backdrop').remove()
        $("#myModal").css("display","");
        $('body').removeClass('modal-open')
    })
    
 $('#background_type').change(function (){
          var type = $(this).val();
          if( type != 1 ){
              $('#background_image').addClass('d-none');
              $('#background_color').removeClass('d-none');
          }
          else{
              $('#background_image').removeClass('d-none');
              $('#background_color').addClass('d-none');
          }
      })
</script>
</body>
</html>
