<?php 
include("userResult3.php");

$getperiod_Query=mysqli_query($con,"select * from `tbl_gameid3` order by id desc limit 1");
$getperiodRow=mysqli_num_rows($getperiod_Query);
$getperiodidRow=mysqli_fetch_array($getperiod_Query);

$periodid=$getperiodidRow['gameid'];
$type1='parity';
$today=date('Y-m-d H:i:s');
//======================manual result==========================================================
$chkmanualswitchQuery=mysqli_query($con,"select * from `tbl_manualresultswitch` where `id`='1'");
$switchResult=mysqli_fetch_array($chkmanualswitchQuery);
$switchstatus=$switchResult['switch'];
$switchtab=$switchResult['tab'];

$manualresultQuery=mysqli_query($con,"select `id`,(`value`)as color,`number` from `tbl_manualresult` where `status`='1'");
$manualResult=mysqli_fetch_array($manualresultQuery);
$manualid=$manualResult['id'];
$manualcolor=$manualResult['color'];
$manualnumber=$manualResult['number'];
//=======================manual result end=====================================================
//----------------------------------------High Low Start----------------------------------------
$settingQuery=mysqli_query($con,"select * from `tbl_gamesettings` where `id`='1'");
$settingResult=mysqli_fetch_array($settingQuery);
$settingstatus=$settingResult['settingtype'];

//------------------------------------High low End----------------------------------------------


