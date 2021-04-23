<?php
session_start();
require('connect.php');

if(isset($_POST['onboard'])) {
    $state = mysqli_real_escape_string($conn, trim($_POST['state']));
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $society = mysqli_real_escape_string($conn, trim($_POST['society']));

    $tenantQuery = "INSERT INTO tenant (state, city, society) VALUES ('$state', '$city', '$society')";

    if(mysqli_query($conn, $tenantQuery)) {
        $config = include 'config.php';
        $config[$society] = ['vaccine.php'];
        file_put_contents('config.php', '<?php return ' . var_export($config, true) . ';');
        echo "<script type=\"text/javascript\"> alert('Tenant Onboarded!'); location.href = 'onboard.php'; </script>";
    } else {
        echo "Error: <br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Onboard Panel</title>
    <link href="css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-6 offset-3">
                <h3 class="ml-3">Onboard:</h3>
                <form action="" method="POST" class="form-inline">
                    <div class="form-group">
                        <label for="state" class="ml-3"><b>State:</b></label>
                        <input type="text" class="form-control ml-2" name="state" placeholder="Enter State" required>

                        <label for="city" class="ml-3"><b>City:</b></label>
                        <input type="text" class="form-control ml-2" name="city" placeholder="Enter City" required>

                        <label for="society" class="ml-3"><b>Society:</b></label>
                        <input type="text" class="form-control ml-2" name="society" placeholder="Enter Society" required>

                        <br/>
                        <button type="submit" name="onboard" class="btn btn-primary ml-3">Onboard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
