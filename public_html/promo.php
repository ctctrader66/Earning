<?php 

ob_start();
session_start();

 if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
   
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
// level 1
// @$userid=$_SESSION['userid'];
$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
$userRows=mysqli_num_rows($user);
$userResult=mysqli_fetch_array($user);
$owncode=$userResult['owncode'];
$userlevel1=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id asc");
$userlevel1Rows=mysqli_num_rows($userlevel1);

$totall1Recharge=0;;
while($resforlevel1Amount=mysqli_fetch_array($userlevel1)){
    $ul1Id = $resforlevel1Amount['id'];
    $l1recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_betting WHERE userid = '".$ul1Id."'"));
    $totall1Recharge += $l1recharge['total'];
   
}

// end

//level 2
$user2=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
$userRows2=mysqli_num_rows($user2);
$userResult2=mysqli_fetch_array($user2);
$owncode2=$userResult2['owncode'];
$userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."' order by id asc");
$userleve21Rows=mysqli_num_rows($userlevel2);

if($userleve21Rows!='')
{
    $num=0; $totall2Recharge=0;
    while($userlevel2Result=mysqli_fetch_array($userlevel2))
    {
        $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
        $userlevel2Rows=mysqli_num_rows($lvl2user);
        
        while($userlvl2Result=mysqli_fetch_array($lvl2user))
        {
            $ul2Id = $userlvl2Result['id'];
            $l2recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_betting WHERE userid = '".$ul2Id."'"));
            $totall2Recharge += $l2recharge['total'];
           
        }
       
    }
   
}



     // level 3
                     $user1=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows0=mysqli_num_rows($user1);
	  $userResult0=mysqli_fetch_array($user1);
	 $owncode22=$userResult0['owncode'];
	 
	   $user22=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode22."'");
	  $userRows22=mysqli_num_rows($user22);
	  $userResult22=mysqli_fetch_array($user22);
	 $owncode3=$userResult22['owncode'];
	 
	 
                        	  
                          $userlevel22=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode3."' order by id asc");
	  $userleve221Rows=mysqli_num_rows($userlevel22);
	  

if($userleve221Rows!='')
{
    $num=0;$totall3Recharge=0;
    while($userlevel22Result=mysqli_fetch_array($userlevel22))
    {
        $lvl22user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel22Result['owncode']."'");
        $userlevel2Rows=mysqli_num_rows($lvl22user);
        
        while($userlvl22Result=mysqli_fetch_array($lvl22user))
        {
            $ul22Id = $userlvl22Result['id'];
            $l22recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_betting WHERE userid = '".$ul22Id."'"));
            $totall3Recharge += $l22recharge['total'];
           
        }
       
    }
   
}

?>

<?php
//level 1
	  @$userid=$_SESSION['frontuserid'];
      $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows=mysqli_num_rows($user);
	  $userResult=mysqli_fetch_array($user);
	  $owncode=$userResult['owncode'];
	  $userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
	  $userlevel1Rows=mysqli_num_rows($userlevel1);
	  
	
	  ?>
 <?php 
 //levle 2
 
