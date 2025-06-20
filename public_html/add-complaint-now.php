<?php

ob_start();
session_start();
include("include/connection.php");


@$userid = $_POST['userid'];
@$compid = rand(00000, 99999);
@$type = $_POST['type'];
@$outid = $_POST['outid'];
@$whatsapp = $_POST['whatsapp'];
@$description = $_POST['description'];
@$status = 1;

$qry = mysqli_query($con, "INSERT INTO `tbl_complaints`(`userid`, `compid`, `type`, `outid`, `whatsapp`, `description`, `status`) VALUES ('$userid','$compid','$type','$outid','$whatsapp','$description','$status')");

if ($qry) {
    echo 1;
} else {
    echo 0;
}
