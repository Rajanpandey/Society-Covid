<?php
require('connect.php');
require('viewsCounter.php');

$query = "SELECT * FROM tenant";
$result = mysqli_query($conn, $query);

$tenantArr = array();
while($row = mysqli_fetch_assoc($result)) {
    $tenantArr[] = $row;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Society Covid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid pt-3">
        <div class="row pt-5">
            <div class="col-6 offset-3">
                <h4>Select your Society</h4>
                <select class="form-select" name="society" aria-label="Society" id="socDropdown" required>
                    <option value="">Select your Society</option>
                    <?php
                        for ($i=count($tenantArr)-1; $i>=0; $i=$i-1) {
                    ?>
                            <option value="<?php echo $tenantArr[$i]['society']; ?>"><?php echo $tenantArr[$i]['society']; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <button onclick="redirect();" class="btn btn-success mt-3">Visit Society</button>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>

    <script type="text/javascript">
        function redirect () {
            var dropdown = document.getElementById("socDropdown");
            var dropdownValue = dropdown.options[dropdown.selectedIndex].value;
            console.log(dropdownValue);
            if (dropdownValue === "") {
                alert("Kindly Select a Society First");
            } else {
                window.open(`${dropdownValue}/home.php`, "_blank");
            }
        }
    </script>
</body>
</html>
