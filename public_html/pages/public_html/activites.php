<?php 
ob_start();
session_start();
if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}?>
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
    top: 45%;
  
    right: 1rem;
   
    height: 45px;
}
 
 .appContent1{
    position: relative;
    z-index: 9;
    padding: 18px;
    border-radius: 25px 25px 0 0;
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
	font-size: 16px;
	font-weight: normal;

}
.accordion .collapsed {
	background: #fff;
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
 top: 18px;
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
	padding:10px 40px 10px 20px;
	display:block;
	width:100%;
	display:block !important;
	text-align:left
}
.boxcard img{width:100%;}
.appContent1{text-align:center;}
.appContent1 span{font-size:18px;}
.accordion{padding-top:15px;}
.accordion img{width:100%;}
</style>
</head>


<body style="background:#F9FAFB">
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
?>

    
<div class="appHeader1">
<div class="left">
           <a href="#" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
           
        </div>
  <div class="pageTitle">Activity Details</div>
</div>

     <div class="boxcard">
        <img src="images/act/2.png">  
  </div>
  
 
  <div style="background-image: linear-gradient(to right, #000 , #000);"  id="appCapsule">
        
  <div style="background:#FDFDFD; " class="appContent1">
    
     <span>⭐️Member Activities Winning Streak⭐️</span>
<div class="accordion" id="accordionExample">
    <img src="images/poster/1.png">
</div>
  <h4 style="font-family: Microsoft YaHei,Arial, Helvetica, sans-serif; color: rgb(51, 51, 51);">Contact&nbsp;<a href="/help.php" target="_blank" style="background-color: rgb(255, 255, 255);"><b>Customer Service</b></a>&nbsp;if you have reached the applicable conditions.&nbsp;<a href="/help.php" target="_blank" style="background-color: rgb(255, 255, 255);">📲</a>&nbsp;<a href="/help.php" target="_blank" style="background-color: rgb(255, 255, 255);"><b>Customer Service</b></a>&nbsp;<a href="/help.php" target="_blank" style="background-color: rgb(255, 255, 255);">📲</a>&nbsp;</h4>
  
  </div>
  
  </div>
<br><br><br>

<div id="registertoast" class="modal fade" role="dialog">
    
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
        <div class="text-center" id="regtoast">          
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
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/account.js"></script>

</body>
</html>