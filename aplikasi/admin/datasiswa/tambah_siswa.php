      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Tambah Data Siswa</li>
          </ol>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Masukkan Data</h5>
                <div class="card-body">

                  <form action="" method="post">

                    <div class="form-group row">
                      <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                        <div class="col-sm-9">
                        <input type="text" name="nis" minlength="1" onkeypress="return hanyaAngka(event)" maxlength="4" class="form-control" placeholder="NIS" autofocus="autofocus">
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
                        <input type="text" name="nama_siswa" onkeypress="return hanyaHuruf(event)" minlength="1" maxlength="50" class="form-control" placeholder="Nama">
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
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                          <input type="password" name="password" minlength="1" maxlength="4" class="form-control" placeholder="Password">
                          </div>
                      </div>

                    <div class="form-group row">
                      <label for="jenkel_siswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="jenkel_siswa">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki-laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="kelas">
                          <option value="" selected>Pilih Kelas</option>
                          <?php
                          $queryKelas = mysqli_query($konek, "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC");
                          while ($varKelas = mysqli_fetch_array($queryKelas)) {
                            echo "<option value='$varKelas[id_kelas]'>$varKelas[nama_kelas]</option>";
                          }
                          ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="jurusan">
                          <option value="" selected>Pilih Jurusan</option>
                          <?php
                          $queryJurusan = mysqli_query($konek, "SELECT * FROM tb_jurusan ORDER BY nama_jurusan ASC");
                          while ($varJurusan = mysqli_fetch_array($queryJurusan)) {
                            echo "<option value='$varJurusan[id_jurusan]'>$varJurusan[nama_jurusan]</option>";
                          }
                          ?>
                        </select>
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Simpan</button>
                      <a href="beranda.php?halaman=admindatasiswa" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php 
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $varNis         = $_POST['nis'];
            $varNamaSiswa   = $_POST['nama_siswa'];
            $varPassword    = $_POST['password'];
            $varJenkelSiswa = $_POST['jenkel_siswa'];
            $varKelas       = $_POST['kelas'];
            $varJurusan     = $_POST['jurusan'];

            if($varNis=='' || $varNamaSiswa=='' || $varPassword=='' || $varJenkelSiswa=='' || $varKelas=='' || $varJurusan=='') { 
            echo "Form belum lengkap!";
          }
          else{
                $cek = mysqli_num_rows(mysqli_query($konek,"SELECT * FROM tb_siswa WHERE nis='$varNis'"));
                if ($cek > 0){
                echo "<script>window.alert('Data yang anda masukan sudah ada')
                window.location='beranda.php?halaman=tambahsiswa'</script>";
                          
          }
          else{
            $simpan = mysqli_query($konek,"INSERT INTO tb_siswa (nis, nama_siswa, password, jenkel_siswa, id_kelas, id_jurusan) VALUES ('$varNis','$varNamaSiswa','$varPassword','$varJenkelSiswa','$varKelas','$varJurusan')");


            for ($index = 1; $index <=3 ; $index++) {
              $transaksi_pengembangan=mysqli_query($konek,"INSERT INTO `tb_tag_pengembangan`(nis,id_detail) 
                    VALUES ('$varNis','$index')");  
            }


            $transaksi_sarana_prasarana=mysqli_query($konek,"INSERT INTO `tb_tag_saranaprasarana`(nis,`id_detail_sarana`) 
                    VALUES ('$varNis','1')");
            

            for ($index = 1; $index <=12 ; $index++) {
                    $transaksi_pengembangan=mysqli_query($konek,"INSERT INTO `tb_tag_spp`(nis,`id_detail_spp`) 
                    VALUES ('$varNis','$index')");  
            }

            for ($index = 1; $index <=4 ; $index++) {
                    $transaksi_pengembangan=mysqli_query($konek,"INSERT INTO `tb_tag_ujian`(nis,`id_detail_ujian`) 
                    VALUES ('$varNis','$index')");  
            }
          }
            
            if(!$simpan) {
              echo "Simpan data gagal!";
            }else{

              ?>
              <script>  
                  alert("Berhasil Disimpan");
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