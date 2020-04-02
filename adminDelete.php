<?php

include 'conn.php';
session_start();

$sn = $_GET['posid'];

$q = " DELETE FROM `posts` WHERE  posid = $sn ";

mysqli_query($con, $q);

header('location:adminPosts.php');

?>