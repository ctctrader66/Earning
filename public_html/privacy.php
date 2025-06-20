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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="description" content="Lottlucy">
      <style>
         .appContent {
         padding-right:20px;
         padding-left:20px;
         }
         .card {
         border-radius:0px;
         }
         h1{font-size:1.7rem; font-weight:600;}
         h2{font-size:1.4rem; font-weight:600;}
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
body{
    background:#f7f8ff;
}
      </style>
   </head>
   <body>
      <?php include("include/connection.php");
      include("loading.php");?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="/main.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         </div>
         <div class="pageTitle">Privacy Policy</div>
      </div>
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div id="appCapsule">
         <div class="appContent">
            <div class="sectionTitle1 mt-2 mb-2">
               <?php echo content($con,'privacy');?>
               <p>&nbsp;</p>
            </div>
         </div>
      </div>
      <?php include("include/footer.php");?>
      <!-- Jquery --> 
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <?php  include("include/pagestrick.php");?>
   </body>
</html>