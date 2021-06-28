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
    <h4 class="text-center" style="font-weight: bold">Sekapur Sirih</h4>
    &nbsp;
    <p>Peraturan Pemerintah Nomor 60 Tahun 2008 tentang Sistem Pengendalian Intern Pemerintah memberikan mandat kepada BPKP untuk berperan dalam pengawasan intern terhadap kegiatan lintas sektoral, kegiatan kebendaharaan umum negara, dan kegiatan yang ditugaskan Presiden. Selain itu, BPKP juga mempunyai peran untuk melakukan pembinaan terhadap penyelenggaraan SPIP dan mereviu Laporan Keuangan Pemerintah Pusat.</p>
    <p>Pusat Penelitian dan Pengembangan Pengawasan (Puslitbangwas) BPKP sebagai salah satu unit kerja di lingkungan BPKP merasa terpanggil untuk berperan aktif dalam mendukung tugas-tugas BPKP tersebut. Terlebih dalam kedudukannya sebagai satu-satunya lembaga penelitian dan pengembangan di lingkungan BPKP, selayaknya Puslitbangwas senantiasa berupaya untuk menumbuhkan kemampuan pemajuan ilmu pengetahuan dan teknologi serta menggali potensi pendayagunaannya sebagaimana yang diamanatkan dalam pasal 8 ayat (1) dan (2) Undang-undang Nomor 18 Tahun 2002 tentang Sistem Nasional Penelitian, Pengembangan, dan Penerapan Ilmu Pengetahuan dan Teknologi.</p>
    <p>Website ini diharapkan menjadi salah satu media untuk menyebarluaskan aktivitas dan hasil penelitian yang telah dilakukan Puslitbangwas BPKP sehingga produk-produk penelitian Puslitbangwas BPKP dapat diketahui secara luas bukan hanya terbatas di lingkungan BPKP, namun juga di lingkungan APIP pada umumnya.</p>
    <p>Inilah salah satu karya Puslitbangwas BPKP dalam berperan serta membangun organisasi BPKP melalui penyebarluasan informasi dalam bingkai knowledge management. Kami sangat berharap informasi yang disajikan dalam website ini bermanfaat bukan hanya bagi internal BPKP tetapi juga bagi dunia pengawasan pada umumnya.</p>
    <p>Semoga apa yang kami sajikan dapat memberi manfaat bagi Anda.</p>
    <div>
        <img src="./image/IMG_4723.jpg" alt style="width: 30%; alignment: left;"/>
    </div>
    &nbsp;
    <p><b>Sasono Adi</b></p>
    <h5>Kapuslitbangwas</h5>
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