<?php



ob_start();

session_start();

include("include/connection.php");



@$id = $_POST['id'];

@$compid = $_POST['compid'];

@$usertype = 'admin';

@$message = $_POST['message'];



if ($_POST['stat'] == 'close') {

    $update = mysqli_query($con, "UPDATE `tbl_complaints` SET `status`= '2' WHERE id='$id'");

    if ($update) {

        echo 1;
    } else {

        echo 2;
    }
} else {

    $update = mysqli_query($con, "INSERT INTO `complaint_chats`(`compid`, `usertype`, `message`) VALUES ('$compid','$usertype','$message')");

    if ($update) {

        echo 1;
    } else {

        echo 2;
    }
}
