<?php
require('connect.php');

$config = include 'config.php';
$pages = $config['All'];

$url = strip_tags($_SERVER['REQUEST_URI']);
$url_array = array_diff(explode("/", $url), array(''));

if (count($url_array) == 1 ) {
    include("index.php");

} elseif (count($url_array) == 2 && in_array(end($url_array), $pages)) {
    include("index.php");

} elseif (count($url_array) == 2 && substr(end($url_array), -4) != '.php') {
    $society = end($url_array);
    $query = "SELECT * FROM tenant WHERE society='$society' LIMIT 1";
    $_SESSION['tenant'] = mysqli_fetch_assoc(mysqli_query($conn, $query));
    include("home.php");

} elseif (count($url_array) == 3) {
    $society = $url_array[count($url_array) - 1];
    $query = "SELECT * FROM tenant WHERE society='$society' LIMIT 1";
    $_SESSION['tenant'] = mysqli_fetch_assoc(mysqli_query($conn, $query));
    include(end($url_array));

} else {
    header("HTTP/1.1 404 Not Found");
}

exit();
