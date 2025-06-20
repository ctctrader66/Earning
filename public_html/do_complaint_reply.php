<?php

ob_start();
session_start();
include("include/connection.php");

@$compid = $_POST['compid'];
@$usertype = 'user';
@$message = $_POST['message'];


$update = mysqli_query($con, "INSERT INTO `complaint_chats`(`compid`, `usertype`, `message`) VALUES ('$compid','$usertype','$message')");
if ($update) {
    echo 1;
} else {
    echo 2;
}
