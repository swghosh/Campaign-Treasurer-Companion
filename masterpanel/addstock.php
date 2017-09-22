<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// in case of error with form data
function form_error() {
    die('An error occured.');
}

// form validation
if(isset($_POST['type']) == false || empty($_POST['type'])) {
    form_error();
}

$type = $_POST['type'];

// if type is stock
if($type == 'stock') {
    // form validation
    if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['sector']) == false || empty($_POST['sector']) || isset($_POST['pclose']) == false || empty($_POST['pclose']) || isset($_POST['ovalue']) == false || empty($_POST['ovalue']) || isset($_POST['description']) == false || empty($_POST['description'])) {
        form_error();
    }

    $name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
    $sector = mysqli_real_escape_string($db, htmlspecialchars($_POST['sector']));
    $pclose = mysqli_real_escape_string($db, htmlspecialchars($_POST['pclose']));
    $ovalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['ovalue']));
    $description = mysqli_real_escape_string($db, htmlspecialchars($_POST['description']));

    $current = $ovalue;
    $difference = $pclose - $ovalue;
    $percentage = ($difference / $pclose) * 100;

    // database query statements
    // query to add entry to stocks
    $sql = "INSERT INTO stocks (name, sector, current, difference, percentage, pclose, ovalue, description) VALUES ('$name', '$sector', $current, $difference, $percentage, $pclose, $ovalue, '$description');";
    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');
    // query to add updates
    $sql2 = "INSERT INTO updates (name, current, difference, percentage, time) VALUES ('$name', $pclose, 0, 0, '$time'), ('$name', $current, $difference, $percentage, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }
    
    die('Successfully processed the request.');

}
// if type is commodity
else if($type == 'commodity') {
    // form validation
    if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['ovalue']) == false || empty($_POST['ovalue']) || isset($_POST['description']) == false || empty($_POST['description'])) {
        form_error();
    }

    $name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
    $ovalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['ovalue']));
    $description = mysqli_real_escape_string($db, htmlspecialchars($_POST['description']));
    
    $current = $ovalue;

    // database query statements
    // query to add entry to commodities
    $sql = "INSERT INTO commodities (name, current, ovalue, description) VALUES ('$name', $current, $ovalue, '$description');";
    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');
    // query to add updates
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }
    
    die('Successfully processed the request.');
}
// if type is cryptocurrency
else if($type == 'cryptocurrency') {
    // form validation
    if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['ovalue']) == false || empty($_POST['ovalue']) || isset($_POST['description']) == false || empty($_POST['description'])) {
        form_error();
    }

    $name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
    $ovalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['ovalue']));
    $description = mysqli_real_escape_string($db, htmlspecialchars($_POST['description']));
    
    $current = $ovalue;

    // database query statements
    // query to add entry to cryptocurrencies
    $sql = "INSERT INTO cryptocurrencies (name, current, ovalue, description) VALUES ('$name', $current, $ovalue, '$description');";
    // time zone is set to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    // date stamp to be echoed
    $time = date('Y-m-d H:i:s');
    // query to add updates
    $sql2 = "INSERT INTO updates (name, current, time) VALUES ('$name', $current, '$time');";

    // execute queries together
    if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
        form_error();
    }
    
    die('Successfully processed the request.');
}

die('Unsuccesful, while processing the request.');
