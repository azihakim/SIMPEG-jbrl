@extends('master')
@section('title', 'Dashboard Karyawan')
@section('btn-table', 'print')
@section('content')
    <div class="container-fluid">
        <div class="card">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header">
                {{-- @if (auth()->user()->jabatan == 'Admin') --}}
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Karyawan</h2>
                    </div>
                    @if (auth()->user()->role == 'admin')
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-block btn-outline-primary" href="{{ url('tambah-karyawan') }}">Tambah</a>
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
                        <th>STATUS</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>TELEPON</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th>NIK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $item)
                        <tr>
                            @if (auth()->user()->role == 'admin')
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle fas fa-edit" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <a class="dropdown-item" href="{{ route('karyawan.edit', $item->id) }}">Edit</a>
                                        {{-- <form action="{{ route('karyawan.status', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            @if ($item->status == 'Non-Aktif')
                                                <input type="hidden" name="status" value="Aktif">
                                                <button class="dropdown-item" type="submit">Aktifkan</button>
                                            @else
                                                <input type="hidden" name="status" value="Non-Aktif">
                                                <button class="dropdown-item" type="submit">Non-Aktifkan</button>
                                            @endif
                                        </form> --}}
                                    </div>
                                </div>
                            </td>
                            @endif
                            <td>
                                @if ($item->status == 'Non-Aktif')
                                    <span class="badge bg-danger">Non-Aktif</span>
                                @elseif($item->status == 'Aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @endif
                            </td>
                            <td>{{ str_replace(['manajer', 'admin'], ['direktur', 'kabag. SPI'], $item->name) }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nik }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        @if (auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>STATUS</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>TELEPON</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th>NIK</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
    </div>
@endsection
