<?php
$conn = mysqli_connect("localhost", "root", "", "covstatus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
