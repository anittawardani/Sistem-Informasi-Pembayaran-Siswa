      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Pengguna</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM tb_kelas WHERE id_kelas='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_kelas" value="<?php echo $varData['id_kelas']; ?>" />

                    <div class="form-group row">
                      <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_kelas" autofocus="autofocus" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['nama_kelas'] ?>">
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
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Ubah</button>
                      <a href="beranda.php?halaman=admindatakelas" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
          if ($_SERVER['REQUEST_METHOD']=='POST') {
            $varId        = $_POST['id_kelas'];
            $varNamaKelas = $_POST['nama_kelas'];

            if ($varNamaKelas=='') {
              echo "Form belum lengkap!";
            }
            $cek_kelas = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_kelas WHERE nama_kelas='$_POST[nama_kelas]'"));
              if ($cek_kelas > 0){
                echo "<b>Kelas Sudah Ada. Ulangi lagi</b>";
              }
            else{
              $queryUbah=mysqli_query($konek,"UPDATE tb_kelas SET nama_kelas='$varNamaKelas' 
                WHERE id_kelas='$varId'");
              if(!$queryUbah){
                echo"Simpan data gagal";
              }else{

                  ?>
                    <script>
                      alert("berhasil Diubah");
                      window.location.href = "beranda.php?halaman=admindatakelas";
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