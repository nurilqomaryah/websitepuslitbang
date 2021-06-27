<html>
<head>
    <title>Puslitbangwas BPKP</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="./js/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./js/slick-1.8.1/slick/slick-theme.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<?php include ("module/navigation/main-menu.php"); ?>

<div class="container" style="padding-top: 20px; padding-bottom: 60px;">
        <div class="col-md-6">
            <h3>Hubungi Kami</h3>
            <p style="text-align: justify">Jika Anda ingin meminta hasil Litbang, Anda dapat mengklik tautan berikut:</p>
            <a href="https://eos.bpkp.go.id/ppid/public/">https://eos.bpkp.go.id/ppid/public/</a>
        <!--    <a href="files/Form Permintaan Hasil Litbang.docx">Form Permintaan Hasil Litbang</a> -->
            <div style="border-bottom: 5px solid #FFA500; padding-top: 2em;"></div>
            &nbsp;
            <p style="text-align: justify">Jika Anda memiliki pertanyaan, saran, atau komentar Anda dapat mengisi form di bawah ini.</p>
                <form action="#" method="post">
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" />
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email" />
                    </div>
                    <div class="form-group">
                        <label>Keterangan:</label>
                        <textarea class='form-control' rows="10" placeholder="Masukan Keterangan"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </form>
        </div>
        <div class="col-md-6">
            <h3>Lokasi Kami</h3>
            <p>
                BPKP Perwakilan Provinsi DKI Jakarta Lantai 4 <br>
                Jalan Pramuka No. 33 Jakarta Timur, 13120
            </p>
            <p> </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5370991402847!2d106.87012471478356!3d-6.19263319551689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4f39c91fb37%3A0x973df16590d2b772!2sBPKP%20Representative%20Of%20DKI%20Jakarta%20Province!5e0!3m2!1sen!2sid!4v1622360796864!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

</div>

</body>
<footer>
    <?php include ("module/footer/main.php"); ?>
</footer>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/slick-1.8.1/slick/slick.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.getElementById('navbar-top').classList.add('navbar-fixed-top');
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar-top').classList.remove('navbar-fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>