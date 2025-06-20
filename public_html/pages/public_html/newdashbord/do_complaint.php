<?php

ob_start();
session_start();
include("include/connection.php");

@$id = $_POST['id'];
@$status = $_POST['status'];
if ($status == 1) {
    $tx = "Approved";
}
if ($status == 2) {
    $tx = "Rejected";
}

$update = mysqli_query($con, "UPDATE `tbl_complaints` SET `status`='$status' WHERE `id` = '$id'");
if ($update) {
    $add =  ["status" => 1, "text" => $tx];
    echo json_encode($add);
} else {
    echo 2;
}
