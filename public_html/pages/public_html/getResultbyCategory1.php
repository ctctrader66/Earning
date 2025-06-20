<?php
   ob_start();
   session_start();
  if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
   
   include("include/connection1.php");
   $category=$_POST['category'];
   $userid=$_SESSION['frontuserid'];
   $today=date('Y-m-d');
   if($category=='parity')
   {?>
<div style="background:#FBEDF3;border-radius:18px;" class="" id="paritycontainer">
   <table class="table text-center" id="parityt">
      <thead>
         <tr>
            <th>Period</th>
            <th>Number</th>
            <th>Size</th>
            <th>Result</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $parityrecordQuery=mysqli_query($con,"select * from `tbl_result1` where `tabtype`='parity' order by id desc limit 480");
            $parityrecordRow=mysqli_num_rows($parityrecordQuery);
            if($parityrecordRow==''){?>
         <tr>
            <td colspan="4">
               <div style="display: flex;">
                  <div class="spacer"></div>
                  <div>No data available !</div>
                  <div class="spacer"></div>
               </div>
            </td>
         </tr>
         <?php 
            }else{
            while($parityResult=mysqli_fetch_array($parityrecordQuery)){
            	if($parityResult['resulttype']=='real'){
            	?>
         <tr>
            <td><?php echo $parityResult['periodid'];?></td>
            <td><span style="color:<?php if($parityResult['color']=='green'){echo"#1DCC70";}else if($parityResult['color']=='red'){echo"#ff2d55";}else if($parityResult['color']=='red+violet'){echo"#ff2d55";}else if($parityResult['color']=='green+violet'){echo"#1DCC70";}?>;"><?php echo $parityResult['result'];?></span></td>
            <td><span><?php if($parityResult['result'] <= '5'){echo "SMALL";}else{echo "BIG";}?></span></td>
            <td>
               <div style="display: flex;">
                  <div class="spacer"></div>
                  <?php if($parityResult['color']=='green'){ ?>
                  <div class="point green" style="background:#1DCC70;"></div>
                  <?php }else if($parityResult['color']=='red'){?>
                  <div class="point red" style="background:#ff2d55;"></div>
                  <?php }else if($parityResult['color']=='red+violet'){?>
                  <div class="point" style="background:#ff2d55;"></div>
                  &nbsp;&nbsp;
                  <div class="point" style="background:#DB5FD1;"></div>
                  <?php }else if($parityResult['color']=='green+violet'){?>
                  <div class="point" style="background:#1DCC70;"></div>
                  &nbsp;&nbsp;
                  <div class="point" style="background:#DB5FD1;"></div>
                  <?php }?>
                  <div class="spacer"></div>
               </div>
            </td>
         </tr>
         <?php }else if($parityResult['resulttype']=='random'){?>
         <tr>
            <td><?php echo $parityResult['periodid'];?></td>
            <td><span style="color:<?php if($parityResult['randomcolor']=='green'){echo"#1DCC70";}else if($parityResult['randomcolor']=='red'){echo"#ff2d55";}else if($parityResult['randomcolor']=='red++violet'){echo"#ff2d55";}else if($parityResult['randomcolor']=='green++violet'){echo"#1DCC70";}?>;"><?php echo $parityResult['randomresult'];?></span></td>
            <td><span><?php if($parityResult['randomresult'] <= '5'){echo "SMALL";}else{echo "BIG";}?></span></td>
            <td>
               <div style="display: flex;">
                  <div class="spacer"></div>
                  <?php if($parityResult['randomcolor']=='green'){ ?>
                  <div class="point green" style="background:#1DCC70;"></div>
                  <?php }else if($parityResult['randomcolor']=='red'){?>
                  <div class="point red" style="background:#ff2d55;"></div>
                  <?php }else if($parityResult['randomcolor']=='red++violet'){?>
                  <div class="point" style="background:#ff2d55;"></div>
                  &nbsp;&nbsp;
                  <div class="point" style="background:#DB5FD1;"></div>
                  <?php }else if($parityResult['randomcolor']=='green++violet'){?>
                  <div class="point" style="background:#1DCC70;"></div>
                  &nbsp;&nbsp;
                  <div class="point" style="background:#DB5FD1;"></div>
                  <?php }?>
                  <div class="spacer"></div>
               </div>
            </td>
         </tr>
         <?php }?>
         <?php }}?>
      </tbody>
   </table>
</div>
<!---result records-->
<?php } else if($category=='sapre'){?>
<div id="paritywait"></div>
<div style="background:#FBEDF3;border-radius:18px; padding-bottom:48px;">
   <table style="background:#fff" class="table " id="myrecordparityt">
      <tbody>
         <?php
            $userResultQuery=mysqli_query($con,"select *,(select `result` from `tbl_result1` where `periodid`=`tbl_userresult1`.`periodid` and `tabtype`=`tbl_userresult1`.`tab`)as resultnumber,(select `color` from `tbl_result1` where `periodid`=`tbl_userresult1`.`periodid` and `tabtype`=`tbl_userresult1`.`tab`)as resultcolor from `tbl_userresult1` where `userid`='".$userid."' and `tab`='parity'  order by id desc limit 10");
            while($userResult=mysqli_fetch_array($userResultQuery)){
             $post_date = $userResult['createdate'];
            $post_date2 = strtotime($post_date);
            $convert=date('Y-m-d H:i',$post_date2);
            
            ?>
         <tr data-toggle="collapse" data-target="#accordion<?php echo($userResult['id']);?>" class="clickable" style="border-top:1px solid #ccc;">
            <td class="pl-3" style="border:1px;">
               <div style="display: flex;">
                  <div style="display: flex; flex-direction: column;">
                     <div><?php echo ($userResult['periodid']);?></div>
                     <div><?php  echo "<p style='display:inline-block;color:gray;font-size:12px'>$convert</p>";?></div>
                  </div>
                  <div><span style="padding:5px 10px;border-radius:12px; margin:20px;font-size:14px; font-weight:400; background:#f7f7f7; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"> <?php echo ucfirst($userResult['status']);?></span></div>
                  <div style="margin-left: auto;margin-top:10px;"> <span style="margin-top:-10px; display:inline-block; float:right; padding-right:5px;font-size:14px; font-weight:400; color:<?php if($userResult['status']=='success'){echo"#4caf50";}else{echo"#f44336";}?>"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";}?><?php echo number_format($userResult['paidamount'],2);?></span></div>
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
                        $fe = $userResult['fee']; 
                        $afterfee = $fe/2;
                        $total =  $del-$afterfee;
                        echo number_format($total,2);
                        ?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Fee</div>
                     <div class="point2"><?php $fe = $userResult['fee']; 
                        $afterfee = $fe/2;
                        echo number_format($afterfee,2);
                        
                        ?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Open Price</div>
                     <div class="point2"><?php echo number_format($userResult['openprice'],2);?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Result</div>
                     <div class="point2" style="font-size:12px;font-weight:400"><?php  echo "<span style='color:#2197f3;font-size:12px;font-weight:400'>" . $userResult['resultnumber'] . "</span>"; echo "&nbsp;&nbsp;";  if($userResult['resultcolor']=='green'){echo "<span style='color:#4caf50;font-size:12px;font-weight:400'>".'Green'."</span>";}elseif($userResult['resultcolor']=='red'){echo "<span style='color:#f44336;font-size:12px;font-weight:400'>". 'Red' ."</span>";}elseif($userResult['resultcolor']=='red++violet'){echo "<span style='color:#f44336;font-size:12px;font-weight:400'>". 'Red' ."</span>&nbsp+&nbsp<span style='color:#3D67B3;font-size:12px;font-weight:400'>". 'Violet' ."</span>";}elseif($userResult['resultcolor']=='green++violet'){echo "<span style='color:#4caf50;font-size:12px;font-weight:400'>".'Green'."</span>&nbsp+&nbsp<span style='color:#3D67B3;font-size:12px;font-weight:400'>". 'Violet' ."</span>";}elseif($userResult['resultcolor']=='green+violet'){echo "<span style='color:#4caf50;font-size:12px;font-weight:400'>".'Green'."</span>&nbsp+&nbsp<span style='color:#3D67B3;font-size:12px;font-weight:400'>". 'Violet' ."</span>";}elseif($userResult['resultcolor']=='red+violet'){echo "<span style='color:#f44336;font-size:12px;font-weight:400'>". 'Red' ."</span>&nbsp+&nbsp<span style='color:#3D67B3;font-size:12px;font-weight:400'>". 'Violet' ."</span>";} ?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Select</div>
                     <div class="point2" style="color:<?php if($userResult['value']=='Green'){echo"#4caf50";}elseif($userResult['value']=='Red'){echo"#f44336";}elseif($userResult['value']=='Violet'){echo"#3D67B3";}else{echo"#2197f3";}?>;"><?php echo $userResult['value'];?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Status</div>
                     <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#1DCC70";}else{echo"#ff2d55";}?>;"><?php echo ucfirst($userResult['status']);?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Amount</div>
                     <div class="point2" style="color:<?php if($userResult['status']=='success'){echo"#4CAF50";}else{echo"#F44336";}?>;"><?php if($userResult['status']=='success'){echo"+";}else{echo"-";} echo number_format($userResult['paidamount'],2);?></div>
                  </div>
                  <div class="mt-2" style="display: flex;">
                     <div class="point2">Create Time</div>
                     <div class="point2"><?php echo $convert;?></div>
                  </div>
               </div>
            </td>
         </tr>
         <?php }?>
      </tbody>
   </table>
   <div style="float:right; margin:10px;">
      <span style="padding:7px 10px; border:1px solid black;color:black" ><a href="order1.php" style="color:black">More <i class="fa fa-angle-right" aria-hidden="true"></i></a></span>
   </div>
</div>
<?php }
   else    if($category=='bcone')
      {?>
<div style="background:#FBEDF3;border-radius:18px;" class="" id="bconecontainer">
   <table class="table text-center" id="bconet">
      <thead>
         <tr>
            <th>Period</th>
            <th>Number</th>
         </tr>
      </thead>
      <tbody>
         <?php
            $parityrecordQuery=mysqli_query($con,"select * from `tbl_result1` where `tabtype`='parity' order by id desc limit 480");
            $parityrecordRow=mysqli_num_rows($parityrecordQuery);
            if($parityrecordRow==''){?>
         <tr >
            <td colspan="4">
               <div style="display: flex;">
                  <div class="spacer"></div>
                  <div>No data available !</div>
                  <div class="spacer"></div>
               </div>
            </td>
         </tr>
         <?php 
            }else{
            while($parityResult=mysqli_fetch_array($parityrecordQuery)){
            	if($parityResult['resulttype']=='real'){
            	?>
         <tr >
            <td  ><?php echo $parityResult['periodid'];?></td>
            <td>
               <div class="ball-row">
                  <div class="ball <?php if($parityResult['result'] == 0){echo "red";}?>">0</div>
                  <div class="ball <?php if($parityResult['result'] == 1){echo "green";}?>">1</div>
                  <div class="ball <?php if($parityResult['result'] == 2){echo "red";}?>">2</div>
                  <div class="ball <?php if($parityResult['result'] == 3){echo "green";}?>">3</div>
                  <div class="ball <?php if($parityResult['result'] == 4){echo "red";}?>">4</div>
                  <div class="ball <?php if($parityResult['result'] == 5){echo "green";}?>">5</div>
                  <div class="ball <?php if($parityResult['result'] == 6){echo "red";}?>">6</div>
                  <div class="ball <?php if($parityResult['result'] == 7){echo "green";}?>">7</div>
                  <div class="ball <?php if($parityResult['result'] == 8){echo "red";}?>">8</div>
                  <div class="ball <?php if($parityResult['result'] == 9){echo "green";}?>">9</div>
               </div>
            </td>
            <td><span class="size" style="background:<?php if($parityResult['result'] <= '5'){echo "green";}else{echo "darkorange";}?>"><span style=" color:white" ><?php if($parityResult['result'] <= '5'){echo "S";}else{echo "B";}?></span></td>
         </tr>
         <?php }else if($parityResult['resulttype']=='random'){?>
         <tr >
            <td><?php echo $parityResult['periodid'];?></td>
            <style>
               .ball-row {
               display: flex;
               justify-content: center;
               align-items: center;
               }
               .ball {
               width: 20px;
               height: 20px;
               border: 1px solid #BBBBBB;
               border-radius: 50%;
               display: flex;
               justify-content: center;
               align-items: center;
               font-weight: 400;
               color: #BBBBBB;
               background-color: white;
               margin-right:3px;
               }
               .ball.red {
               background-color: red;
               color: white;
               border: 1px solid red;
               }
               .ball.green {
               background-color: green;
               color: white;
               border: 1px solid green;
               }
               .size
               {
               width: 20px;
               height: 20px;
               border-radius: 50%;
               display: block;
               text-align: center;
               margin: auto; 
               }
            </style>
            <td>
               <div class="ball-row">
                  <div class="ball <?php if($parityResult['randomresult'] == 0){echo "red";}?>">0</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 1){echo "green";}?>">1</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 2){echo "red";}?>">2</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 3){echo "green";}?>">3</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 4){echo "red";}?>">4</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 5){echo "green";}?>">5</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 6){echo "red";}?>">6</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 7){echo "green";}?>">7</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 8){echo "red";}?>">8</div>
                  <div class="ball <?php if($parityResult['randomresult'] == 9){echo "green";}?>">9</div>
               </div>
            </td>
            <td><span class="size" style="background:<?php if($parityResult['randomresult'] <= '5'){echo "green";}else{echo "darkorange";}?>"><span style=" color:white" ><?php if($parityResult['randomresult'] <= '5'){echo "S";}else{echo "B";}?></span></td>
         </tr>
         <?php }?>
         <?php }}?>
      </tbody>
   </table>
</div>
<?php }?>