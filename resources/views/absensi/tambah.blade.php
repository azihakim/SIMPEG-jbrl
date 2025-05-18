@extends('master')
@section('title', 'Form Absensi')
@section('content')
    <div class="card card-primary">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Form Tambah Karyawan</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Masuk Kerja</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required type="date" name="tgl_pengiriman" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" name="telepon" placeholder="Masukkan Telepon">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" class="form-control" name="agama" placeholder="Masukkan Agama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select id="pilihan_divisi" name="jabatan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option></option>
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
                            <select name="jenis_kelamin" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option></option>
                            </select>    
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan">
                        </div>
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-lg btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
@endsection
