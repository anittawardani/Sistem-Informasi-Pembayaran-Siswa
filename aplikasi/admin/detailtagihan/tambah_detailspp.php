      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Tambah Tagihan SPP</li>
          </ol>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Masukkan Data</h5>
                <div class="card-body">

                  <form action="" method="post">

                    <div class="form-group row">
                      <label for="nama_bulan" class="col-sm-3 col-form-label">Nama Bulan</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_bulan" autofocus="autofocus" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="50" class="form-control" placeholder="Nama">
                        <script>
                          function hanyaHuruf(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if ((charCode < 65 || charCode > 90) &&  (charCode < 97 || charCode > 122) &&  charCode > 32)

                              return false;
                            return true;
                          }
                        </script>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                        <input type="text" name="jumlah" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="50" class="form-control" placeholder="Masukkan Nominal">
                        <script>
                          function hanyaAngka(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))

                              return false;
                            return true;
                          }
                        </script>
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Simpan</button>
                      <a href="beranda.php?halaman=detailspp" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php 
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $varNamaBulan      = $_POST['nama_bulan'];
            $varJumlah         = $_POST['jumlah'];

            if($varNamaBulan=='' || $varJumlah=='') { 
            echo "Form belum lengkap!";
          }else{
            $simpan = mysqli_query($konek,"INSERT INTO detail_tag_spp(nama_bulan,jumlah) VALUES ('$varNamaBulan','$varJumlah')");

            if(!$simpan) {
              echo "Simpan data Tagihan SPP gagal!";
            }else{
              ?>
              <script>  
                  alert("Data Tagihan SPP Berhasil Disimpan");
                        window.location.href = "beranda.php?halaman=detailspp";
              </script>
              <?php
            }
            }
          }
          ?>

        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>