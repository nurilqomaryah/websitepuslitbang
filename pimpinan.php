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
    <h4 class="text-center" style="font-weight: bold">Profil Pimpinan</h4>
    &nbsp;
    <div class="text-center">
        <img src="./image/pimpinan/Profil Pimpinan_Sasono Adi(1).png" alt style="width: 50%;"/>
    </div>
    &nbsp;
    <div class="text-center">
        <img src="./image/pimpinan/Profil%20Pimpinan_Sutisna.png" alt style="width: 50%;"/>
    </div>
    &nbsp;
    <div class="text-center">
        <img src="./image/pimpinan/Profil%20Pimpinan_Arinto.png" alt style="width: 50%;"/>
    </div>
    &nbsp;
    <div class="text-center">
        <img src="./image/pimpinan/Profil%20Pimpinan_Rury.png" alt style="width: 50%;"/>
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