<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include('../View/Layout/header.php')?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="http://www.uni-muenster.de/Psychodiagnostik/public/project_pictures/logo_select.png" class="d-block w-100" alt="..." width="100" height="500">
        </div>
        <div class="carousel-item ">
            <img src="https://www.elegantthemes.com/blog/wp-content/uploads/2019/06/php-update-featured-image.jpg" class="d-block w-100" alt="..." width="100" height="500">
        </div>
        <div class="carousel-item">
            <img src="http://www.clker.com/cliparts/b/H/x/y/x/6/add-button-hi.png" class="d-block w-100" alt="..." width="100" height="500">
        </div>
        <div class="carousel-item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1tVHEVVDzL52RFmEJWWiqTE4NxmZkfKdzpjmGTLmgRWqe6GEn&s" class="d-block w-100" alt="..." width="100" height="500">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php include('../View/Layout/footer.php')?>

</body>
</html>