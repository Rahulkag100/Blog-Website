<?php

include 'conn.php';
session_start();

$sn = $_GET['uid'];

$q = " DELETE FROM `users` WHERE  uid = $sn ";

mysqli_query($con, $q);

header('location:users.php');

?>