<?php
include('header.php');
require('viewsCounter.php');

updateViewCount('protectYourself');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Protect Yourself</title>
    <link href="../css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br/>
                <a href="home.php" class="btn btn-danger">Return back to Home</a>
                <h3 class="mt-3">How to wear mask:</h3>
                <img src="../img/mask.jpg"/>
                <h3 class="mt-5">Follow social distancing:</h3>
                <img style="width: 50em" src="../img/distance.png"/>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>
</body>
</html>
