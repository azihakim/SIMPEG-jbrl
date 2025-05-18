@extends('master')
@section('title', 'Dashboard Pengajuan Cuti/Izin')
{{-- @section('btn-table', 'print') --}}
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- @if (auth()->user()->jabatan == 'Admin') --}}
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Data Pengajuan Cuti/Izin</h2>
                    </div>
                    @if (auth()->user()->role == 'karyawan')
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-block btn-outline-primary" href="{{ url('tambah-cutiizin') }}">Tambah Data</a>
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
                        <th>CUTI/IZIN</th>
                        <th>TANGGAL</th>
                        <th>ALASAN</th>
                        <th>STATUS</th>
                        <th>SURAT</th>
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
                                        <form action="{{ route('cutiizin.status', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="ACC">
                                            <button class="dropdown-item" type="submit">ACC</button>
                                        </form>

                                        <form action="{{ route('cutiizin.status', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Tolak">
                                            <button class="dropdown-item" type="submit">Tolak</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                            @endif
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->alasan }}</td>
                            <td>
                                @if ($item->status == 'ACC')
                                    <span class="badge bg-success">ACC</span>
                                @elseif($item->status == 'Tolak')
                                    <span class="badge bg-danger">Tolak</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ $item->surat }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        @if (auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>KARYAWAN</th>
                        <th>CUTI/IZIN</th>
                        <th>TANGGAL</th>
                        <th>ALASAN</th>
                        <th>STATUS</th>
                        <th>SURAT</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
    </div>
@endsection
