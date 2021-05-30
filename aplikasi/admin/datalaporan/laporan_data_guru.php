     <div id="content-wrapper">

        <div class="container-fluid">

          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Laporan Data Guru</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Cetak Data Guru</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Nama Guru</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $no=1;
                  $Querytampil = mysqli_query($konek,"SELECT * FROM tb_guru");
                  while ($tampiltabel  = mysqli_fetch_array($Querytampil)) {
                  $varId_Guru      = $tampiltabel['id_guru'];
                  $varNamaGuru     = $tampiltabel['nama_guru'];
                  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $varId_Guru ?></td>
                    <td><?php echo $varNamaGuru ?></td>
                  </tr>
                  <?php
                  $no++;}
                  ?>  
                                        
                  </tbody>
                </table>
                
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