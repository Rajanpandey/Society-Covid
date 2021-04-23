<?php
include('header.php');
require('connect.php');

$today = new DateTime();
$colorCoding = [
    0 => 'table-success',
    1 => 'table-primary',
    2 => 'table-info',
    3 => 'table-warning',
    4 => 'table-danger',
    5 => 'table-dark',
    6 => 'table-secondary',
    7 => 'table-light',
];

$query = mysqli_query($conn, "SELECT * FROM views GROUP BY date, ip");
$viewsByDateAndIPArr = array();
while($row = mysqli_fetch_assoc($query)) {
    $viewsByDateAndIPArr[] = $row;
}

$query = mysqli_query($conn, "SELECT * FROM feedback");
$feedbackArr = array();
while($row = mysqli_fetch_assoc($query)) {
    $feedbackArr[] = $row;
}

$uniqueVisitors = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT ip) FROM views"));

$pageWiseViews = [
    'home' => 0,
    'map' => 0,
    'city' => 0,
    'society' => 0,
    'lockdown' => 0,
    'protectYourself' => 0,
    'feedback' => 0,
    'vaccine' => 0,
    'plasma' => 0,
];

$query = mysqli_query($conn, "SELECT page, SUM(count), date FROM views GROUP BY date, page");
$viewsByDate = array();
while($row = mysqli_fetch_assoc($query)) {
    $viewsByDate[] = $row;
    $pageWiseViews[$row['page']] = $pageWiseViews[$row['page']] + $row['SUM(count)'];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Views</title>
    <link href="../css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">

                <h3>Feedbacks:</h3>
                <table class="table table-bordered table-hover mt-4" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i=0; $i<count($feedbackArr); $i=$i+1) {
                    ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $feedbackArr[$i]['feedback']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

                <h3 class="pt-4">Views per page:</h3>
                <div class="card-group">
                  <div class="card border-success">
                    <div class="card-body text-success">
                      <h5 class="card-title">Unique Visitors</h5>
                      <p class="card-text"><?php echo $uniqueVisitors["COUNT(DISTINCT ip)"]; ?></p>
                    </div>
                  </div>
                  <div class="card border-success">
                    <div class="card-body text-success">
                      <h5 class="card-title">Home</h5>
                      <p class="card-text"><?php echo $pageWiseViews['home']; ?></p>
                    </div>
                  </div>
                  <div class="card border-primary">
                    <div class="card-body text-primary">
                      <h5 class="card-title">Society Map</h5>
                      <p class="card-text"><?php echo $pageWiseViews['map']; ?></p>
                    </div>
                  </div>
                  <div class="card border-primary">
                    <div class="card-body text-primary">
                      <h5 class="card-title">Covid in Society</h5>
                      <p class="card-text"><?php echo $pageWiseViews['society']; ?></p>
                    </div>
                  </div>
                  <div class="card border-danger">
                    <div class="card-body text-danger">
                      <h5 class="card-title">Covid in City</h5>
                      <p class="card-text"><?php echo $pageWiseViews['city']; ?></p>
                    </div>
                  </div>
                  <div class="card border-danger">
                    <div class="card-body text-danger">
                      <h5 class="card-title">City Vaccination</h5>
                      <p class="card-text"><?php echo $pageWiseViews['vaccine']; ?></p>
                    </div>
                  </div>
                  <div class="card border-secondary">
                    <div class="card-body text-secondary">
                      <h5 class="card-title">Lockdown</h5>
                      <p class="card-text"><?php echo $pageWiseViews['lockdown']; ?></p>
                    </div>
                  </div>
                  <div class="card border-secondary">
                    <div class="card-body text-secondary">
                      <h5 class="card-title">Protect Yourself</h5>
                      <p class="card-text"><?php echo $pageWiseViews['protectYourself']; ?></p>
                    </div>
                  </div>
                  <div class="card border-secondary">
                    <div class="card-body text-secondary">
                      <h5 class="card-title">Feedback</h5>
                      <p class="card-text"><?php echo $pageWiseViews['feedback']; ?></p>
                    </div>
                  </div>
                </div>

                <h3 class="pt-5">View Count grouped Date:</h3>
                <table class="table table-bordered table-hover mt-4" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Page</th>
                            <th>Count</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i=count($viewsByDate)-1; $i>=0; $i=$i-1) {
                            $daysPassed = $today->diff(new DateTime($viewsByDate[$i]['date']))->format('%a');
                    ?>
                            <tr class="<?php echo ($daysPassed <= 7) ? $colorCoding[$daysPassed] : '' ?>">
                                <td><?php echo count($viewsByDate) - $i ?></td>
                                <td><?php echo $viewsByDate[$i]['page']; ?></td>
                                <td><?php echo $viewsByDate[$i]['SUM(count)']; ?></td>
                                <td><?php echo $viewsByDate[$i]['date']; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                <h3 class="ml-3">Views grouped by IP and Date:</h3>
                <table class="table table-bordered table-hover mt-4" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Page</th>
                            <th>Count</th>
                            <th>IP</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i=count($viewsByDateAndIPArr)-1; $i>=0; $i=$i-1) {
                    ?>
                            <tr>
                                <td><?php echo count($viewsByDateAndIPArr) - $i ?></td>
                                <td><?php echo $viewsByDateAndIPArr[$i]['page']; ?></td>
                                <td><?php echo $viewsByDateAndIPArr[$i]['count']; ?></td>
                                <td><?php echo $viewsByDateAndIPArr[$i]['ip']; ?></td>
                                <td><?php echo $viewsByDateAndIPArr[$i]['date']; ?></td>
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
