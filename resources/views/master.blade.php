<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PT PMO</title>

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

<body class="hold-transition sidebar-mini">

	<div class="wrapper">

		<!-- Navbar -->
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			{{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> --}}

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i
							class="far fa-user"></i>&nbsp;&nbsp;<strong>{{ str_replace(['manajer', 'admin'], ['direktur', 'kabag. SPI'], Auth::user()->name) }}
							- {{ str_replace(['manajer', 'admin'], ['direktur', 'kabag. SPI'], Auth::user()->role) }}</strong>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						{{-- <a href="{{ url('login') }}" class="dropdown-item">
            <i class="fas fa-exit mr-2"></i>LogOut
          </a> --}}
						<form method="POST" action="{{ route('logout') }}">
							@csrf

							<x-dropdown-link class="dropdown-item" :href="route('logout')"
								onclick="event.preventDefault();
                                    this.closest('form').submit();">
								{{ __('Log Out') }}
							</x-dropdown-link>
						</form>
					</div>
				</li>

			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- /.navbar -->

		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			@if (auth()->user()->role == 'pelamar')
				<a href="{{ url('/pengajuan') }}" class="brand-link">
					<img src="{{ asset('vendors/dist/img/123.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light">PT PMO</span>
				</a>
			@elseif(auth()->user()->role == 'karyawan')
				<a href="{{ url('/karyawanlogin') }}" class="brand-link">
					<img src="{{ asset('vendors/dist/img/123.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light">PT PMO</span>
				</a>
			@else
				<a href="{{ url('/admin') }}" class="brand-link">
					<img src="{{ asset('vendors/dist/img/123.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light">PT PMO</span>
				</a>
			@endif

			<div class="sidebar">

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						{{-- <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li> --}}
						@if (auth()->user()->role == 'pelamar')
							<li class="nav-item">
								<a href="{{ url('pengajuan') }}" class="nav-link">
									<i class="nav-icon fas fa-user-plus"></i>
									<p>Pengajuan Kerja</p>
								</a>
							</li>
						@endif
						@if (auth()->user()->role == 'admin')
							<li class="nav-item">
								<a href="{{ url('recruitment') }}" class="nav-link">
									<i class="nav-icon fas fa-user-plus"></i>
									<p>Recruitment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('karyawan') }}" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>Karyawan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('absensi') }}" class="nav-link">
									<i class="nav-icon far fa-calendar-alt"></i>
									<p>Absensi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('cutiizin') }}" class="nav-link">
									<i class="nav-icon fas fa-exclamation-triangle"></i>
									<p>Pengajuan Cuti/Izin</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('reward-punishment') }}" class="nav-link">
									<i class="nav-icon fas fa-star"></i>
									<p>Reward and Punishment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('penugasan') }}" class="nav-link">
									<i class="nav-icon fas fa-edit"></i>
									<p>Penugasan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('promosi') }}" class="nav-link">
									<i class="nav-icon fas fa-bullhorn"></i>
									<p>Promosi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('phk') }}" class="nav-link">
									<i class="nav-icon fas fa-user-minus"></i>
									<p>PHK</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('gaji.index') }}" class="nav-link">
									<i class="nav-icon fas fa-credit-card"></i>
									<p>Gaji</p>
								</a>
							</li>
						@endif
						@if (auth()->user()->role == 'manajer')
							<li class="nav-item">
								<a href="{{ url('recruitment') }}" class="nav-link">
									<i class="nav-icon fas fa-user-plus"></i>
									<p>Recruitment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('karyawan') }}" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>Karyawan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('absensi') }}" class="nav-link">
									<i class="nav-icon far fa-calendar-alt"></i>
									<p>Absensi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('cutiizin') }}" class="nav-link">
									<i class="nav-icon fas fa-exclamation-triangle"></i>
									<p>Pengajuan Cuti/Izin</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('reward-punishment') }}" class="nav-link">
									<i class="nav-icon fas fa-star"></i>
									<p>Reward and Punishment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('promosi') }}" class="nav-link">
									<i class="nav-icon fas fa-bullhorn"></i>
									<p>Promosi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('phk') }}" class="nav-link">
									<i class="nav-icon fas fa-user-minus"></i>
									<p>PHK</p>
								</a>
							</li>
						@endif
						@if (auth()->user()->role == 'karyawan')
							<li class="nav-item">
								<a href="{{ url('absensi') }}" class="nav-link">
									<i class="nav-icon far fa-calendar-alt"></i>
									<p>Absensi</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('cutiizin') }}" class="nav-link">
									<i class="nav-icon fas fa-exclamation-triangle"></i>
									<p>Pengajuan Cuti/Izin</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('reward-punishment') }}" class="nav-link">
									<i class="nav-icon fas fa-star"></i>
									<p>Reward and Punishment</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('penugasan') }}" class="nav-link">
									<i class="nav-icon fas fa-edit"></i>
									<p>Penugasan</p>
								</a>
							</li>
						@endif

						{{-- @endif --}}

						<li class="nav-item">
							{{-- <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="nav-link">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form> --}}
						</li>
					</ul>
				</nav>

			</div>

		</aside>

		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							{{-- <h1>@yield('title') {{ auth()->user()->role }}</h1> --}}
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								{{-- <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li> --}}
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="content">

				@yield('content')

			</section>

		</div>

		{{-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> --}}

		<aside class="control-sidebar control-sidebar-dark">

		</aside>

	</div>

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

	@yield('scripts')
	{{-- <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('vendors/dist/js/demo.js') }}"></script> --}}
</body>

</html>
