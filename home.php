<?php
include('config.php');
include('tenant.php');
include('header.php');
require('connect.php');
require('viewsCounter.php');

updateViewCount('home');

$ip = getIpAddress();
$today = new DateTime();

$availableFeatures = $config[$society];

$query = "SELECT * FROM cases WHERE t_id = '$t_id' ORDER BY date";
$result = mysqli_query($conn, $query);

$activeCases = 0;
$totalCases = 0;
$casesArr = array();
while($row = mysqli_fetch_assoc($result)) {
    $daysPassed = $today->diff(new DateTime($row['date']))->format('%a');
    if($daysPassed < 14) {
        $activeCases += $row['count'];
    }
    $totalCases += $row['count'];
    $casesArr[] = $row;
}

$plasma = [
    'O+' => 'Anyone',
    'O-' => 'Anyone',
    'A+' => 'A, A-, AB, AB-',
    'A-' => 'A, A-, AB, AB-',
    'B+' => 'B, B-, AB, AB-',
    'B-' => 'B, B-, AB, AB- ',
    'AB+' => 'AB, AB-',
    'AB-' => 'AB, AB-',
];

$query = "SELECT * FROM plasma WHERE plasma.city = '$city'";
$result = mysqli_query($conn, $query);

$plasmaArr = array();
while($row = mysqli_fetch_assoc($result)) {
    $plasmaArr[] = $row;
}

// if(isset($_POST['saveFeedback'])) {
//     $feedback = mysqli_real_escape_string($conn, trim($_POST['feedback']));
//     $query = "INSERT INTO feedback (feedback, t_id) VALUES ('$feedback', '$t_id')";
//     if(mysqli_query($conn, $query)) {
//         echo "<script type=\"text/javascript\"> alert('Thank you for the feedback!'); location.href = 'home.php'; </script>";
//     } else {
//         echo "Error: " . $query . "<br>" . mysqli_error($conn);
//     }
// }

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Society Covid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/buttonIcons.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <?php
                        if (in_array('map.php', $availableFeatures)) {
                    ?>
                    <div class="col-4 pb-4"><center><a href="map.php" class="btn btn-danger btn-block"><?php echo $society; ?> - Covid Map</a></center></div>
                    <?php
                        }
                        if (in_array('vaccine.php', $availableFeatures)) {
                    ?>
                    <div class="col-4"><center><a href="vaccine.php" class="btn btn-warning btn-block"><?php echo $city; ?> - Vaccine Status</a></center></div>
                    <?php
                        }
                        if (in_array('lockdown.php', $availableFeatures)) {
                    ?>
                    <div class="col-4 pb-4"><center><a href="lockdown.php" class="btn btn-success btn-block">Info - Break the Chain</a></center></div>
                    <?php
                        }
                    ?>
                    <div class="col-4"><center><a href="society.php" class="btn btn-danger btn-block"><?php echo $society; ?> - Covid Spread</a></center></div>
                    <?php
                        if (in_array('city.php', $availableFeatures)) {
                    ?>
                    <div class="col-4 pb-4"><center><a href="city.php" class="btn btn-warning btn-block"><?php echo $city; ?> - Covid Spread</a></center></div>
                    <?php
                        }
                    ?>
                    <?php
                        if ($city == 'Pune') {
                    ?>
                        <div class="col-4"><center><a href="https://covidpune.com" class="btn btn-secondary btn-block"><?php echo $city; ?> - Find Hospital Beds</a></center></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <div class="col-6">
                <table class="table table-bordered table-hover table-sm" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Blood Group of patient</th>
                            <th>Blood Group Required</th>
                            <th>City</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $k = 0;
                        for ($i=count($plasmaArr)-1; $i>=0; $i=$i-1) {
                            if ($plasmaArr[$i]['type'] == "request") {
                                $k += 1;
                    ?>
                                <tr class="table-danger">
                                    <td><?php echo $plasmaArr[$i]['bloodgroup']; ?></td>
                                    <td><?php echo $plasma[$plasmaArr[$i]['bloodgroup']]; ?></td>
                                    <td><?php echo $plasmaArr[$i]['city']; ?></td>
                                    <td><?php echo $plasmaArr[$i]['phone']; ?></td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
                <center class="d-grid gap-2"><a href="plasma.php" class="btn btn-danger btn-block">Donate Plasma</a></center>
            </div>
            <div class="col-12 table-responsive pt-5">
                <center><h4>Active Cases in <?php echo $society; ?>: <span class="text-danger"><?php echo $activeCases ?></span>/<?php echo $totalCases ?></h4>
                <p><b class="text-danger">Note:</b> These are the reported cases that we know. As most of the cases are asymptomatic, there can be x6-x10 more cases.</p></center>
                <h4>All Reported Cases:</h4>
                <table class="table table-bordered table-hover mt-4" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Flat/RH</th>
                            <th>Cases Count</th>
                            <th>Date</th>
                            <th>Days Passed</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i=count($casesArr)-1; $i>=0; $i=$i-1) {
                            $daysPassed = $today->diff(new DateTime($casesArr[$i]['date']))->format('%a');
                    ?>
                            <tr class="<?php echo ($daysPassed >= 14) ? 'table-success' : 'table-danger' ?>">
                                <td><?php echo count($casesArr) - $i ?></td>
                                <td><?php echo $casesArr[$i]['loc']; ?></td>
                                <td><?php echo $casesArr[$i]['count']; ?></td>
                                <td><?php echo date_format(date_create($casesArr[$i]['date']),"d M, Y"); ?></td>
                                <td><?php echo $daysPassed; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>
</body>
</html>
