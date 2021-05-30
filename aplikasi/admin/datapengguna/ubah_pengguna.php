      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Data Pengguna</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_pengguna" value="<?php echo $varData['id_pengguna']; ?>" />

                    <div class="form-group row">
                      <label for="nama_pengguna" class="col-sm-3 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_pengguna" minlength="1" autofocus="autofocus" maxlength="50" class="form-control" value="<?php echo $varData['nama_pengguna'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                        <input type="text" name="username" minlength="1" autofocus="autofocus" maxlength="20" class="form-control" value="<?php echo $varData['username'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                        <input type="password" name="password" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['password'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="level" class="col-sm-3 col-form-label">Level</label>
                      <div class="col-sm-9">
                        <select name="level" type="text" class="form-control">
                          <option <?php if( $varData=='admin'){echo "selected"; } ?> value='admin'>admin</option>
                          <option <?php if( $varData=='siswa'){echo "selected"; } ?> value='siswa'>siswa</option>    
                      </select>
                      </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Ubah</button>
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
            $varId       = $_POST['id_pengguna'];
            $varNama     = $_POST['nama_pengguna'];
            $varUsername = $_POST['username'];
            $varPassword = $_POST['password'];
            $varLevel    = $_POST['level'];

            if ($varUsername==''||$varPassword==''||$varLevel=='') {
              echo "Form belum lengkap!";
            }else{
              $simpan=mysqli_query($konek,"UPDATE tb_pengguna SET nama_pengguna='$varNama', username='$varUsername', password='$varPassword',level='$varLevel' 
                WHERE id_pengguna='$varId'");
              if(!$simpan){
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
          ?>

        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>