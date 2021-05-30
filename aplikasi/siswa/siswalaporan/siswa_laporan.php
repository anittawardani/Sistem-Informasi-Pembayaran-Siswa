     <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel</div>

            <div class="card-body">
              <?php 
               // $id_pengguna = $_SESSION['username'];
                $nis = $_SESSION['nis'];
                $querySiswa = mysqli_query($konek, "SELECT a.nama_siswa, a.id_siswa,a.nis,a.jenkel_siswa,b.nama_kelas,c.nama_jurusan
                    FROM tb_siswa  a LEFT JOIN tb_kelas b ON a.id_kelas=b.id_kelas
                    LEFT JOIN tb_jurusan c ON a.id_jurusan=c.id_jurusan WHERE a.nis='$nis'");
                    $varSiswa   = mysqli_fetch_array($querySiswa);
                    $id_siswa   = $varSiswa['id_siswa'];
               ?>

                <h3>Biodata Siswa</h3>
                <table>
                  <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?php echo $varSiswa['nis']; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?php echo $varSiswa['nama_siswa']; ?></td>
                  </tr>
                   <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $varSiswa['jenkel_siswa']; ?></td>
                  </tr>
                     <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?php echo $varSiswa['nama_kelas']; ?></td>
                  </tr>
                     <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td><?php echo $varSiswa['nama_jurusan']; ?></td>
                  </tr>
                </table>


                 <h3>Tagihan Pembayaran Siswa</h3>&nbsp;&nbsp;
                  <form class="forms-sample">
                    <div class="dropdown">
                      <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Tagihan
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" name="nis" value="transaksipengembangan" href="<?php echo "beranda.php?halaman=siswalaporanpengembangan&nis=".$varSiswa['nis'];?>">Uang Pengembangan</a>

                        <a class="dropdown-item" href="<?php echo "beranda.php?halaman=siswalaporansarana&nis=".$varSiswa['nis'];?>">Sarana Prasarana</a>
                        <a class="dropdown-item" href="<?php echo "beranda.php?halaman=siswalaporanspp&nis=".$varSiswa['nis'];?>" >SPP</a>
                        <a class="dropdown-item" href="<?php echo "beranda.php?halaman=siswalaporanujian&nis=".$varSiswa['nis'];?>">Ujian</a>
                      </div>
                    </div>
                  </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>