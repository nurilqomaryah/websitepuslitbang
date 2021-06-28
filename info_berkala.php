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

<div class="container" style="padding: 2em; text-align: justify;">
    <h4 class="text-center" style="font-weight: bold">Informasi Berkala</h4>
    &nbsp;
    <table align="center">
        <tr>
            <th style="width: 10%; text-align: center">No</th>
            <th style="width: 60%; text-align: center">Jenis Informasi</th>
            <th style="width: 30%; text-align: center">File</th>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td><b>Program dan Kegiatan</b></td>
            <td style="text-align: center"></td>
        </tr>
        <tr>
            <td></td>
            <td>a. Renstra Tahun 2015-2019</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>b. Perjanjian Kinerja Tahun 2019</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>- Esselon III</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>- Esselon IV</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Hasil Pelaksanaan Program dan Kegiatan</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a. Laporan Kinerja Tahun 2019 dan sebelumnya</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>b. Laporan Kinerja Tahun 2020</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>c. Laporan Kinerja Triwulanan Tahun 2021</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Informasi Anggaran (DIPA dan RKA KL) Tahun 2020</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Ringkasan Laporan Keuangan</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a. Laporan Realisasi Anggaran per 31 Desember 2019</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td></td>
            <td>b. Neraca sampai dengan 31 Desember 2019</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">5</td>
            <td>Laporan Barang Milik Negara (BMN) per 31 Desember 2019</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">6</td>
            <td>Informasi tentang Prosedur Layanan Informasi</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">7</td>
            <td>Informasi tentang Laporan Akses Layanan Informasi</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">8</td>
            <td>Rencana Umum Pengadaan</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">9</td>
            <td>Pengumuman Pengadaan Barang dan Jasa</td>
            <td style="text-align: center">Lihat</td>
        </tr>
        <tr>
            <td style="text-align: center">10</td>
            <td>Sistem Pengelolaan Pengaduan</td>
            <td style="text-align: center">Lihat</td>
        </tr>
    </table>
    &nbsp;
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
    $(document).ready(function() {
        var dialogShown = localStorage.getItem('dialogShown')

        if (!dialogShown) {
            $(window).load(function(){
                $( "#modal" ).modal('show');
                localStorage.setItem('dialogShown', 1)
            });
        }
        else {
            $("#dialog1").hide();
        }

        //Multi-line
        jssor_1_slider_init = function() {

            var jssor_1_options = {
                $AutoPlay: 1,
                $AutoPlaySteps: 5,
                $SlideDuration: 160,
                $SlideWidth: 200,
                $SlideSpacing: 3,
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,
                    $Steps: 5
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

        // jssor_1_slider_init();
    });

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