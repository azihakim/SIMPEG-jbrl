@extends('master')
@section('title', 'Form Tambah Pengajuan Cuti/Izin')
@section('content')
    <div class="card card-warning">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Form Tambah Pengajuan Cuti/Izin</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('cutiizin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <div class="form-group clearfix">
                                <div class="icheck-warning d-inline">
                                    <input required type="radio" name="keterangan" value="Cuti" id="radioDanger1">
                                    <label for="radioDanger1"> Cuti
                                    </label>
                                </div>
                                &nbsp;&nbsp;
                                <div class="icheck-warning d-inline">
                                    <input type="radio" name="keterangan" value="Izin" id="radioDanger2">
                                    <label for="radioDanger2"> Izin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required type="date" id="dari_tgl" name="dari_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hingga Tanggal</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required type="date" id="hingga_tgl" name="hingga_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Surat</label>
                            <input required name="surat" type="file" class="form-control-file" id="photoInput" name="photo" accept="image/*" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea name="alasan" class="form-control" placeholder="Alasan ..."></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>

@endsection
