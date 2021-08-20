<?php
@session_start();
include "../koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['author']) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php cek_session("Halaman Administrator", "Halaman Author"); ?> e-Learning</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href="assets/css/font-opensans.css" rel="stylesheet" />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <style type="text/css">
    .link:hover { cursor:pointer; }
    </style>
</head>

<body>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/custom-scripts.js"></script>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"><?php cek_session("Administrator", "Author"); ?></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <?php
                        if(@$_SESSION['admin']) {
                            $sesi_id = @$_SESSION['admin'];
                            $level = "admin";
                        } else if(@$_SESSION['author']) {
                            $sesi_id = @$_SESSION['author'];
                            $level = "author";
                        }
                        global $db;
                        if($level == 'admin') {
                            $sql_terlogin = mysqli_query($db, "SELECT * FROM m_user WHERE id_user = '$sesi_id' AND id_role=1") or die ($db->error);
                        } else if($level == 'author') {
                            $sql_terlogin = mysqli_query($db, "SELECT * FROM m_user WHERE id_user = '$sesi_id' AND id_role=2") or die ($db->error);
                        }
                        $data_terlogin = mysqli_fetch_array($sql_terlogin);
                        echo ucfirst($data_terlogin['nama_user']);
                        ?>
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="?hal=editprofil"><i class="fa fa-user fa-fw"></i> Edit Profil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php cek_session('logout.php?sesi=admin', 'logout.php?sesi=author'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="<?php if(@$_GET['page'] == '') { echo 'active-menu'; } ?>" href="./"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <?php
                    if(@$_SESSION['admin']) 
					{
                    ?>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'manajemensiswa') { echo 'active-menu'; } ?>" href="?page=manajemensiswa"><i class="fa fa-sitemap"></i> Data Siswa</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'pengajar') { echo 'active-menu'; } ?>" href="?page=pengajar"><i class="fa fa-book"></i> Data Pengajar</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'kelas') { echo 'active-menu'; } ?>" href="?page=kelas"><i class="fa fa-table"></i> Manajemen Kelas</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'mapel') { echo 'active-menu'; } ?>" href="?page=mapel"><i class="fa fa-fw fa-file"></i> Mata Pelajaran</a>
                        </li>
                        <!--<li>
                            <a class=" <?php /*if(@$_GET['page'] == 'penentuanmapel') { echo 'active-menu'; } */?>" href="?page=penentuanmapel"><i class="fa fa-table"></i> Penentuan Mata Ajar</a>
                        </li>-->
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'quiz') { echo 'active-menu'; } ?>" href="?page=quiz"><i class="fa fa-bar-chart-o"></i> Manajemen Test/Ujian</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'materi') { echo 'active-menu'; } ?>" href="?page=materi"><i class="fa fa-qrcode"></i> Manajemen Materi</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'latihan_soal') { echo 'active-menu'; } ?>" href="?page=latihan_soal"><i class="fa fa-desktop"></i> Manajemen Latihan Soal</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'berita') { echo 'active-menu'; } ?>" href="?page=berita"><i class="fa fa-calendar"></i> Setting Jadwal Les</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'laporanabsen') { echo 'active-menu'; } ?>" href="?page=laporanabsen"><i class="fa fa-calendar"></i> Rekap Kehadiran Siswa</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'rekapnilai') { echo 'active-menu'; } ?>" href="?page=rekapnilai"><i class="fa fa-table"></i> Rekap Nilai</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'audittrail') { echo 'active-menu'; } ?>" href="?page=audittrail"><i class="fa fa-table"></i> History Aktivitas</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'jumlahsoal') { echo 'active-menu'; } ?>" href="?page=jumlahsoal"><i class="fa fa-table"></i> Rekap Jumlah Soal </a>
                        </li>
					<?php
                    }
                    ?>
					
					<?php
                    if(@$_SESSION['author'])
					{
                    ?>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'manajemensiswa') { echo 'active-menu'; } ?>" href="?page=manajemensiswa"><i class="fa fa-sitemap"></i> Siswa</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'materi') { echo 'active-menu'; } ?>" href="?page=materi"><i class="fa fa-qrcode"></i> Materi</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'latihan_soal') { echo 'active-menu'; } ?>" href="?page=latihan_soal"><i class="fa fa-qrcode"></i> Latihan Soal</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'berita') { echo 'active-menu'; } ?>" href="?page=berita"><i class="fa fa-desktop"></i> Jadwal Les</a>
                        </li>
                        <li>
                            <a class="<?php if(@$_GET['page'] == 'siswa_evaluasi') { echo 'active-menu'; } ?>" href="?page=siswa_evaluasi"><i class="fa fa-table"></i> Evaluasi</a>
                        </li>
					<?php
                    }
                    ?>
					
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                
                <?php
                if(@$_GET['page'] == '') {
                    include "forms/dashboard.php";
                } else if(@$_GET['page'] == 'pengajar') {
                    include "inc/pengajar.php";
                } else if(@$_GET['page'] == 'siswaregistrasi') {
                    include "inc/siswaregistrasi.php";
                } else if(@$_GET['page'] == 'manajemensiswa') {
                    include "inc/manajemensiswa.php";
                } else if(@$_GET['page'] == 'kelas') {
                    include "inc/kelas.php";
                } /*else if(@$_GET['page'] == 'penentuanmapel') {
                    include "inc/penentuanmapel.php";
                }*/ else if(@$_GET['page'] == 'mapel') {
                    include "inc/mapel.php";
                } else if(@$_GET['page'] == 'quiz') {
                    include "inc/quiz.php";
                } else if(@$_GET['page'] == 'materi') {
                    include "inc/materi.php";
                } else if(@$_GET['page'] == 'latihan_soal') {
                    include "inc/latihan_soal.php";
				} else if(@$_GET['page'] == 'siswa_evaluasi') {
                    include "inc/siswa_evaluasi.php";
                } else if(@$_GET['page'] == 'berita') {
                    include "inc/berita.php";
                } else if(@$_GET['page'] == 'laporanabsen') {
                    include "inc/laporanabsen.php";
                } else if(@$_GET['page'] == 'rekapnilai') {
                    include "inc/rekapnilai.php";
                } else if(@$_GET['page'] == 'audittrail') {
                    include "inc/audittrail.php";
                }  else if(@$_GET['page'] == 'jumlahsoal') {
                    include "inc/jumlahsoal.php";
                }
                else {
                    echo "<div class='col-xs-12'><div class='alert alert-danger'>[404] Halaman tidak ditemukan! Silahkan pilih menu yang ada!</div></div>";
                } ?>
                
				<footer><p> &copy; 2021 Puslitbangwas BPKP</p></footer>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
 include "login.php";
}
?>