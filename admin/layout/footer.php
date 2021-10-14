 <!-- Main Footer -->
 <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="#">MarsComputerPbg</a>.</strong>
 </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.js"></script>
<!-- ckEditor-->
<script src="assets/ckeditor/ckeditor.js"></script>
  <!-- PAGE PLUGINS -->
 
  <!-- ChartJS -->
  <script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/plugins/js/select2/select2.full.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="assets/dist/js/pages/dashboard2.js"></script>
  <!--daterange picker -->
  <script src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--datepicker-->
<script src="assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Search Option -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,  "pageLength": 5,
       
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "pageLength": 5,
        
      });
    });
  </script>
  <script>
  $('#datepicker').datepicker({
  autoclose: true,
  format: 'dd/mm/yyyy',
}).datepicker("setDate", new Date());

$('.datepickerDouble').datepicker({
  autoclose: true,
  format: 'yyyy/mm/dd',
});
</script>

</body>

</html>
