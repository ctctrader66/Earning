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
         .tdtext{
             font-size:16px !important;
             color:#090 !important;
             font-weight:normal;
             text-align:left;
             display: flex;
             flex-direction: column;
             align-items: flex-start;
               width: 100%;
         }
         .tdtext span{
             padding:1px;
         }
         
         .tdtext2{ font-size:16px !important; color:#f00 !important; font-weight:normal; text-align:right;}
         .tdtext3{ font-size:16px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}
         .text small{ font-size:12px; color:#888;}
         .listView .listItem {
         padding: 5px;
         }
         .listView .listItem .text {
         font-size: 16px;
         }
         .imgicon{width:80px;}
         .nav-tabs {
         background:#fff;
         color: #000;
         font-size:15px;
         font-weight:500;
         padding:3px
         }
         .nav-tabs .nav-item {
         text-align:center
         }
         .nav-tabs .nav-link {
         height:44px;
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center;
         background:transparent;
         color:#646566;
         padding:0 16px;
         border-top:none;
         border-bottom:none;
         border-left:none;
         border-right:none;
         border-radius:0px;
         margin:0 !important;
         font-weight:500;
         font-size: 15px;
         }
         .nav-tabs .nav-link:hover {
         color: #646566;
         font-size:15px;
         font-weight:500;
         background:#fff;
         border-bottom: 5px solid #f00;
         } 
         .nav-tabs .nav-link.active {
         color: #000;
         font-size:15px;
         font-weight:500;
         background:#fff;
         border-bottom: 5px solid #f00;
         border-bottom-right-radius: 4px;
         border-bottom-left-radius: 4px;
         
         }
         .nav-tabs.size4 {
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center
         }
         .content{padding:30px; 20px}
         .box{vertical-align:middle;margin:0;justify-content:center;}
         .box .cardview{background:transparent; justify-content:center; text-align:center;border-radius:15px;padding:20px;}
         .box .cardview img{height:240px;}
         .con{justify-content:center;text-align:center;}
         .con span{font-weight:400; font-size:18px; color:#A39799;}
         .nav-tabs.size4 .nav-item {
         width:25%
         }
         body{
         background:#f7f8ff;
         }
         .newconatiner{
         margin-top:-22px;
         }
         .betbox{
         border:10px solid #FBFCFD;
         background:white;
         }
         .appHeader1 {
    width: 100%;
    background-image: none;
    background:linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    color: #fff;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
        position: fixed;
    top: 0;
}
.bt{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
}
.btd{
        display: flex;
    flex-direction: column;
        padding: 2px 10px;
}
.grc{
    background: #47ba7c;
    padding: 8px 6px;
    color: #fff;
    font-size: 12px;
    border-radius: 10px;
}
.grn{
     background: #47ba7c;
    padding: 8px 15px;
    color: #fff;
    font-size: 24px;
    border-radius: 10px;
}
.rdc{
    background: #fd565c;
    padding: 8px 12px;
    color: #fff;
    font-size: 12px;
    border-radius: 10px;
}
.rdn{
    background: #fd565c;
    padding: 8px 15px;
    color: #fff;
    font-size: 24px;
    border-radius: 10px;
}
.suc{
    font-weight: 400;
    font-size: 10px;
    border: 1px solid;
    color: #47ba7c;
    text-align: right;
    width: fit-content;
    padding: 0px 12px;
    border-radius: 8px;
}
.fl{
    font-weight: 400;
    font-size: 10px;
    border: 1px solid;
    color: #fd565c;
    text-align: right;
    width: fit-content;
    padding: 0px 12px;
    border-radius: 8px;
}
.listView .listItem {
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: flex-start;
    padding: 0;
    position: relative;
    flex-direction: column;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0.05333rem 0.10667rem #c5c5da40;
}
.hdd{
    display: flex;
    padding: 10px 12px;
    /* padding-left: 0px; */
    width: 100%;
    border-bottom: 1px solid #dedede;
    justify-content: space-between;
    align-items: center;
}
.hdd span{
    padding: 4px 14px;
    font-size: 11px;
    background: #37bd8a;
    border-radius: 6px;
    color:#fff;
    letter-spacing: 2px;
}
.stts{
    padding: 4px 14px;
    font-size: 14px;
    background: none !important;
    border-radius: 6px;
    font-weight: 600 !important;
    color:#37bd8a !important;
}
/*.table{*/
/*    display: flex;*/
/*    justify-content: center;*/
/*}*/
/*td{*/
/*    padding: 0px !important;*/
/*}*/
tbody{
        background: #f7f8ff !important;
}
tr{
        margin-top: 10px;
}
.detl{
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 6px 26px;
    font-size: 14px;
    font-weight: 500;
    color: #888;
}
.table td, .table th {
     border-top: none; 
    color: #333;
    font-size: 13px;
}
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         include("loading.php");
         $userid=$_SESSION['frontuserid'];
         
          ?>
      <div class="appHeader1">
         <div class="left">
            <a href="/main.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         </div>
         
         <div class="pageTitle">Withdrawal History</div>
      </div>
      <!-- * App Header --> 
      <!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule" style="margin-top: 45px;    margin-bottom: 55px;">
  <div class="appContent1 listView">
    <table class="table table-borderless">
      <thead>
      </thead>
      <tbody>
      <?php
	 @$userid=$_SESSION['frontuserid'];
      $summery=mysqli_query($con,"select * from `tbl_withdrawal` where `userid`='".$userid."' order by id desc");
	  $summeryRows=mysqli_num_rows($summery);
	  if($summeryRows!=''){
		  while($summeryResult=mysqli_fetch_array($summery)){
$post_date = $summeryResult['createdate'];
 $convert = date("h:i A d-m-Y",strtotime($post_date));
 $actiontypearray=explode("~",$summeryResult['status']);
 @$actiontype=$actiontypearray[0];
 @$actiontypeval=$actiontypearray[1];
if($actiontype==1){?>
	
        <tr>
            
            
            
          <td>
              
                  
         <div class="listItem">
             <div class="hdd">
                <span>Withdraw</span>
               <span class="stts" style="color:#f3bd14 !important;">Pending</span>
                
                
            </div>
          
            <div class="tdtext">
                <!--<span>Deposit</span>-->
                <div class="detl"> 
                     <span>Balance</span>
                     <span><?php echo number_format($summeryResult['amount'],2);?></span>
                
                </div>
                <div class="detl">
                     <span>Type</span>
                     <span>USDT_TRC20</span>
                    
                </div>
                <div class="detl">
                     <span>Time</span>
                     <span><?php echo $post_date;?></span>
                    
                </div>
                <div class="detl">
                     <span>Order no.</span>
                     <span><?php echo $summeryResult['payid'];?></span>
                    
                </div>
                
                
                
                    
                     
                    
                    <?php// echo $post_date;?>
            </div>
            
        </div>
        
            </td>
            
          
          
        </tr>
        
        
        
        <?php }else if($actiontype==0){
	  ?>
       
       
        <tr>
            
            
            
          <td>
              
                  
                  <div class="listItem">
             <div class="hdd">
                <span>Withdraw</span>
               <span class="stts">Completed</span>
                
                
            </div>
          
            <div class="tdtext">
                <!--<span>Deposit</span>-->
                <div class="detl"> 
                     <span>Balance</span>
                     <span><?php echo number_format($summeryResult['amount'],2);?></span>
                
                </div>
                <div class="detl">
                     <span>Type</span>
                     <span>USDT_TRC20</span>
                    
                </div>
                <div class="detl">
                     <span>Time</span>
                     <span><?php echo $post_date;?></span>
                    
                </div>
                <div class="detl">
                     <span>Order no.</span>
                     <span><?php echo $summeryResult['payid'];?></span>
                    
                </div>
                
                
                
                    
                     
                    
                    <?php// echo $post_date;?>
            </div>
            
        </div>
            </td>
            
          
          
        </tr>
        
        
        
        <?php }else if($actiontype==2){
	  ?>
        
        <tr>
            
            
            
          <td>
              
                  
                  <div class="listItem">
             <div class="hdd">
                <span>Withdraw</span>
               <span class="stts" style="color:#fc6e68 !important;">Rejected</span>
                
                
            </div>
          
            <div class="tdtext">
                <!--<span>Deposit</span>-->
                <div class="detl"> 
                     <span>Balance</span>
                     <span><?php echo number_format($summeryResult['amount'],2);?></span>
                
                </div>
                <div class="detl">
                     <span>Type</span>
                     <span>USDT_TRC20</span>
                    
                </div>
                <div class="detl">
                     <span>Time</span>
                     <span><?php echo $post_date;?></span>
                    
                </div>
                <div class="detl">
                     <span>Order no.</span>
                     <span><?php echo $summeryResult['payid'];?></span>
                    
                </div>
                
                
                
                    
                     
                    
                    <?php// echo $post_date;?>
            </div>
            
        </div>
            </td>
            
          
          
        </tr>
        
        </div>
        
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