<?php
ob_start();
session_start();
include("include/connection.php");

@$mobile = $_POST['mobile'];
@$otp = mt_rand(1111, 9999);

$fields = array(
        "sender_id" => "FSTSMS",
        "message" => "Your verification code is $otp",
        "language" => "english",
        "route" => "p",
        "numbers" => $mobile,
        "flash" => "1"
      );

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
          "authorization: jxkDfGbPBqRjjDLUO3W7e2c9ypW6d5VNVK50bN10gR5PSzPM5yW0qOj6TCBP",
          "accept: */*",
          "cache-control: no-cache",
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        // echo '1';
      }

$get_exist_otp = mysqli_query($con, "SELECT * FROM `tbl_otp` WHERE `mobile`= '$mobile'");

$get_mobile_number = mysqli_fetch_assoc($get_exist_otp);

if ($get_mobile_number) {

    $delete_old_otp = mysqli_query($con, "DELETE FROM `tbl_otp` WHERE `mobile`= '$mobile'");

    if ($delete_old_otp) {
        $send_otp = mysqli_query($con, "INSERT INTO `tbl_otp`(`otp`, `mobile`) VALUES ('$otp','$mobile')");
        echo $otp;
    }
} else {
    $send_otp = mysqli_query($con, "INSERT INTO `tbl_otp`(`otp`, `mobile`) VALUES ('$otp','$mobile')");
    echo $otp;
}
