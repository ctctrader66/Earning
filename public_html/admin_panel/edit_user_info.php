<?php 
   ob_start();
   session_start();
   if($_SESSION['userid']=="")
   {
   	header("location:index.php");
   	exit();
   }
   
   include ("include/connection.php");
   
   

/*user info update Start*/
if(isset($_POST['user_info']))
{

$user_mobile= strval($_POST['u_mobile']);


$user_email= $_POST['u_email'];


$user_pass= strval($_POST['u_password']);

$user_code= strval($_POST['u_code']);
$ua_wstatus= strval($_POST['ua_wstatus']);

$ua_swstatus= strval($_POST['ua_swstatus']);

$user_status= $_POST['u_status'];
$u_wstatus= $_POST['u_wstatus'];
 $edit_user_id = $_GET['user'];
    $user_edit_query = mysqli_query($con, "SELECT * FROM tbl_user where id = $edit_user_id");
            
            $user_info_edit = mysqli_fetch_array($user_edit_query);
$id =  $user_info_edit['id'];

$user_sql = "UPDATE `tbl_user` SET `mobile`='$user_mobile',`email`='$user_email',`password`='".md5($user_pass)."',`owncode`='$user_code',`status`='$user_status',`view`='$user_pass',`wstatus`='$u_wstatus' ,`agent`='$ua_wstatus',`withd_status`='$ua_swstatus' WHERE `id`='$id'";


if (!mysqli_query($con,$user_sql)) {



echo '<script>
alert("Something Went Wrong");
window.location.href="manage_user.php";
</script>';


}
else
{
  echo '<script>
alert("User Info Updating...");
window.location.href="manage_user.php";
</script>';

}
}

    ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Panel - User Info Edit</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/ionicons.min.css">
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
      <link rel="stylesheet" href="plugins/morris/morris.css">
      <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
      <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
      <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet" href="plugins/select2/select2.min.css">
      <link rel="stylesheet" href="plugins/iCheck/all.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/app.css" id="maincss">
   </head>
   <body class="hold-transition skin-yellow-light sidebar-mini">
      <div class="wrapper">
         <?php include ("include/header.inc.php");?>
         <?php include ("include/navigation.inc.php");
            (int)$edit_user_id = $_GET['user'];
            
            
            $user_edit_query = mysqli_query($con, "SELECT * FROM tbl_user where id = $edit_user_id");
            
            $user_info_edit = mysqli_fetch_array($user_edit_query);
        

      


            ?>
            
            
  <div class="content-wrapper">

    



  <!-- Main content -->

  <section class="content">
            
            <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12 text-center">
          
          <?php if(isset($_GET['msg'])=="updt"){ ?>
              <span class="text-center red_txt">Update Successfully......</span><?php  } ?></div>
        <div class="col-xs-12">
          

          <div class="box">
            
            <!-- /.box-header -->


 <div class="row">
                  <div class="col-xs-12">
                     <h4 class="table_bg ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Personal Informattion</h4>
                     <!-- /.box-header -->
                     <form action="" method="POST">
                        <div class="box-body blue_bg">
                           <div class="clearfix"></div>
                            
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label for="address">Mobile</label>
                                 <input class="form-control"  name="u_mobile" type="number" value="<?php echo @$user_info_edit['mobile']; ?>">
                              </div>
                           </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label for="address">Email</label>
                                 <input class="form-control"  name="u_email" type="email" value="<?php echo @$user_info_edit['email']; ?>">
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label for="content1">Invite Code</label>
                                 <input class="form-control"  name="u_code" type="text" value="<?php echo @$user_info_edit['owncode']; ?>">
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label for="content1">Password</label>
                                 <input class="form-control"  name="u_password" type="text" value="<?php echo @$user_info_edit['view']; ?>">
                              </div>
                           </div>
                         
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label > Status</label>
                                 <select name="u_status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                 </select>
                              </div>
                           </div>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label > Withdrawal without condition single  user : <?php if( $user_info_edit['wstatus'] == '0'){echo 'YES';}else{echo 'NO';}; ?></label>
                                 <select name="u_wstatus" class="form-control">
                                    <option value="1">NO</option>
                                    <option value="0">YES</option>
                                 </select>
                              </div>
                           </div>
                           
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label > User is an agent : <?php if( $user_info_edit['ua_wstatus'] == '1'){echo 'Yes';}else{echo 'NO';}; ?></label>
                                 <select name="ua_wstatus" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <label >Allow to Withdraw  : <?php if( $user_info_edit['ua_swstatus'] == '1'){echo 'NO';}else{echo 'YES';}; ?></label>
                                 <select name="ua_swstatus" class="form-control">
                                    <option value="1">YES</option>
                                    <option value="0">NO</option>
                                 </select>
                              </div>
                            </div>  
                              
                           </div>
                           <div class="clearfix"></div>
                           <div class="clearfix"></div>
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="form-group">
                                 <div class="text-center">
                                    <input type="submit" name="user_info" class="btn btn-primary" value="Update User Info" >
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </form>
                     <!-- /.box-body -->
                  </div>

                  <!-- /.col -->
                  <!-- Bank -->
                  
                  <!-- Bank -->
               </div>
               
                        <div class="clearfix"></div>
                        
                        </br></br>
                  
                        

            
                  </div>

                 
               </div>
             
            </section>
          
         </div>
        
         <?php  include("include/footer.inc.php");?>
      </div>
      <script>
         $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
               checkboxClass: 'icheckbox_minimal-blue',
               radioClass: 'iradio_minimal-blue'
             });
           $(function () {
         	  $(".checkbox-toggle").click(function () { 
               var clicks = $(this).data('clicks');
               if (clicks) {
                 //Uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("uncheck");
                 $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
               } else {
                 //Check all checkboxes
                 $("input[type='checkbox']").iCheck("check");
                 $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
               }
               $(this).data("clicks", !clicks);
             });
             //$("#example1").DataTable();
             $('#example1').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": true,
               "ordering": false,
               "info": true,
               "autoWidth": true
             });
           });
      </script>
      
      <!--sucess modal-->
   </body>
</html>

