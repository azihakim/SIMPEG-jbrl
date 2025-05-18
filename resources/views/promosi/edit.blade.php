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
            <h3 class="card-title">Edit Promosi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('promosi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                            <label>Tanggal Promosi</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required type="date" name="tgl_promosi" class="form-control" value="{{ $data->tgl_promosi }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan Lama</label>
                            <input value="{{ $data->jabatan_lama }}" type="text" class="form-control" name="jabatan_lama" placeholder="Masukkan Jabatan Lama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Surat</label>
                            <div class="custom-file">
                                <input type="hidden" name="old_file" value="{{ $data->surat_rekomendasi }}">
                                <input name="surat_rekomendasi" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Surat</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan Baru</label>
                            <input value="{{ $data->jabatan_baru }}" type="text" class="form-control" name="jabatan_baru" placeholder="Masukkan Jabatan Baru">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-success float-right">Perbarui</button>
            </form>
        </div>
    </div>
@endsection
