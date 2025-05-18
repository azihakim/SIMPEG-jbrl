@extends('master')
@section('title', 'Form Gaji')
@section('content')
	<div class="card card-primary">
		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif

		<div class="card-header">
			<h3 class="card-title">Form Gaji</h3>
		</div>
		<div class="card-body">
			<form action="{{ route('gaji.store') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Karyawan</label>
							<select id="pilihan_karyawan" name="karyawan" class="form-control select2" style="width: 100%;">
								<option disabled selected>Pilih Karyawan</option>
								@foreach ($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }} - {{ $user->karyawan->jabatan }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Bonus</label>
							<input type="text" class="form-control" id="bonus" name="bonus" placeholder="Bonus Karyawan" readonly>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Potongan</label>
							<input type="text" class="form-control" id="potongan" name="potongan" placeholder="Potongan Gaji Karyawan"
								readonly>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Gaji Pokok</label>
							<input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji Pokok Karyawan"
								readonly>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Total Gaji Yang Di Dapatkan</label>
							<input type="text" class="form-control" name="total_gaji" id="total_gaji" placeholder="Total Gaji Karyawan"
								required readonly>
						</div>
					</div>
				</div>

				<div class="row mt-4" id="detail_rp" style="display: none;">
					<div class="col-md-6">
						<h5>Rincian Bonus</h5>
						<table class="table table-bordered" id="table_bonus">
							<thead class="thead-light">
								<tr>
									<th>No</th>
									<th>Keterangan</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<!-- Diisi oleh JavaScript -->
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<h5>Rincian Potongan</h5>
						<table class="table table-bordered" id="table_potongan">
							<thead class="thead-light">
								<tr>
									<th>No</th>
									<th>Keterangan</th>
									<th>Jumlah</th>
								</tr>
							</thead>
							<tbody>
								<!-- Diisi oleh JavaScript -->
							</tbody>
						</table>
					</div>
				</div>

				<div id="slipGaji" class="card mt-4 d-none">
					<div class="card-header bg-info text-white">
						<h4 class="mb-0">Slip Gaji</h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tr>
								<th>Nama Karyawan</th>
								<td id="slip_nama"></td>
							</tr>
							<tr>
								<th>Jabatan</th>
								<td id="slip_jabatan"></td>
							</tr>
							<tr>
								<th>Bulan</th>
								<td id="slip_bulan"></td>
							</tr>
							<tr>
								<th>Gaji Pokok</th>
								<td id="slip_gaji_pokok"></td>
							</tr>
							<tr>
								<th>Total Bonus</th>
								<td id="slip_bonus"></td>
							</tr>
							<tr>
								<th>Total Potongan</th>
								<td id="slip_potongan"></td>
							</tr>
							<tr class="table-success">
								<th>Total Gaji Diterima</th>
								<td id="slip_total_gaji" class="font-weight-bold"></td>
							</tr>
						</table>
					</div>
				</div>


				<div class="col-12 d-flex justify-content-end">
					<button type="submit" class="btn btn-lg btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).ready(function() {
			$('#pilihan_karyawan').on('change', function() {
				var karyawanId = $(this).val();
				var selectedOption = $(this).find('option:selected').text();
				var nama = selectedOption.split(' - ')[0];
				var jabatan = selectedOption.split(' - ')[1];
				var bulanSekarang = new Date().toLocaleString('id-ID', {
					month: 'long'
				});
				var tahunSekarang = new Date().getFullYear();

				if (karyawanId) {
					$.ajax({
						url: '/check-rp',
						type: 'GET',
						data: {
							karyawan_id: karyawanId
						},
						success: function(response) {
							if (response.status === 'ada') {
								function formatIDR(number) {
									return new Intl.NumberFormat('id-ID', {
										style: 'currency',
										currency: 'IDR'
									}).format(number);
								}
								$('#detail_rp').show();
								$('#bonus').val(formatIDR(response.total_bonus));
								$('#potongan').val(formatIDR(response.total_potongan));
								$('#gaji_pokok').val(formatIDR(response.gaji_pokok));

								var totalGaji = parseInt(response.gaji_pokok) + parseInt(response
									.total_bonus) - parseInt(response.total_potongan);
								$('#total_gaji').val(formatIDR(totalGaji));

								// Tampilkan slip
								$('#slip_nama').text(nama);
								$('#slip_jabatan').text(jabatan);
								$('#slip_bulan').text(bulanSekarang + ' ' + tahunSekarang);
								$('#slip_gaji_pokok').text(formatIDR(response.gaji_pokok));
								$('#slip_bonus').text(formatIDR(response.total_bonus));
								$('#slip_potongan').text(formatIDR(response.total_potongan));
								$('#slip_total_gaji').text(formatIDR(totalGaji));
								$('#slipGaji').removeClass('d-none');

								// Bersihkan isi tabel
								$('#table_bonus tbody').empty();
								$('#table_potongan tbody').empty();

								let bonusIndex = 1;
								let potonganIndex = 1;

								// Iterasi data dan isi tabel bonus/potongan
								response.data.forEach(function(item) {
									if (item.bonus && parseInt(item.bonus) > 0) {
										$('#table_bonus tbody').append(`
										<tr>
											<td>${bonusIndex++}</td>
											<td>${item.keterangan}</td>
											<td>${formatIDR(item.bonus)}</td>
										</tr>
									`);
									}
									if (item.potongan_gaji && parseInt(item
											.potongan_gaji) > 0) {
										$('#table_potongan tbody').append(`
										<tr>
											<td>${potonganIndex++}</td>
											<td>${item.keterangan}</td>
											<td>${formatIDR(item.potongan_gaji)}</td>
										</tr>
									`);
									}
								});
							} else {
								$('#bonus').val(0);
								$('#potongan').val(0);
								$('#gaji_pokok').val(0);
								$('#total_gaji').val(0);
								$('#table_bonus tbody').empty();
								$('#table_potongan tbody').empty();
								$('#slipGaji').addClass('d-none');
								// alert(response.message);
							}
						},
						error: function() {
							alert('Terjadi kesalahan saat memeriksa reward dan punishment.');
						}
					});
				}
			});
		});
	</script>

@endsection
