<?php 

include 'config.php';

error_reporting(0);

session_start();

if($_SESSION['frontuserid'] !="") {
$id = $_SESSION["frontuserid"];



function generateOTP(){
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
    
}


        
            
            
            
            
            function sendOtp(){
            global $conn;
            if(isset($_SESSION['resend_otp_in']) && $_SESSION['resend_otp_in']<date("Y-m-d H:i:s")){
        
        $amount = $_POST['amt'];
        if (strlen($_POST['phone_number']) == 10 && is_numeric($_POST['phone_number'])) {
            $mobile = $_POST['phone_number'];
            $otp = generateOTP();
            //echo $otp;
            //checking user
            $chkuser = mysqli_query($con, "select * from tbl_wallet where userid = '$id' ");
            $player = mysqli_fetch_assoc($chkuser);
            $a = $player['amount'];
            
          //  if ($a >= $amount ) {
    
                 session_start();
                unset($_SESSION["signup_mobile"]);
                unset($_SESSION["signup_otp"]);
                unset($_SESSION["otp_exp_time"]);
                $_SESSION["signup_mobile"] = $mobile;
                $_SESSION["signup_otp"] = $otp;
                $otp_exp_time = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime(date('Y-m-d H:i:s'))));
                $_SESSION["otp_exp_time"] = $otp_exp_time;
    
    
    
                $fields = array(
                    "sender_id" => "FTWSMS",//TXTIND
                    "message" => "Winday.in verification code is $otp.",
                    "language" => "english",
                    "route" => "v3",
                    "numbers" => $mobile,
                    "flash" => "0"
                );
    
                $curl = curl_init();
    
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
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
                    echo 'otp_sent';
                }
            // } else {
            //     echo "Insufficient Fund"; // user aleady exist
            // }
        }else{
            echo "invalid_number";
        }
    }else{
        $_SESSION['resend_otp_in'] = date("Y-m-d H:i:s",strtotime("+1 minutes",strtotime(date("Y-m-d H:i:s"))));
          $amount = $_POST['amt'];
        if (strlen($_POST['phone_number']) == 10 && is_numeric($_POST['phone_number'])) {
            $mobile = $_POST['phone_number'];
            $otp = generateOTP();
            // echo $otp;
            
            $chkuser = mysqli_query($con, "select * from tbl_wallet where userid = '$id' ");
            $player = mysqli_fetch_assoc($chkuser);
            $a = $player['amount'];
            
            // if ($a >= $amount ) {
    
                session_start();
                unset($_SESSION["signup_mobile"]);
                unset($_SESSION["signup_otp"]);
                unset($_SESSION["otp_exp_time"]);
                $_SESSION["signup_mobile"] = $mobile;
                $_SESSION["signup_otp"] = $otp;
                $otp_exp_time = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime(date('Y-m-d H:i:s'))));
                $_SESSION["otp_exp_time"] = $otp_exp_time;
    
    
    
                 $fields = array(
                    "sender_id" => "FTWSMS",//TXTIND
                    "message" => "winday.in verification code is $otp",
                    "language" => "english",
                    "route" => "v3",
                    "numbers" => $mobile,
                    "flash" => "0"
                );
    
                $curl = curl_init();
    
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
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
                    echo 'otp_sent';
                }
            // } else {
            //     echo "Insufficient Fund"; // user aleady exist
            // }
        }else{
            echo "invalid_number";
        }
    }
}

//session_start();
function resend_otp(){
    if(isset($_SESSION['resend_otp_in'])){
        if($_SESSION['resend_otp_in']>date("Y-m-d H:i:s")){
            // return 0;
            echo "wait";
        }else{
            unset($_SESSION['resend_otp_in']);
            // return 1;
            sendOtp();
        }
    }
}

if(isset($_POST['resend_otp'])){
    // echo "otp_sent";
    resend_otp();
}



if (isset($_POST['send_otp'])) {
    // echo "otp_sent";
    sendOtp();
}



if (isset($_POST['verify_otp'])) {
    //session_start();
    $otp = $_POST['otp'];
    $mobile = $_SESSION["signup_mobile"];
    $sessionotp = $_SESSION["signup_otp"];
    $otp_exp_time = $_SESSION["otp_exp_time"];
    $curr_time = strtotime(date('Y-m-d H:i:s'));


    // if (strlen($sessionotp !== $otp)) {
    if ($sessionotp !== $otp) {
        echo "wrong_otp";
    }
    else {
        if($otp_exp_time < $curr_time){
            echo "otp_expired";
        }
        else{
            $_SESSION["signup_mobilematched"] = $_SESSION["signup_mobile"];
            unset($_SESSION["signup_mobile"]);
            unset($_SESSION["signup_otp"]);
            unset($_SESSION["otp_exp_time"]);
            unset($_SESSION['resend_otp_in']);
            echo "verified";
        }
        
    }
}


}else{
     header("location: login.php");
    exit;
}

?>