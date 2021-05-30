      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Ubah Detail SPP</li>
          </ol>

          <?php
            $varquery  = mysqli_query($konek,"SELECT * FROM detail_tag_spp WHERE id_detail_spp='".$_GET['id']."'");
            $varData   = mysqli_fetch_array($varquery);
          ?>

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card">
                <h5 class="card-header">Ubah Data</h5>
                <div class="card-body">

                  <form action="" method="post">
                    <input type="hidden" name="id_detail_spp" value="<?php echo $varData['id_detail_spp']; ?>" />

                    <div class="form-group row">
                      <label for="nama_bulan" class="col-sm-3 col-form-label">Nama Angsuran</label>
                        <div class="col-sm-9">
                        <input type="text" name="nama_bulan" autofocus="autofocus" minlength="1" maxlength="20" class="form-control" value="<?php echo $varData['nama_bulan'] ?>">
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
                      <a href="beranda.php?halaman=detailspp" class="btn btn-space btn-secondary">Batal</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
          if ($_SERVER['REQUEST_METHOD']=='POST') {
            $varId         = $_POST['id_detail_spp'];
            $varNamaBulan  = $_POST['nama_bulan'];
            $varJumlah     = $_POST['jumlah'];

            if ($varNamaBulan=='' || $varJumlah=='') {
              echo "Form Belum Lengkap!";
            }else{
              $simpan=mysqli_query($konek,"UPDATE detail_tag_spp SET nama_bulan='$varNamaBulan', jumlah='$varJumlah' 
                WHERE id_detail_spp='$varId'");
              if(!$simpan){
                echo"Ubah Data Tagihan Gagal";
              }else{
                  ?>
                    <script>
                      alert("Detail Tagihan Sarana Prasarana Berhasil DiUbah");
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