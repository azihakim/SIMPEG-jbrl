@extends('master')
@section('title', 'Dashboard Recruitment')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- @if (auth()->user()->jabatan == 'Admin') --}}
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Recruitment</h2>
                    </div>
                    {{-- <div class="col-sm-2">
                        <a type="button" class="btn btn-block btn-outline-primary" href="{{ url('tambah-phk') }}">Tambah Data</a>
                    </div> --}}
                </div>
                {{-- @endif --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>STATUS</th>
                        <th>CALON KARYAWAN</th>
                        <th>TELEPON</th>
                        <th>ALAMAT</th>
                        <th>BERKAS</th>
                        <th>WAKTU SUBMIT</th>
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
                                        {{-- <a class="dropdown-item" href="{{ route('karyawan.edit', $item->id) }}">Edit</a> --}}
                                        <form action="{{ route('recruitment.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Diterima">
                                            <button class="dropdown-item" type="submit">Diterima</button>
                                        </form>

                                        <form action="{{ route('recruitment.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button class="dropdown-item" type="submit">Ditolak</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @endif
                            <td>
                                @if ($item->status == 'Diterima')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif($item->status == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ asset('storage/dokument/' . $item->berkas) }}" target="_blank" class="btn btn-outline-info">Cek berkas</a>
                            </td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle fas fa-edit" data-toggle="dropdown" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item" href="#">Diterima</a>
                                    <a class="dropdown-item" href="#">Ditolak</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-success">Diterima</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> --}}
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>STATUS</th>
                        <th>CALON KARYAWAN</th>
                        <th>TELEPON</th>
                        <th>ALAMAT</th>
                        <th>BERKAS</th>
                        <th>WAKTU SUBMIT</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
    </div>
@endsection
