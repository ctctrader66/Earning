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
      <?php include 'head.php';?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <style>
         h3 {
         font-weight:normal;
         }
         .tdtext{ font-size:13px !important;  font-weight:400; text-align:right;}
         .tdtext2{ font-size:13px !important; color:#f00 !important; font-weight:normal; text-align:right;}
         .tdtext3{ font-size:13px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}
         .text small{ font-size:12px; color:#888;}
         .listView {
         padding:10px;
         }
         .text {
         font-size: 16px;
         font-weight:400px;
         }
         .rowline{
         background:#FEFAFA;
         border-bottom:5px solid white;
         }
         body{
         background:#FBFCFD;
         }
         .undercontainer{
         background:#fff;
         border-radius: 0px 25px 25px; 0px;
         }
         .time{
         font-size:14px;
         }
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         include("loading.php");
         $userid=$_SESSION['frontuserid'];
         
          ?>
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="main.php" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Recharge Record</div>
      </div>
      <!-- * App Header --> 
      <!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1 listView">
    <table class="table table-borderless">
      <thead>
      </thead>
      <tbody>
      <?php
	 @$userid=$_SESSION['frontuserid'];
      $summery=mysqli_query($con,"select * from `nowpayment` where `userid`='".$userid."' order by id desc");
	  $summeryRows=mysqli_num_rows($summery);
	  if($summeryRows!=''){
		  while($summeryResult=mysqli_fetch_array($summery)){
$post_date = $summeryResult['created_at'];
 $convert = date("h:i A d-m-Y",strtotime($post_date));
 $actiontypearray=explode("~",$summeryResult['payment_status']);
 @$actiontype=$actiontypearray[0];
 @$actiontypeval=$actiontypearray[1];
if($actiontype=='waiting'){?>
	
        <tr>
          <td>
          <div class="listItem">
          
            <div class="text"><div><strong>Not Complete</strong><small><?php echo $post_date;?></small></div></div>
            </div>
            </td>
          <td class="tdtext"><?php echo number_format($summeryResult['price_amount'],2);?><br><small><?php echo$summeryResult['payment_id'];?></small></td>
        </tr>
        
        
        
        <?php }else if($actiontype=='finished'){
	  ?>
        <tr>
          <td>
          <div class="listItem">
        
            <div class="text"><div><strong class="">Completed</strong><small><?php echo $post_date;?></small></div></div>
            </div>
            </td>
          <td class="tdtext"> <?php echo number_format($summeryResult['price_amount'],2);?><br><small><?php echo$summeryResult['payment_id'];?></small></td>
        </tr>
        
        
        
        <?php }else if($actiontype=='rejected'){
	  ?>
        <tr>
          <td>
          <div class="listItem">
         
            <div class="text"><div><strong>Recharge Cancel</strong><small><?php echo $post_date;?></small></div></div>
            </div>
            </td>
          <td class="tdtext"><?php echo number_format($summeryResult['price_amount'],2);?><br><small><?php echo$summeryResult['payment_id'];?></small></td>
        </tr>
        
        
        
        <?php }}}else{?>
        
        <?php }?>
      </tbody>
          
    </table>
  </div>
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
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
      <?php  include("include/pagestrick.php");?>
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
      <script>
         function copy(that){
             
           $('#alert').modal('show');
           document.getElementById('alertmessage').innerHTML = "<p>Copy Succeeded</p>";
             
         var inp =document.createElement('input');
         document.body.appendChild(inp)
         inp.value =that.textContent
         inp.select();
         document.execCommand('copy',false);
         inp.remove();
         }
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
      <script>
         $(function () {
           $('#example1').DataTable({
             "paging": false,
             "lengthChange": false,
             "searching": false,
             "ordering": false,
             "info": false,
             "autoWidth": false
           });
         });
      </script>
   </body>
</html>