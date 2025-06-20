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
         .tdtext{ font-size:16px !important; color:#090 !important; font-weight:normal; text-align:right;}
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
#5min{
    display: none !important;
}
      </style>
      
      <script>
     function one(){
        document.getElementById("1min").style.display = "block"
        document.getElementById("5min").style.display = "none"
        // document.getElementById("fifteen").style.display = "none"
        // document.getElementById("fiven").style.background = "#EAE8E9"
        // document.getElementById("fifteenn").style.background = "#EAE8E9"
        // document.getElementById("onen").style.background = "#2AADF1"
    }
    
    function five(){
        document.getElementById("5min").style.display = "block"
        document.getElementById("1min").style.display = "none"
        // document.getElementById("fifteen").style.display = "none"
        // document.getElementById("fiven").style.background = "#2AADF1"
        // document.getElementById("fifteenn").style.background = "#EAE8E9"
        // document.getElementById("onen").style.background = "#EAE8E9"
    }
    
    
</script>
   </head>
   
   <body>
      <?php
         include("include/connection.php");
         include("loading.php");
         $userid=$_SESSION['frontuserid'];?>
         <div id="header">
      <div class="appHeader1">
         <div class="left">
            <a href="/main.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         </div>
         <div class="pageTitle">My Bet History</div>
      </div>
      <ul class="nav nav-tabs size4" id="myTab3" role="tablist">
         <li class="nav-item"> 
            <a class="nav-link active" id="home-tab3" data-toggle="tab"  role="tab">Wingo</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link" id="profile1-tab3" data-toggle="tab"  role="tab">Winzo</a>
         </li>
         <li class="nav-item"> 
            <a class="nav-link" id="profile2-tab3" data-toggle="tab"  role="tab">D&T</a>
         </li>
         <li class="nav-item"> 
            <a class="nav-link" id="profile3-tab3" data-toggle="tab"  role="tab">Jungle</a>
         </li>
      </ul></div>
      
      
      
      
      <div style="margin-top:110px;">
          <ul class="nav nav-tabs size4" id="myTab3" role="tablist">
          <li class="nav-item"> 
            <a class="nav-link active" id="home-tab3 onem" data-toggle="tab" onclick="one()" role="tab">1Min</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link" id="profile1-tab3 fivem" data-toggle="tab" onclick="five()" role="tab">5min</a>
         </li>
         
      </ul>
      </div>
      <div  id="appCapsule">
         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show" id="5min" role="tabpanel">
               <div class="newconatiner">
                  <div class="appContent1 listView">
                     <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                           <?php
                              @$userid=$_SESSION['frontuserid'];
                                 $summery=mysqli_query($con,"select * from `tbl_userresult` where `userid`='".$userid."' order by id desc");
                              $summeryRows=mysqli_num_rows($summery);
                              if($summeryRows!=''){
                               while($summeryResult=mysqli_fetch_array($summery)){
                              $post_date = $summeryResult['createdate'];
                              $post_date2 = strtotime($post_date);
                              $convert=date('Y-m-d H:i',$post_date2);
                                $convert1=date('YmdHm',$post_date2);
                              $actiontypearray=explode("~",$summeryResult['status']);
                              @$actiontype=$actiontypearray[0];
                              @$actiontypeval=$actiontypearray[1];
                              if($actiontype=='fail'){?>
                           <tr class="betbox">
                              <td>
                                 <div class="">
                                    <div class="text">
                                       <div class="bt">
                                          <span class="
                                          
                                          <?php
                                          if ($summeryResult['value'] == 'Green') {
                                                   echo 'grc';
                                               } else if ($summeryResult['value'] == 'Red') {
                                                   echo 'rdc';
                                               } else if (in_array($summeryResult['value'], [0, 2, 4, 6, 8])) {
                                                   echo 'rdn';
                                               } else if (in_array($summeryResult['value'], [1, 3, 5, 7, 9])) {
                                                   echo 'grn';
                                               }
                                               ?>

                                          
                                          
                                          "><?php echo $summeryResult['value']; ?></span>
                                          
                                          <div class="btd">
                                              <span style="font-weight:400; font-size:15px;" > <?php echo $summeryResult['periodid'];?> </span>
                                    <span style="font-weight:400; font-size:15px;color:#9697A6"><?php echo $convert;?></span>
                                              
                                          </div>
                                          
                                          <!--<span style="font-weight:400; font-size:19px;" ><?php //echo $summeryResult['amount'];?></span>-->
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="tdtext2">
                                 <div class="btd" style="align-items: flex-end;">
                                     <span class="fl">Failed</span>
                                     <span style="font-weight:400; font-size:14px;padding: 4px;">+<?php echo number_format($summeryResult['paidamount'],2);?></span>
                                     
                                 </div>
                              </td>
                           </tr>
                           
                           
                           <?php }if($actiontype=='success'){?>
                           <tr class="betbox">
                              <td>
                                 <div class="">
                                    <div class="text">
                                       <div class="bt">
                                          <span class="
                                          
                                          <?php
                                          if ($summeryResult['value'] == 'Green') {
                                                   echo 'grc';
                                               } else if ($summeryResult['value'] == 'Red') {
                                                   echo 'rdc';
                                               } else if (in_array($summeryResult['value'], [0, 2, 4, 6, 8])) {
                                                   echo 'rdn';
                                               } else if (in_array($summeryResult['value'], [1, 3, 5, 7, 9])) {
                                                   echo 'grn';
                                               }
                                               ?>

                                          
                                          
                                          "><?php echo $summeryResult['value']; ?></span>
                                          
                                          <div class="btd">
                                             <span style="font-weight:400; font-size:15px;" > <?php echo $summeryResult['periodid'];?> </span>
                                    <span style="font-weight:400; font-size:13px;color:#9697A6"><?php echo $convert;?></span>
                                              
                                          </div>
                                          
                                          <!--<span style="font-weight:400; font-size:19px;" ><?php //echo $summeryResult['amount'];?></span>-->
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="tdtext">
                                 <div class="btd" style="align-items: flex-end;">
                                     <span class="suc">Succeed</span>
                                     <span style="font-weight:400; font-size:14px;padding: 4px;">+<?php echo number_format($summeryResult['paidamount'],2);?></span>
                                     
                                 </div>
                                 
                              </td>
                           </tr>
                           <?php }}}else{?>
                           
                           
                           
                           <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              
                           </tr>
                           <?php }?>
                        </tbody>
                     </table>
                     
                     
                     
                     <?php   $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_userresult` where userid = '".$userid."' ");
                        $wagar_bet1=mysqli_fetch_array($total_bet1);
                        $total_bet = $wagar_bet1['total1']; if($total_bet>0){echo '<div style="text-align:center"class=""><span style="font-size:15px; color:#9697A6"> No More</span></div>';}else{echo "";}?>
                  </div>
               </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            <!---level2 start-->
            <div class="tab-pane fade active show" id="1min" role="tabpanel">
               <div class="newconatiner">
                  <div class="appContent1 listView">
                     <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                           <?php
                              @$userid=$_SESSION['frontuserid'];
                                 $summery=mysqli_query($con,"select * from `tbl_userresult1` where `userid`='".$userid."' order by id desc");
                              $summeryRows=mysqli_num_rows($summery);
                              if($summeryRows!=''){
                               while($summeryResult=mysqli_fetch_array($summery)){
                              $post_date = $summeryResult['createdate'];
                              $post_date2 = strtotime($post_date);
                              $convert=date('Y-m-d H:i',$post_date2);
                                $convert1=date('YmdHm',$post_date2);
                              $actiontypearray=explode("~",$summeryResult['status']);
                              @$actiontype=$actiontypearray[0];
                              @$actiontypeval=$actiontypearray[1];
                              if($actiontype=='fail'){?>
                           <tr class="betbox">
                              <td>
                                 <div class="">
                                    <div class="text">
                                       <div class="bt">
                                          <span class="
                                          
                                          <?php
                                          if ($summeryResult['value'] == 'Green') {
                                                   echo 'grc';
                                               } else if ($summeryResult['value'] == 'Red') {
                                                   echo 'rdc';
                                               } else if (in_array($summeryResult['value'], [0, 2, 4, 6, 8])) {
                                                   echo 'rdn';
                                               } else if (in_array($summeryResult['value'], [1, 3, 5, 7, 9])) {
                                                   echo 'grn';
                                               }
                                               ?>

                                          
                                          
                                          "><?php echo $summeryResult['value']; ?></span>
                                          
                                          <div class="btd">
                                              <span style="font-weight:400; font-size:15px;" > <?php echo $summeryResult['periodid'];?> </span>
                                    <span style="font-weight:400; font-size:15px;color:#9697A6"><?php echo $convert;?></span>
                                              
                                          </div>
                                          
                                          <!--<span style="font-weight:400; font-size:19px;" ><?php //echo $summeryResult['amount'];?></span>-->
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="tdtext2">
                                 <div class="btd" style="align-items: flex-end;">
                                     <span class="fl">Failed</span>
                                     <span style="font-weight:400; font-size:14px;padding: 4px;">+<?php echo number_format($summeryResult['paidamount'],2);?></span>
                                     
                                 </div>
                              </td>
                           </tr>
                           
                           
                           <?php }if($actiontype=='success'){?>
                           <tr class="betbox">
                              <td>
                                 <div class="">
                                    <div class="text">
                                       <div class="bt">
                                          <span class="
                                          
                                          <?php
                                          if ($summeryResult['value'] == 'Green') {
                                                   echo 'grc';
                                               } else if ($summeryResult['value'] == 'Red') {
                                                   echo 'rdc';
                                               } else if (in_array($summeryResult['value'], [0, 2, 4, 6, 8])) {
                                                   echo 'rdn';
                                               } else if (in_array($summeryResult['value'], [1, 3, 5, 7, 9])) {
                                                   echo 'grn';
                                               }
                                               ?>

                                          
                                          
                                          "><?php echo $summeryResult['value']; ?></span>
                                          
                                          <div class="btd">
                                             <span style="font-weight:400; font-size:15px;" > <?php echo $summeryResult['periodid'];?> </span>
                                    <span style="font-weight:400; font-size:13px;color:#9697A6"><?php echo $convert;?></span>
                                              
                                          </div>
                                          
                                          <!--<span style="font-weight:400; font-size:19px;" ><?php //echo $summeryResult['amount'];?></span>-->
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="tdtext">
                                 <div class="btd" style="align-items: flex-end;">
                                     <span class="suc">Succeed</span>
                                     <span style="font-weight:400; font-size:14px;padding: 4px;">+<?php echo number_format($summeryResult['paidamount'],2);?></span>
                                     
                                 </div>
                                 
                              </td>
                           </tr>
                           <?php }}}else{?>
                           
                           
                           
                           <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              
                           </tr>
                           <?php }?>
                        </tbody>
                     </table>
                     
                     
                     
                     <?php   $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_userresult` where userid = '".$userid."' ");
                        $wagar_bet1=mysqli_fetch_array($total_bet1);
                        $total_bet = $wagar_bet1['total1']; if($total_bet>0){echo '<div style="text-align:center"class=""><span style="font-size:15px; color:#9697A6"> No More</span></div>';}else{echo "";}?>
                  </div>
               </div>
            </div>
            <!---level3 start-->
            <div class="tab-pane fade" id="level3" role="tabpanel">
               <div class="newconatiner">
                  <div class="appContent1 listView">
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                              <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                   
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="level4" role="tabpanel">
               <div class="newconatiner">
                  <div class="appContent1 listView">
                    <table class="table">
                        <thead>
                        </thead>
                        <tbody>
                              <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                    
                  </div>
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
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
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
      <?php  include("include/pagestrick.php");?>
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