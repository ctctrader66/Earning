<?php
ob_start();
session_start();
if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
include("include/connection1.php");
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
	  $curr = $userResult['curr'];
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
  
  <div style="margin-left: auto;margin-top:10px;"> <span style="margin-top:-10px; display:inline-block; float:right; padding-right:5px;font-size:14px; font-weight:400; color:darkorange"><?php echo strtoupper($userResult['curr']); ?></span>
  </div>
  <div style="margin-left: auto;margin-top:10px;"> <span style="margin-top:-10px; display:inline-block; float:right; padding-right:5px;font-size:14px; font-weight:400; color:darkorange"> <?php
  
  if ($curr == "usdt") {
   
    echo number_format($userResult['amount']/ 11.04, 2) ;
  } else {
    
    echo number_format($userResult['amount'], 2);
  }
?></span>
  </div>
</div>

                
   

            </td>
        </tr>
        <?php }?>
    
    </tbody>
</table>
        </div>
        
	
<?php }?>