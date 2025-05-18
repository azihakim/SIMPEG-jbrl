@extends('master')
@section('title', 'Form Karyawan')
@section('content')
	<div class="card card-primary">
		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif

		<div class="card-header">
			<h3 class="card-title">Form Edit Karyawan</h3>
		</div>
		<div class="card-body">
			<form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
				@method('PUT')
				@csrf
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nama</label>
							<input value="{{ $karyawan->user->name }}" type="text" class="form-control" name="nama"
								placeholder="Masukkan Nama">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Alamat</label>
							<input value="{{ $karyawan->user->alamat }}" type="text" class="form-control" name="alamat"
								placeholder="Masukkan Alamat">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Username</label>
							<input value="{{ $karyawan->user->username }}" type="text" class="form-control" name="username"
								placeholder="Masukkan Username">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>NIK</label>
							<input value="{{ $karyawan->nik }}" type="text" class="form-control" name="nik" placeholder="Masukkan NIK"
								maxlength="16">
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Masukkan password">
							<p class="text-danger">kosongkan jika tidak mengubah password!</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Tanggal Masuk Kerja</label>
							<div class="input-group date" id="reservationdate1" data-target-input="nearest">
								<input value="{{ $karyawan->tgl_masuk }}" required type="date" name="tgl_masuk" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Telepon</label>
							<input value="{{ $karyawan->user->telepon }}" type="text" class="form-control" name="telepon"
								placeholder="Masukkan Telepon">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Pendidikan Terakhir</label>
							<input value="{{ $karyawan->pendidikan_terakhir }}" type="text" class="form-control" name="pendidikan_terakhir"
								placeholder="Masukkan Pendidikan Terakhir">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Agama</label>
							<input value="{{ $karyawan->agama }}" type="text" class="form-control" name="agama"
								placeholder="Masukkan Agama">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Jabatan</label>
							<select id="pilihan_jabatan" name="jabatan" class="form-control select2 select2-hidden-accessible"
								style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
								<option value="{{ $karyawan->jabatan }}">{{ $karyawan->jabatan }}</option>
								<option value="Dewan Direksi">Dewan Direksi</option>
								<option value="Kabag.AKU">Kabag.AKU</option>
								<option value="Kabag. Pengadaan">Kabag. Pengadaan</option>
								<option value="Kabag. SDM & Umum">Kabag. SDM & Umum</option>
								<option value="Kabag. SPI">Kabag. SPI</option>
								<option value="Kabag. Tanaman">Kabag. Tanaman</option>
								<option value="Kabag. Teknik">Kabag. Teknik</option>
								<option value="Kabag. Renbang">Kabag. Renbang</option>
								<option value="Adm. PIN">Adm. PIN</option>
								<option value="Adm. RL">Adm. RL</option>
								<option value="Adm. PPL">Adm. PPL</option>
								<option value="Adm. Muba">Adm. Muba</option>
								<option value="Adm. S.Aji">Adm. S.Aji</option>
								<option value="Adm. UPUL">Adm. UPUL</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
								data-select2-id="2" tabindex="-1" aria-hidden="true">
								<option value="{{ $karyawan->jenis_kelamin }}">{{ $karyawan->jenis_kelamin }}</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Gaji Pokok</label>
							<input type="text" class="form-control" name="gaji_pokok" placeholder="Masukkan Gaji Pokok"
								value="{{ $karyawan->gaji_pokok }}">
						</div>
					</div>
				</div>

				<input type="hidden" value="{{ $karyawan->status }}" name="status">
				<button type="submit" class="btn btn-lg btn-primary float-right">Simpan</button>
			</form>
		</div>
	</div>
@endsection
