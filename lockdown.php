<?php
include('header.php');
require('viewsCounter.php');

updateViewCount('lockdown');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lockdown</title>
    <link href="../css/footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br/>
                <a href="home.php" class="btn btn-danger">Return back to Home</a>
                <h3 class="mt-4">Pune Break The Chain (Janta Curfew) is applicable till <span class="bg-info">31st May</span>:</h3>
                <h5><span class="text-danger">Note: </span>New updates are highlighted with the <span class="bg-info">blue color.</span></h5>
                <div class="row pb-5">
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">Curfew (barring essential servies):</h3>
                        <ul class="list-group">
                            <li class="list-group-item bg-info"><b>On weekdays</b>, curfew will be imposed from <b>11am to 7am next day</b>. Ie. people, stores and services allowed only between 7am-11am).</li>
                            <li class="list-group-item bg-info"><b>On weekends</b>, curfew will be imposed for the <b>whole day</b>.</li>
                            <li class="list-group-item"><b>Complete ban</b> on social, political, and religious meetings.</li>
                            <li class="list-group-item"><b>Private Transport</b> will be working only during non-curfew hours.</li>
                            <li class="list-group-item"><b>Auto Rickshaw</b> – Driver + 2 passengers only.</li>
                            <li class="list-group-item"><b>Taxi cab/four-wheelers</b> – Driver + 50% vehicle capacity as per RTO.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">Essential Services include the following:</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Hospitals, diagnostic centers, Clinics, Medical insurance offices, Pharmacies, Pharmaceutical companies, other medical and health services.</li>
                            <li class="list-group-item">Groceries, Vegetables Shops, dairies, bakeries, confectionaries, food shops.</li>
                            <li class="list-group-item">Public transport – trains, Taxis, Autorickshaws and public buses.</li>
                            <li class="list-group-item">E-commerce, Accredited Media, Transport of Goods, Agriculture related services.</li>
                            <li class="list-group-item">Public transport – trains, Taxis, Autorickshaws and public buses.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">Shutters Down</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Restaurants (dine-in), bars, food courts, malls to remain shut till further orders.</li>
                            <li class="list-group-item">Barber shops, salons, beauty parlors, spas to remain shut till further orders.</li>
                            <li class="list-group-item">Cinemas, drama theatres, amusement parks, water parks, gardens, arcades, video game parlours to remain shut till further orders.</li>
                            <li class="list-group-item">Clubs, swimming pools, sports complexes, gyms to remain shut till further orders.</li>
                            <li class="list-group-item">Schools and colleges shut till <b>April 30</b>, all coaching classes, excluding MPSC, UPSC study centres with 50% capacity, to remain shut.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">What is permitted?</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Milk, vegetable, fruit supply, newspaper distribution, establishments providing essential services and their staff, people going for vaccination and their vehicles, and vehicles transporting employees for industrial work are <b>exempted from night travel restrictions</b>.</li>
                            <li class="list-group-item">PMPML buses only for emergency services.</li>
                            <li class="list-group-item"><b>Online food delivery from 7am till 6pm</b>.</li>
                            <li class="list-group-item">Marriages allowed with 50 people.</li>
                            <li class="list-group-item">Funerals with maximum of 20 people.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">No groups during the day too:</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Ban on assembly of <b>more than 5 persons at one place from 7am to 6pm</b>.</li>
                            <li class="list-group-item"><b>Rs 1,000 fine</b> for each person for violation.</li>
                            <li class="list-group-item">Prosecution under Section 188 (disobedience of order) of the IPC.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="mt-4">Carry Documents</h3>
                        <ul class="list-group">
                            <li class="list-group-item"><b>Office-goers</b> must carry I-cards & letters by their employers specifying duty hours.</li>
                            <li class="list-group-item">Travel to and from <b>airport</b> by showing flight tickers or boarding pass.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Made with ❤️ by Rajan</p>
    </div>
</body>
</html>
