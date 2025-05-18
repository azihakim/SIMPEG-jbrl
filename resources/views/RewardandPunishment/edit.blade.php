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
            <h3 class="card-title">Form Reward and Punishment</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('reward-punishment.update', $data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Karyawan</label>
                            <select disabled id="pilihan_karyawan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option>{{ $data->user->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Potongan Gaji</label>
                            <input value="{{ $data->potongan_gaji }}" type="number" class="form-control" name="potongan_gaji" placeholder="Masukkan Potongan Gaji">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Bonus</label>
                            <input value="{{ $data->bonus }}" type="number" class="form-control" name="bonus" placeholder="Masukkan Bonus">
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gaji</label>
                            <input disabled type="number" class="form-control" name="gaji" placeholder="Masukkan Gaji">
                        </div>
                    </div>
                </div> --}}
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Bulan</label>
                            <select id="pilihan_konsumen" name="bulan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="{{ $data->bulan }}">{{ $data->bulan }}</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tahun</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="{{ $data->tahun }}" name="tahun" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask="" inputmode="numeric">
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
