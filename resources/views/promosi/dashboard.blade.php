@extends('master')
@section('title', 'Dashboard Promosi')
@section('btn-table', 'print')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- @if (auth()->user()->jabatan == 'Admin') --}}
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Promosi</h2>
                    </div>
                    @if (auth()->user()->role == 'admin')
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-block btn-outline-primary" href="{{ url('tambah-promosi') }}">Tambah Data</a>
                    </div>
                    @endif
                </div>
                    
                {{-- @endif --}}
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        @if (auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>KARYAWAN</th>
                        <th>JABATAN LAMA</th>
                        <th>JABATAN BARU</th>
                        <th>TANGGAL PROMOSI</th>
                        <th>SURAT REKOMENDASI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            @if (auth()->user()->role == 'admin')
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle fas fa-edit" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <a class="dropdown-item" href="{{ route('promosi.edit', $item->id) }}">Edit</a>
                                    </div>
                                </div>
                            </td>
                            @endif
                            @if (auth()->user()->role == 'karyawan')
                                <td>{{ $item->user->name }}</td>
                            @else
                                <td>{{ $item->name }}</td>
                            @endif
                            <td>{{ $item->jabatan_lama }}</td>
                            <td>{{ $item->jabatan_baru }}</td>
                            <td>{{ $item->tgl_promosi }}</td>
                            <td>
                                <a href="{{ asset('storage/dokument/' . $item->surat_rekomendasi) }}" target="_blank" class="btn btn-outline-warning">Cek Surat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        @if (auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>KARYAWAN</th>
                        <th>JABATAN LAMA</th>
                        <th>JABATAN BARU</th>
                        <th>TANGGAL PROMOSI</th>
                        <th>SURAT REKOMENDASI</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
    </div>
@endsection