$user2=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
 $userRows2=mysqli_num_rows($user2);
	  $userResult2=mysqli_fetch_array($user2);
	  $owncode2=$userResult2['owncode'];
	  $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."' order by id asc");
	  $userleve21Rows=mysqli_num_rows($userlevel2);
	  if($userleve21Rows!='')
	  {
	      $num=0;
        		  while($userlevel2Result=mysqli_fetch_array($userlevel2))
        		  {
                     $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
                     while($userlvl2Result=mysqli_fetch_array($lvl2user))
                     {
                         $num++;
                    	 $post_date = $userlvl2Result['createdate'];
                     }
                }
		  }?>
	  

	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include'head.php' ?>
			<link rel="stylesheet" href="assets/css/style.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
			<meta name="description" content="Brozers Mall">
			<meta name="keywords" content="Brozers Mall" />
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
			<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
		<style>
  body {
	-ms-user-select:text;
	user-select:text;
	-moz-user-select:text;
	-webkit-user-select:text
	color: #FFFFFF;
}
 .comm-pop {
     position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.4);
    display: flex;
    justify-content: center;
    align-items: center;
      visibility: hidden;
      opacity: 65%;
     
    }

    .comm-pop-inner {
      background: #fff;
      padding: 20px;
      width: 70%;
      border-radius: 5px;
      box-shadow: 0 0 2px #f5f5f5;
    }

    .comm-pop-inner p {
      font-size: 15px;
      line-height: 1.7;
    }

    span.comm-pop-close {
       color: #00897b;
    font-size: 14px;
    padding: 5px 10px;
    border: 0;
    background: transparent;
    margin-left: 10px;
    }

    .show-comm-pop {
      visibility: visible;
      opacity: 1;
      transform: scale(1);
    }
         .wrapper
            {
                background: #fff;
    padding: 15px;
    box-sizing: border-box;
    border-radius: 4px;
    width: 70%;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    transition: .3s cubic-bezier(.25,.8,.5,1);

                
            }
            .tz_close{
    display: flex;
    justify-content: flex-end;
    padding: 8px 5px 8px 15px;
    box-sizing: border-box;
}
.tz_close button {
    color: #00897b;
    font-size: 14px;
    padding: 5px 10px;
    border: 0;
    background: transparent;
    margin-left: 10px;
}
.tz_title{
    font-size: 18px;
    padding: 15px;
    font-weight:400;
    color:#000
}
.signinInfo .signinfo{
    padding: 10px 0 10px 20px;
}
#copied{
            visibility: hidden;
            min-width: 125px;
            margin-left: -60px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 14px;
            position: absolute;
            z-index: 2;
            left: 50%;
          bottom: 5px;
            font-size: 14px;
        }

       

        #copied.show {
            visibility: visible;
            position: absolute;
            margin-bottom: 27vh;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }






.btn-copy {
width: 50%;
    padding: 10px 15px;
    font-size: 14px;
    border: 0;
    background: #f5f5f5;
    border-radius: 2px;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);


}
.btn-copy:hover {color:black;text-decoration: none}


