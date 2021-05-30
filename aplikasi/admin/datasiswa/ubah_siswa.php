      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Siswa</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM tb_siswa WHERE id_siswa='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_siswa" value="<?php echo $varData['id_siswa']; ?>" />

                    <div class="form-group row">
                      <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                        <div class="col-sm-9">
                        <input type="text" name="nis" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="4" autofocus="autofocus" class="form-control" value="<?php echo $varData['nis'] ?>">
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

                   

                    <div class="form-group row">
                      <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_siswa" autofocus="autofocus" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="50" class="form-control" value="<?php echo $varData['nama_siswa'] ?>">
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
                      <label for="nis" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                        <input type="password" name="password" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="4" autofocus="autofocus" class="form-control" value="<?php echo $varData['password'] ?>">
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

                    <div class="form-group row">
                      <label for="nama_siswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="jenkel_siswa">
                          <option <?php if( $varData=='L'){echo "selected";}?> value='L'>Laki-laki</option>
                          <option <?php if( $varData=='P'){echo "selected";}?> value='P'>Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="kelas">
                          <?php
                            $queryKelas = mysqli_query($konek, "SELECT * FROM tb_kelas ORDER BY id_kelas ASC");
                            while ($varKelas = mysqli_fetch_array($queryKelas)) {
                              if ($varKelas['id_kelas'] == $varData['id_kelas']) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }

                              echo "<option value='$varKelas[id_kelas]' $selected>$varKelas[nama_kelas]</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="jurusan">
                          <?php
                            $queryJurusan = mysqli_query($konek, "SELECT * FROM tb_jurusan ORDER BY id_jurusan ASC");
                            while ($varJurusan = mysqli_fetch_array($queryJurusan)) {
                              if ($varJurusan['id_jurusan'] == $varData['id_jurusan']) {
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }

                              echo "<option value='$varJurusan[id_jurusan]' $selected>$varJurusan[nama_jurusan]</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Ubah</button>
                      <a href="beranda.php?halaman=admindatasiswa" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div> 

          <?php
          if ($_SERVER['REQUEST_METHOD']=='POST') {
            $varId            = $_POST['id_siswa'];
            $varNis           = $_POST['nis'];
            $varNamaSiswa     = $_POST['nama_siswa'];
            $varKelas         = $_POST['kelas'];
            $varJurusan       = $_POST['jurusan'];

            if ($varNis==''||$varNamaSiswa==''||$varKelas==''||$varJurusan=='') {
              echo "Form belum lengkap!";
            }else{
              $simpan=mysqli_query($konek,"UPDATE tb_siswa SET nis='$varNis', nama_siswa='$varNamaSiswa', id_kelas='$varKelas', id_jurusan='$varJurusan'
                WHERE id_siswa='$varId'");
              if(!$simpan){
                echo"Ubah data gagal";
              }else{
                  ?>
                    <script>
                      alert("berhasil Diubah");
                      window.location.href = "beranda.php?halaman=admindatasiswa";
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