<?php
if(isset($_GET['id'])){
    $query      = mysqli_query($konek,"DELETE from tb_siswa where id_siswa='".$_GET['id']."'");
    echo"<script>alert('Data Siswa berhasil di Hapus');window.location.href='beranda.php?halaman=admindatasiswa';</script>";
}
?>     

      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Siswa</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Siswa</div>

            <div class="card-body">
              <form class="form-group">
              <a class="btn btn-primary" href="beranda.php?halaman=tambahsiswa">Tambah Siswa </a>
              </form>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Siswa</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT tb_siswa.id_siswa, tb_siswa.nis, tb_siswa.nama_siswa, tb_siswa.jenkel_siswa, tb_kelas.nama_kelas, tb_jurusan.nama_jurusan FROM tb_siswa 
                  INNER JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas 
                  INNER JOIN tb_jurusan ON tb_jurusan.id_jurusan=tb_siswa.id_jurusan 
                  WHERE 1 ");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_siswa      = $tampiltabel['id_siswa'];
                  $varNis           = $tampiltabel['nis'];
                  $varNamaSiswa     = $tampiltabel['nama_siswa'];
                  $varJenisKelamin  = $tampiltabel['jenkel_siswa'];
                  $varKelas         = $tampiltabel['nama_kelas'];
                  $varJurusan       = $tampiltabel['nama_jurusan'];                   
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_siswa ?></td>
                    <td><?php echo $varNis ?></td>
                    <td><?php echo $varNamaSiswa ?></td>
                    <td><?php echo $varJenisKelamin ?></td>
                    <td><?php echo $varKelas ?></td>
                    <td><?php echo $varJurusan ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=ubahsiswa&id=<?php echo $varId_siswa ?>">Ubah</a> 
                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=admindatasiswa&id=<?php echo $varId_siswa ?>">Hapus</a>
                    </td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>