<?php
    $json = file_get_contents('https://api.covid19india.org/v4/min/timeseries-MH.min.json');
    $obj = json_decode($json);
    echo json_encode($obj);
?>
