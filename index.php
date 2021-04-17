<html>
    <head>
        <title>Website Puslitbangwas</title>
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
        <div class="container">
            <div class="col-md-8">
                <?php include ("module/litbang/kegiatan.php"); ?>
            </div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-3">
                <?php include ("module/litbang/hasil.php"); ?>
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