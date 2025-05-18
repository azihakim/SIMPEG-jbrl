@extends('master')
@section('title', 'Dashboard Promosi')
@section('btn-table', 'print')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(auth()->user()->role == 'karyawan')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    @if($karyawan->status == 'Non-Aktif')
                        <div class="small-box bg-danger">
                    @else
                        <div class="small-box bg-info">
                    @endif
                    <div class="inner">
                        <h3>{{ $karyawan->status }}</h3>

                        <p>Status Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $karyawan->jabatan }}</h3>

                        <p>Jabatan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    </div>
                </div>
            @elseif(auth()->user()->role != 'manajer')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $karyawan }}</h3>

                        <p>Jumlah Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $pelamar }}</h3>

                        <p>Jumlah Pelamar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    </div>
                </div>
            @endif
        <!-- ./col -->
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h1>Selamat Datang</h1>
                </div>
            </div>
        </div>
        
        <div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Visi & Misi Perusahaan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Visi</label>
                        <p>Perusahaan PT. Perkebunan Mitra Ogan menjadi perusahaan dalam bidang agro industri yang handal bertumpu pada produktivitas, kualitas produk dan pelayanan yang prima dengan kemampuan sendiri.</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Visi</label>
                        <p>Menjadi badan usaha dengan kinerja terbaik dalam bidang agribisnis, yang dikelola secara profesional dan inovatif dengan orientasi menjaga mutu hasil produksi Crude Palm Oil (CPO), Palm Kernel (PK) dan karet kering, agar mampu tumbuh dan berkembang untuk bersaing secara global, sehingga memenuhi harapan dan dapat memuaskan pihak-pihak yang berkepentingan (Stakeholders)</p>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection