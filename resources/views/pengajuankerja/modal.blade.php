<!-- /.modal -->
<div class="modal fade" id="modal-default-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pengajuan Kerja</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="{{ route("pengajuan.store") }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label>Upload berkas</label>
                    <br>
                    <input type="file" class="form-control-file" id="photoInput" name="berkas" accept="pdf" required>
                    <p class="text-danger">Lampirkan Surat Lamaran, CV, Ijazah, KTP, KK, serta dokumen pendukung</p>
                </div>
              </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
    </div>
</div>