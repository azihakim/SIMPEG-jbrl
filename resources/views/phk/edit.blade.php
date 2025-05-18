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
            <h3 class="card-title">Form Edit PHK</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('phk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <select disabled id="pilihan_karyawan" name="karyawan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option>{{ $data->user->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Surat</label>
                            <input type="hidden" name="old_file" value="{{ $data->surat }}">
                            <input type="file" class="form-control-file" id="photoInput" name="surat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea name="alasan" class="form-control" placeholder="Alasan ...">{{ $data->alasan }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-success float-right">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
