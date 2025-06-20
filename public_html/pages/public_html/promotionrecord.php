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
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<style>
h3 {
	font-weight:normal;
}

.tdtext{ font-size:16px !important; color:##1B2C42; !important; font-weight:normal; text-align:right;}
.tdtext2{ font-size:16px !important; color:#f00 !important; font-weight:normal; text-align:right;}
.tdtext3{ font-size:16px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}

.text small{ font-size:12px; color:#888;}

.listView {
   padding:0px;
}
.text {
    font-size: 16px;
    font-weight:400px;
}

.rowline{
    background:#FEFAFA;
  
   border-bottom:5px solid white;
  
}
body{
    background:#FBFCFD;
}
.undercontainer{
    background:#fff;
    border-radius: 0px 25px 25px; 0px;
}
 
</style>

</head>

<body>
<?php
include("include/connection.php");
include("loading.php");
$userid=$_SESSION['frontuserid'];
 
?>


<!-- App Header -->

<div id="header" class="appHeader1">
<div class="left">
           <a href="/promotion.php" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
           
        </div>
  <div class="pageTitle">Registered Downline LVL 1</div>
</div>


<!-- App Capsule -->
<div  style="margin-top:55px" class="container p-2">
 
 
   

        <div class=" undercontainer">
  
    <table id="example1" class="table ">
     
      <tbody>
      <?php
      
   	  @$userid=$_SESSION['frontuserid'];
      $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
	  $userRows=mysqli_num_rows($user);
	  $userResult=mysqli_fetch_array($user);
	  $owncode=$userResult['owncode'];
	  $userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
	  $userlevel1Rows=mysqli_num_rows($userlevel1);
	  if($userlevel1Rows!=''){
		  while($userlevel1Result=mysqli_fetch_array($userlevel1)){
$post_date = $userlevel1Result['createdate'];
 $post_date2 = strtotime($post_date);
 $convert=date('Y-m-d',$post_date2);
 ?>
        <tr class="rowline">
          <td >
        
        
            <div class="text" >
            <span class="layout"><span style="padding-right:5px;"><?php echo $userlevel1Result['id'];?></span>(<?php echo  substr($userlevel1Result['mobile'],0,-9);?>****<?php echo  substr($userlevel1Result['mobile'], 5);?>) </span></div>
            
          
            </td>
          <td class="tdtext"><?php echo $convert;?></td>
        </tr>
        <?php }}?>
      </tbody>
    </table>
    <div style="text-align:center"class="p-1"><span style="font-size:15px; color:#9697A6"> No More</span></div>
   
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
<?php  include("include/pagestrick.php");?>
<script>

  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
	$('#example2').DataTable({
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
</html>