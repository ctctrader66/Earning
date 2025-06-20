<?php
session_start();
require_once('config.php');
require_once('checksum.php');


$name = $_SESSION['name'];    //////////////
$mobile = $_SESSION['mobile'];     //////////
$email = $_SESSION['email'];     ////////////
$finalAmount = $_SESSION['finalamount'];   /////////

require_once('config.php');
require_once('checksum.php');

$checkSum = "";
$upiuid = "";
$paramList = array();

$gateway_type = "Robotics";
$cust_Mobile = $mobile;          //cust mobile 
$cust_Email = $email;     //cust email
$orderId = uniqid().time();  //orderid
$txnAmount = $finalAmount;                     //amount
$txnNote = $_COOKIE['cxruser'];                  //special note
$callback_url = "https://91club.gameonly1.online/pbsmmpay/txnResult.php";  //callback 

if ($gateway_type == "Robotics") {
    $RECHPAY_TXN_URL = 'https://todaypay.in/order/paytm';

    $upiuid = 'paytmqr1bvwbe427m@paytm'; // Its Paytm Business UPI Unique ID.

    $paramList["cust_Mobile"] = $cust_Mobile;
    $paramList["cust_Email"] = $cust_Email;
}

// Create an array having all required parameters for creating checksum.
$paramList["upiuid"] = $upiuid;
$paramList["token"] = $token;
$paramList["orderId"] = $orderId;
$paramList["txnAmount"] = $txnAmount;
$paramList["txnNote"] = $txnNote;
$paramList["callback_url"] = $callback_url;

$checkSum = RechPayChecksum::generateSignature($paramList, $secret);
?>
<html>
<head>
<title>Gateway Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo $RECHPAY_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach ($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="checksum" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>

?>
