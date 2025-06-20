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
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <style>
         .tz_close{
         display: flex;
         justify-content: flex-end;
         padding: 8px 5px 8px 15px;
         box-sizing: border-box;
         }
         .tz_close button {
         color: #ED0707;
         font-size: 14px;
         padding: 5px 10px;
         border: 0;
         background: transparent;
         margin-left: 10px;
         }
         .tz_title{
         font-size: 24px;
         padding: 15px;
         font-weight:400;
         color:#000;
         }
         .signinInfo .signinfo{
         padding: 10px 0 10px 20px;
         }
       
     
         .container {
         display: flex;
         flex-direction: column;
         justify-content: space-between;
         align-items: stretch;
         margin: 20px auto;
         max-width: 1200px;
         margin:80px 0;
         }
         .box {
         display: flex;
         flex-direction: column;
         justify-content: flex-start;
         align-items: stretch;
         margin-bottom: 40px;
         position: relative;
             box-shadow: 0 0.08rem 0.13333rem 0.02667rem #d0d0ed5c;
                 border-radius: 10px;
         }
         .box .boxhead {
         padding:10px;
         background-color: #fff;
         width: 100%;
         max-width: 400px;
         margin: 0;padding:;
         position: absolute;
         /*top: 0;*/
         bottom: 0;
         left: 0;
         border-left:none;
             border-radius: 10px;
         }
         .box .boxhead h2 {
         margin: 0;
         font-size: 4vw;
         }
         .box img {
         width: 100%;
         height: auto;
         max-width: 400px;
         margin-top:0px;
             border-radius: 10px;
         }
         @media screen and (max-width: 992px) {
         .box .boxhead {
         max-width: 100%;
         }
         .box img {
         max-width: 100%;
         max-height: 200px;
         }
         }
         .appHeader1 {
    width: 100%;
    background-image: none;
    background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    color: #fff;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
}
      </style>
   </head>
   <body style="background:#f7f8ff">
      <?php
         include("include/connection.php");
         $userid=$_SESSION['frontuserid'];
         
         ?>
      <div id="header" class="appHeader1">
          <div class="left ">
              <a href="/index.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
          </div>
         <div class="pageTitle">Activity</div>
         <div class="right ">
            <a href="help.php" class="icon goBack"> <img  src="images/icons/headphone.png" class="back"> </a>
         </div>
      </div>
      <div class="container">
         <div  onclick="#sign" data-toggle="modal" data-target="#signin" aria-haspopup="true" aria-expanded="false" class="box">
            
            <img src="home/assets/images/home/banner1.png" alt="banner1">
            <div class="boxhead">
               <h2>Lucky '10' Days Of Interest</h2>
            </div>
         </div>
         <div onclick="document.location='/activites'" class="box">
            
            <img src="home/assets/images/home/banner2.png" alt="banner1">
            <div class="boxhead">
               <h2>New Lanching Days And Win</h2>
            </div>
         </div>
         <div  class="box">
            <div class="boxhead">
               <h2>Recharge and Get Daily Check-in Bonus</h2>
            </div>
            <img src="home/assets/images/home/banner3.png">
         </div>
         <div  class="box">
            <div class="boxhead">
               <h2>Ember Activities Winning Streak</h2>
            </div>
            <img src="home/assets/images/home/banner4.png">
         </div>
         <div  class="box">
            <div class="boxhead">
               <h2>My-Wingo Vietnam Timing </h2>
            </div>
            <img src="home/assets/images/home/banner5.png">
         </div>
         <div  class="box">
            <div class="boxhead">
               <h2>Invite Members Reward Daily</h2>
            </div>
            <img src="home/assets/images/home/banner66.png">
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
   <script>
      $("#signinbtn").click(function() {
        var data = $("#signinform").val();
      
        $.ajax({
          method: "POST",
          url: "dosignininR.php",
          data: {
            userid: data
          },
          success: function(response) {
            if (response == 1) {
              alert('Sign In Success');
              window.location.reload()
            } else if (response == 2) {
              alert('Something Went Wrong');
              window.location.reload()
            } else if (response == 3) {
              alert('Already Sign In');
              $('#signin').modal('hide');
            }
            else if (response == 4) {
              alert('You Need To Complete Betting of Amount TRX<?php
         @$date = date("Y-m-d");  
         $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_betting` where userid = '".$userid."' and date(`createdate`)='".$date."' ");
           	$wagar_bet1=mysqli_fetch_array($total_bet1);
           $total_bet = 500-$wagar_bet1['total1'];
           echo $total_bet;?> For Signin!');
              $('#signin').modal('hide');
            }
          }
        });
      })
   </script>
</html>