.card {
    border: 1px solid #E5E9F2;
    border-radius: 3px;
    padding: 0px;
}
.card .card-title {
    margin-bottom: 7px;
}
.leftpad{padding-left: 15px;}
h3{ font-weight:400; font-size:22px; color: rgba(0, 0, 0, 0.87)
;}
h5{ font-weight:400; font-size:16px; color: #757575;}
h4{ font-weight:normal; font-size:18px; color:#858585;}
.card-body{ padding:.6rem;}
td{ padding:3px;}
.btn-sm {
    height: 26px;
    padding: 0px 12px;
}
.nav-tabs {
	background:#fff;
	border-radius:0px;
	border:0;
	padding:5px 3px 5px 3px
}
.nav-tabs .nav-item {
	text-align:center
}
.nav-tabs .nav-item i {
	font-size:20px;
	margin-bottom:-2px
}
.nav-tabs.iconed .nav-item i {
	margin-right:8px
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
	color:#8D95A0;
	padding:0 16px;
	border-top:none;
	border-left:none;
	border-right:none;
	border-radius:0px;
	margin:0 !important;
	font-weight:500;
  font-size: 14px;
  border-bottom: 1px solid #F9FAFB;
  border-top: 1px solid #F9FAFB;
}
/* .nav-tabs .nav-link:hover {
	background:#ccc;
	color:#333;
	border-bottom:none ;
} */

.nav-tabs .nav-link.active {
	font-weight:500;
	color:#323233;
	background:#DDDDDD;

}
.nav-tabs.size1, .nav-tabs.size2, .nav-tabs.size3, .nav-tabs.size4, .nav-tabs.size5 {
	display:-webkit-box;
	display:flex;
	-webkit-box-align:center;
	align-items:center;
	-webkit-box-pack:center;
	justify-content:center
}
.nav-tabs.size1 .nav-item {
	width:100%
}
.nav-tabs.size2 .nav-item {
	width:50%
}
.nav-tabs.size3 .nav-item {
	width:33.333333333333%
}
.nav-tabs.size4 .nav-item {
	width:25%
}
.nav-tabs.size5 .nav-item {
	width:20%
}
.form-control{box-shadow:none; border-bottom:#ccc solid 1px; margin-bottom:3px;}


label{ color:#999;}
#bonus .modal-dialog{margin-top:100px;}
#bonus .modal-footer{ border:none;}
.dropdown-menu{ background:#fff;top: -15px;
left: -145px; border:none;
border-radius:0px;
-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);}
.appHeader1 .right{right:20px;}
.dropdown-item {
    padding: .75rem 1.5rem;
}
.butnbox
{
    width: 100%;
    padding: 15px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
.tz_info{
    font-size: 14px;
    padding: 15px;
    line-height: 1.5;
    max-height: 47vh;
    overflow-y: auto;
}
img{
    width: 25px;
    height: 25px;
}
.containerbal{
    width: 100%;
    padding: 15px;
    box-sizing: border-box;
    background: #fff;
}
.containerbal .headline{
    padding: 15px;
    box-sizing: border-box;
    font-size: 24px;
    font-weight: 400;
    text-align: center;
}
.level_content{
    width: 100%;
}
.level_content .level_list{
    padding: 15px;
    box-sizing: border-box;
}
.searchbar{
    margin:10px 5px;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    box-sizing: border-box;
    padding:10px 12px;
    margin-bottom:-45px;
    background-color: #fff;
border-bottom:0px solid #fff ;
}
.textara{
    border-bottom:0px solid #fff ;
    background:#F7F8FA;
    height:36px;
    color:#323233;
    font-size:14px
    border:none;
}
  .regLog{
        width: fit-content;
        margin: 0 auto;
        display: table;
        
    }
    .regContent {
        margin: 0 auto;
        padding: 0 !important;
        color: #fff;
    font-size: 14px;
    background-color: rgba(50, 50, 51, .88);
    border-radius: 8px;
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
        top:55%;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
	<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
	</head>

	<body>
	    
		<?php
    
            
            $withdrawal = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as withdraw FROM tbl_withdrawal WHERE userid = '".$userid."'"));
            
            $recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE userid = '".$userid."'"));
            
        
          
            $sql = "SELECT tbl_bonussummery.level1id,tbl_user.mobile,sum(tbl_bonussummery.level1amount) as commision FROM 
                tbl_user 
                left join tbl_bonussummery on tbl_user.id = tbl_bonussummery.userid
                where tbl_user.id = '".$userid."' GROUP BY tbl_bonussummery.level1id" ;  
            $query = mysqli_query($con,$sql);
            
            $sql2 = "SELECT tbl_bonussummery.level2id,tbl_user.mobile,sum(tbl_bonussummery.level2amount) as commision FROM 
                tbl_user 
                left join tbl_bonussummery on tbl_user.id = tbl_bonussummery.userid
                where tbl_user.id = '".$userid."' GROUP BY tbl_bonussummery.level2id" ;  
            $query2 = mysqli_query($con,$sql);
            
             $sql3 = "SELECT tbl_bonussummery.level3id,tbl_user.mobile,sum(tbl_bonussummery.level3amount) as commision FROM 
                tbl_user 
                left join tbl_bonussummery on tbl_user.id = tbl_bonussummery.userid
                where tbl_user.id = '".$userid."' GROUP BY tbl_bonussummery.level3id" ;  
            $query3 = mysqli_query($con,$sql);
            
        ?>
			<!-- App Header -->
		<div class="appHeader1">
  <div class="left"> <a href="/mine.php" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Promotion</div>
  </div>
  
  <div class="right"> 
  <div class="dropdown">
  <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:20px;">
     <img src="images/sidebar.png"></a>
  

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    
    <a class="dropdown-item" href="bonusrecord.php">Bonus Record</a>
    <a class="dropdown-item" href="promotionApplyrecord.php">Apply Record</a>
  </div>
</div>
  </div>
</div>
			<!-- * App Header -->
			<!-- App Capsule -->
			<div style="background:white" id="appCapsule container-fluid">
				<div class="appContent1">
				<div class="containerbal">
				    <div class="headline">
				 Bonus:₹ <?php $telegram=mysqli_query($con,"select sum(level1+level2+level3) as total from `tbl_bonus` where userid = '".$userid."'");
	$link=mysqli_fetch_array($telegram);
	$ready = $link['total']; echo round($ready,2);?></div>
 </div>
  
   <div class="row">
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h5>Total People </h5>
                    <h3>
               <?php
  $user1=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows1=mysqli_num_rows($user1);
	  $userResult1=mysqli_fetch_array($user1);
	 $owncode2=$userResult1['owncode'];
	 
	   $user2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."'");
	  $userRows2=mysqli_num_rows($user2);
	  $userResult2=mysqli_fetch_array($user2);
	 $owncode3=$userResult2['owncode'];
	 
	 
                        	  
                          $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode3."' order by id asc");
	  $userleve21Rows=mysqli_num_rows($userlevel2);
	  
	  $demo = 0;
	  if($userleve21Rows!=''){
		  while($userlevel2Result=mysqli_fetch_array($userlevel2)){
            $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
            $demo+=mysqli_num_rows($lvl2user);
		     
		  }
	  }
	  
		  $total = $userlevel1Rows+$num+$demo;
		  echo $total;
?>
	  
	  
</h3>
                </div>
            </div>
        </div> 
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h5>Contribution</h5>
                    <h3>₹ <?php echo ($totall1Recharge+$totall2Recharge+$totall3Recharge); ?>
                    </h3> 
                </div>
            </div>
        </div>   
        </div>
   
     
				<div class="mt-1">
      <div class="mt-3 border-bottom">
<label style="font-size: 12px;font-weight:400; color: rgba(0, 0, 0, 0.54)">My Promotion Code</label>
<p style="font-size: 16px;"><?php echo user($con,'owncode',$userid);?></p>
</div>
        <div class="mt-3 border-bottom">
<label style="font-size: 12px;font-weight:400; color: rgba(0, 0, 0, 0.54)">My Promotion link</label>
<input type="text" value="https://winday.in/register?r_code=<?php echo user($con,'owncode',$userid);?>" style=" border:none; width: 100%;
  height: 40px;
  margin-left:-5px;margin-top:-5px;font-size: 16px" id="myInput" readonly="readonly">
</div>
<div class="butnbox"> 	<a class="btn-copy" onclick="myFunction()" style="text-align: center;font-size:16px">Copy Link</a></div>






      </div>
  </div>
</div>
				<!--tab section-->
					<ul style="margin-bottom:-15px;" class="nav nav-tabs size3" id="myTab3" role="tablist">
						<li   class="nav-item"> <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#level1" role="tab">Level 1 (<?php echo $userlevel1Rows; ?>)</a></li>
						<li class="nav-item"> <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#level2" role="tab">Level 2 (<?php if($num == ""){echo "0";}else{echo $num;}?>)</a> </li>	<li class="nav-item"> <a class="nav-link" id="home-tab3" data-toggle="tab" href="#level3" role="tab">Level 3 (<?php
            // level 3
                     $user1=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows1=mysqli_num_rows($user1);
	  $userResult1=mysqli_fetch_array($user1);
	 $owncode2=$userResult1['owncode'];
	 
	   $user2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."'");
	  $userRows2=mysqli_num_rows($user2);
	  $userResult2=mysqli_fetch_array($user2);
	 $owncode3=$userResult2['owncode'];
	 
	 
                        	  
                          $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode3."' order by id asc");
	  $userleve21Rows=mysqli_num_rows($userlevel2);
	  
	  $demo = 0;
	  if($userleve21Rows!=''){
		  while($userlevel2Result=mysqli_fetch_array($userlevel2)){
            $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
            $demo+=mysqli_num_rows($lvl2user);
		     
		  }
	  }
	  echo $demo;
?>)</a> </li>
					</ul>
				
		 <div class="searchbar">
      <div class="inner-addon left-addon">
      <i style="color:#323233; font-size:20px;margin-top:-3px; font-weight:400" class="icon ion-ios-search"></i>
        <input  type="text" class="form-control textara" placeholder="search"></div></div>
					
		
					<div style="margin-bottom:10%" >
						<div class="tab-content" id="myTabContent">
							<div style="margin-top:-15px;" class="tab-pane fade active show" id="level1" role="tabpanel">
								<!--table-->
								<div class="row tab">
									<div class="table-responsive">
									    <?php 
									   // print_r($owncode);exit;
									    $userlevel1Data=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id desc");?>
										<table id="l1reportTable" class="table table-striped  text-center vcard">
											<thead>
												<tr>
													<th>ID</th>
													<th>Phone</th>
													<th>Water Reward</th>
												<th>First Reward</th>
												<!--	<th>Contribution</th> -->
												</tr>
											</thead>
											<tbody>le
												<?php while($row=mysqli_fetch_array($userlevel1Data)){ 
												    
												?>
													<tr>
														<td>
															<?=$row['id']?>
														</td>
														<td>
														<a href="#" style="color: black">		91<?php echo substr($row['mobile'],0,-8);?>**<?php echo substr($row['mobile'], 4);?></a>
														</td>
														<td>
														    <?php
														        $commisionl1 = mysqli_query($con,"SELECT sum(tbl_bonussummery.level1amount+tbl_bonussummery.level2amount+tbl_bonussummery.level3amount) as commision 
														            from tbl_bonussummery where userid = '".$row['id']."' ");
														        $commision = mysqli_fetch_array($commisionl1);
														        echo round($commision['commision'],2);
														    ?>
														</td>
													<!--	<td>
															<?php 
                                    
                                                                $count = mysqli_query($con,"SELECT count(id) as counter FROM `tbl_bonussummery` WHERE userid = '".$row['id']."' "); 
                                                                $getCount = mysqli_fetch_assoc($count);
                                                                $getBonus = mysqli_query($con,"SELECT * FROM `tbl_paymentsetting` ORDER BY id DESC");
                                                                $getBonusAmount = mysqli_fetch_assoc($getBonus);
                                                                $bamount = (float) $getBonusAmount['rechargebonus'];
                                                                echo $bamount * $getCount['counter'];
                                                                
                                                              
                                                            ?>
														</td> -->
													<td>
												
                                                            
                                                            <?php
														    
														    
                                                                $q = mysqli_query($con,"SELECT amount as total FROM tbl_recharge WHERE status = 1 AND userid = '".$row['id']."' ");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                             
                                                                $total = $totalRecharge['total'];
                                                                
                          if($amount2 >= 300 && $amount2 <= 499){$bamount2 = '50';}else if($total >= 500 && $total <= 999){echo '150';}else if($total >= 1000 && $total <= 2999){echo '200';}else if($total >= 3000 && $total <= 4999){echo '400';}else if($total >= 5000 && $total <= 9999){echo '600';}else if($total >= 10000 && $total <= 49999){echo '1100';}else if($total >= 50000 && $total <= 99999){echo '5100';}else if($total >= 100000 && $total <= 500000){echo '10100';}else{echo '0';}
                          
                    
                                                            
                                                            ?>
                                                            
														</td>  
            	<!-- 	<td>
												
                                                         <?php
														        $commisionl1 = mysqli_query($con,"SELECT sum(amount) as commision 
														            from tbl_betting where userid = '".$row['id']."' ");
														        $commision = mysqli_fetch_array($commisionl1);
														        echo round($commision['commision'],2);
														    ?>
                                                            
														</td> -->
														
														
													</tr>
													<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<!--end-->
						
        </div>
       <!--=========================tab-1 end========================================-->
       <!--=========================tab-2========================================-->
        <div style="margin-top:20px;" class="tab-pane fade" id="level2" role="tabpanel">
            <!--table-->
            <div class="row tab">
                <div class="table-responsive">
                   		<table id="l2reportTable" class="table table-striped  text-center vcard">
                        <thead>
                            <tr>
                               	<th>ID</th>
								<th>Phone</th>
							 	<th>Water Reward</th>
								<th>First Reward</th>
								<!--	<th>Contribution</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // level 2
                            $user2=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
                            $userRows2=mysqli_num_rows($user2);
                            $userResult2=mysqli_fetch_array($user2);
                            $owncode2=$userResult2['owncode'];
                            $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."' order by id desc");
                            $userleve21Rows=mysqli_num_rows($userlevel2);
                            
                            if($userleve21Rows!='')
                            {
                                
                                while($userlevel2Result=mysqli_fetch_array($userlevel2))
                                {
                                    $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
                                    while($userlvl2Result=mysqli_fetch_array($lvl2user))
                                    {
                                ?>
                                        
                                        <tr>
														<td>
															<?=$userlvl2Result['id']?>
														</td>
														<td>
														<a href="#" style="color: black">	91<?php echo substr($userlvl2Result['mobile'],0,-8);?>**<?php echo substr($userlvl2Result['mobile'], 4);?> </a>
														</td>
														<td>
															<?php
														        $commision2 = mysqli_query($con,"SELECT sum(tbl_bonussummery.level1amount+tbl_bonussummery.level2amount+tbl_bonussummery.level3amount) as commision 
														            from tbl_bonussummery where userid = '".$userlvl2Result['id']."' ");
														        $commisionl2 = mysqli_fetch_array($commision2);
														        echo round($commisionl2['commision'],2);
														    ?>
														</td>
												 <td>		    <?php
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE status = 1 AND userid = '".$row['id']."' ");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?></td>
                                                                <!--	<td>
												
                                                         <?php
														        $commisionl2 = mysqli_query($con,"SELECT sum(amount) as commision 
														            from tbl_betting where userid = '".$userlvl2Result['id']."' ");
														        $commision = mysqli_fetch_array($commisionl2);
														        echo round($commision['commision'],2);
														    ?>
                                                            
														</td> -->
													</tr>
													
                    <?php                }
                                }
                            }
                            // end
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end-->
        </div>
        
        <!--=========================tab-3========================================-->
        <div style="margin-top:20px;"  class="tab-pane fade" id="level3" role="tabpanel">
            <!--table-->
            <div class="row tab">
                <div class="table-responsive">
                   		<table id="l3reportTable" class="table table-striped  text-center vcard">
                        <thead>
                            <tr>
                               	<th>ID</th>
								<th>Phone</th>
							 	<th>Water Reward</th>
								<th>First Reward</th>
					            <!--<th>Contribution</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // level 3
                     $user1=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows1=mysqli_num_rows($user1);
	  $userResult1=mysqli_fetch_array($user1);
	 $owncode2=$userResult1['owncode'];
	 
	   $user2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."'");
	  $userRows2=mysqli_num_rows($user2);
	  $userResult2=mysqli_fetch_array($user2);
	 $owncode3=$userResult2['owncode'];
	 
	 
                        	  
                          $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode3."' order by id asc");
	  $userleve21Rows=mysqli_num_rows($userlevel2);
	  
	  
	  if($userleve21Rows!=''){
		  while($userlevel2Result=mysqli_fetch_array($userlevel2)){
 $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
 while($userlvl2Result=mysqli_fetch_array($lvl2user)){
                                ?>
                                        
                                        <tr>
										<td>				<?=$userlvl2Result['id']?>
										</td>
										<td>
										<a href="#" style="color: black">	91<?php echo substr($userlvl2Result['mobile'],0,-8);?>**<?php echo substr($userlvl2Result['mobile'], 4);?> </a>
										</td>
										<td>
									<?php
								        $commision3 = mysqli_query($con,"SELECT sum(tbl_bonussummery.level1amount+tbl_bonussummery.level2amount+tbl_bonussummery.level3amount) as commision 
														            from tbl_bonussummery where userid = '".$userlvl2Result['id']."' ");
														        $commisionl3 = mysqli_fetch_array($commision3);
														        echo round($commisionl3['commision'],2);
														    ?>
									            </td>
											 <td>		    
									<?php
									$totalRecharge['total'] = 0;
                                    $q = mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE status = 1 AND userid = '".$row['id']."' ");
                                        $totalRecharge = mysqli_fetch_assoc($q);
                                        echo round($totalRecharge['total'],2);
                                            ?></td>
                                        <!--	<td>
										 <?php
									        $commisionl2 = mysqli_query($con,"SELECT sum(amount) as commision 
							            from tbl_betting where userid = '".$userlvl2Result['id']."' ");
								        $commision = mysqli_fetch_array($commisionl2);
								        echo round($commision['commision'],2);
								    ?>                
									</td> -->
									</tr>
													
                                  <?php   }
                                     }
                                 }
                                // end
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end-->
        </div>
        
								</div>
							</div>
						</div>
					</div>
				</div>
				<br/>
				<br/> </div>
			</div>
			</div>
	<!-- appCapsule -->
	


<?php include("include/footer.php");?>

<div class="comm-pop" >
          <div class="comm-pop-inner">
            <h5 class="tz_title">Notice</h5>
           
                 <div class="tz_info">
               
             When your friends trade, you will also receive a 30% commission. Therefore, the more friends you invite, the higher your commission. There is a fixed income every day, the commission is permanent, but the reward is only onceWhen they make money, they will invite their friends to join them, and then you can get a 20% commission. In this way, your team can spread quickly. Therefore, I hope everyone can use our platform to make money, make money, and make money!When they make money, they will invite their friends to join them, and then you can get a 20% commission. In this way, your team can spread quickly. Therefore, I hope everyone can use our platform to make money, make money, and make money!Level 1 commission: Friends who join through your own link belong to your level, when they trade, you will get 30% commission.Tier 2 commission: Friends who join through your friend link belong to your secondary commission. When they trade, you can get 20% commission.Level 3 commission: Friends who join through friends of friends belong to your level 3. When they trade, you get 10% commission.Promotional rewards: 10% bonus amount for the first recharge after the first-level lower level joins. If your friend joins through your invitation and recharges 1000 for the first time, you will get 200
            </div> 
              <div class="text-center pb-1">
              <div class="tz_close"> <span class="comm-pop-close">CLOSE</span>
           
              </div>
            </div>
          </div>
        </div>
        
        



<div id="alert" class="modal" role="dialog" >
  <div class="modal-dialog regLog" role="document">
    <div class="modal-content regContent">
      <div class="modal-body" >
       <div class="text-center" id="alertmessage">
      </div>
    </div>
  </div>
</div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script>
			function myFunction() {
			    
			  var copyText = document.getElementById("myInput");
			  copyText.select();
			  copyText.setSelectionRange(0, 99999)
			  document.execCommand("copy");
			    $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Success</p>";
			}
			</script>
 

<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/bonus.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
				<script>
                  $(function () {
                    $('#l1reportTable').DataTable({
                    "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
                    });
                  });
                  $(function () {
                    $('#l2reportTable').DataTable({
                       "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
                    });
                  });
                  $(function () {
                    $('#l3reportTable').DataTable({
                       "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
                    });
                  });
                </script>
              
			
	</body>

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
  $(document).ready(function() {
    $(".comm-pop ").addClass('show-comm-pop')
  })
  $(".comm-pop-close").click(function() {
    $(".comm-pop ").removeClass('show-comm-pop')
  })

  $(document).ready(function() {
    $('.datatable').DataTable();
  });
</script>
	</html>