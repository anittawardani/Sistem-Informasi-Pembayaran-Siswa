      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Pengguna</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM tb_guru WHERE id_guru='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_guru" value="<?php echo $varData['id_guru']; ?>" />

                    <div class="form-group row">
                      <label for="nama_guru" class="col-sm-3 col-form-label">Nama Guru</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_guru" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['nama_guru'] ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                          <p class="text-right">
                            <button type="submit" name="simpan" class="btn btn-space btn-primary">Ubah</button>
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
            $varId       = $_POST['id_guru'];
            $varNamaGuru = $_POST['nama_guru'];

            if ($varNamaGuru=='') {
              echo "Form belum lengkap!";
            }else{
              $simpan=mysqli_query($konek,"UPDATE tb_guru SET nama_guru='$varNamaGuru' 
                WHERE id_guru='$varId'");
              if(!$simpan){
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