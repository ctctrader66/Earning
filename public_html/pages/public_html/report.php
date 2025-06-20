<?php 

ob_start();
session_start();

 if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
   
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
// level 1
// @$userid=$_SESSION['frontuserid'];
$user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
$userRows=mysqli_num_rows($user);
$userResult=mysqli_fetch_array($user);
$owncode=$userResult['owncode'];
$userlevel1=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id asc");
$userlevel1Rows=mysqli_num_rows($userlevel1);

$level1AmountForBlock = 0;$totall1Withdraw=0;$totall1Recharge=0;$c=0;$c1l1=0;$c1l2=0;
while($resforlevel1Amount=mysqli_fetch_array($userlevel1)){
    $ul1Id = $resforlevel1Amount['id'];
    $level1AmountForBlock = wallet($con,'amount',$ul1Id);
    $lvl1user=mysqli_fetch_array(mysqli_query($con,"select amount as withdraw from `tbl_withdrawal` where `userid`='".$ul1Id."'"));
    $totall1Withdraw += $lvl2user['withdraw'] ;
    $l1recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE userid = '".$ul1Id."'"));
    $totall1Recharge += $l1recharge['total'];
    $lvlC1_l1=mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(level1amount) as total FROM tbl_bonussummery WHERE userid = '".$ul1Id."'"));
    $c1l1 += $lvlC1_l1['total'];
    $lvlC1_l2=mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(level2amount) as total FROM tbl_bonussummery WHERE userid = '".$ul1Id."'"));
    $c1l2 += $lvlC1_l2['total'];
}
$c1 = $c1l1 + $c1l2;
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
    $num=0;$total21Withdraw=0;$totall2Recharge=0;$n=0;$cl2=0;
    while($userlevel2Result=mysqli_fetch_array($userlevel2))
    {
        $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
        $userlevel1Rows=mysqli_num_rows($lvl2user);
        
        while($userlvl2Result=mysqli_fetch_array($lvl2user))
        {
            
            $ul2Id = $userlvl2Result['id'];
			$level2AmountForBlock += wallet($con,'amount',$ul2Id);
			$lvl2user=mysqli_fetch_array(mysqli_query($con,"select amount as withdraw from `tbl_withdrawal` where `userid`='".$ul2Id."'"));
            $totall2Withdraw += $lvl2user['withdraw'] ;
            $l2recharge = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE userid = '".$ul2Id."'"));
            $totall2Recharge += $l2recharge['total'];
            $num+=$userlevel1Rows;
            $lvlC2_l1=mysqli_fetch_array(mysqli_query($con,"SELECT sum(level1amount) as total FROM tbl_bonussummery WHERE userid = '".$ul2Id."'"));
            $c2l1 += $lvlC2_l1['total'];
            $lvlC2_l2=mysqli_fetch_array(mysqli_query($con,"SELECT sum(level2amount) as total FROM tbl_bonussummery WHERE userid = '".$ul2Id."'"));
            $c2l2 += $lvlC2_l2['total'];
        }
        $cl2 += $c2l1 + $c2l2;
    }
    // echo '<pre>';
    //     echo 'c1l1 => '.$c2l1.'<br>';
    //     echo 'c2l2 => '.$c2l2.'<br>';
    //     echo 'cl2 => '.$cl2.'<br>';
}

$userlevel2Member = $num;


