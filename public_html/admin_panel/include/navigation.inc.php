<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    
    <!--<div class="user-panel">
      <div class="pull-left image"> <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> </div>
      <div class="pull-left info">
        <p>Welcome</p>
        <a href="javascript:void('0');"> <i class="fa fa-circle text-success"></i> Online</a> </div>
    </div>-->
    <!-- search form --> 
    
    <!-- /.search form --> 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <style>
        .header{
            padding:auto;
            background:#000;
            color:#fff;
            font-weight:600;
        }
    </style>
    <ul class="sidebar-menu">
      <center><marquee class="header">Powered By Scripthub</marquee></center>
      <?php $session_role=$_SESSION['role_id'];
$url = basename($_SERVER['PHP_SELF']) . '';
$chkurl=mysqli_query($con,"select `id`,`p_id` from `child_menu` where `url`='".$url."' and `status`='1'");
$chkurl_result=mysqli_fetch_array($chkurl);
//$chk= $chkurl_result['p_id'];
//$chkid= $chkurl_result['id'];
// Check if $chkurl_result is set and is not null
if(isset($chkurl_result)) {
   // Check if the keys exist in the array before accessing them
   if(isset($chkurl_result['p_id'])) {
       $chk = $chkurl_result['p_id'];
   } else {
       // Handle case where 'p_id' key is not found
       $chk = null; // Or any default value you prefer
   }

   if(isset($chkurl_result['id'])) {
       $chkid = $chkurl_result['id'];
   } else {
       // Handle case where 'id' key is not found
       $chkid = null; // Or any default value you prefer
   }
} else {
   // Handle case where $chkurl_result is null or undefined
   // You can throw an exception, log an error, or set default values as per your requirement
   // For example:
   //throw new Exception("Error: \$chkurl_result is null or undefined.");
}
$chk = null;
$valurl=mysqli_query($con,"SELECT * FROM `task` where `role_id`='".$session_role."' And task  like '%$chk%' and `status`='1'");
$val_row=mysqli_num_rows($valurl);
if($val_row=='0'){
session_start();
session_unset();
session_destroy();

header("location:index.php?msg1=notauthorized");

	
	}else{

$task=mysqli_query($con,"select * from `task` where `role_id`='".$session_role."' and `status`='1'");
$task_result=mysqli_fetch_array($task);
$taskid=$task_result['task'];	
$parent=mysqli_query($con,"Select * from `services` where id in($taskid) And `status`='1'");
	while(@$parent_array=mysqli_fetch_array($parent)){
		if($parent_array['url']=='desktop.php'){
		?>
      <li class="active treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-dashboard"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
     else if($parent_array['url']=='statics.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      else if($parent_array['url']=='manage_tradehistory.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='manage_parityhistory.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='reward_system.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='manage_winresult.php'){
		?>
		<li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='manage_winresult1.php'){
		?>
		<li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='manage_winresult2.php'){
		?>
		<li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='manage_winresult3.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      
       else if($parent_array['url']=='manage_transaction.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      
       else if($parent_array['url']=='current_game_report.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      else if($parent_array['url']=='user_bet_records.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
    else if($parent_array['url']=='user-result.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='complaints.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='red_envelope.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      else if($parent_array['url']=='smsform.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='envelope_history.php'){
		?>
		<li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='current_game_report1.php'){
		?>
		<li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
       else if($parent_array['url']=='user_result1.php'){
		?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i> <span><?php echo $parent_array['services']; ?></span> </a></li>
      <?php }
      else{?>
      <li class="treeview"> <a href="<?php echo $parent_array['url']; ?>"> <i class="fa fa-list-alt"></i><span><?php echo $parent_array['services']; ?></span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <?php 
$child=mysqli_query($con,"Select * from `child_menu` where `p_id`='".$parent_array['id']."' And `status`='1'");
	while($child_array=mysqli_fetch_array($child)){ ?>
          <li> <a href="<?php echo $child_array['url']; ?>"><i class="fa fa-circle-o"></i><?php echo $child_array['child']; ?></a></li>
          <?php } //child while end?>
        </ul>
      </li>
      <?php } //parent while end 
	 
	 }}
	 ?>
      
    </ul>
    
    
  </section><br />
  <!-- /.sidebar -->
</aside>