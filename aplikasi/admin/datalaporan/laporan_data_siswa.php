     <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Laporan Data Siswa</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Cetak Data siswa</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Siswa</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Jenis kelamin</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
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
                  $varId_Siswa      = $tampiltabel['id_siswa'];
                  $varNis           = $tampiltabel['nis'];
                  $varNamaSiswa     = $tampiltabel['nama_siswa'];
                  $varJenkel        = $tampiltabel['jenkel_siswa'];
                  $varKelas         = $tampiltabel['nama_kelas'];
                  $varJurusan       = $tampiltabel['nama_jurusan'];
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_Siswa ?></td>
                    <td><?php echo $varNis ?></td>
                    <td><?php echo $varNamaSiswa ?></td>
                    <td><?php echo $varJenkel ?></td>
                    <td><?php echo $varKelas ?></td>
                    <td><?php echo $varJurusan ?></td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
                  
                  </tbody>
                </table>
                <br>
                <center>
                <a href="#" class="btn btn-primary" onclick="window.print();"> Cetak/Print </a>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>