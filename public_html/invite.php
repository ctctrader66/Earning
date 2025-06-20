<?php 
   ob_start();
   session_start();
   
   if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
      
   include("include/connection.php");
   $userid=$_SESSION['frontuserid'];
   
  // Date
   $today=date('Y-m-d');
   
   // level 1
   $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
   $userRows=mysqli_num_rows($user);
   $userResult=mysqli_fetch_array($user);
   $owncode=$userResult['owncode'];
   $userlevel1=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id asc");
   $userlevel1Rows=mysqli_num_rows($userlevel1);
   
   // level 1 today
   $userlevel1today=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' and date(`createdate`)='".$today."' order by id asc");
   $userlevel1todays=mysqli_num_rows($userlevel1today);
   
   
   //commission total
    $commsionl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."'");
                        $commsionl1fetch=mysqli_fetch_assoc($commsionl1);
                        
   $commsionl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."'");
   $commsionl2fetch=mysqli_fetch_assoc($commsionl2);
   
    $commsionl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."'");
   $commsionl3fetch=mysqli_fetch_assoc($commsionl3);
   
    $commsionl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."'");
   $commsionl4fetch=mysqli_fetch_assoc($commsionl4);
   
    $commsionl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."'");
   $commsionl5fetch=mysqli_fetch_assoc($commsionl5);
   
    $commsionl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."'");
   $commsionl6fetch=mysqli_fetch_assoc($commsionl6);
   
   $withoutl1c = $commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   $withL1c = $commsionl1fetch['total']+$commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   
   $yesterday = date("Y-m-d", strtotime("yesterday"));
    
   //commission yesterday
    $commsionyl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."' and date(`createdate`)='".$yesterday."'");
                        $commsionyl1fetch=mysqli_fetch_assoc($commsionyl1);
                        
   $commsionyl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl2fetch=mysqli_fetch_assoc($commsionyl2);
   
    $commsionyl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl3fetch=mysqli_fetch_assoc($commsionyl3);
   
    $commsionyl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl4fetch=mysqli_fetch_assoc($commsionyl4);
   
    $commsionyl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl5fetch=mysqli_fetch_assoc($commsionyl5);
   
    $commsionyl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl6fetch=mysqli_fetch_assoc($commsionyl6);
   
   $withoutyl1c = $commsionyl2fetch['total']+$commsionyl3fetch['total']+$commsionyl4fetch['total']+$commsionyl5fetch['total']+$commsionyl6fetch['total'];
   
   $withLy1c = $commsionyl1fetch['total']+$commsionyl2fetch['total']+$commsionyl3fetch['total']+$commsionyl4fetch['total']+$commsionyl5fetch['total']+$commsionyl6fetch['total'];
   
   
   $weekend = date('Y-m-d',strtotime("-7 days"));
   
    //commission week
    $commsionwl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."' and date(`createdate`)>'".$weekend."'");
                        $commsionwl1fetch=mysqli_fetch_assoc($commsionwl1);
                        
   $commsionwl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl2fetch=mysqli_fetch_assoc($commsionwl2);
   
    $commsionwl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl3fetch=mysqli_fetch_assoc($commsionwl3);
   
    $commsionwl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl4fetch=mysqli_fetch_assoc($commsionwl4);
   
    $commsionwl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl5fetch=mysqli_fetch_assoc($commsionwl5);
   
    $commsionwl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl6fetch=mysqli_fetch_assoc($commsionwl6);
   
  
   $withLw1c = $commsionwl1fetch['total']+$commsionwl2fetch['total']+$commsionwl3fetch['total']+$commsionwl4fetch['total']+$commsionwl5fetch['total']+$commsionwl6fetch['total'];
   
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
         background:#8B8B8B;
         }
         .heading{
         background:#F4F4F4;
         width:100%;
         padding:10px 20px;
         }
         .heading span{
         font-weight:400;
         font-size:16px;
         color:#000;
         }
         .parent {
         position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    height: auto;
    color: #fff;
    background-color: #f95959;
    padding-top: 0.6rem;
    background-image: url(https://91club.com/assets/png/promotionbg-9dcd78e9.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding-bottom: 60px;
         }
         .child {   margin:0 10px;
         width: 100%%;
         float: center;
         flex: 1;
         padding:10px 10px;
             display: flex;
    flex-direction: column;
    align-items: center;
         /*border-radius:10px;*/
         /*border: 1.50px solid red;*/
         }
         .child span{
                height: 24px;
    /* min-width: 16px; */
    background: #ff8d8d;
    border-radius: 0.66667rem;
    line-height: 20px;
    text-align: center;
    font-size: 10px;
    margin-bottom: 4px;
    white-space: nowrap;
    padding: 2px 12px;
    width: 100%;
    letter-spacing: 2px;
         }
         .child p{
        font-size: 10px;
    margin-bottom: 10px;
    text-align: center;
        font-weight: 500;
         }
         .inivite{
         padding: 5px;   
         }
         img{
         height: 26px;
         margin:0;
         padding:0;
         background:#FBFCFD;
         }
         .row{
         text-align:center;
         justify-content: center;
         }
         .col{
         vertical-align: middle;
         }
         button{
             height: 35px;
             width: 100%;
             background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
             box-shadow: 0 0.05333rem #e74141;
             border-radius: 24px;
             color: #fff;
             border: none;
         }
         .contenor{
         margin: 0.4rem 0.4rem 0;
         background: #fff;
         box-shadow: 0 0.13333rem 0.29333rem 0.02667rem rgb(0 0 0 / 12%);
         border-radius: 0.10667rem;
         overflow-y: auto;
         }
      
        .table{
            text-align:center;

        }
         .table th{
             border:none;
              background:#F4F4F4;  
           font-weight:400;
         font-size:14px;
         color:#000;
         }
       
         .nav-tabs {
         background:#fff;
         border-radius:0px;
         border:0;
         font-weight:400;
         padding:5px 3px 5px 3px
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
         color:#000;
         padding:0 16px;
         border-top:none;
         border-left:none;
         border-right:none;
         border-radius:0px;
         margin:0 !important;
         font-weight:400;
         font-size:16px;
         }
         .nav-tabs .nav-link:hover {
         background:#fff;
         color:red;
         border-bottom:none ;
         font-weight:400;
         }
         .nav-tabs .nav-link.active {
         font-weight:400;
         color:red;
         border-bottom:none ;
         font-size:16px;
         }
         .parent1 {
         padding: 20px 0px;
         text-align:center;
         display: flex;
         width:100%;
         }
         .child1 { 
            text-align: center;
    position: relative;
    top: -75px;
    background: #fff;
    width: auto;
    margin: 2px 20px;
    left: 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 2px;
         } 
         .appHeader1 {
    width: 100%;
    background-image: none;
    background:#f8f9fd !important;
    color: black;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
}
.appHeader1 .pageTitle {
      padding-top: 14px;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0px;
    color: black !important;
    font: inherit;
}
.appHeader1 .back {
    position: absolute;
    top: 20%;
    left: 0.6rem;
    height: 28px;
}
font {
           display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    font-size: 10px;
    font-weight: 400;
    color: #888888;
}
.colmh{
        height: 40px;
    line-height: 45px;
    background-color: #f6f6f6;
    color: #151515;
    font-size: 12px;
    padding-left: 22px;
    background-image: url(./images/tm.png);
    background-size: 25px;
    background-repeat: no-repeat;
    background-position: 4px center;
}
font span{
        color: red;
    /* position: relative; */
    display: flex;
    position: relative;
    font-size: 18px;
}
.colm{
        position: relative;
    width: 50%;
}
.mmn{
          text-align: center;
    position: relative;
    top: 8px;
    background: transparent;
    width: auto;
    margin: 4px 4px;
    left: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 2px;
    align-items: center;
    margin-bottom: 200px;

}
.mmn p{
    color:#666666;
}
.iwr{
        margin-top: 15px;
           width: 80%;
    height: 450px;
    text-align: center;
    -webkit-flex-shrink: 0;
    -webkit-flex-shrink: 0;
    /* flex-shrink: 0; */
    /* width: 100%; */
    /* height: 100%; */
    position: relative;
    -webkit-transition-property: -webkit-transform;
    transition-property: -webkit-transform;
    transition-property: transform;
    transition-property: transform,-webkit-transform;
}
.imw{
    position: relative;
    background: url(https://91club.com/assets/png/poster-ce19704f.png) no-repeat center;
    background-size: 100% 100%;
    height: 100%;
}
.scont img{
    width: 80px;
    height: 40px;
    float: left;
    background: none;
}
.scont{
        width: 100%;
    height: 300px;
    padding: 30px;
}
.hd1{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-evenly;
}
.sp1{
        width: 100px;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    margin-left: -18px;
}
.sp{
        background: url(./images/bgi.png) no-repeat center;
    background-size: 100% 100%;
    font-family: Inter;
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    color: #f24544;
    padding: 4px 6px;
}
.hd2{
    margin-top: 10px;
    
}
.sssp{
        font-size: 28px;
    line-height: 40px;
    letter-spacing: 6px;
    font-weight: 600;
    color:#fff;
    
    
}
.hd3{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
}
.chd3{
       display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    border-radius: 5px;
    border: 1px solid white;
    padding: 6px;
    width: 100px;
}

.chd3 img{
        width: 30px;
    height: 30px;
}
.chd3 p{
        color: aliceblue;
    font-size: 10px;
    letter-spacing: 0px;
    line-height: 2;
    font-weight: inherit;
}
.qrc img{
    width: 100px;
    height: 100px;    
}

.txt{
       
        width: 90%;
    text-align: left;
    padding-left: 20px;
}
.btnn{
        width: 90%;
     height: 15%;
     font-size: 13px;
     font-weight: 400px;
    margin-top: 10px;
}
.cls{
   width: 90%;
    height: 35px;
    color: #fff;
    font-size: 15px;
    text-align: center;
    line-height: 30px;
    border-radius: 9rem;
    color: #fa5a5a;
    border: 0.01333rem solid #fa5a5a;
     margin-top: 10px;
}
#header{
    z-index: 9999;
}







      </style>
   </head>
   <body style="background:#f6f7ff">
     
       <div  id="header">
      <div class="appHeader1">
          <div class="left ">
              <a href="/index"><img  src="./images/back.png" class="back"></a>
          </div>
          
         <div class="pageTitle">Invite</div>
         <div class="right ">
            <a href="promotionrecord" class="icon goBack"> <img  src="images/mt.png" class="back"> </a>
         </div>
      </div>
      </div>
    
   
       
      
      <div class="mmn">
          
      <p>Please swipe left - right to choose your favorite poster</p>
      
      <div class="iwr">
          <div class="imw">
              
              <div class="scont">
                  <img src="./images/myww-removebg-preview.png"><br><br>
                  <div class="hd1">
                      
                      <span class="sp1">My Wingo</span>
                      <span class="sp">Fair and Justice</span>
                      <span class="sp">Open and Transparent</span>
                  </div>
                  
                  <div class="hd2">
                      
                      <span class="sssp">Full Odds Bonus Rate</span>
                      
                  </div>
                  
                  <div class="hd3">
                      
                     <div class="chd3">
                         <img src="images/bnk.png">
                         <p> Financial Security</p>
                         
                     </div>
                     <div class="chd3">
                         <img src="images/qwt.png">
                         <p> Quick Withdraw</p>
                         
                     </div>
                      
                  </div>
              </div>
              
              <div class="qrc">
                  <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://91clubs.live/register?code=<?php echo user($con,'owncode',$userid);?>">
                  
                  
              </div>
              
          </div>
          
          
      </div>
      
      <div class="txt">
          <p>
              Invite friends
          </p>
          <p>
              Income 10 billion  Commission
          </p>
      </div>
      
      
      <div class="btnn">
          
          <button disabled id="p2"> https://91club.gameonly1.online/register?code=<?php echo $owncode; ?></button>
      </div>
          <div class="cls" onclick="copyToClipboard('#p2')"> Copy Link</div>
          
          
          
          
          
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
</div></div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <!-- Jquery --> 
      <script>
         function copyToClipboard(element) {
              $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Copy Succeeded</p>";
         var $temp = $("<input>");
         $("body").append($temp);
         $temp.val($(element).text()).select();
         document.execCommand("copy");
         $temp.remove();
         }
      </script>
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