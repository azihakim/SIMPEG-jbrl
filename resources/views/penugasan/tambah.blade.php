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
            <h3 class="card-title">Form Penugasan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('penugasan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Karyawan</label>
                            <select required id="pilihan_karyawan" name="user_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option></option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tempat Penugasan</label>
                            <input required type="text" class="form-control" name="tempat_penugasan" placeholder="Masukkan Tempat Penugasan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Dari</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required required type="date" name="dari_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Hingga</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required required type="date" name="hingga_tgl" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea required name="keterangan" class="form-control" placeholder="Keterangan ..."></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
@endsection
