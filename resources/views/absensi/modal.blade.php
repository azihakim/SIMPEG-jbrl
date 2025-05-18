<!-- /.modal -->
<div class="modal fade" id="modal-default-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Absensi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="{{ route("absensi.store") }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                  
                  <div class="form-group">
                      <label>Upload bukti foto</label>
                      <br>
                      <input type="file" class="form-control-file" id="photoInput" name="foto" accept="image/*" required>
                  </div>
                  <div class="form-group">
                    <label>Keterangan absen</label>
                    
                    @if ( $cekmasuk == null)
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" value="Masuk">
                        <label class="form-check-label">Masuk</label>
                      </div>
                    @endif
                    @if ( $cekpulang == null)
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis" value="Pulang">
                        <label class="form-check-label">Pulang</label>
                      </div>
                    @endif
                  </div>
                  {{-- <div class="form-group">
                      <label>Lokasi</label>
                      <input type="text" class="form-control" name="lokasi" placeholder="Masukkan lokasi">
                  </div> --}}
                </div>
              
              <input hidden name="latitude" id="latitudeInput">
              <input hidden name="longitude" id="longitudeInput">
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>

          </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
          } else {
              alert("Geolocation is not supported by this browser.");
          }
      }

      function showPosition(position) {
          // Mengisi nilai input lokasi dengan latitude dan longitude
          var latitudeInput = document.getElementById('latitudeInput');
          var longitudeInput = document.getElementById('longitudeInput');

          latitudeInput.value = position.coords.latitude;
          longitudeInput.value = position.coords.longitude;

          // Mengubah atribut href dari link Google Maps
          var googleMapsLink = document.getElementById('googleMapsLink');
          googleMapsLink.href = "https://www.google.com/maps?q=" + position.coords.latitude + "," + position.coords.longitude;
      }

      // Menambahkan event listener pada tombol "Lokasi"
      $(document).ready(function () {
          $('#lokasi').click(function () {
              getLocation();
          });
      });
  </script>
</div>
