<?php
    $city = $_POST['city'];
    $data = file_get_contents('https://api.covid19india.org/csv/latest/cowin_vaccine_data_districtwise.csv');

    $rows = explode("\n", $data);
    $city_vaccine_data = array();

    foreach($rows as $row) {
        $csv_row = str_getcsv($row);
        if ($csv_row[0] == "S No" || $csv_row[5] == "$city") {
            $city_vaccine_data[] = $csv_row;
        }
    }

    echo json_encode($city_vaccine_data);
?>
