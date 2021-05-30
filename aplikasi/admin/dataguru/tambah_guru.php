      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Guru</li>
          </ol>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Masukkan Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <div class="form-group row">
                      <label for="nama_guru" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_guru" autofocus="autofocus" minlength="1" maxlength="50" class="form-control" placeholder="Nama">
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                          <p class="text-right">
                            <button type="submit" name="simpan" class="btn btn-space btn-primary">Simpan</button>
                            <a href="beranda.php?halaman=admindataguru" class="btn btn-space btn-secondary">Batal</a>
                          </p>
                        </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST') {
              $varNamaGuru = $_POST['nama_guru'];

              if ($varNamaGuru=='') {
                echo "Form belum lengkap!";
              }else{
                $simpan = mysqli_query($konek,"INSERT INTO tb_guru (nama_guru) VALUES ('$varNamaGuru')");
                if(!$simpan) {
                  echo"Simpan data gagal";
                }else{
                  ?>
                  <script>
                      alert("berhasil disimpan");
                      window.location.href = "beranda.php?halaman=admindataguru";
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