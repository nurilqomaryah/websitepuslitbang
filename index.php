<html>
    <head>
        <title>Puslitbangwas BPKP</title>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="./css/custom.css"/>
        <link rel="stylesheet" type="text/css" href="./js/slick-1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="./js/slick-1.8.1/slick/slick-theme.css"/>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Google Font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300&display=swap" rel="stylesheet">
        <style>
            html{
                scroll-behavior: smooth;
            }
        </style>
    </head>
    <body>
        <?php include ("module/navigation/main-menu.php"); ?>
        <?php include ("module/carousel/main-carousel.php"); ?>
        <?php include ("module/redirect/main.php"); ?>
        <div class="container" style="padding-top: 3em; padding-bottom: 3em;">
            <div class="col-md-9 animate-box fadeInUp animated-fast">
                <?php include("module/litbang/artikel.php"); ?>
            </div>
            <div class="col-md-1 animate-box fadeInUp animated-fast"></div>
            <div class="col-md-2 animate-box fadeInUp animated-fast" style="padding-top: 10px; padding-left: 30px; padding-bottom: 30px; float: right;">
                <?php include ("module/litbang/kegiatan.php"); ?>
            </div>
        </div>
        <?php include ("module/infografis/main.php"); ?>
        <?php include ("module/penghargaan/main.php"); ?>
    </body>
    <footer>
        <?php include ("module/footer/main.php"); ?>
    </footer>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Hadir Bermanfaat Untuk Para APIP</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/slick-1.8.1/slick/slick.js"></script>
<script type="text/javascript" src="js/jssor.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
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

    AOS.init();
</script>