<?php
session_start();
require('connect.php');

if (isset($_SESSION['t_id'])) {
    $t_id = $_SESSION['t_id'];
    $today = new DateTime();

    $query = "SELECT * FROM cases WHERE t_id = '$t_id' ORDER BY date";
    $result = mysqli_query($conn, $query);

    $casesArr = array();
    while($row = mysqli_fetch_assoc($result)) {
        $daysPassed = $today->diff(new DateTime($row['date']))->format('%a');
        $casesArr[] = $row;
    }
}

if(isset($_POST['addCase'])) {
    $loc = mysqli_real_escape_string($conn, trim($_POST['loc']));
    $count = mysqli_real_escape_string($conn, trim($_POST['count']));
    $date = mysqli_real_escape_string($conn, trim($_POST['date']));
    $t_id = $_SESSION['t_id'];

    $properDateFormat = date_format(new DateTime($date), "Y-m-d");
    $query = "INSERT INTO cases (loc, count, date, t_id) VALUES ('$loc', '$count', '$properDateFormat', $t_id)";
    if (mysqli_query($conn, $query)) {
        echo "<script type=\"text/javascript\"> alert('Entry added!'); location.href = 'admin.php'; </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

if(isset($_POST['deleteCase'])) {
    $c_id = mysqli_real_escape_string($conn, trim($_POST['c_id']));
    $sql = "DELETE FROM cases WHERE c_id = '$c_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script type=\"text/javascript\"> alert('Entry deleted!'); location.href = 'admin.php'; </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(isset($_POST['register'])) {
    $uname = mysqli_real_escape_string($conn, trim($_POST['uname']));
    $pwd = mysqli_real_escape_string($conn, trim($_POST['pwd']));
    // $state = mysqli_real_escape_string($conn, trim($_POST['state']));
    // $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $society = mysqli_real_escape_string($conn, trim($_POST['society']));
    $encryptedPassword = md5($pwd);

    // $tenantQuery = "INSERT INTO tenant (state, city, society) VALUES ('$state', '$city', '$society')";
    $adminQuery = "INSERT INTO admin (uname, pwd, t_id) VALUES ('$uname', '$encryptedPassword', (SELECT t_id FROM tenant WHERE society='$society' LIMIT 1))";

    if(mysqli_query($conn, $adminQuery)) {
        echo "<script type=\"text/javascript\"> alert('Admin Registered!'); location.href = 'admin.php'; </script>";
    } else {
        echo "Error: <br>" . mysqli_error($conn);
    }
}

if(isset($_POST['login'])) {
    $uname = mysqli_real_escape_string($conn, trim($_POST['uname']));
    $pwd = mysqli_real_escape_string($conn, trim($_POST['pwd']));
    $encryptedPassword = md5($pwd);

    $query = "SELECT t_id FROM admin WHERE uname='$uname' AND pwd='$encryptedPassword' LIMIT 1";
    if ($_SESSION['t_id'] = mysqli_fetch_assoc(mysqli_query($conn, $query))['t_id']) {
        echo "<script type=\"text/javascript\"> alert('Logged in Successfully!'); location.href = 'admin.php'; </script>";
    } else {
        echo "<script type=\"text/javascript\"> alert('Invalid User Details. Please Try Again.'); </script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <?php
                if (isset($_SESSION['t_id'])) {
            ?>
                    <div class="col-12">
                        <a href="logout.php" class="btn btn-danger float-end">Logout</a>
                        <h3>Add a covid case:</h3>
                        <form action="" method="POST" class="form-inline">
                            <div class="form-group">
                                <label for="loc" class="ml-3"><b>Infected Flat/RH:</b></label>
                                <input type="text" class="form-control ml-2" name="loc" placeholder="Address" required value="">
                                <label for="count" class="ml-3"><b>Count:</b></label>
                                <input type="number" class="form-control ml-2" name="count" placeholder="Address" required value="1" min="1">
                                <label for="date" class="ml-3"><b>Date:</b></label>
                                <input type="date" class="form-control ml-2" name="date" required value="">
                                <br/>
                                <button type="submit" name="addCase" class="btn btn-primary ml-3">Add</button>
                            </div>
                        </form>
                    </div>

                    <h4>All Reported Cases:</h4>
                    <table class="table table-bordered table-hover mt-4" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr. No.</th>
                                <th>Flat/RH</th>
                                <th>Cases Count</th>
                                <th>Date</th>
                                <th>Days Passed</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            for ($i=count($casesArr)-1; $i>=0; $i=$i-1) {
                                $daysPassed = $today->diff(new DateTime($casesArr[$i]['date']))->format('%a');
                        ?>
                                <form action="" method="POST">
                                    <tr class="<?php echo ($daysPassed >= 14) ? 'table-success' : 'table-danger' ?>">
                                        <input type="number" name="c_id" value="<?php echo $casesArr[$i]['c_id']; ?>" hidden>
                                        <td><?php echo count($casesArr) - $i ?></td>
                                        <td><?php echo $casesArr[$i]['loc']; ?></td>
                                        <td><?php echo $casesArr[$i]['count']; ?></td>
                                        <td><?php echo date_format(date_create($casesArr[$i]['date']),"d M, Y"); ?></td>
                                        <td><?php echo $daysPassed; ?></td>
                                        <td><button class="btn btn-danger" name="deleteCase">Delete</button></b></td>
                                    </tr>
                                </form>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
            <?php
                } else {
            ?>
                    <div class="col-6">
                        <h3 class="ml-3">Register:</h3>
                        <form action="" method="POST" class="form-inline">
                            <div class="form-group">
                                <label for="uname" class="ml-3"><b>Username:</b></label>
                                <input type="text" class="form-control ml-2" name="uname" placeholder="Enter Username" required>
                                <label for="pwd" class="ml-3"><b>Password:</b></label>
                                <input type="text" class="form-control ml-2" name="pwd" placeholder="Enter Password" required>

                                <!-- <label for="state" class="ml-3"><b>State:</b></label>
                                <input type="text" class="form-control ml-2" name="state" placeholder="Enter State" required>

                                <label for="city" class="ml-3"><b>City:</b></label>
                                <input type="text" class="form-control ml-2" name="city" placeholder="Enter City" required> -->

                                <label for="society" class="ml-3"><b>Society:</b></label>
                                <input type="text" class="form-control ml-2" name="society" placeholder="Enter Society" required>

                                <br/>
                                <button type="submit" name="register" class="btn btn-primary ml-3">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <h3 class="ml-3">Login:</h3>
                        <form action="" method="POST" class="form-inline">
                            <div class="form-group">
                                <label for="uname" class="ml-3"><b>Username:</b></label>
                                <input type="text" class="form-control ml-2" name="uname" placeholder="Username" required>
                                <label for="pwd" class="ml-3"><b>Password:</b></label>
                                <input type="text" class="form-control ml-2" name="pwd" placeholder="Password" required>
                                <br/>
                                <button type="submit" name="login" class="btn btn-primary ml-3">Login</button>
                            </div>
                        </form>
                    </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>
