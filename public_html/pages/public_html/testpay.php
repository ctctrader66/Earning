<?php 
   ob_start();
   session_start();
   if($_SESSION['frontuserid']=="")
   {header("location:login.php");exit();}?>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <link rel="stylesheet" href="assets/css/login.css">
      <style>
         .appContent3 .back{
         position: absolute;
         top: 5%;
         left: 0.6rem;
         height: 30px;
         }
         .appContent3 .logo{
         position: absolute;
         top: 35%;
         right: 1rem;
         height: 70px;
         }
         .appContent1{
         position: relative;
         z-index: 9;
         padding:22px 18px;
         margin-top: -0.53333rem;
         background-color: #fff;
         }   
         .inner-addon{
         border: 2px solid #FBCCCA;
         border-radius:10px;
         }
         .inner-addon .icon{
         padding:15px 12px;
         font-size: 22px;
         }
         /*.left-addon.custom-left  input{*/
         /*    padding-left:40px;*/
         /*}*/
         .number-img img{
         position: absolute;
         height:22px;
         top: 12px;
         left: 13px
         }
         .appContent3{
         position: relative;
         background: url(../assets/img/banner2.png) no-repeat top;
         background-size: cover;
         height:200px;
         }
         .textbox1{
         margin-left:30px;
         }
         .textbox2
         {
         margin-left:5px;
         }
         .textbox
         {
         font-size:17px;
         width:auto;
         }
         .accordion {
         border-radius:10px;}
         .accordion .btn-link {
         box-shadow:none;
         margin:0px 0px;
         color: #333 !important;
         font-size: 17px;
         font-weight: normal;
         }
         .accordion .collapsed {
         box-shadow: 0 1px 2px 3px #f0f1f1;
         padding:10px;
         margin-bottom:20px;
         font-size:18px;
         }
         .accordion .show {
         }
         .accordion .sub-link {
         box-shadow:none;
         color: #333 !important;
         font-size: 14px;
         font-weight: normal;
         display:block;
         }
         .accordion .sub-link:hover {
         color:#00F !important;
         }
         .accordion .btn-link:hover {
         background:#F5F5F5;
         }
         .accordion .btn-link {
         position: relative;
         }
         .accordion .btn-link::after {
         content: "\f105";
         color: #545E68;
         top: 13px;
         right: 15px;
         position: absolute;
         font-family: "FontAwesome";
         font-size:30px;
         }
         .imggg{
         width:41px;
         margin-right:10px;
         }
         .accordion .card-header .btn {
         height:auto !important;
         border-radius:7px !important;
         padding:15px 40px 15px 20px;
         display:block;
         width:100%;
         display:block !important;
         text-align:left
         }
      </style>
   </head>
   <body style="background:#F9FAFB">
      <?php
         include("include/connection.php");
         $key = esufZWfEJ6wLGvNQ2O1zoFP3aPH5Z8SBfGYXltDaD6yaxOfbRefYfZlZc1EJOkpKnup9X0oIKawsQzFMtqn4c4fGf84tp4McRnwCifDb0XOFm2Inw1Zh7ustPjeY54dQOUanCDoNmLEFpadm0Q7xeoeg5Dx8Bpf5371ScflsNM5vqmDzG2ip6pwkz4r8QpM7pILrjKKUoPjRsszT972IH09OLQdhynch97FiaWP5rNArFe1GEY9SxD0zJ7;
         
         ?>
      <div class="appHeader1">
         <div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">About</div>
      </div>
      <div class="appContent3 text-white">
         <div   class="">
            <img  src="images/logo.png" class="logo">
         </div>
      </div>
      <div style="margin:20px;"class="accordion" id="accordionExample">
        <form action="https://0xprocessing.com/api/v1/payments/" method="GET">
  <input type="hidden" name="api_key" value="<?php echo $key;?>">
  <input type="hidden" name="currency" value="USD">
  <input type="hidden" name="amount" value="10">
  <input type="hidden" name="description" value="testpayemntgetway">
  <input type="hidden" name="callback_url" value="https://yourwebsite.com/callback.php">
  <input type="submit" value="Pay with 0xProcessing">
</form>

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
      <script src="assets/js/account.js"></script>
   </body>
</html>