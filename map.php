<?php
include('header.php');
require('connect.php');
require('viewsCounter.php');

updateViewCount('map');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Active Cases Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/map.css" rel="stylesheet">
    <link href="../css/buildingsAndRH.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <input type="text" id="hiddenTId" value="<?php echo $t_id; ?>" hidden>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pb-5">
                <a href="home.php" class="btn btn-danger mt-3">Return back to Home</a>
                <h4 class="pt-3">Live Active Cases Map:</h4>
                <div id="zone-image-container">
                    <img src="../img/planetMap.png" id="map"/>
                </div>
            </div>

            <div class="container pb-5">
                <h4 class="pt-3">Historically Most Infected Buildings:</h4>
                <h5>Note: Vertical bar height is in comparison with the most infected building</h5>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A1"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A2"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A3"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A4"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A5"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A6"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A7"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A8"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A9"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A10"> </div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A11"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A12"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A13"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A14"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A15"></div>
                </div>
                <div class="progress progress-bar-vertical building-bar">
                    <div class="progress-bar progress-bar-striped" id="A16"></div>
                </div>
            </div>

            <div class="container pb-1">
                <h4 class="pt-3">Historically Infected Row Houses:</h4>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH1"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH2"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH3"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH4"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH5"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH6"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH7"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH8"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH9"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH10"> </div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH11"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH12"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH13"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH14"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH15"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH16"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH17"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH18"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH19"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH20"></div>
                </div>
            </div>

            <div class="container pb-5">
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH21"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH22"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH23"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH24"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH25"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH26"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH27"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH28"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH29"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH30"> </div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH31"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH32"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH33"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH34"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH35"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH36"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH37"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH38"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH39"></div>
                </div>
                <div class="progress progress-bar-vertical row-house-bar">
                    <div class="progress-bar progress-bar-striped bg-danger" id="RH40"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/drawZonesOnMap.js"></script>
    <script src="../js/historicallyInfectedCases.js"></script>
    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>
</body>
</html>
