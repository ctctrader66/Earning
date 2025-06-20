<?php 
   ob_start();
   session_start();
  if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
  
   include("include/connection.php");
   $userid=$_SESSION['frontuserid'];
   
   $sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
   $sqlgetresult =mysqli_fetch_array($sqlget);
   $mobilenew =    $sqlgetresult['mobile'] ;
   
   
   if(isset($_POST['rechargeNow'])){
       
     $userid =   $_SESSION['frontuserid'];
   
     
     $_SESSION['finalamount'] = $_POST['finalamount'];
     
   }
   
      
   
   
   if(isset($_POST['submitRecharge'])){
       
     $userid =   $_SESSION['frontuserid'];
     $utr_id =   $_POST['channel_order'];
     $status = 2;
     $createdate = date("M,d h:i:s");
     $paymentMethod = 'Epay';
     $amount =   $_SESSION['finalamount'] ;
   
     $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_recharge` (userid, amount,status,mobile,txn,paymentMethod ) VALUES ('$userid','$amount','$status','$mobilenew','$utr_id','$paymentMethod')" );
     
   if($sqlinsert){
       echo '<script>alert("SUCCESS ! Please Wait We Are Reviewing")</script>';
           echo "<script>
           window.location = './main';
       </script>";
       }else{
            echo '<script>alert("REF NO. HAS EXISTED! or Failed")</script>';
              echo "<script>
           window.location = './main';
       </script>";
       }
   };
   
    
    
                $selectupi=mysqli_query($con,"select * from `admin_bank` where `id`=1 ");
                $selectupiresult=mysqli_fetch_array($selectupi);
    ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Payment</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="./icon/iconfont.css">
      <script>
         function pageRedirect() {
              window.location.replace("https://91club.gameonly1.online/game.php");
          }      
          setTimeout("pageRedirect()", 300000);
         
              
      </script>
      <style>
         html,
         body {
         width: 100%;
         height: 100%;
         }
         *{
         margin: 0;
         padding: 0;
         }
         body {
         font-family: "Microsoft YaHei", Helvetica, Arial, sans-serif !important;
         /* background: #faf8fc; */
         background-image: url(./images/epay/bg.jpg);
         }
         body * {
         box-sizing: border-box;
         }
         h2 p{
         margin: 0;
         padding: 0;
         }
         .phone{
         width: 450px;
         margin-left: 10px;
         display: none;
         }
         .phone img{ 
         width: 450px;
         margin-bottom: 20px;
         }
         .jc{ 
         display: flex;
         flex-wrap: wrap;
         justify-content: space-around;
         }
         .jc img{ 
         width: 180px;
         border: 1px solid #ccc;
         margin-bottom: 20px;
         }
         @media screen and (min-width: 800px) {
         body{ 
         display: flex;
         justify-content: center;
         }
         .phone {
         display: block;
         }
         }
         .root{
         /* width: 500px; */
         max-width: 400px;
         /* margin: 10px auto; */
         border-radius: 20px;
         padding: 20px;
         background: #fefefe;
         }
         .head{ 
         width: 100%;
         display: flex;
         justify-content: space-between;
         color: #8df;
         padding-bottom:10px;
         border-bottom: 1px solid #ccc;
         }
         .cp{
         width: 100%;
         display: flex;
         justify-content: space-between;
         }
         #qrcodeC {
         width: 200px;
         height: 200px;
         margin: 10px auto;
         position: relative;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         }
         #qrcodeC::before {
         position: absolute;
         top: 0;
         left: 0;
         width: 20px;
         height: 20px;
         border-left: 2px solid #02a6b5;
         border-top: 2px solid #02a6b5;
         content: "";
         }
         #qrcodeC::after {
         position: absolute;
         top: 0;
         right: 0;
         width: 20px;
         height: 20px;
         border-right: 2px solid #02a6b5;
         border-top: 2px solid #02a6b5;
         content: "";
         }
         #qrcodeC #qrcode-footer {
         position: absolute;
         bottom: 0;
         left: 0;
         width: 100%;
         }
         #qrcodeC #qrcode-footer::before {
         position: absolute;
         bottom: 0;
         left: 0;
         width: 20px;
         height: 20px;
         border-left: 2px solid #02a6b5;
         border-bottom: 2px solid #02a6b5;
         content: "";
         }
         #qrcodeC #qrcode-footer::after {
         position: absolute;
         bottom: 0;
         right: 0;
         width: 20px;
         height: 20px;
         border-right: 2px solid #02a6b5;
         border-bottom: 2px solid #02a6b5;
         content: "";
         }
         .choese {
         display: flex;
         justify-content: space-around;
         align-items: center;
         flex-wrap: wrap;
         }
         .choese a {
         display: flex;
         justify-content: start;
         align-items: center;
         width: 47%;
         height: 55px;
         border: 1px solid rgb(210, 210, 210);
         margin-bottom: 10px;
         border-radius: 10px;
         padding: 10px;
         text-decoration: none;
         color: rgb(150, 150, 150);
         font-weight: bold;
         }
         .sub{ 
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .sub div{ 
         width: 70%;
         height: 30px;
         }
         input{ 
         width: 100%;
         height: 30px;
         padding: 0 10px;
         outline: none;
         border: 1px solid #CCC;
         }
         input::placeholder{ 
         color: #ccc;
         }
         button{ 
         width:60px;
         height: 30px;
         background: #3aa0fa;
         color: #fff;
         border:   none;
         border-radius: 3px;
         }
         .war{ 
         width: 100%;
         height: 100px;
         display: flex;
         border: 1px solid #ccc;
         border-radius: 5px;
         }
         .war span{ 
         height: 100%;
         width: 20%;
         background: #6ac3ec;
         display: flex;
         justify-content: center;
         align-items: center;
         color: #fff;
         border-top-left-radius:5px;
         border-bottom-left-radius:5px;
         }
         .war p{ 
         width: 80%;
         height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         color: #000;
         padding: 10px;
         font-size: 12px;
         color: #6ac3ec;
         }
         .conBarbox{
         overflow: hidden;
         transition: all 0.5s;
         }
         #conBar{
         list-style: none;
         margin-top: 10px;
         }
         #conBar li{}
         #conBar li a{text-decoration: none;color: #3aa0fa;}
      </style>
      <style>
         .logo{padding-bottom: 5px;text-align: center;margin-bottom: 10px;color: #3aa0fa;}
         .logo span{padding:3px;font-size: 20px;}
      </style>
   </head>
   <body>
      <div class="root">
         <div class="logo"><span>E - PAY</span></div>
         <div class="head">
            <div>₹<span><?php echo number_format($_SESSION['finalamount'], 2); ?></span></div>
            <div> <span id="time"></span></div>
         </div>
         <br>      
         <!--<div class="cp">
            <p style="font-weight: bold; color:rgb(175, 175, 175)">Remark</p>
            <p><span id="remarkC"></span>&nbsp;&nbsp;&nbsp;<a data-clipboard-target="#remarkC" href="javascript:;" class="iconfont icon-copy btn-copy" style="text-decoration: none; color:black"></a></p>
            </div>
            <br>-->
         <div class="tab-content">
  <div id="home" class="tab-pane fade in active">
        <h1><b>Step 1. <br> Copy UPI Information</b></h1>
        <div class="box" style="margin-bottom: 0;">        
            <p>
                <!--<span class="label">Upi Id.&nbsp;: (upi)</span>-->
                <span class="label">UPI : </span>
                <span class="value">rb3308307@oksbi</span>
                <button class="btn copyBtn" data-clipboard-text="rb3308307@oksbi">Copy</button>
            </p>
           
        </div>
         <a id="qrcodeC">
            <div id="qrcode" style="display:none;"></div>
            <div id="qrcodeImg"><img style="height:200px" src="images/epay/qrrrrrrr.png"></div>
            <div id="qrcode-footer"></div>
         </a>
         <div style="display:flex;justify-content:center"><a href="images/qrpage.png" style="text-decoration: none; color: rgb(78, 205, 255);border: 1px solid rgb(78, 205, 255);font-size: 12px;padding: 5px; border-radius: 999em;" href="javascript:;">Download</a></div>
         <p style="text-align: center;margin-top:10px; color:#eb7100">have you paid successfully?</p>
         <br>
         <p style="text-align: center ">Paytm, PhonePe, GooglePay, Other Bank</p>
         <br>
         <div class="choese">
            <a style="font-size:10px" href="paytmmp://upi" target="blank"><img src="./images/epay/Paytm.svg"
               width="40 ">&nbsp;&nbsp;Paytm</a>
            <a style="font-size:10px" href="phonepe://pay" target="blank"><img src="./images/epay/PhonePe.svg"
               width="40 ">&nbsp;&nbsp;PhonePe</a>
            <a style="font-size:10px" href="gpay://upi" target="blank"><img src="./images/epay/Google.svg"
               width="40 ">&nbsp;&nbsp;GooglePay</a>
            <a style="font-size:10px" href="upi://pay" target="blank"><img src="./images/epay/Bank UPI.svg"
               width="40 ">&nbsp;&nbsp;Other Bank</a>
         </div>
         <br>
         <form method="post" action="#">
            <div class="sub">
               <span style="color: rgb(160, 160, 160);font-weight: bold;">UTR</span> 
               <div><input id="upi-input" value="" name="channel_order" placeholder="ENTER REF NO.:1347xxxxxxxx" maxlength="12" oninput="this.value=this.value.replace(/[^\d]/g,'')" pattern=".{12,12}"  onchange="this.value=this.value.replace(/[^\d]/g,'')" required placeholder="Input 12-digit here" type="text"><span></span></div>
               <button type="submit"  name="submitRecharge"><a name="submitRecharge">Submit</a></button>
            </div>
         </form>
         <br>
         <div style="text-align:center ;">
            <a href="/help.php" style="color:rgb(100, 100, 100);text-decoration: none;font-weight: bold;padding: 1px;border-bottom: 3px solid rgb(100, 100, 100);">Contact US</a>
         </div>
         <br>
         <p style="text-align:center;color:red">Important reminder: After completing the UPI transaction,please backfill Ref No./UTR No./Google Pay : UPI Transaction ID/Freecharge: Transaction ID (12digits). If you do not back fill UTR, 100% of the deposit transaction will fail. Please be sure to backfill!</p>
         <br>
         <div class="war">
            <span style="font-size: 50px;" class="iconfont icon-dengpao"><img height="50px" src="images/epay/light.jpg"></span>
            <p>Warning: Please confirm that the above account information is carret, and use this account to make the payment, otherwise the paytm will not be completed correctly !!</p>
         </div>
      </div>
      <div class="phone">
         <img src="./images/epay/phone.jpg" alt="">
         <div class="jc">
            <img src="./images/epay/jc1.png" alt="">
            <img src="./images/epay/jc2.png" alt="">
            <img src="./images/epay/jc3.png" alt="">
            <img src="./images/epay/jc4.png" alt="">
         </div>
      </div>
   </body>
   <script type="text/javascript">
      if ('ontouchstart' in document.documentElement) document.write("<script src='/static/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
   </script>
   <script src="https://gateway.ekpays.com/static/plugins/gateway/check.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/qrcode/jquery.qrcode.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/base64/base64.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/clipboard/clipboard.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/gateway-utils.min.js"></script>
   <script src="https://gateway.ekpays.com/static/plugins/gateway-plugins.min.js"></script>
   <script src="https://gateway.ekpays.com/static/assets/js/bootbox.js"></script>
   <script src="https://gateway.ekpays.com/static/assets/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
   <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
      let timerOn = true;
      
      function timer(remaining) {
      var m = Math.floor(remaining / 60);
      var s = remaining % 60;
      
      m = m < 10 ? '0' + m : m;
      s = s < 10 ? '0' + s : s;
      document.getElementById('time').innerHTML = m + ':' + s;
      remaining -= 1;
      
      if(remaining >= 0 && timerOn) {
       setTimeout(function() {
           timer(remaining);
       }, 1000);
       return;
      }
      
      if(!timerOn) {
       // Do validate stuff here
       return;
      }
      
      // Do timeout stuff here
      
      }
      timer(1800);
      var qrcode = new QRCode(document.getElementById("qrcode"), {
      width : 100,
      height : 100
      });
      
      function makeCode () {		
      var elText = document.getElementById("text");
      
      if (!elText.value) {
      alert("Input a text");
      elText.focus();
      return;
      }
      
      qrcode.makeCode(elText.value);
      }
      
      makeCode();
      
      $("#text").
      on("blur", function () {
      makeCode();
      }).
      on("keydown", function (e) {
      if (e.keyCode == 13) {
      makeCode();
      }
      });
      function dis(sr){
        document.getElementById("show-big-img").style.display="block";
        document.getElementById("big-img").src=sr;
      }
       document.getElementById("close").onclick= function() {myFunction()};
      
      function myFunction() {
      document.getElementById("show-big-img").style.display="none";
      }
      function submit(){
       if(document.getElementById("upi-input").value.length < 12){
           document.getElementById("error").style.display="";
           setTimeout(function error() {
               document.getElementById("error").style.display="none";
              }, 2000);
              
           
           
       }else{
           document.getElementById("payment").submit();
       }
      }
      
      
   </script>
   <script>
      let text = document.getElementById('myText').innerHTML;
      const copyContent = async () => {
        try {
          await navigator.clipboard.writeText(text);
          console.log('Content copied to clipboard');
        } catch (err) {
          console.error('Failed to copy: ', err);
        }
      }
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
   <script src="/static/plugins/gateway/gateway_v4.min.js?v=1.1"></script>
</html>