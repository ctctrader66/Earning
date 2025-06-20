<?php
ob_start();
session_start();
if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
include("include/connection.php");
$category=$_POST['category'];
$userid=$_SESSION['frontuserid'];
$periodid=$_POST['periodid'];
$today=date('Y-m-d');
if($category!='')
{?>
        
        <div style="background:#fff; margin-bottom:-20px;">
        <table style="background:#fff;" class="table ">    
    <tbody>
     <?php
  $userWaitQuery=mysqli_query($con,"select * from `tbl_betting` where `userid`='".$userid."' and `tab`='".$category."' and `periodid`='".$periodid."' order by id desc limit 480");
  while($userResult=mysqli_fetch_array($userWaitQuery)){
	  $post_date1 = $userResult['createdate'];
 $post_date21 = strtotime($post_date1);
 $convert1=date('Y-m-d H:m',$post_date21);

	?>
        <tr data-toggle="collapse" data-target="#accordion<?php echo($userResult['id']);?>" class="clickable" style="border-bottom:1px solid #ccc;">
            <td class="pl-3" style="border:none;">
     
     
                       <div style="display: flex;">
  <div style="display: flex; flex-direction: column;">
    <div><?php echo ($userResult['periodid']);?></div>
    <div><?php  echo "<p style='display:inline-block;color:gray;font-size:12px'>$convert1</p>";?></div>
  </div>
  <div><span style="padding:5px 10px;border-radius:12px; margin:20px;font-size:14px; font-weight:400; background:#f7f7f7; color:darkorange">Wait</div>
  <div style="margin-left: auto;margin-top:10px;"> <span style="margin-top:-10px; display:inline-block; float:right; padding-right:5px;font-size:14px; font-weight:400; color:darkorange"><?php echo number_format($userResult['amount'],2);?></span></div>
</div>

                
   
            <div id="accordion<?php echo($userResult['id']);?>" class="detail collapse mt-1 mb-1 p-1" style="padding:0px 30px; margin: 0px -10px;">
                <span style="color:#009688; font-size:14px; font-weight:400"> Period Detail</span>
         <div class="mt-2" style="display: flex;">
        <div class="point2">Period</div>
        <div class="point2"><?php echo ($userResult['periodid']);?></div>
        </div>
        <div class="mt-2" style="display: flex;">
        <div class="point2">Contract Money</div>
        <div class="point2"><?php echo number_format($userResult['amount'],2);?></div>
        </div>
       <div class="mt-2" style="display: flex;">
        <div class="point2">Contract Count</div>
        <div class="point2">1</div>
        </div>
       <div class="mt-2" style="display: flex;">
        <div class="point2">Delivery</div>
        <div class="point2" style="color:#f39839; font-weight:600"><?php $del = $userResult['amount'];
        $afterfee = $del*5/100;
     $total =  $del-$afterfee;
      echo number_format($total,2);
        ?></div>
        </div>
       <div class="mt-2" style="display: flex;">
        <div class="point2">Fee</div>
        <div class="point2"><?php $del = $userResult['amount'];
        $afterfee = $del*5/100;
        echo number_format($afterfee,2);
        
        ?></div>
        </div>
<div class="mt-2" style="display: flex;">
        <div class="point2">Select</div> 
        <div class="point2" style="color:<?php if($userResult['value']=='Green'){echo"#1DCC70";}elseif($userResult['value']=='Red'){echo"#ff2d55";}else{echo"#4E84E6";}?>;"><?php echo $userResult['value'];?></div>
        </div>
        <div class="mt-2" style="display: flex;">
        <div class="point2">Status</div>
        <div class="point2" style="color:orange;">Wait</div>
        </div>
        <div class="mt-2" style="display: flex;">
        <div class="point2">Create Time</div>
        <div class="point2"><?php echo $convert1;?></div>
        </div>
        
                </div>
            </td>
        </tr>
        <?php }?>
    
    </tbody>
</table>
        </div>
        
	
<?php }?>