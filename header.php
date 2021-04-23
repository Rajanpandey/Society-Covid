<?php
    include('config.php');
    include('tenant.php');

    $pages = $config['All'];
    $availableFeatures = $config[$society];
?>

<nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav nav-pills">
        <li class="nav-item">
            <a class="nav-link <?php echo in_array(end(explode("/", $_SERVER['REQUEST_URI'])), $pages) ? '' : 'active'?>" href="home.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'plasma.php') ? 'active' : ''?>" href="plasma.php">Plasma</a>
        </li>

        <?php
            if (in_array('map.php', $availableFeatures)) {
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'map.php') ? 'active' : ''?>" href="map.php"><?php echo $society; ?> Map</a>
        </li>

        <?php
            }
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'society.php') ? 'active' : ''?>" href="society.php">Covid in <?php echo $society; ?></a>
        </li>

        <?php
            if (in_array('city.php', $availableFeatures)) {
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'city.php') ? 'active' : ''?>" href="city.php">Covid in <?php echo $city; ?></a>
        </li>

        <?php
            }
            if (in_array('vaccine.php', $availableFeatures)) {
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'vaccine.php') ? 'active' : ''?>" href="vaccine.php">Vaccination in <?php echo $city; ?></a>
        </li>

        <?php
            }
            if (in_array('lockdown.php', $availableFeatures)) {
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'lockdown.php') ? 'active' : ''?>" href="lockdown.php">Lockdown</a>
        </li>

        <?php
            }
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'protectYourself.php') ? 'active' : ''?>" href="protectYourself.php">Protect Yourself</a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'feedback.php') ? 'active' : ''?>" href="feedback.php">Feedback</a>
        </li>
</nav>

<style type="text/css">
    .active {
        background-color: green !important;
    }
</style>
