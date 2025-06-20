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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
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
         margin-top:-45px;
         width: 100%;
         padding: 15px;
         box-sizing: border-box;
         background: #fff;
         border-radius: 10px 10px 0 0;
         }
         .boxinput{width: 100%;
         display: flex;
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
         margin-top:-8px;
         margin-left:15px;
         height:25px;
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
         padding: 10px 20px 5px 20px;
         background-image: linear-gradient(90deg,#E5E7F6,#F0EFF9);
         color: #000;
         border-radius:8px;
         }
         .bankcard .box i{
         font-size:22px;
         }
         .bankcard .box p{
         font-size:16px;
         }
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  font-size:18px;
         width: 65%;
         margin: 0 auto;
         border: 1px solid #f2413b;
         color: #fff;
         background-color: #f2413b;
         box-shadow: 0 0 4px 3px rgb(242 65 59 / 27%);
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
         .image-spin {
         animation: spin 2s linear infinite;
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
          include("loading.php");
         $userid=$_SESSION['frontuserid'];?>
      <!-- App Header -->
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Withdrawal</div>
      </div>
      <!-- * App Header --> 
      <div style="background-image: linear-gradient(to right, #CF0506 , #F4443E); height:50px;margin-top:50px"></div>
      <!-- App Capsule -->
      <div id="appCapsule">
         <div class="appContent1">
            <div  class="mb-5" style="padding:0px 10px;">
               <p style="float:left"><span style="font-weight:500; color:#000; font-size:17px;">Balance</span> <font style="font-size:24px; font-weight:500;">₹ <span id="balance" > <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></font><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img id="spin-image" class="walletimg1" src="images/brefresh.png"></a></p>
               <img class="rightribon" src="/images/rabbon.png">
            </div>
            <div class="layout bankcard">
               <div onclick="document.location='/withdrawals.php'" class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>USDT CARD</p>
               </div>
               <div style="  color: #fff;background-image: linear-gradient(90deg,#cd0103,#f64841);"  class="box">
                  <i class="icon ion-md-wallet"></i>
                  <p>BANK CARD</p>
               </div>
            </div>
            <form  action="#" id="paymentForm" method="post" class="" autocomplete="off">
               <div class="boxinput mt-1 mb-1">
                  <div class="underinput">
                     <span style="font-size:25px;font-weight:600">₹</span>
                     <input required style="padding-left: 20px;width:100%; font-size:18px;font-weight:600 " type="number" id="userammount" name="userammount" class=" textbox" placeholder="Please Enter The Withdrawal Amount" onKeyPress="return isNumber(event)" min="<?php echo minamountsetting($con,'withdrawalamount');?>" maxlength="6">
                  </div>
               </div>
               <!-- <div class="fee">
                  Fee : <span id="fee">0.00</span>, to Account : <span id="toAccount">0.00</span><input type="hidden" id="toAccountInput" name="userammount_1"/>
                  </div>-->
               <div  role="radiogroup" class="payment_box">
                  <div  role="radio" tabindex="0" aria-checked="true">
                     <input type="radio" hidden name="optionsname" value="bank" checked>
                     <span class="payment_text"><span  class="text">Payout</span></span>
                  </div>
               </div>
               <div class="boxinput mb-2">
                  <div class="underinputbank">
                     <div class="mt-1 mb-1" >
                        <select required style="text-align:center; font-size:18px;" class="form-control textbox"  name="acid" id="acid" >
                           <option style="text-align:center;" value="">Choose Bank Account</option>
                        </select>
                     </div>
                     <hr style="margin-top:-5px;">
                     <div onclick="document.location='/manage_bankcard.php'" style="padding:0px 100px;">
                        <div style="background:#F9E8E8; border-radius:8px; color:#f2413b;padding:5px;margin-top:-4px;"><span style="margin-right:5px;" > <i class="fa fa-plus-circle"></i></span>ADD BANK CARD</div>
                     </div>
                  </div>
               </div>
               <div class="boxinput">
                  <div class="underinputpassword">
                     <img style=""class="icon" src="images/key-img.png" >
                     <input type="password" id="password" name="password" class="form-control textbox" placeholder="Password" required >
                  </div>
               </div>
               <input type="hidden" name="userid" value="<?php echo $userid;?>">
               <input type="hidden" name="action" value="withdrawal">
               <div class="text-center recharge_btn">
                  <button type="submit" class="submitbtn" > Withdrawal </button>
               </div>
               <div class="boxintro mb-5" style="margin-top:-10px; ">
                  <div class="underinputbox">
                     <div class="rowbox"> 
                        <img src="images/1.png"> <span>1. Rate 0%</span>
                     </div>
                  
                     <div class="rowbox"> 
                        <img src="images/2.png"> <span>2. Total Bet ₹<?php $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_walletsummery` where userid = '".$userid."' and actiontype = 'join' ");
                                      	$wagar_bet1=mysqli_fetch_array($total_bet1);
                                      $total_bet = $wagar_bet1['total1']; echo round($total_bet,1);?>
                        </div>
                     <div class="rowbox"> 
                        <img src="images/3.png"> <span>3. Withdraw Time 00:00-23:59</span>
                     </div>
                     <div class="rowbox"> 
                        <img src="images/4.png"> <span>4. Daily Withdrawal Times 2</span>
                     </div>
                     <div class="rowbox"> 
                        <img src="images/5.png"> <span>5. Withdrawal Range ₹<?php echo minamountsetting($con,'withdrawalamount');?> - ₹100000</span>
                     </div>
                  </div>
               </div>
         </div>
         </form> 
      </div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <div id="alert" class="modal fade1" role="dialog">
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <div class="text-center" id="alertmessage">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="privacy" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 style="font-weight:normal;">Withdrawal Timming</h5>
               </div>
               <div class="modal-body responsive">
                  <strong>Monday to Saturday</strong><br>
                  <strong>10:00 AM to 5:00 PM</strong>
                  <!-- <strong>Withdrawal Limit Reached!!</strong><br>
                     <strong>Try Again Tomorrow </strong>-->
               </div>
               <div class="modal-footer">
                  <a class="pull-left" data-dismiss="modal"><strong>OK</strong></a>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <script src="assets/js/jquery.validate.min.js"></script>
      <?php include('assets/js/withdrawal.js.php'); ?>
      <?php  include("include/pagestrick.php");?>
      <script>
         var userid = <?php echo $userid ?>;
         // alert(userid);
         $(document).ready(function() {
           var dataString = 'userid=' + userid + "& type=" + "bank";
           $.ajax({
             type: "POST",
             url: "ajax_bankdetail.php",
             data: dataString,
             cache: false,
             success: function(html) { //alert(html);
               $("#acid").html(html);
             }
           })
         })
      </script>
      <script>
         $(document).ready(function(){
             $('#userammount').on('keyup',function(){
                var percentage = 0.00;
                var balance = account = toAccount = 0;
                balance = $('#userammount').val();
                account = balance * percentage;
                
                toAccount = balance - account;
                toAccount = toAccount.toFixed(2);
                console.log('balance : '+ balance + 'account : '+ account)
                $('#toAccount').html(toAccount);
                $('#toAccountInput').val(toAccount);
                $('#fee').html(account);
             });
         });
         
      </script>
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
      <script>
         $(function(){
           $('#alert').on('show.bs.modal', function(){
               var alert = $(this);
               clearTimeout(alert.data('hideInterval'));
               alert.data('hideInterval', setTimeout(function(){
                   alert.modal('hide');
               }, 2000));
           });
         });
      </script>
   </body>
</html>