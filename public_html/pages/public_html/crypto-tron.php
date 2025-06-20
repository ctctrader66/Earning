<?php 
   ob_start();
   session_start();
   if($_SESSION['frontuserid']=="")
   {header("location:login.php");exit();}?>
<?php
   include("include/connection.php");
   $userid=$_SESSION['frontuserid'];
   $createdate = date("Y-m-d H:i:s");
     $paymentMethod = 'manual';
     $amount =   $_SESSION['finalamount'] ;
   
   $ch = curl_init();
   
   $data = [
       'price_amount' => $amount,
       'price_currency' => 'trx',
       'pay_currency' => 'trx',
       'ipn_callback_url' => 'https://jk-eur.com/webhook.php',
       'order_id' => 'RGDBP-21314',
       'order_description' => 'Pay For Order'
   ];
   
   $json_data = json_encode($data);
   
   curl_setopt($ch, CURLOPT_URL, 'https://api.nowpayments.io/v1/payment');
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       'x-api-key: KWXFZGR-RHS4K2H-K25GAEV-RJ22V4S'
   ));
   
   $response = curl_exec($ch);
   $err = curl_error($ch);
   
   curl_close($ch);
   
   if ($err) {
    
      echo "<script>alert('$err');</script>";
   } else {
      $response_array = json_decode($response, true);
    //  print_r($response_array);
   
      $payment_id = $response_array['payment_id'];
       $address = $response_array['pay_address'];
       $pay_amount = $response_array['pay_amount'];
       $price_amount = $response_array['price_amount'];
       $payment_status = $response_array['payment_status'];
       $price_currency = $response_array['price_currency'];
   
       $pay_currency = $response_array['pay_currency'];
       $created_at = $response_array['created_at'];  
       
        $sql= mysqli_query($con,"INSERT INTO `nowpayment` (`userid`,`payment_id`,`payment_status`, `price_currency`,`pay_amount`,`price_amount`, `pay_currency`,`amount_status`,`created_at`) VALUES ('".$userid."','".$payment_id."','".$payment_status."','".$price_currency."','".$pay_amount."','".$price_amount."','".$pay_currency."','0','".$created_at."')");
   
    }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Crypto Payment</title>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" type="text/css" href="assets1/css/bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <style>
         body{font-size:7px;
         background-color:#FAFAFA;
         font-family: -apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Segoe UI,Arial,Roboto,PingFang SC,Hiragino Sans GB,Microsoft Yahei,sans-serif;
         }
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 18px;  
         width: 80%;
         margin: 0 auto;
         border: 1px solid #36688E;
         color: #fff;
         background-color: #36688E;
         box-shadow: 0 0 4px 3px #36688E;
         }
         .modal{margin-top:50%;}
         .parent{
         text-align:center;
         display: flex;
         width:100%;
         }
         .child{
         width: 50%;
         float: left;
         flex: 1;
         padding:10px 10px;
         font-size: 19px;
         border: 1.50px solid #f7f7f7;
         }
         button:focus{
         outline:none;
         }
         .child button {
         color: #767778;
         border:none;
         line-height:20px;
         padding:0 20px;
         background: transparent;
         text-align:center;
         }
         .child a button{
         color: #1998FB;
         }
         .tz_title{
         font-size: 22px;
         padding-bottom: 15px;
         font-weight:500;
         color:#000;
         }
         .container{
         text-align:center;
         padding:20px;
         }
      </style>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   </head>
   <body style="margin-right: 10px;">
     <div id="header" class="appHeader1">
         <div class="left">
            <a href="recharges.php" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Deposit TRX</div>
      </div>
         <center>
         <div style="color:black" class="pageTitle">Crypto Payment</div>
      </div>
      <div  style="display: block;text-align:center; margin-top:12%">
         <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=<?= $address;?>" alt="trx">
         <p class="mt-2">Send only TRX to this deposit address.</p>
         <br>
         <span style="color: red; font-weight:900; margin-bottom:20px; font-size:18px;">
         <?= $pay_amount;?> TRX
         </span>
        
      </div>
      <div style="  margin-top:6px; padding:0 25px;
         display:block;">
         <div style="margin-bottom:9px;">
            <div style="font-weight:700;
               font-size:17px;
               color: #9FA8B7;margin:10px 0">TRX Deposit Address</div>
            <div style="display:block">
               <span id="text-to-copy" style="font-weight:700;
            font-size:14px;" ><?= $address;?></span>
               <a  onclick="copyText()" style="float:right;font-size:15px"><i  class="fa fa-clone" aria-hidden="true"></i></a>
            </div>
         </div>
         <div style="font-weight:400;
            font-size:0px;
            color: #9FA8B7;margin-bottom:10px">Network</div>
          <div style="display:block">
               <span style="font-weight:400;
            font-size:15px;">Network Tron（TRC20）</span>
               <a  style="float:right;font-size:15px"><i class="fa fa-exchange" aria-hidden="true"></i></a>
            </div>
      </div>
 
   
   	<div 
		<hr/>
				<hr/>
		<div class="row">
				<?php
				include("db.php");
					
				$q = "SELECT * FROM video";

				$query = mysqli_query($conn,$q);
				
				while($row=mysqli_fetch_array($query)) { 

					$name = $row['name'];
					?>

					<div class="col-md-4">
						<video width="50%" controls>
<source src="<?php echo 'upload/'.$name;?>">
</video>
					</div>

				<?php }
?>
</div>
				</div>
   
   
  
     
      <script>
      function copyText() {
        var text = document.getElementById("text-to-copy").innerText;
        navigator.clipboard.writeText(text).then(function() {
          alert("Text copied to clipboard!");
        }, function() {
          alert("Failed to copy text.");
        });
      }
    </script>
   </body>
  
   <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
   <!-- Bootstrap--> 
   <script src="assets/js/lib/popper.min.js"></script> 
   <script src="assets/js/lib/bootstrap.min.js"></script> 
   <!-- Owl Carousel --> 
   <script src="assets/js/plugins/owl.carousel.min.js"></script> 
   <!-- Main Js File --> 
   <script src="assets/js/app.js"></script>
</html>