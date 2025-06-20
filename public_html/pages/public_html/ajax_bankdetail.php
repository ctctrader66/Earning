<?php
include ("include/connection.php");
if($_POST['userid'])
{
 $userid=$_POST['userid'];
 $type=$_POST['type'];
 echo '<option style="text-align:center; font-size:18px;" selected="selected" value="">Choose Bank Account</option>';

$sql=mysqli_query($con,"select * from `tbl_bankdetail` where `userid` ='".$userid."' and `type`='".$type."'");
$rows=mysqli_num_rows($sql);
if($rows!=''){

while($row=mysqli_fetch_array($sql))
{
$id=$row['id'];
$data=$row['email'];
$account=$row['address'];
if($type=='bank'){$a=$account;}else{$a=$data;}
?>
<option style=" text-align:center" value="<?php echo $id;?>"><?php echo $a;?></option>
<?php
}}else{
$id='';
$data='Not found';


echo '<option style="text-align:center" value="'.$id.'" style="color:#f00;">'.$data.'</option>';
}
}
?>