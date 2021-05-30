      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Pengguna</li>
          </ol>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Masukkan Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <div class="form-group row">
                      <label for="nama_pengguna" class="col-sm-3 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_pengguna" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="50" class="form-control" required="required" placeholder="Nama"/>
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
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                        <input type="text" name="username" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="20" class="form-control" placeholder="Username"/>
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
                      <label for="password" class="col-sm-3 col-form-label">Password Pengguna</label>
                        <div class="col-sm-9">
                        <input type="password" name="password" minlength="1" maxlength="20" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="level" class="col-sm-3 col-form-label">Level</label>
                        <div class="col-sm-9">
                          <select name="level" class="form-control">
                            <option value="admin">admin</option>
                            <option value="siswa">siswa</option>
                          </select>
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Simpan</button>
                      <a href="beranda.php?halaman=admindatapengguna" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST') {
              $nama_pengguna = $_POST['nama_pengguna'];
              $username = $_POST['username'];
              $password = $_POST['password'];
              $level    = $_POST['level'];

              if ($nama_pengguna==''|| $username==''||$password==''||$level=='') {
                echo "Form belum lengkap!";
              }
              else{
                $cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_pengguna WHERE username='$username'"));
                if ($cek > 0){
                echo "<script>window.alert('Pengguna yang anda masukan sudah ada')
                window.location='beranda.php?halaman=tambahpengguna'</script>";
              }
              else{
                $simpan = mysqli_query($konek,"INSERT INTO tb_pengguna (nama_pengguna, username, password, level) VALUES ('$nama_pengguna', '$username','$password','$level')");
                if(!$simpan) {
                  echo"Simpan data gagal";
                }else{
                  ?>
                  <script>
                      alert("berhasil disimpan");
                      window.location.href = "beranda.php?halaman=admindatapengguna";
                  </script>
                   <?php
                }
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