<?php 
include "koneksi.php"; 
$base_url="http://localhost/baru/";
session_start();
?>
<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='logout') {
        session_destroy();
        echo "<script>window.location=('index.php')</script>";   
    } 
}

?>
<?php include "template/header.php"; ?>
<?php include "template/sidebar.php"; ?>
<?php 


if (isset($_GET ['halaman'])) {

    if ($_GET['halaman']=='admindataguru') {
        include'aplikasi/admin/dataguru/data_guru.php';
    }
    else if ($_GET['halaman']=='ubahguru') {
        include'aplikasi/admin/dataguru/ubah_guru.php';
    }
    else if ($_GET['halaman']=='tambahguru') {
        include'aplikasi/admin/dataguru/tambah_guru.php';
    }


    else if ($_GET['halaman']=='admindatajurusan') {
        include'aplikasi/admin/datajurusan/data_jurusan.php';
    }
    else if ($_GET['halaman']=='ubahjurusan') {
        include'aplikasi/admin/datajurusan/ubah_jurusan.php';
    }
    else if ($_GET['halaman']=='tambahjurusan') {
        include'aplikasi/admin/datajurusan/tambah_jurusan.php';
    }


    else if ($_GET['halaman']=='admindatakelas') {
        include'aplikasi/admin/datakelas/data_kelas.php';
    }
    else if ($_GET['halaman']=='ubahkelas') {
        include'aplikasi/admin/datakelas/ubah_kelas.php';
    }
    else if ($_GET['halaman']=='tambahkelas') {
        include'aplikasi/admin/datakelas/tambah_kelas.php';
    }



    else if ($_GET['halaman']=='admindatapengguna') {
        include'aplikasi/admin/datapengguna/data_pengguna.php';
    }
    else if ($_GET['halaman']=='ubahpengguna') {
        include'aplikasi/admin/datapengguna/ubah_pengguna.php';
    }
    else if ($_GET['halaman']=='tambahpengguna') {
        include'aplikasi/admin/datapengguna/tambah_pengguna.php';
    }



    else if ($_GET['halaman']=='admindatasiswa') {
        include'aplikasi/admin/datasiswa/data_siswa.php';
    }
    else if ($_GET['halaman']=='ubahsiswa') {
        include'aplikasi/admin/datasiswa/ubah_siswa.php';
    }
    else if ($_GET['halaman']=='tambahsiswa') {
        include'aplikasi/admin/datasiswa/tambah_siswa.php';
    }


     else if ($_GET['halaman']=='admindatatagihan') {
        include'aplikasi/admin/detailtagihan/detail_tagihan.php';
    }
    else if ($_GET['halaman']=='detailpengembangan') {
        include'aplikasi/admin/detailtagihan/detail_pengembangan.php';
    }
    else if ($_GET['halaman']=='tambahdetailpengembangan') {
        include'aplikasi/admin/detailtagihan/tambah_detailpengembangan.php';
    }
    else if ($_GET['halaman']=='ubahdetailpengembangan') {
        include'aplikasi/admin/detailtagihan/ubah_detailpengembangan.php';
    }
    else if ($_GET['halaman']=='detailsaranaprasarana') {
        include'aplikasi/admin/detailtagihan/detail_saranaprasarana.php';
    }
    else if ($_GET['halaman']=='tambahdetailsaranaprasarana') {
        include'aplikasi/admin/detailtagihan/tambah_detailsarana.php';
    }
    else if ($_GET['halaman']=='ubahdetailsarana') {
        include'aplikasi/admin/detailtagihan/ubah_detailsarana.php';
    }
    else if ($_GET['halaman']=='detailspp') {
        include'aplikasi/admin/detailtagihan/detail_spp.php';
    }
    else if ($_GET['halaman']=='tambahdetailspp') {
        include'aplikasi/admin/detailtagihan/tambah_detailspp.php';
    }
    else if ($_GET['halaman']=='ubahdetailspp') {
        include'aplikasi/admin/detailtagihan/ubah_detailspp.php';
    }
    else if ($_GET['halaman']=='detailujian') {
        include'aplikasi/admin/detailtagihan/detail_ujian.php';
    }
    else if ($_GET['halaman']=='tambahdetailujian') {
        include'aplikasi/admin/detailtagihan/tambah_detailujian.php';
    }
    else if ($_GET['halaman']=='ubahdetailujian') {
        include'aplikasi/admin/detailtagihan/ubah_detailujian.php';
    }




    else if ($_GET['halaman']=='admindatatransaksi') {
        include'aplikasi/admin/datatransaksi/data_transaksi.php';
    }
    else if ($_GET['halaman']=='tambahtransaksi') {
        include'aplikasi/admin/datatransaksi/tambah_transaksi.php';
    }
    else if ($_GET['halaman']=='transaksipengembangan') {
        include'aplikasi/admin/datatransaksi/transaksi_pengembangan.php';
    }
    else if ($_GET['halaman']=='transaksisaranaprasarana') {
        include'aplikasi/admin/datatransaksi/transaksi_saranaprasarana.php';
    }
    else if ($_GET['halaman']=='transaksispp') {
        include'aplikasi/admin/datatransaksi/transaksi_spp.php';
    }
    else if ($_GET['halaman']=='transaksiujian') {
        include'aplikasi/admin/datatransaksi/transaksi_ujian.php';                                                           
    }



    else if ($_GET['halaman']=='admindatalaporan') {
        include'aplikasi/admin/datalaporan/data_laporan.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporanguru') {
        include'aplikasi/admin/datalaporan/laporan_data_guru.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporansiswa') {
        include'aplikasi/admin/datalaporan/laporan_data_siswa.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporanpengembangan') {
        include'aplikasi/admin/datalaporan/laporan_pengembangan.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporansarana') {
        include'aplikasi/admin/datalaporan/laporan_sarana.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporanspp') {
        include'aplikasi/admin/datalaporan/laporan_spp.php';                                                           
    }
    else if ($_GET['halaman']=='datalaporanujian') {
        include'aplikasi/admin/datalaporan/laporan_ujian.php';                                                           
    }





    else if ($_GET['halaman']=='siswadatalaporan') {
        include'aplikasi/siswa/siswalaporan/siswa_laporan.php';
    }
    else if ($_GET['halaman']=='siswalaporanpengembangan') {
        include'aplikasi/siswa/siswalaporan/siswalaporan_pengembangan.php';
    }
    else if ($_GET['halaman']=='siswalaporansarana') {
        include'aplikasi/siswa/siswalaporan/siswalaporan_sarana.php';
    }
    else if ($_GET['halaman']=='siswalaporanspp') {
        include'aplikasi/siswa/siswalaporan/siswalaporan_spp.php';
    }
    else if ($_GET['halaman']=='siswalaporanujian') {
        include'aplikasi/siswa/siswalaporan/siswalaporan_ujian.php';
    }



}
else{

    include 'aplikasi/dashboard.php';
}

 ?>

<?php include 'template/footer.php'; ?>