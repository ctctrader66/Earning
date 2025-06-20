<?php 
   ob_start();
   session_start();
    if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="EpicGame">
      <meta name="keywords" content="EpicGame" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <style>
         .btn1 { 
         border: 1px solid white;
         color: white;
         height:45px; 
         width:264px;background-color:#DB0477
         }
         h3{ font-weight:normal; font-size:20px;}
         .btn .error{margin-top: 55px;}
         .btn-group {
         box-shadow: none;
         }
         #confirm .modal-dialog{padding:20px; margin-top:130px;}
         .inner-addon select.error {
         font-size: 16px;
         position: unset;
         }
         .textbox {
         box-shadow: 0px 0px;
         height: auto;
         width: 300;
         color: #000;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 17px;
         font-weight: 400;
         margin: 0px 0;
         cursor: pointer;
         transition: all 0.4s ease;
         }
         .icon{
         width: 25px;
         height: 25px;
         }
         .appContent1{
         margin-top:286px;
         width: 100%;
         padding: 15px;
         box-sizing: border-box;
         background: #fff;
         border-radius: 10px 10px 0 0;
         }
         .boxinput{width: 100%;
         background: rgb(255, 255, 255);
         box-shadow: rgb(241 242 245) 0px 0.08rem 0.69333rem 0.10667rem;
         justify-content: center;}
         .underinput{ 
         width: 95%;
         height: 48px;
         border-radius: 4px;
         transition: background .3s cubic-bezier(.25,.8,.5,1);
         padding: 0 15px;
         display: flex;
         flex-direction: row;
         align-items: center;
         border-bottom:1px solid #F6F6F6;
         }
         .underinput ::placeholder{ color: #C8C9CC;}
         .underinputpassword{ 
         width: 95%;
         height: 48px;
         border: 1px solid #f2413b;
         border-radius:5px;
         transition: background .3s cubic-bezier(.25,.8,.5,1);
         padding: 0 15px;
         display: flex;
         flex-direction: row;
         align-items: center;
         }
         .underinputbank{ 
         width: 95%;
         height:120px;
         border: 1px solid #f2413b;
         border-radius:5px;
         transition: background .3s cubic-bezier(.25,.8,.5,1);
         box-shadow: 0 0.21333rem 0.37333rem 0 rgb(242 65 59 / 27%);
         padding: 10 15px;
         text-align:center;
         }
         .fee{
         padding: 30px 15px 15px;
         box-sizing: border-box;
         font-size: 14px;
         color: #212121;
         }
         .payment_box{
         width: 100%;
         padding-left: 4%;
         box-sizing: border-box;
         margin-bottom: 10px;
         }
         .payment_text{
         height: 38px;
         line-height: 38px;
         font-size: 18px;
         color: #B3B2C8;
         }
         .van-radio{
         height: 48px;
         line-height: 48px;
         font-size: 16px;
         }
         .van-radio__icon{
         -webkit-box-flex: 0;
         -webkit-flex: none;
         flex: none;
         height: 1em;
         font-size: 20px;
         line-height: 1em;
         cursor: pointer;
         }
         .van-radio__label {
         margin-left: 8px;
         color: #323233;
         line-height: 20px;
         }
         .van-cell__title {
         display: flex;
         flex-direction: row;
         }
         .recharge_btn{
         width: 100%;
         padding: 30px 0;
         display: flex;
         justify-content: center;
         align-items: center;
         margin: 12px 0 24px;
         }
         .rechabtn{
         background: #f2413b;
         box-shadow: 0 0 0.26667rem 0.02667rem rgb(242 65 59 / 27%);
         color: #fff;
         font-size: 16px;
         border-radius: 15px;
         border: 0;
         padding: 14px 0;
         text-align: center;
         width: 52%;
         }
         .modal{
         top:45%;
         }
         .regLog{
         width: fit-content;
         margin: 0 auto;
         display: table;
         }
         .regContent {
         margin: 0 auto;
         padding: 0 !important;
         color: #fff;
         font-size: 14px;
         background-color: rgba(50, 50, 51, .88);
         border-radius: 8px;
         }
         .fade1 {
         -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
         animation: fadein 0.5s, fadeout 0.5s 2.5s;
         }
         @-webkit-keyframes fadein {
         from {bottom: 0; opacity: 0;} 
         to {bottom: 30px; opacity: 1;}
         }
         @keyframes fadein {
         from {bottom: 0; opacity: 0;}
         to {bottom: 30px; opacity: 1;}
         }
         @-webkit-keyframes fadeout {
         from {bottom: 30px; opacity: 1;} 
         to {bottom: 0; opacity: 0;}
         }
         @keyframes fadeout {
         from {bottom: 30px; opacity: 1;}
         to {bottom: 0; opacity: 0;}
         }
         .modal-backdrop{
         background-color: transparent;
         }
         .walletimg1{
            margin-top: -140px;
    margin-left: 163px;
    height: 20px;
    display: flex;
    position: fixed;
         }
         .rightribon{
         float:right;
         height:60px;
         padding-right:10px;
         margin-top:-15px;
         }
         .bankcard{
         padding:10px;
         }
         .bankcard .box
         {
         text-align:center;
         margin-right:15px;
         padding: 10px 35px 5px 35px;
         background-image: linear-gradient(90deg,#E5E7F6,#F0EFF9);
         color: #000;
         border-radius:8px;
         }
         .bankcard .box i{
         font-size:28px;
         }
         .bankcard .box p{
         font-size:16px;
         }
         
         .bankcard2{
         padding:10px;
         }
         .bankcard2 .box
         {
         text-align:center;
         margin-right:15px;
         padding: 5px 10px 5px 10px;
         background-image: linear-gradient(90deg,#E5E7F6,#F0EFF9);
         color: #000;
         border-radius:4px;
         }
         .bankcard2 .box i{
         font-size:22px;
         }
         .bankcard2 .box p{
         font-size:16px;
         }
         .submitbtn{
         border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 320px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .boxintro{width: 100%;
         height:100%;
         display: flex;
         justify-content: center;}
         .underinputbox{ 
         width: 95%;
         height:280px;
         border: 1px solid #f2413b;
         border-radius:5px;
         transition: background .3s cubic-bezier(.25,.8,.5,1);
         box-shadow: 0 0.21333rem 0.37333rem 0 rgb(242 65 59 / 27%);
         padding: 10 15px;
         text-align:center;
         }
         .rowbox{
         display:flex;
         padding:10px;
         border-bottom:1px solid #D8D8D8;
         font-size:16px;
         vertical-align:middle;
         }
         .rowbox span{
         margin-top:8px;
         }
         .rowbox img{
         padding-right:10px;
         height:35px;
         }
         .header1{
         background:#F9FAFC;
         display:flex;
         }
         .header1-title{
         padding:10px;
         font-size:16px;
         font-weight:500;
         color:#000;
         }
         .header1 img{
         height:22px;
         padding-right:10px;
         }
         .amount_list {
         width: 100%;
         margin-top:-10px;
         padding: 25px 10% 15px;
         box-sizing: border-box;
         flex-direction: row;
         flex-wrap: wrap;
         justify-content: space-around;
         }
         .button {
         display: inline-block;
         margin: 5px;
         width: auto;
         height: auto;
         font-size: 20px;
         font-weight: bold;
         border-radius: 5px;
         box-sizing:border-box;
         font-family: Orbitron;
         }
         .digits {
         color: #181818;
         text-shadow: 1px 1px 0px #FFF;
         background-color: #EBEBEB;
         border-top: 2px solid #FFF;
         border-right: 2px solid #FFF;
         border-bottom: 2px solid #C1C1C1;
         border-left: 2px solid #C1C1C1;
         border-radius: 4px;
         box-shadow: 0px 0px 2px #030303;
         }
         .digits:hover,
         .mathButtons:hover,
         #clearButton:hover {
         background-color: #FFBA75;
         box-shadow: 0px 0px 2px #FFBA75, inset 0px -20px 1px #FF8000;
         border-top: 2px solid #FFF;
         border-right: 2px solid #FFF;
         border-bottom: 2px solid #AE5700;
         border-left: 2px solid #AE5700;
         }
         .amount_list .currency{
         width: 50%;
         margin: 5px 5px;
         padding: 10px 0;
         box-sizing: border-box;
         text-align: center;
         font-size: 16px;
         background: #fff;
         box-shadow: 0 0.18667rem 0.50667rem 0 rgb(143 139 139 / 35%);
         transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
         background: #fff;
         border: 0;
         border-radius: 7px;
         }
         .currency:active {
         background: #fff!important;
         color: #D50E0F!important;
         border:1px solid #D50E0F;
         border-radius: 7px;
         }
         .currency:hover {
         background: #fff!important;
         color: #D50E0F!important;
         border:1px solid #D50E0F;
         border-radius: 7px;
         }
         button:focus {
         outline: none;
         }
          div.scroll {
       
        
        
        width: 100%;
         overflow: auto;
        white-space: nowrap;
    }
    .image-spin {
         animation: spin 2s linear infinite;
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
         
         
         .newHeader{
          background-color: transparent;
    color: #333333;
    width: 100%;
    display: flex;
    /* text-align: center; */
    height: 58px;
    justify-content: center;
    font-size: x-large;
    padding-top: 11px;
         }
         
         
         .img{
                width: 98%;
    height: 200px;
    margin-left: 11px;
    margin-right: 114px;
    position: relative;
         }
      </style>
   </head>
   <body style="background: #f3f0f0 !important;">
      <?php
         include("include/connection.php");
         include("loading.php");
         $userid=$_SESSION['frontuserid'];?>
            
         <div class="newHeader">   <a href="wallet" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>Deposit</div>
         <div><img  src="images/redpic.webp" class="img">  <div  class="mb-5" style="padding:0px 10px;">
               <p style="float:left"><span style="    font-weight: 500;
    color: white;
    font-size: 21px;
    margin-top: -170px;
    display: flex;
    position: absolute;
    margin-left: 30px;">Balance: </span> <font style="    font-weight: 500;
    color: white;
    font-size: 24px;
    margin-top: -140px;
    display: flex;
    position: absolute;
    margin-left: 30px;">€ <span id="balance" > <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></font><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img id="spin-image" class="walletimg1" src="images/brefresh.png"></a></p>
               <!--<img class="rightribon" src="/images/rabbon.png">-->
            </div></div>
              <div class="layout bankcard" style="row-gap: 10px;
    text-align: center;
    justify-content: center;
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    background-color: transparent;
    margin-top: 55px;
    margin-left: auto;
    margin-right: auto;
    height: auto;
    justify-content: space-between;">
               <div onclick="document.location='/recharge.php'"   class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT Pay</p>
               </div>
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>TRX Pay</p>
               </div>
                  <div onclick="document.location='/recharge.php'"   class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT Pay</p>
               </div>
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>TRX Pay</p>
               </div>
            </div>
            
            
              <div class="header1">
               <div class="header1-title">
                  <img src="images/reftickwallet.png"><span>Select Channel</span>
               </div>
            </div>
            <div class="layout bankcard ">
               <div  class="box">
               
                  <p>USDT Pay</p>
               </div>
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
      
               </div>
                  <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
              
               </div>
            </div>
      <!-- App Header -->
      <!--<div id="header" class="appHeader1">-->
      <!--   <div class="left">-->
      <!--      <a href="wallet" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>-->
      <!--   </div>-->
      <!--   <div class="pageTitle">Deposit TRX</div>-->
      <!--</div>-->
      <!-- * App Header --> 
      <!--<div style="margin-top:55px;background-image: linear-gradient(to right, #CF0506 , #F4443E); height:50px;"></div>-->
      <!-- App Capsule -->
      <div id="appCapsule">
         <div class="appContent1">
            <!--<div  class="mb-5" style="padding:0px 10px;">-->
            <!--   <p style="float:left"><span style="font-weight:500; color:#000; font-size:17px;">Total Amount: </span> <font style="font-size:24px; font-weight:500;">€ <span id="balance" > <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></font><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img id="spin-image" class="walletimg1" src="images/brefresh.png"></a></p>-->
               <!--<img class="rightribon" src="/images/rabbon.png">-->
            <!--</div>-->
            <div class="header1">
               <div class="header1-title">
                  <img src="images/reftickwallet.png"><span>Payment Method</span>
               </div>
            </div>
            <div class="layout bankcard">
               <div onclick="document.location='/recharge.php'"   class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT Pay</p>
               </div>
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>TRX Pay</p>
               </div>
            </div>
         <!--   <div class="layout bankcard">
               <div onclick="document.location='/recharge.php'"   class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT Pay</p>
               
               </div>
               <div class="layout bankcard">
               <div onclick="document.location='/recharge.php'"   class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT Pay</p>
               </div>
               </div>
               </div>-->
             <div class="header1">
               <div class="header1-title">
                  <img src="images/reftickwallet.png"><span>Fast TRX</span>
               </div>
            </div>
            <div class="layout bankcard2 scroll">
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);" class="box">
                 
                  <p>€</p>
                  <span>Amount 50-500000</span>
               </div>
              <!-- <div class="box">
                 
                  <p>YYPay</p>
                   <span>Amount 300-100000</span>
               </div>
                <div class="box">
                 
                  <p>Upipay</p>
                   <span>Amount 300-100000</span>
               </div>-->
            </div>
            <div class="header1">
               <div class="header1-title">
                  <img src="images/reftickwallet.png"><span>Deposite Amount</span>
               </div>
            </div>
            <form  name="calculator" action="#" method="post" id="paymentdetailForm">
               <div class="boxinput mt-1 mb-1">
                  <div class="underinput">
                     <span style="font-size:25px;font-weight:600">€</span>
                     <input style="padding-left: 20px;width:100%; font-size:18px;font-weight:600 " type="number" id="userammount" name="userammount" class=" textbox" placeholder="Recharge Amount Range" onKeyPress="return isNumber(event)" min="<?php echo minamountsetting($con,'rechargeamount');?>" maxlength="7">
                  </div>
                  <div class="amount_list">
                     <div class="layout">
                        <input class="currency" type="button" value="<?php $bonus=mysqli_query($con,"select * from `tbl_paymentsetting`");
                           $recharge=mysqli_fetch_array($bonus);
                           $rechargea = $recharge['rechargeamount']; echo $rechargea;?>" onclick="calculator.userammount.value = '<?php $bonus=mysqli_query($con,"select * from `tbl_paymentsetting`");
                           $recharge=mysqli_fetch_array($bonus);
                           $rechargea = $recharge['rechargeamount']; echo $rechargea;?>'">
                        <input class="currency" type="button" value="500" onclick="calculator.userammount.value = '500'">
                        <input class="currency" type="button" value="1,000" onclick="calculator.userammount.value = '1000'"> 
                     </div>
                     <div class="layout">
                        <input class="currency" type="button" value="10k" onclick="calculator.userammount.value = '10000'">
                        <input class="currency" type="button" value="50k" onclick="calculator.userammount.value = '50000'">
                        <input class="currency" type="button" value="100k" onclick="calculator.userammount.value = '100000'">
                     </div>
                  </div>
               </div>
               <input type="hidden" name="finalamount" id="finalamount" value="">
               <input type="hidden" name="action" id="action" value="paydetail">
               <div class="text-center recharge_btn">
                  <button type="submit" class="submitbtn" > Recharge </button>
               </div>
         </div>
         </form> 
      </div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <script src="assets/js/jquery.validate.min.js"></script>
      <script src="assets/js/paymentusdt.js.php"></script>
      <?php  include("assets/js/paymentusdt.js.php");?>
           <script>
   

function reloadbtn(id){
           
         
         $.ajax({
             type: "Post",
             data:"userid=" + id,
             url: "getwalletbalance.php",
             success: function (html) {
         	 
         			document.getElementById('balance').innerHTML =html;
               return false;
               },
               error: function (e) {}
               });
         	
         	}
      </script>
           <script>
         var spinImage = document.getElementById("spin-image");
         
         spinImage.addEventListener("click", function() {
         spinImage.classList.add("image-spin");
         
         setTimeout(function() {
         spinImage.classList.remove("image-spin");
         }, 2000);
         });
         
      </script>
   </body>
</html>