<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMPEG</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">

	<link rel="stylesheet"
		href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/bs-stepper/css/bs-stepper.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/plugins/dropzone/min/dropzone.min.css') }}">

	<link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css?v=3.2.0') }}">

	{{-- dataTables --}}
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a class="navbar-brand">
					<span class="brand-text font-weight-light">SBE</span>
				</a>

				<div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<a href="/login" class="btn btn-outline-info">Login</a>
				</div>
			</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"> </h1>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="card card-solid">
						<div class="card-body">
							<div class="row">
								<div class="col-12 col-sm-6">
									<h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
									<div class="col-12">
										<img src="{{ asset('vendors/dist/img/123.jpg') }}" class="product-image" alt="Product Image"
											style="margin-top: 35px">
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<h3 class="my-3">SELAMAT DATANG</h3>
									<div class="form-group">
										<label for="exampleInputEmail1">Visi</label>
										<p>Menjadi perusahaan tambang dan mineral yang terkemuka, sukses dan No.1 di Indonesia, juga menyediakan
											pasokan batu bara yang berkualitas tinggi secara konsisten.
										</p>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Visi</label>
										<p>
											• Secara terus menerus menciptakan lapangan kerja yang layak dan berkualitas.<br>
											• Selalu memastikan pertumbuhan bisnis yang berkelanjutan dan menguntungkan yang memaksimalkan nilai pemegang
											saham.<br>
											• Senantiasa menyediakan solusi-solusi bernilai tambah yang akan mengoptimalkan kepuasan pelanggan.<br>
											• Secara efektif terlibat dalam masyarakat sebagai warga korporat yang baik.
										</p>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->

	<!-- Main Footer -->
	{{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/select2/js/select2.full.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>

	<script src="{{ asset('vendors/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

	<script src="{{ asset('vendors/plugins/dropzone/min/dropzone.min.js') }}"></script>

	<script src="{{ asset('vendors/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

	{{-- <script src="{{ asset('vendors/dist/js/demo.js') }}"></script> --}}

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})

			//Datemask dd/mm/yyyy
			$('#datemask').inputmask('dd/mm/yyyy', {
				'placeholder': 'dd/mm/yyyy'
			})
			//Datemask2 mm/dd/yyyy
			$('#datemask2').inputmask('dd/mm/yyyy', {
				'placeholder': 'dd/mm/yyyy'
			})
			//Money Euro
			$('[data-mask]').inputmask()

			//Date picker
			$('#reservationdate').datetimepicker({
				format: 'L'
			});

			//Date and time picker
			$('#reservationdatetime').datetimepicker({
				icons: {
					time: 'far fa-clock'
				}
			});

			//Date range picker
			$('#reservation').daterangepicker()
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'DD/MM/YYYY hh:mm A'
				}
			})
			//Date range as a button
			$('#daterange-btn').daterangepicker({
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
							'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
						'MMMM D, YYYY'))
				}
			)

			//Timepicker
			$('#timepicker').datetimepicker({
				format: 'LT'
			})

			//Bootstrap Duallistbox
			$('.duallistbox').bootstrapDualListbox()

			//Colorpicker
			$('.my-colorpicker1').colorpicker()
			//color picker with addon
			$('.my-colorpicker2').colorpicker()

			$('.my-colorpicker2').on('colorpickerChange', function(event) {
				$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
			})

			$("input[data-bootstrap-switch]").each(function() {
				$(this).bootstrapSwitch('state', $(this).prop('checked'));
			})

		})
	</script>
	{{-- tablee --}}
	{{-- <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script> --}}
	<!-- Bootstrap 4 -->
	<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	{{-- <script src="{{ asset('vendors/dist/js/demo.js') }}"></script> --}}
	<!-- Page specific script -->
	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				"buttons": ['@yield('btn-table')']
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
</body>

</html>
