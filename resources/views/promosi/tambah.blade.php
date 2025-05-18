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
            <h3 class="card-title">Form Promosi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('promosi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pilihan_karyawan">Karyawan</label>
                            <select id="pilihan_karyawan" onchange="updateInputValue_karyawan()" name="user_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option></option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->user_id }}" jabatan_lama="{{ $item->jabatan }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tanggal Promosi</label>
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <input required type="date" name="tgl_promosi" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jabatan_lama">Jabatan Lama</label>
                            <input readonly type="text" value="" class="form-control" name="jabatan_lama" id="ip_jabatan_lama" placeholder="Masukkan Jabatan Lama">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Surat</label>
                            <div>
                                <input name="surat_rekomendasi" type="file" class="-input" id="customFile">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jabatan Baru</label>
                            <select id="pilihan_jabatan" name="jabatan_baru" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option value=""></option>
                                <option value="Dewan Direksi">Dewan Direksi</option>
                                <option value="Kabag.AKU">Kabag.AKU</option>
                                <option value="Kabag. Pengadaan">Kabag. Pengadaan</option>
                                <option value="Kabag. SDM & Umum">Kabag. SDM & Umum</option>
                                <option value="Kabag. SPI">Kabag. SPI</option>
                                <option value="Kabag. Tanaman">Kabag. Tanaman</option>
                                <option value="Kabag. Teknik">Kabag. Teknik</option>
                                <option value="Kabag. Renbang">Kabag. Renbang</option>
                                <option value="Adm. PIN">Adm. PIN</option>
                                <option value="Adm. RL">Adm. RL</option>
                                <option value="Adm. PPL">Adm. PPL</option>
                                <option value="Adm. Muba">Adm. Muba</option>
                                <option value="Adm. S.Aji">Adm. S.Aji</option>
                                <option value="Adm. UPUL">Adm. UPUL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
    
<script>
    function updateInputValue_karyawan(){
        var select = document.getElementById("pilihan_karyawan");
        var ip_jabatan_lama = document.getElementById("ip_jabatan_lama");

        ip_jabatan_lama.value = select.options[select.selectedIndex].getAttribute('jabatan_lama');
    }
</script>
@endsection
