      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Jurusan</li>
          </ol>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Masukkan Data</h5>
                <div class="card-body">

                  <form method="post">
                    <div class="form-group row">
                      <label for="nama_jurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_jurusan" autofocus="autofocus" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="20" class="form-control" placeholder="Nama">
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
                    
                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Simpan</button>
                      <a href="beranda.php?halaman=admindatajurusan" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST') {
              $varNamaJurusan = $_POST['nama_jurusan'];

              if ($varNamaJurusan=='') {
                echo "Form belum lengkap!";
              }
              $cek_jurusan = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_jurusan WHERE nama_jurusan='$_POST[nama_jurusan]'"));

              if ($cek_jurusan > 0){
                echo "<b>Jurusan Sudah Ada. Ulangi lagi</b>";
              }
              else{
                $simpan = mysqli_query($konek,"INSERT INTO tb_jurusan (nama_jurusan) VALUES ('$varNamaJurusan')");
                if(!$simpan) {
                  echo"Simpan data gagal";
                }else{
                  ?>
                  <script>
                      alert("berhasil Disimpan");
                      window.location.href = "beranda.php?halaman=admindatajurusan";
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