<?php
include ('conf.php');
session_start();
$link = mysqli_connect(HOST, DBUSER, PASSWORD);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($link, "contact");


// $result = mysqli_query($link, "SELECT * FROM `contacts` ");
// $row = mysqli_fetch_array($result);
// echo $row['last'];


