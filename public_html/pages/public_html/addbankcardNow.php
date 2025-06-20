<?php
ob_start();
session_start();
include("include/connection.php");

@$userid = $_POST['userid'];
@$name = $_POST['name'];
@$ifsc = $_POST['ifsc'];
@$bank = $_POST['bank'];
@$state = $_POST['state'];
@$city = $_POST['city'];
@$address = $_POST['address'];
@$account = $_POST['account'];
@$mobile = $_POST['mobile'];
@$email = $_POST['email'];
@$verification = $_POST['verification'];
@$action = $_POST['action'];
@$editid = $_POST['editid'];
$today = date("Y-m-d H:i:s");

if (isset($_POST['type'])) {
	if ($_POST['type'] == 'delete') {
		$dellid = $_POST['id'];
		$sqlDel = "Delete from `tbl_bankdetail` where `id` in ($dellid)";
		$querydel = mysqli_query($con, $sqlDel);
		if ($querydel) {
			echo "1";
		} else {
			echo "0";
		}
	}
	die();
}


$get_exist_otp = mysqli_query($con, "SELECT * FROM `tbl_otp` WHERE `mobile`= '$mobile' ORDER BY `created_at` DESC");

$get_mobile_number = mysqli_fetch_assoc($get_exist_otp);
$get_otp = $get_mobile_number['otp'];

if ($get_otp === $verification) {
	if ($action == "bank") {
		if ($editid == '') {
			$withdrawalsql = mysqli_query($con, "INSERT INTO `tbl_bankdetail`(`userid`, `mobile`, `email`,`address`, `type`, `status`) VALUES ('" . $userid . "','" . $mobile . "','" . $email . "','" .  $address . "','" . $action . "','1')");
			$delete_old_otp = mysqli_query($con, "DELETE FROM `tbl_otp` WHERE `mobile`= '$mobile'");
			if ($withdrawalsql) {
				echo "1";
			} else {
				echo "2";
			}
		} else {
			//edit
		}
	} else if ($action == "upi") {

		if ($editid == '') {
			$withdrawalsql = mysqli_query($con, "INSERT INTO `tbl_bankdetail`(`userid`,`name`,`ifsc`,`bankname`,`account`,`mobile`,`email`,`type`,`status`) VALUES ('" . $userid . "','" . $name . "','" . $ifsc . "','" . $bank . "','" . $account . "','" . $mobile . "','" . $email . "','" . $action . "','1')");
			$delete_old_otp = mysqli_query($con, "DELETE FROM `tbl_otp` WHERE `mobile`= '$mobile'");
			echo "1";
		} else {
			//edit
		}
	}
} else {
	echo "3";
}