?>
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
			h3 {
				font-weight: normal;
				font-size: 14px;
			}
			
			.btn {
				color: white;
				height: 45px;
				border-radius: 13px;
				background-image: linear-gradient(#ae18e3, #5b1474);
			}
			
			.textbox {
				font-weight: normal;
				height: 45px;
				width: 300;
				color: #fff;
				outline: none;
				border: none;
				border-radius: 8px;
				font-size: 18px;
				font-weight: 400;
				margin: 8px 0;
				cursor: pointer;
				transition: all 0.4s ease;
			}
			
			.appHeader1 {
				background-image: url("bg.jpg");
			}
			
			.button {
				display: inline-block;
				margin: 5px;
				width: auto;
				height: auto;
				font-size: 20px;
				font-weight: bold;
				border-radius: 5px;
				box-sizing: border-box;
				font-family: Orbitron;
			}
			
			.digits {
				color: #181818;
				text-shadow: 1px 1px 0px #FFF;
				background-color: #EBEBEB;
				border-top: 2px solid #FFF;
				border-right: 2px solid #FFF;
				border-bottom: 2px solid #C1C1C1;
				border-left: 2px solid #C1C1C1;
				border-radius: 4px;
				box-shadow: 0px 0px 2px #030303;
			}
			
			.digits:hover,
			.mathButtons:hover,
			#clearButton:hover {
				background-color: #FFBA75;
				box-shadow: 0px 0px 2px #FFBA75, inset 0px -20px 1px #FF8000;
				border-top: 2px solid #FFF;
				border-right: 2px solid #FFF;
				border-bottom: 2px solid #AE5700;
				border-left: 2px solid #AE5700;
			}
			
			.btn1 {
				color: black;
				height: 45px;
				width: 75px;
				border-radius: 13px;
				background-color: #F6F6F6;
			}
			
			.vcard {
				box-shadow: true;
			}
			
			label {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding: 0 10px;
				color: #291F53;
				margin-bottom: 0px;
				font-size: 20px;
			}
			
			.box {
                border: 1px solid #000;
                margin: 3px;
                padding: 2px;
                width: 97% !important;
            }
			
			.row.reportBox div {
                width: 33%;
                height: 107px;
                margin-bottom: 5px;
            }
			
			.appContent1 .reportBox,
			.appContent1 .levelBox,
			.tableDiv {
			    
				margin: 0 auto;
				/*justify-content: center;*/
			}
			
			.appContent1 .reportBox h3,
			.appContent1 .levelBox h3 {
				padding: 15px;
				text-align: center;
				font-weight: 600;
				font-size: 14px;
				background-color: darkorange;
			}
			
			.appContent1 .reportBox p {
				font-size: 1.2rem;
				text-align: center;
				padding: 3px;
				
			}
			
			.tab {
				/*width: 81%;*/
				/*margin: 0 131px;*/
			}
		
			</style>
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
            
        ?>
			<!-- App Header -->
			<div class="appHeader1">
				<div class="left">
					<a href="myaccount.php" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
					<div class="pageTitle">Refferal Report</div>
				</div>
			
			</div>
			<!-- * App Header -->
			<!-- App Capsule -->
			<div id="appCapsule container-fluid">
				<div class="appContent1">
					<div class="row reportBox">
						<div class="">
							<div class="box">
							    <h3>TOTAL<br>Members</h3>
							<p><?php 
							     //   echo 'n = '.$num.'<br>';
							     $userlevel1Rows=mysqli_num_rows($userlevel1);
								 $totalMember = $userlevel1Rows+$num ; echo $totalMember;
								?>
							</p>
							</div>
						</div>
				
						<div class="">
							<div class="box">
							    <h3>TOTAL<br>Withdrawal</h3>
							<p>
								<?php
								    //round($withdrawal['withdraw'],2);
								    
								    echo ($totall1Withdraw+$totall2Withdraw)
                                    
								?>
							</p>
							</div>
						</div>
						<div class="">
							<div class="box">
							    <h3>TOTAL<br>Recharge</h3>
							<p>
								<?php echo ($totall1Recharge+$totall2Recharge); ?>
							</p>
							</div>
						</div>
				
					</div> 
					<!--tab section-->
					<ul style="margin-bottom:-15px;" class="nav nav-tabs size2" id="myTab3" role="tablist">
						<li class="nav-item"> <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#level1" role="tab">Level 1</a> </li>
						<li class="nav-item"> <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#level2" role="tab">Level 2</a> </li>
					</ul>
					<br>
					<div class="mt-1" style="margin-bottom:-30px;">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade active show" id="level1" role="tabpanel">
								<!--table-->
								<div class="row tab">
									<div class="table-responsive">
									    <?php $userlevel1Data=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id desc");?>
										<table id="l1reportTable" class="table table-striped">
											<thead>
												<tr>
													<th>User ID</th>
													<th>Number</th>
													<th>Commission</th>
												<th>Total Recharge</th>
												</tr>
											</thead>
											<tbody>
												<?php while($row=mysqli_fetch_array($userlevel1Data)){ 
												    
												?>
													<tr>
														<td>
															<?=$row['id']?>
														</td>
														<td>
															<?php echo $row['mobile'];?>
														</td>
														<td>
														    <?php
														        $commisionl1 = mysqli_query($con,"SELECT sum(tbl_bonussummery.level1amount+tbl_bonussummery.level2amount) as commision 
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
														    
														    $totalRecharge['total'] = 0;
                                                                $q = mysqli_query($con,"SELECT sum(amount) as total FROM tbl_recharge WHERE status = 1 AND userid = '".$row['id']."' ");
                                                                $totalRecharge = mysqli_fetch_assoc($q);
                                                                echo round($totalRecharge['total'],2);
                                                            
                                                            ?>
														</td> 
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
        <div class="tab-pane fade" id="level2" role="tabpanel">
            <!--table-->
            <div class="row tab">
                <div class="table-responsive">
                    <table id="l2reportTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Number</th>
                                <th>Commission</th>
                               <!-- <th>First Reward</th> -->
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
															<?php echo $userlvl2Result['mobile'];?>
														</td>
														<td>
															<?php
														        $commision2 = mysqli_query($con,"SELECT sum(tbl_bonussummery.level1amount+tbl_bonussummery.level2amount) as commision 
														            from tbl_bonussummery where userid = '".$userlvl2Result['id']."' ");
														        $commisionl2 = mysqli_fetch_array($commision2);
														        echo round($commisionl2['commision'],2);
														    ?>
														</td>
													<!--	<td>
															<?php 
                                    
                                                                $count = mysqli_query($con,"SELECT count(id) as counter FROM `tbl_bonussummery` WHERE userid = '".$userlvl2Result['id']."' "); 
                                                                $getCount = mysqli_fetch_assoc($count);
                                                                $getBonus = mysqli_query($con,"SELECT * FROM `tbl_paymentsetting` ORDER BY id DESC");
                                                                $getBonusAmount = mysqli_fetch_assoc($getBonus);
                                                                $bamount = (float) $getBonusAmount['rechargebonus'];
                                                                echo $bamount * $getCount['counter'];
                                                                
                                                              
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
								</div>
							</div>
						</div>
					</div>
					<hr>
					<hr> </div>
				<br/>
				<br/> </div>
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
                </script>
			
	</body>

	</html>