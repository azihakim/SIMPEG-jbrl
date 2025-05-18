@extends('master')
@section('title', 'Dashboard Reward and Punishment')
@section('btn-table', 'print')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{-- @if (auth()->user()->jabatan == 'Admin') --}}
                <div class="row">
                    <div class="col-sm-10">
                        <h2>Reward and Punishment</h2>
                    </div>
                    @if (auth()->user()->role == 'admin')
                    <div class="col-sm-2">
                        <a type="button" class="btn btn-block btn-outline-primary" href="{{ url('tambah-RewardandPunishment') }}">Tambah Data</a>
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
                        <th>TAHUN</th>
                        <th>BULAN</th>
                        <th>POTONGAN GAJI</th>
                        <th>BONUS</th>
                        <th>KETERANGAN</th>
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
                                        <a class="dropdown-item" href="{{ route('reward-punishment.edit', $item->id) }}">Edit</a>
                                    </div>
                                </div>
                            </td>
                            @endif
                            @if (auth()->user()->role == 'karyawan')
                                <td>{{ $item->user->name }}</td>
                            @else
                                <td>{{ $item->name }}</td>
                            @endif
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->bulan }}</td>
                            <td>Rp.{{ $item->potongan_gaji }}</td>
                            @if ($item->bonus == null)
                                <td>-</td>
                            @else
                                <td>Rp.{{ $item->bonus }}</td>
                            @endif
                            <td>{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        @if (auth()->user()->role == 'admin')
                        <th></th>
                        @endif
                        <th>KARYAWAN</th>
                        <th>TAHUN</th>
                        <th>BULAN</th>
                        <th>POTONGAN GAJI</th>
                        <th>BONUS</th>
                        <th>KETERANGAN</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div>
    </div>
@endsection
