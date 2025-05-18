@extends('master')
@section('title', 'Form Tambah PHK')
@section('content')
    <div class="card card-primary">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Form Edit Penugasan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('penugasan.update', $data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Karyawan</label>
                            <select disabled id="pilihan_karyawan" name="karyawan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option>{{ $data->user->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tempat Penugasan</label>
                            <input value="{{ $data->tempat_penugasan }}" type="text" class="form-control" name="tempat_penugasan" placeholder="Masukkan Tempat Penugasan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Dari</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input value="{{ $data->dari_tgl }}" required type="date" name="dari_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Hingga</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input value="{{ $data->hingga_tgl }}" required type="date" name="hingga_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" placeholder="Keterangan ...">{{ $data->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-success float-right">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
