<html>
    <head>
        <title>Puslitbangwas BPKP</title>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Google Font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php include ("module/navigation/main-menu.php"); ?>
        <?php include ("module/carousel/main-carousel.php"); ?>
        <?php include ("module/redirect/main.php"); ?>
        <div class="container" style="padding-top: 3em; padding-bottom: 3em;">
            <div class="col-md-9">
                <?php include ("module/litbang/hasil.php"); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2" style="padding-top: 10px; padding-left: 30px; padding-bottom: 30px; float: right;">
                <?php include ("module/litbang/kegiatan.php"); ?>
            </div>
        </div>
        <?php include ("module/penghargaan/main.php"); ?>
        <?php include ("module/infografis/main.php"); ?>
    </body>
    <footer>
        <?php include ("module/footer/main.php"); ?>
    </footer>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>