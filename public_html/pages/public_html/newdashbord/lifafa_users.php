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
    <title>Adminsuit | Envelope History</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/app.css" id="maincss">
<style>
#copied{
            visibility: hidden;
            min-width: 150px;
            margin-left: -75px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 50px;
            font-size: 15px;
        }

       

        #copied.show {
            visibility: visible;
            margin-bottom: 205px;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
</style>
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
            <h1>Envelope History</h1>
            <ol class="breadcrumb">
                <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Envelope</li>
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

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                                <!--<div class="table-responsive"> -->
                                <table id="example1" class="table table-bordered table-striped">
                                   <p></p><p>Envelope ID - <?php 

                 $link =  $_GET['random'];

$user_mobile_number = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lifafa where random = '$link'"));
echo $user_mobile_number['id'];
 ?></p>
 <p>Envelope: <?php  $link =  $_GET['random'];

$user_mobile_number = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lifafa where random = '$link'")); echo $user_mobile_number["tqua"]; ?> Limit / <?php echo $user_mobile_number["qua"]; ?> Remaining</p>

<p>Amount For per User: ₹<?php $link =  $_GET['random'];

$user_mobile_number = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lifafa where random = '$link'")); echo $user_mobile_number['amount'];?></p>

<p>Envelope Amount: ₹<?php $link =  $_GET['random'];

$user_mobile_number = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM lifafa where random = '$link'")); $qantity =   $user_mobile_number['tqua'];
                                                   $amount =   $user_mobile_number['amount'] ;
                                                  $total = $amount*$qantity; echo round($total,2);?></p></div>

</br>
                <thead>
                <tr>

<th>S.No.</th>
<th>UserID</th>
<th>IP Address</th>
<th>Number</th>
<th>Amount</th>
<th>Date</th>
<th>Action</th>

  </tr>
                </thead>
                <tbody>
    
   <?php
   
    $link =  $_GET['random'];
   
  $Query=mysqli_query($con,"SELECT * FROM lifafa_his where l_id = '$link' order by id desc");
  $i=0; 
  while($row=mysqli_fetch_array($Query)){$i++;?>
                  <tr>
              <td><?php echo @$i ?></td>
              <td><?php $userid = $row["userid"];
		 echo $userid;             ?></td><td><?php $userid = $row["userid"];
			$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
             $sqlgetresult = mysqli_fetch_array($sqlget);
            $mobilenew = $sqlgetresult['ip'];  echo $mobilenew;             ?></td>
              <td>+91<?php $userid = @$row["phone"]; echo $userid;?></td>
              <td>₹<?php echo @$row["amt"];?></td>
              <td><?php echo @$row["time"]; ?></td>
              <td><a href="user-details.php?user=<?php echo $row['userid']; ?>"  target="_blank" class="update-person" style="background-color:#1DCC70; color:white; font-size:16px; padding: 7px;" title="User Detail">User Detail</a></td>
              </tr>
        <?php }?>
               
               
                </tbody>
                
              </table><span id="id">

</span><div id="copied">Copied</div>
                                <!--</div>-->
                                <div class="box-header box-header2" style="margin-bottom: 10px;">&nbsp; </div>
                                <div class="row">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        &nbsp;
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
<!-- ./wrapper -->


<script>

    $(function () {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true,
            "pageLength": 100
            
        });
    });
</script>
<script type="text/javascript">
    function delete_row(Id) {
        var strconfirm = confirm("Are You Sure You Want To Delete?");

        if (strconfirm == true) {
            $.ajax({
                type: "Post",
                data:"id=" + Id + "& type=" + "delete" ,
                url: "manage_productAction.php",
                success: function (html) {
                    if(html==1){
                        alert("Selected Item Deleted Sucessfully....");
                        window.location = '';
                    }
                    else if(html==0){
                        alert("Some Technical Problem");

                    }
                },
                error: function (e) {
                }
            });
        }

    }
</script>
<script type="text/javascript">
    function Respond(Id) {
        var strconfirm = confirm("Are you sure you want to Unpublish?");

        if (strconfirm == true) {
            $.ajax({
                type: "Post",
                data:"id=" + Id + "& type=" + "chk" ,
                url: "manage_productAction.php",
                success: function (html) {
                    //alert(html);
                    window.location = '';
                    return false;
                },
                error: function (e) {
                }
            });
        }

    }
</script>
<script type="text/javascript">
    function UnRespond(Id) {
        var strconfirm = confirm("Are you sure you want to Publish?");
        if (strconfirm == true) {
            $.ajax({
                type: "Post",
                data:"id=" + Id + "& type=" + "unchk" ,
                url: "manage_productAction.php",
                success: function (html) {
                    //alert(html);
                    window.location = '';
                    return false;
                },
                error: function (e) {
                }
            });
        }

    }
</script>
<script type="text/javascript">
 function delete_row(Id) {
 var strconfirm = confirm("Are You Sure You Want To Delete?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "delete" ,
                   url: "delete_redenvelope.php",
                   success: function (html) { 
                      if(html==1){
						  alert("Selected Item Deleted Sucessfully....");
                     window.location = '';
					  }
					  else if(html==0){
						  alert("Some Technical Problem");
						  
						  }
                   },
                   error: function (e) {
                   }
               });
           }

       }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

<script>
    new ClipboardJS('.btn-copy');
  </script>
<script type="text/javascript">

  function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value =document.getElementById("id").innerHTML;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
var x = document.getElementById("copied");
        x.className = "show";
        setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
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
