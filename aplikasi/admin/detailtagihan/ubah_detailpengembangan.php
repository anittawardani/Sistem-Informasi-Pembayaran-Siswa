      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Detail Pengembangan</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM detail_tag_pengembangan WHERE id_detail='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_detail" value="<?php echo $varData['id_detail']; ?>" />

                    <div class="form-group row">
                      <label for="nama_angsuran" class="col-sm-3 col-form-label">Nama Angsuran</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_angsuran" autofocus="autofocus" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['nama_angsuran'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                        <input type="text" name="jumlah" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['jumlah'] ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 pl-0">
                      <p class="text-right">
                      <button type="submit" name="simpan" class="btn btn-space btn-primary">Ubah</button>
                      <a href="beranda.php?halaman=detailpengembangan" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
          if ($_SERVER['REQUEST_METHOD']=='POST') {
            $varId            = $_POST['id_detail'];
            $varNamaAngsuran  = $_POST['nama_angsuran'];
            $varJumlah        = $_POST['jumlah'];

            if ($varNamaAngsuran=='' || $varJumlah=='') {
              echo "Form Belum Lengkap!";
            }else{
              $simpan=mysqli_query($konek,"UPDATE detail_tag_pengembangan SET nama_angsuran='$varNamaAngsuran', jumlah='$varJumlah' 
                WHERE id_detail='$varId'");
              if(!$simpan){
                echo"Ubah Data Tagihan Gagal";
              }else{
                  ?>
                    <script>
                      alert("Detail Tagihan Pengembangan Berhasil DiUbah");
                      window.location.href = "beranda.php?halaman=detailpengembangan";
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