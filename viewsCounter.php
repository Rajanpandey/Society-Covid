<?php
function getIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(?:\/\d{2})?/', $ip)) {
        preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(?:\/\d{2})?/', $ip, $new_ip);
        return $new_ip[0];
    }
    return $ip;
}

function updateViewCount($pageName) {
    require('connect.php');
    include('tenant.php');

    $today = date("Y-m-d");
    $ip = 'getIpAddress()';
    $t_id = $_SESSION['tenant']['t_id'];

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM views WHERE page='$pageName' AND date='$today' AND ip='$ip'"))) {
        $query = "UPDATE views SET count = count + 1 WHERE page='$pageName' AND date='$today' AND ip='$ip'";
    }
    else {
        $query = "INSERT INTO views (page, count, date, ip, t_id) VALUES ('$pageName', 1, '$today', '$ip', '$t_id')";
    }

    mysqli_query($conn, $query);

    mysqli_close($conn);
}
?>