$chkResult=mysqli_query($con,"select * from `tbl_result3` where `periodid`='".$periodid."'");
$chkResultRow=mysqli_num_rows($chkResult);
if($chkResultRow==''){

$selectData=mysqli_query($con,"select * from `tbl_betting` where `periodid`='".$periodid."' and `acceptrule`='on'");
$selectdataRow=mysqli_num_rows($selectData);
if($selectdataRow!='')
{
if($type1=='parity')
{
$chkparityQuery=mysqli_query($con,"select * from `tbl_betting` where `periodid`='".$periodid."' and `tab`='parity'");
$chkparityRow=mysqli_num_rows($chkparityQuery);
if($chkparityRow!=''){
//=========possibility for green type parity
for ($x = 0; $x <= 9; $x++) {
	
if($x==1||$x==3||$x==7||$x==9)	
{//======for green
$color='green';
$greentotal=winner($con,$periodid,$type1,'greenwinamount');
if($settingResult['settingtype']=='high'){
$total=$greentotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
}else if($settingResult['settingtype']=='low'){
$tradeamount=winner($con,$periodid,$type1,'tradeamount');
$att=$greentotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
$total=$tradeamount-$att;
}
}else if($x==2||$x==4||$x==6||$x==8)	
{
$color='red';
$redtotal=winner($con,$periodid,$type1,'redwinamount');
if($settingResult['settingtype']=='high'){
$total=$redtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
}else if($settingResult['settingtype']=='low'){
$tradeamount=winner($con,$periodid,$type1,'tradeamount');
$att=$redtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
$total=$tradeamount-$att;
}
	}	
else if($x==0)

{
$color='red+violet';
$redtotal=winner($con,$periodid,$type1,'redwinamountwithviolet');
$vtotal=winner($con,$periodid,$type1,'violetwinamount');
if($settingResult['settingtype']=='high'){
$total=$redtotal+$vtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
}else if($settingResult['settingtype']=='low'){
$tradeamount=winner($con,$periodid,$type1,'tradeamount');
$att=$redtotal+$vtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
$total=$tradeamount-$att;
}
	}	
	
else if($x==5)

{
$color='green+violet';
$redtotal=winner($con,$periodid,$type1,'greenwinamountwithviolet');
$vtotal=winner($con,$periodid,$type1,'violetwinamount');
if($settingResult['settingtype']=='high'){
$total=$redtotal+$vtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
}else if($settingResult['settingtype']=='low'){
$tradeamount=winner($con,$periodid,$type1,'tradeamount');
$att=$redtotal+$vtotal+winner($con,$periodid,$type1,$numbermappings[$x].'winamount');
$total=$tradeamount-$att;
}
	
	}	
$sql= mysqli_query($con,"INSERT INTO `tbl_tempwinner`(`periodid`,`number`,`color`,`total`, `type`) VALUES ('".$periodid."','".$x."','".$color."','".$total."','".$type1."')");	
}

//========final Result===================================================
if($switchstatus=='yes' && $switchtab=='parity')
{
$tempwinQuery=mysqli_query($con,"select `number`,`color`,`total` from `tbl_tempwinner` where `periodid`='".$periodid."' and `number`='".$manualnumber."' and `color`='".$manualcolor."' and `type`='parity'");
	}

else{
$tempwinQuery=mysqli_query($con,"SELECT `number`,`color`,`total` from `tbl_tempwinner` where `total` = (
select min(`total`)from `tbl_tempwinner` where `total`>=0)and `periodid`='".$periodid."' and `type`='parity' order by RAND() LIMIT 1; ");
}
$tempwinResult=mysqli_fetch_array($tempwinQuery);
$tempNumber=$tempwinResult['number'];
$tempColor=$tempwinResult['color'];
$tempTotal=$tempwinResult['total'];
//=================random data=======================================
$randomwinQuery=mysqli_query($con,"select * from `tbl_randomdata` order by RAND() LIMIT 1;");
$randomwinResult=mysqli_fetch_array($randomwinQuery);
$randomPrice=$randomwinResult['price'];
$randomNumber=$randomwinResult['result'];
$randomColor=$randomwinResult['color'];
//=================random data end====================================

$ResultQuery= mysqli_query($con,"INSERT INTO `tbl_result3`(`periodid`, `price`, `randomprice`, `result`, `randomresult`, `color`, `randomcolor`, `resulttype`, `tabtype`,`createdate`) VALUES ('".$periodid."','".$tempTotal."','".$randomPrice."','".$tempNumber."','".$randomNumber."','".$tempColor."','".$randomColor."','real','".$type1."','".$today."')");	

//========final Result end===============================================
//============user Result===========================================================
resultbyUser($con,$periodid,$tempNumber,$tempColor,$randomPrice,$type1);

}//==========chk parity===================
else{
//=================random data=======================================
$randomwinQuery=mysqli_query($con,"select * from `tbl_randomdata` order by RAND() LIMIT 1;");
$randomwinResult=mysqli_fetch_array($randomwinQuery);
$randomPrice=$randomwinResult['price'];
$randomNumber=$randomwinResult['result'];
$randomColor=strtolower($randomwinResult['color']);
$heading_new=str_replace("&","",$randomColor);
$newcolor=str_replace(" ","+",$heading_new);
//=================random data end====================================

$ResultQuery= mysqli_query($con,"INSERT INTO `tbl_result3`(`periodid`, `price`, `randomprice`, `result`, `randomresult`, `color`, `randomcolor`, `resulttype`, `tabtype`,`createdate`) VALUES ('".$periodid."','0','".$randomPrice."','0','".$randomNumber."','','".$newcolor."','random','".$type1."','".$today."')");	
//========final Result end===============================================	
	}
}//====parity end
	}
	else
	{ 
//=====================if betting empty random data===============================
//=================random data=======================================
$tabtypearray=array('parity');
for ($i = 0; $i <= 0; $i++) {
$randomwinQuery=mysqli_query($con,"select * from `tbl_randomdata` order by RAND() LIMIT 1;");
$randomwinResult=mysqli_fetch_array($randomwinQuery);
$randomPrice=$randomwinResult['price'];
$randomNumber=$randomwinResult['result'];
$randomColor=strtolower($randomwinResult['color']);
$heading_new=str_replace("&","",$randomColor);
$newcolor=str_replace(" ","+",$heading_new);
//=================random data end====================================

$ResultQuery= mysqli_query($con,"INSERT INTO `tbl_result3`(`periodid`, `price`, `randomprice`, `result`, `randomresult`, `color`, `randomcolor`, `resulttype`, `tabtype`,`createdate`) VALUES ('".$periodid."','0','".$randomPrice."','0','".$randomNumber."','','".$newcolor."','random','".$tabtypearray[$i]."','".$today."')");	

//========final Result end===============================================	


//=====================if betting empty random data===============================
}//=====for end
		}
$truncateQuery=mysqli_query($con,"TRUNCATE TABLE `tbl_tempwinner`");
}//check if result done
?>