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
    <h4 class="text-center" style="font-weight: bold">Tujuan dan Sasaran Strategis Puslitbangwas</h4>
    &nbsp;
    <p style="font-weight: bold">Tujuan Strategis</p>
    <p>&nbsp; &nbsp; Tujuan merupakan penjabaran dan operasionalisasi atas pernyataan misi yang akan dicapai atau dihasilkan dalam jangka waktu satu sampai dengan lima tahun. Tujuan ini disusun berdasarkan hasil identifikasi potensi dan permasalahan yang akan dihadapi dalam rangka mewujudkan visi dan melaksanakan misi Puslitbangwas BPKP. Tujuan Puslitbangwas BPKP sesuai dengan misi yang telah ditetapkan adalah:</p>
    <p>
        1. Meningkatkan hasil-hasil penelitian dan pengembangan yang mendukung peningkatan kualitas BPKP sebagai Auditor Presiden. </br>
        2. Meningkatkan hasil-hasil penelitian dan pengembangan yang mendukung pengembangan SPIP dan akuntabilitas keuangan negara. </br>
        3. Meningkatkan kapasitas Puslitbangwas yang inovatif. </br>
    </p>
    <p style="font-weight: bold">Sasaran Strategis</p>
    <p>&nbsp; &nbsp; Sasaran strategis merupakan penjabaran lebih lanjut dari tujuan, yang dirumuskan secara spesifik dan terukur untuk dapat dicapai dalam kurun waktu lebih pendek dari tujuan. Sasaran strategis merupakan ukuran pencapaian dari tujuan. Sasaran Puslitbangwas merupakan bagian integral dari proses perencanaan strategis dan ditetapkan untuk dapat menjamin suksesnya pelaksanaan jangka menengah yang bersifat menyeluruh, serta untuk memudahkan pengendalian dan pemantauan kinerja organisasi</p>
    <p>Sasaran strategis Puslitbangwas untuk tujuan meningkatkan hasil-hasil penelitian dan pengembangan yang mendukung peningkatan kualitas BPKP sebagai Auditor Presiden, sebagai berikut:</p>
    <p>
        1. Termanfaatkannya hasil litbang untuk peningkatan kompetensi SDM BPKP sebagai Auditor Presiden. </br>
        2. Termanfaatkannya hasil litbang untuk peningkatan kualitas pengawasan BPKP. </br>
    </p>
    <p>&nbsp; &nbsp; Sasaran strategis dalam rangka meningkatkan hasil-hasil penelitian dan pengembangan yang mendukung pengembangan SPIP dan akuntabilitas keuangan negara, sebagai berikut:</p>
    <p>
        1. Termanfaatkannya hasil-hasil penelitian dan pengembangan yang mendukung pengembangan SPIP. </br>
        2. Termanfaatkannya hasil-hasil penelitian dan pengembangan yang mendukung pengembangan tentang akuntabilitas keuangan Negara. </br>
    </p>
    <p>
        &nbsp; &nbsp; Untuk tujuan ketiga, yaitu meningkatkan kapasitas Puslitbangwas yang inovatif, sasaran strategis yang ditetapkan adalah: peningkatan kapasitas Puslitbangwas yang inovatif.
    </p>
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