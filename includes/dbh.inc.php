<?php

$serverName = "localhost";
$dBUid = "root";
$dBPwd = "";
$dBName = "practice";

$conn = mysqli_connect($serverName, $dBUid, $dBPwd, $dBName);

if (!$conn){
    die("FAILED CONNECTION: " . mysqli_connect_error());
}