<?php
header('Content-Type: text/plain');

// create connection to database
include('../db.php');

// database query statements
// query to reset everything to initial state
$sql = file_get_contents(getenv('FACTORY_RESET_SQL'));

// execute queries together
if(mysqli_multi_query($db, $sql) == false) {
    die('Error');
}

die('Successfully processed the request.');