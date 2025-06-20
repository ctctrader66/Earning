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
         body{
         background: #f7f8ff;
         /*background-repeat: no-repeat;*/
         /*background-size: auto;*/
         background-image: none;
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
         .box{
             padding: 30px 25px 5px 25px;
             margin:0;
             justify-content:center;
             
         }
         .box .cardview{background:#fff; border-radius:15px;padding:20px;}
         .box .cardview img{height:200px; display: block;
         margin-left: auto;
         margin-right: auto;
         width: 100%;}
         .con{text-align:left;margin-top: 30px;}
         .con span{font-weight:400; font-size:15px; color:black;}
         
         
.textform{
   width: 100%;
    height: 40px;
    background: #ebebeb;
    border-radius: 20px;
    border: none;
    font-size: 12px;
    color: #000;
    padding: 4px 14px;
    margin-top: 20px;
}
         
         .btnbox{justify-content:center;}
.appHeader1 {
    width: 100%;
    background-image: none;
    background: linear-gradient(90deg,#f95a5a 0%,#ff998e 100%);
    color: #fff;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
}
.tp{
    width:100%;
        margin-bottom: 20px;
    background: linear-gradient(90deg,#f95a5a 0%,#ff998e 100%);
}
.tp img{
    width: 350px;
}
form{
    margin: 0px 24px;
    background: #fff;
    padding: 12px 8px 40px 8px;
    border-radius: 10px;
    box-shadow: 0 10px 10px #d0d0ed5c;
}
.cont{
    background:#f7f8ff;
}
.btn{
    border-radius: 30px;
    height: 40px;
    font-weight: 500;
    font-size: 14px;
    width: 100%;
    margin: 0 auto;
    border: 1px solid #fd877f;
    color: #fff;
    /* background-color: #fd877f; */
    text-shadow: 0 0.05333rem 0.02667rem rgba(231,65,65,.5019607843);
    background: -webkit-linear-gradient(top,#ff867a 0%,#f95959 100%);
    background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    box-shadow: 0 0.05333rem #e74141;
}
.btbox{
    margin-top:20px;
}
      </style>
   </head>
   <body >
      <?php
         include("include/connection.php");
         include("loading.php");
         
         $userid=$_SESSION['frontuserid'];?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <div class="appHeader1">
         <div class="left">
            <a href="/main.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         </div>
         
         <div class="pageTitle">Gift</div>
      </div>
      
      <div class="tp">
          <img src="images/gift-0e49be1a.png">
            
         </div>
      <div class="cont">
         
         
         
         <form name="type" id="type" enctype="multipart/form-data" action="#" method="post">
            
               <div class="cardview">
                  <!--<img src="images/envelope.png">-->
                  <p>Hey,</p>
                  <p> We have a gift for you</p>
                  <div class="con">
                     <span>Please enter gift redemption code</span>
                     
                     <input name="giftCode" id="giftCode" required placeholder="Enter gift redemption code" value="<?php if(isset($_GET['reward'])) { echo $_GET['reward']; } ?>" type="text" class="textform">
                     <div class="btbox">
                         <button type="submit" id="type" class="btn" >Submit</button>
                         
                     </div>
                     
                  </div>
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