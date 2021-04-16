<?php
// include_once ("koneksi/konekdb.php");
?>

<html>
	<head>
		<title>Website Puslitbangwas</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
	</head>
	<body style="overflow: auto;">
    <div class="headerpage">
        <div class="container">
            <div class="top-header" style="margin-bottom: 15px; margin-right: 15px; margin-top: 40px">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                            <img class="logo-img" src="image/BPKP_Logo.png" style="width: 20%;"> <h3>PUSLITBANGWAS</h3>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <form class="form-search" action method="post">
                            <div class="input-group">
                                <input style="border: 1px solid #0073ba;" type="text" name="s" value class="form-control" placeholder="Apa yang ingin Anda cari?">
                                <span class="input-group-btn" style="border: 1px #0073ba;">
                                    <button type="submit" class="btn" style="background: #ffc107">
                                        <i class="fa fa-search">

                                        </i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar top-nav nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div id="navbar-menu" class="collapse navbar-collapse">
                <ul id="menu-utama" class="nav nav-justified">
                    <li id="menu-item-8" class="menu-item-8 dropdown">
                        <a title="Profil" href="#" data-togle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="true">
                            "Profil"
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li id="menu-item-135" class="menu-item menu-item-135">
                                <a title="Visi Misi" href="menu">Visi Misi</a>
                            </li>
                            <li id="menu-item-135" class="menu-item menu-item-135">
                                <a title="Visi Misi" href="menu">Tugas Pokok</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-8" class="menu-item-8 dropdown">
                        <a title="Informasi" href="#" data-togle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="true">
                            "Informasi"
                            <span class="caret"></span>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li id="menu-item-135" class="menu-item menu-item-135">
                                <a title="Visi Misi" href="menu">Informasi Berkala</a>
                            </li>
                            <li id="menu-item-135" class="menu-item menu-item-135">
                                <a title="Visi Misi" href="menu">Informasi Setiap Saat</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="fotoslider">
        <div class="container">
            <div class="row">
                <div id="home_slider" class="carousel slide" data-ride="carousel">
                    <div class="controllers col-sm-12 col-xs-12">
                        <a class="left carousel-control" href="#home-slider" data-slide="prev">
                            <span class="fa fa-chevron-left-icon-prev">
                            </span>
                        </a>
                        <a class="right carousel-control" href="#home-slider" data-slide="next">
                            <span class="fa fa-chevron-right-icon-next">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" style="padding: 80px;">
        <div class="produklitbang">
            <div class="row">
                <a href="menu">
                    <div class="col-md-4">
                        <div class="containerhomeicon">
                            <div class="overlay-position">
                                <img src="image/1.jpg" width="100%" class="img-responsive">
                                <div class="overlayhomeicon">
                                    <div class="texthomeicon">Kumpulan Jurnal Ilmiah Puslitbangwas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="hasildankegiatan">
        <div class="row-fluid">
            <div class="col-md-10">
                <h3>Hasil Litbang</h3>
            </div>
            <div class="col-md-2">
                <h4>Kegiatan Litbang</h4>
            </div>
        </div>
    </div>
	</body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/Bootstrap-Validators.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#form-login').bootstrapValidator({
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Harap isi username terlebih dahulu'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Username harus lebih dari 6 dan kurang dari 30 karakter panjangnya'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Username hanya dapat diisi dengan huruf alfabet, angka dan underscore'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password harus diisi'
                    },
                    stringLength: {
                        min: 6,
                        
                        message: 'Password harus lebih dari 6 karakter panjangnya'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'Password hanya dapat diisi dengan huruf alfabet, angka dan underscore'
                    }
                }
            }
        }
    });

});
</script>
<?php if(@$_REQUEST['loginStatus'] === "error"):?>
    <script>
        alert("Username dan Password tidak sesuai !");
    </script>
<?php endif; ?>