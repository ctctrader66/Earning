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
    top: -130px;
    background: #f7f8ff;
    margin: 0 20px;
    border-radius: 20px;
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
         background: url(../assets/img/banner1.png) no-repeat top;
         background-size: cover;
         height:250px;
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
         h3 {
         font-weight:normal;
         }
         .tdtext{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .tdtext2{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .tdtext3{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .text small{ font-size:14px; color:#000000;}
         .listView .listItem {
         color: #757575;
         font-size:14px;
         font-weight:400;
         padding: 0px 55px 0px 0px;
         }
         .listView .listItem .text {
         font-size: 16px;
         }
         .null_data{
         height: 33px;
         line-height: 33px;
         font-size: 12px;
         text-align: center;
         margin:0 auto;
         }
         .profit{
         height:35px;    
         }
         .lefttext{
         font-size:20px;
         font-weight:500;
         color: #959595;
         }
         .righttext{
         font-size:20px;
         font-weight:500;
         color: #959595;
         }
         .profile-block{
         border-bottom: 1px solid #DADADA; 
         padding:18 0px;
         }
         .textbox5
         {
         box-shadow:none;
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
         padding:0;
         font-size: 19px;
         border-top: 1.50px solid #f7f7f7;
         }
         button:focus{
         outline:none;
         }
         .child button {
         color: #2C3E50;
         border:none;
         padding:0 20px;
         font-weight:500;
         background: transparent;
         text-align:center;
         }
         .child a button{
         color: #6ABE57;
         }
         .tz_title{
         font-size: 16px;
         font-weight:400;
         color:rgb(70,85,101);
         }
         .banner{
         background: url(../images/myProfilebg.png) no-repeat 0 0;
         background-size: 100% auto;
         position: relative;
         height:80px;
         }
         .container{
         padding: 8px 2px;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
         }
         .modal-content{ border-radius:15px;}
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  
         width: 90%;
         margin: 0 auto;
         border: 1px solid #5cba47;
         color: #fff;
         background-color: #5cba47;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         }
.headbg{
    height: 200px;
    background: url(images/headerBg-6185d182.png) no-repeat;
    background-size: 100% 100%;
    -webkit-box-align: end;
    align-items: flex-end;
    border-radius: 0 0 0.8rem 0.8rem;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    margin: 0px 10px;
}
.appHeader1{
    background:linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    width: 100%;
    /* background-image: linear-gradient(90deg,#cd0103,#f64841); */
    color: #fff !important;
    z-index: 999;
    padding: 0 24px;
    height: 45px;
    text-align: center;
}
.avtr{
    border-radius: 50px;
    border: 2px solid #ff8780;
    background: url(images/1-a6662edb.png);
    width: 80px;
    height: 80px;
    background-size: 100% 100%;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
    align-items: center;
    margin-right: 20px;
}
.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background:linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 0.3rem;
    outline: 0;
}
.dia-hl{
    width: 60px;
    height: 2px;
    display: inline-block;
    background: -webkit-linear-gradient(left,#ffffff -2.73%,rgba(255,255,255,0) 91.36%);
    background: linear-gradient(90deg,#ffffff -2.73%,rgba(255,255,255,0) 91.36%);
    border-radius: 0.26667rem;
    -webkit-transform: matrix(-1,0,0,1,0,0);
    transform: scaleX(-1);
}
h5 {
    margin-bottom: 0;
    font-family: Poppins;
    font-weight: 700;
    font-size: 18px;
    color: #fff;
    text-shadow: 0 0.05333rem 0.02667rem rgba(209,28,28,.5);
}
.dia-hr{
    width: 60px;
    height: 2px;
    display: inline-block;
    background: -webkit-linear-gradient(left,#ffffff -2.73%,rgba(255,255,255,0) 91.36%);
    background: linear-gradient(90deg,#ffffff -2.73%,rgba(255,255,255,0) 91.36%);
    border-radius: 0.26667rem;
}
.frm{
       display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 20px 10px;
    background: #fff;
    border-radius: 14px;
}
.frm-h{
    
}
.form-control {
    width: 80%;
    height: 45px;
    background: #f2f2f2;
    border-radius: 30px;
    border: none;
    padding-left: 20px;
    color: #a6a6a6;
    margin-left: 20px;
    margin-bottom: 50px;
}
      </style>
   </head>
   <body style="background: #f7f8ff;">
      <?php
         include("include/connection.php");
         
         $userid=$_SESSION['frontuserid'];
         $selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
         $userresult=mysqli_fetch_array($selectruser);
         $selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
         $walletResult=mysqli_fetch_array($selectwallet);
         ?>
      <input type="hidden" value="<?= $userid ?>" id="useridforupdate" />
      <div class="appHeader1">
         <div class="left">
            <a href="#" class="icon goBack" onClick="goBack();"> <img  src="images/icons8-arrow-50.png" class="back"> </a>
         </div>
         <div class="pageTitle">My Profile</div>
      </div>
      
      <div class="headbg">
          
      </div>
      <div class="appContent1">
         <div  class="d-flex justify-content-between profile-block">
            
            <div class="avtr">
               <!--<img class="img-circle img-bordered-lg profit" src="assets/img/avatar.svg">-->
            </div>
            <div class="lefttext">
               Avatar
            </div>
         </div>
         <div class="d-flex justify-content-between profile-block">
            <div class="lefttext">
               ID
            </div>
            <div class="righttext">
               <?php echo user($con,'id',$userid);?>
            </div>
         </div>
         <div class="d-flex justify-content-between profile-block">
            <div class="lefttext">
               Nikename
            </div>
            <div class="righttext">
               <a style="font-size:20px;
                  font-weight:500;
                  color: #959595;" data-toggle="modal" href="#excel" data-backdrop="static" data-keyboard="false" >  <?php echo user($con,'username',$userid);?>&ensp;&ensp;<i class="fa fa-angle-right" ></i></a>
            </div>
         </div>
         <div class="d-flex justify-content-between profile-block">
            <div class="lefttext">
               Mobile
            </div>
            <div class="righttext">
               <?php echo user($con,'mobile',$userid);?>
            </div>
         </div>
         
      </div>
      <div id="excel" class="modal fade" role="dialog">
         <div class="modal-dialog p-1" role="document">
            <div class="modal-content">
               
               <div class="container">
                   <span class="dia-hl"></span>
                  <h5 class="dia-t">Modify Nickname</h5>
                  <span class="dia-hr"></span>
               </div>
               
               <div class="frm">
                   <div class="frm-h">
                       <div style="padding: 30px 10px;">
                           <img style="width:30px;" src="images/aimg.png">
                           <span>Nick Name</span>
                       </div>
                       
                   </div>
                   
                   <form name="type" id="type" enctype="multipart/form-data" action="#" method="post">
                  <input maxlength="14" minlength="4" type="text" id="username" name="username" class="form-control textbox5" placeholder="Nickname" >
                  <input class="form-control" id="editid" name="editid"  type="hidden">
                  <div class="parent">
                     <div style="border-radius:0 0 0 15px;" class="child">
                        <button  data-dismiss="modal">Cancel</button>
                     </div>
                     <div style="border-radius:0 0 15px 0; " class="child">
                        <a><button class="active" id="type" type="submit">Confirm</button></a>
                     </div>
                  </div>
               </form>
                   
                   
               </div>
               
            </div>
         </div>
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
      <script src="assets/js/jquery.validate.min.js"></script>
      <?php  include("include/pagestrick.php");?>
      <script>
         $(document).ready(function () {
         $("#type").on('submit',(function(e) {
         e.preventDefault();
         var username = $('input#username').val();
         
         if ((username)== "") {
                 $("input#username").focus();
         $('#username').css({'border-color': '#f00'});
                 return false;}
         
         var userid = $('#useridforupdate').val();
         
         console.log(userid);
         
         $.ajax({
         method: "GET", 
         url: "/updateusername.php?username="+username+"&id="+userid,
         contentType: 'application/json',     
         success: function(html)   
         { //alert(html);
         console.log(html);
         if (html == 1) {
         $('#alert').modal('show');
         document.getElementById('alertmessage').innerHTML = "<p>Succeeded</p>";
             window.location.href="profile.php";
         
                 $("#type")[0].reset();
         $('#excel').modal('hide');
          window.location ='';
         }
         
         else if(html==0)
         { alert("Some Technical Error....");		
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