<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets');?>/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/toastr/toastr.min.css">
  <!-- Theme style -->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/vendor');?>/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- JS -->
  <!-- jQuery -->
  <script src="<?=base_url('assets/vendor');?>/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?=base_url('assets/vendor');?>/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?=base_url('assets/vendor');?>/toastr/toastr.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <?=$this->session->flashdata('notif');?>
  <?=$contents;?>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; <?=date('Y');?> <?=$site['nama_aplikasi'];?>.</strong> All rights
    reserved. | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/vendor');?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/vendor');?>/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url('assets/vendor');?>/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/vendor');?>/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets');?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets');?>/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    $('.select2').select2();

  });
</script>
</body>
</html>
