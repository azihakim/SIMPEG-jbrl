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
					<div class="col-sm-2">
						<a type="button" class="btn btn-block btn-outline-primary" href="{{ route('gaji.create') }}">Tambah Data</a>
					</div>
				</div>

				{{-- @endif --}}

			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th></th>
							<th>KARYAWAN</th>
							<th>GAJI POKOK</th>
							<th>POTONGAN</th>
							<th>BONUS</th>
							<th>GAJI TOTAL</th>
							<th>TANGGAL</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($gaji as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->user->name }}</td>
								<td>{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
								<td>{{ number_format($item->potongan, 0, ',', '.') }}</td>
								<td>{{ number_format($item->bonus, 0, ',', '.') }}</td>
								<td>{{ number_format($item->total_gaji, 0, ',', '.') }}</td>
								<td>{{ $item->tgl_gajian }}</td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default dropdown-toggle fas fa-edit" data-toggle="dropdown"
											aria-expanded="false">
										</button>
										<div class="dropdown-menu" role="menu">
											{{-- <a class="dropdown-item" href="{{ route('gaji.edit', $item->id) }}">Edit</a> --}}
											<form action="{{ route('gaji.destroy', $item->id) }}" method="POST"
												onsubmit="return confirm('Yakin ingin menghapus data ini?');">
												@csrf
												@method('DELETE')
												<button class="dropdown-item" type="submit">Delete</button>
											</form>
											<a class="dropdown-item" href="{{ route('gaji.cetakSlip', $item->id) }}" target="_blank">Cetak Slip</a>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
@endsection
