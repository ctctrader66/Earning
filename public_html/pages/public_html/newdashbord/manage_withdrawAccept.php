<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Manage Withdrawal Accept</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <link rel="stylesheet" href="css/app.css" id="maincss">

</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
<?php include ("include/connection.php");?>
<?php include ("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include ("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Withdrawal Accept</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Withdrawal Accept</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header box-header2">
            <div class="col-xs-6 text-right">
         <h3 class="box-title"><?php 
				if(isset($_GET['msg'])=="updt") 
				{ ?>
                <font size="+1" color="#FF0000">Update Successfully...</font>
                <?php  } ?></h3>
         </div>
              <div class="col-sm-6">
              <div class="pull-right">&nbsp;</div>
       </div>
      
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
  <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
          <!--<div class="table-responsive"> -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                     <th>Trn ID</th>
                    
                <th>User Mobile</th>
                <th>Amount</th>
              
                <th>Address</th>
                <th>Copy</th>
                
                <th>Detail</th>
                 <th>Req. Date</th>
                </tr>
                </thead>
                <tbody>
     <?php
  $Query=mysqli_query($con,"select *,(select `mobile` from `tbl_user` where `id`=`tbl_withdrawal`.`userid`)as user from `tbl_withdrawal` where `status`='0' order by id desc");
  $i=0;
  $total=0; 
  while($row=mysqli_fetch_array($Query)){$i++;
  $total+=$row['amount'];?>  
                  <tr>
                          <td><?php echo $row['id'];?></td>
                   
              <td><?php echo @$row["user"]; ?></td>
           
              <td>TRX <?php  $amount = $row['amount'];
                           $total1 = $amount*2/100;
                           $final = $amount-$total1;
                           $finallast = $final/81;
                         echo round($amount,2);?></td>
                         
              <td><?php echo @$row["address"]; ?></td>
      <td><button  class="btn copyBtn" data-clipboard-text="<?php echo @$row["address"]; ?>">Copy</button></td>
			    
              
                    <td><a style="background-color:orange; color:white; font-size:16px; padding: 7px;" href="user-details.php?user=<?php echo @$row["userid"]; ?>" >Check User</a></td>
                                  <td><?php echo @date('d-m-Y - h:i A', strtotime($row['createdate']));?></td>
                </tr>
        <?php }?>
               
                </tbody>
              </table>
              <!--</div>-->
   <div class="box-header box-header2" style="margin-bottom: 10px;">&nbsp; </div>
<div class="row">              
<div class="col-sm-6"></div>
              <div class="col-sm-6 text-right">
 <strong>Total Request Amount: <i class="red_txt"><?php echo number_format($total,2);?></i></strong>
            </div>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include("include/footer.inc.php");?></div>
<div id="confirm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding:8px;">
      <div class="modal-body text-center">Are you sure you want to <span id="typetext"></span>?</div>
<input type="hidden" id="id" name="id" value="">
<input type="hidden" id="type" name="type" value="">
      <div class="text-center">
    <a type="button" class="btn btn-sm btn-success text-light" onClick="acceptreject();">&nbsp;YES&nbsp;</a>&nbsp;
    <a type="button" class="btn btn-sm btn-danger text-light" data-dismiss="modal">&nbsp;NO&nbsp;</a>
    </div> 
    </div>
  </div>
</div>
<script type="text/javascript">
function acceptrejectconfirm(Id,type) {
 $('#confirm').modal({backdrop: 'static', keyboard: false})  
     $('#confirm').modal('show');
	 $('#id').val(Id);
	 $('#type').val(type);
	 document.getElementById('typetext').innerHTML = type;
       }

function acceptreject() {
var Id=$('#id').val();
var Type=$('#type').val();

               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + Type ,
                   url: "manage_withdrawaAction.php",
                   success: function (html) {
                       //alert(html);
                       window.location = '';
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
        <script type="text/javascript">
            function showToast(text){
                var ele = document.createElement("div");
                ele.className = "toast";
                ele.innerHTML = text;
                document.body.appendChild(ele);
                setTimeout(function(){
                    document.body.removeChild(ele);
                }, 2000)
            }
            var btns = document.querySelectorAll('.btn');
            var clipboard = new ClipboardJS(btns);
            clipboard.on('success', function(e) {
                showToast("COPY SUCCESS");
            });

            clipboard.on('error', function(e) {
                showToast("COPY FAIL");
            });
            
        </script>
</body>
</html>
