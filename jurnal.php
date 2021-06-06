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
<div class="container" style="padding: 4em;">
    <h4 class="text-center" style="font-weight: bold">Jurnal Pengawasan</h4>
    &nbsp;
    <div class="row text-center">
        <div class="col-md-3">
            <img src="./image/jurnal/Jurnal Pengawasan Vol. 2 No. 2 September 2020 Cover-1.jpg" style="width: 60%;">
            <h5 style="color: #0c0c0c; font-weight: bold; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">Jurnal Pengawasan Vol. 2 No. 2 Sept 2020</h5>
            <a href="http://www.bpkp.go.id/public/upload/unit/puslitbangwas/files/PPM_Jurnal.pdf" target="_blank"><button type="button" class="btn btn-primary btn-xs">Unduh Jurnal</button></a>
        </div>
        <div class="col-md-3">
            <img src="./image/jurnal/Jurnal Pengawasan Vol. 2 No. 1 Final (Cover)(1).jpg" style="width: 60%;">
            <h5 style="color: #0c0c0c; font-weight: bold; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">Jurnal Pengawasan Vol. 2 No. 1 Maret 2020</h5>
            <a href="https://eos.bpkp.go.id/ipms_pro/kms/insight/id" target="_blank"><button type="button" class="btn btn-primary btn-xs">Unduh Jurnal</button></a>
        </div>
        <div class="col-md-3">
            <img src="./image/jurnal/Cover Depan Jurnal Final_Resize.jpg" style="width: 60%;">
            <h5 style="color: #0c0c0c; font-weight: bold; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">Jurnal Pengawasan Vol. 1 No. 1 Sept 2019</h5>
            <a href="#"><button type="button" class="btn btn-primary btn-xs">Unduh Jurnal</button></a>
        </div>
        <div class="col-md-3">
            <img src="./image/jurnal/Cover Depan Jurnal Final_Resize.jpg" style="width: 60%;">
            <h5 style="color: #0c0c0c; font-weight: bold; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;">Jurnal Pengawasan Vol. 1 No. 1 Sept 2019</h5>
            <a href="#"><button type="button" class="btn btn-primary btn-xs">Unduh Jurnal</button></a>
        </div>
    </div>
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
