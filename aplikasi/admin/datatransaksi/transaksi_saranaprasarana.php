      <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="beranda.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Tagihan Uang Sarana Prasarana</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tabel Uang Sarana Prasarana</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Nama Angsuran</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT a.id_tag_saranaprasarana, a.nis, a.keterangan,a.tgl,b.`nama_angsuran`,b.`jumlah`,c.`nama_siswa`
                  FROM tb_tag_saranaprasarana a
                  LEFT JOIN `detail_tag_sarana` b ON a.`id_detail_sarana`=b.`id_detail_sarana` 
                  LEFT JOIN `tb_siswa` c ON a.`nis`=c.`nis` WHERE a.nis='$_GET[nis]'");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId            = $tampiltabel['id_tag_saranaprasarana'];
                  $varNis  = $tampiltabel['nis'];
                  $varNamaSiswa  = $tampiltabel['nama_siswa'];
                  $varKeterangan  = $tampiltabel['keterangan'];
                  $varTgl  = $tampiltabel['tgl'];
                  $varJml  = $tampiltabel['jumlah'];
                  $varAngsuran  = $tampiltabel['nama_angsuran'];                
                  ?>

                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId ?></td>
                    <td><?php echo $varNamaSiswa ?></td>
                    <td><?php echo $varAngsuran ?></td>
                    <td><?php echo $varJml ?></td>
                    <td><?php echo $varTgl ?></td>
                    <td><?php echo $varKeterangan ?></td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="beranda.php?halaman=transaksisaranaprasarana&id=<?php echo $varId ?>&nis=<?php echo $varNis ?>&bayar=bayar">Bayar</a>

                        <a class="btn btn-danger btn-sm" href="beranda.php?halaman=transaksisaranaprasarana&id=<?php echo $varId ?>&nis=<?php echo $varNis ?>&batal=batal">Batal</a>
                    </td>
                  </tr>
                  <?php
                  $no++;}
                  ?>                    
                  
                  </tbody>
                </table>

                 <?php
                    if (isset($_GET['id']) && $_GET['id']!=''&& isset($_GET['bayar']) && $_GET['bayar']!='') {
                        $idTransaksi   = $_GET['id'];
                        $tglBayar      = date('Y-m-d');
                        mysqli_query($konek, "UPDATE `tb_tag_saranaprasarana` SET keterangan='Lunas',
                          tgl='$tglBayar'
                          WHERE `id_tag_saranaprasarana`='$idTransaksi'");
                      echo"<script>alert('Data berhasil dirubah');window.location='beranda.php?halaman=transaksisaranaprasarana&nis=".$varNis."';</script>";
                      } 

                      if (isset($_GET['id']) && $_GET['id']!=''&& isset($_GET['batal']) && $_GET['batal']!='') {
                        $idTransaksi    = $_GET['id'];
                        $tglBayar       = date('Y-m-d');
                        mysqli_query($konek, "UPDATE `tb_tag_saranaprasarana` SET keterangan='Belum Lunas',
                          tgl='0000-00-00'
                          WHERE `id_tag_saranaprasarana`='$idTransaksi'");
                        echo"<script>alert('Data berhasil dirubah');window.location='beranda.php?halaman=transaksisaranaprasarana&nis=".$varNis."';</script>";
                      }
                 ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>