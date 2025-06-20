<?php 
   ob_start();
   session_start();
   if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
  ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <style>
         body{ /*background: url(/images/bg_image.png);
         background-repeat: no-repeat;
         background-size: auto;*/
         background-image: linear-gradient(90deg,#cd0103,#f64841);
         }
         .lefttext{
         line-height:25px;
         float:left;
         color:white;
         } 
         .lefttext span{ font-weight:400; font-size:25px;}
         .lefttext p{ font-weight:300; font-size:16px;}
         h4{ color:white;}
         .content{padding:30px; 20px}
         .box{padding: 120px 30px 10px 30px;margin:0;justify-content:center;}
         .box .cardview{background:#fff; border-radius:15px;padding:20px;}
         .box .cardview img{height:200px; display: block;
         margin-left: auto;
         margin-right: auto;
         width: 100%;}
         .con{justify-content:center;text-align:center;}
         .con span{font-weight:400; font-size:22px; color:red;}
         .textform{
         width: 100%;
         height: 30px;
         line-height: 10px;
         border-radius: 3px;
         font-size: 15px;
         padding: 10px;
         border: 2px solid rgba(242,65,59,.27);
         background-color: #f9e8e8;
         }
         .btnbox{justify-content:center;}
      </style>
   </head>
   <body >
      <?php
         include("include/connection.php");
         include("loading.php");
         
         $userid=$_SESSION['frontuserid'];?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <div id="myHeader" class="appHeader1">
         <div class="left">
            <a href="main.php" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Gift</div>
      </div>
      <div class="content">
         <div class="lefttext">
            <span>Hello</span><br>
            <span>Everyone</span>
            <p>We have gift for you!</p>
         </div>
         <form name="type" id="type" enctype="multipart/form-data" action="#" method="post">
            <div class="box">
               <div class="cardview">
                  <img src="images/envelope.png">
                  <div class="con">
                     <span>Gift Code</span>
                     <p></p>
                     <input name="giftCode" id="giftCode" required placeholder="Please enter gift redemption code" value="<?php if(isset($_GET['reward'])) { echo $_GET['reward']; } ?>" type="text" class="textform">
                  </div>
               </div>
            </div>
            <div class="mt-3 btnbox">
               <center>
                  <button type="submit" id="type" class="btn" style=" border-radius: 25px; height:45px; font-weight: 400; font-size: 21px; width: 55%;margin: 0 auto; border: none;color: #fff;background-color: #FFCE1F;">Submit</button>
               </center>
            </div>
         </form>
      </div>
      <style>
         .regLog{
         width: fit-content;
         margin: 0 auto;
         display: table;
         }
         .regContent {
         margin: 0 auto;
         padding: 0 !important;
         color: #fff;
         font-size: 15px;
         background-color: rgba(50, 50, 51, .88);
         border-radius: 2px;
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
         .modal{
         top:48%;
         }
      </style>
      <div id="alert" class="modal" role="dialog" >
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body" >
                  <div class="text-center" id="alertmessage">
                  </div>
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
      <?php  include("include/pagestrick.php");?>
      <script>
         $(document).ready(function () {
         $("#type").on('submit',(function(e) {
         e.preventDefault();
         var giftCode = $('input#giftCode').val();
         
         if ((giftCode)== "") {
                 $("input#giftCode").focus();
         $('#giftCode').css({'border-color': '#f00'});
                 return false;}
         
         $.ajax({
         method: "GET", 
         url: "/redemptioncode.php?giftCode="+giftCode,
         contentType: 'application/json',     
         success: function(html)   
         { //alert(html);
         
         if (html == 1) {
         
          $('#alert').modal('show');
         document.getElementById('alertmessage').innerHTML = "<p>Success</p>";
         
                 $("#type")[0].reset();
         
            window.location ='https://epicgame.in/lifafa/?reward='+giftCode;
         }
         
         else if(html==0)
         {  $('#alert').modal('show');
         document.getElementById('alertmessage').innerHTML = "<p>Invalid Code Entered!</p>";	
         }
         
         }
         });
         
         }));
         
         
         
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