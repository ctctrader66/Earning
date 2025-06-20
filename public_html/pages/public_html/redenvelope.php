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

<?php include 'head.php';?>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/4_ma_ka_bacha_he_to_chura_le.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<style>

.tdtext2{color: #009688;}

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
        .listView .listItem {
     color: #757575;
    font-size:14px;
    font-weight:400;
   padding: 0px 55px 0px 0px;
}
  .null_data{
    height: 33px;
    line-height: 33px;
    font-size: 12px;
    text-align: center;
    margin:0 auto;
}
.imga{height:25px;width:25px;}
</style>
</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];?>
<!-- Page loading -->

<!-- * Page loading --> 

<!-- App Header -->
<div class="appHeader1">
<div class="left">
            <a href="/mine.php" style="text-decoration: none;" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Red Envelope</div> 
            
        </div>
 <div class="right">
      <a href="add_redevnelope.php" class="text-white" style="font-size:20px"><img class="imga" src="images/plus.png"></a>
    </div></div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div style="background:white" class="">
     
   <div>
     <table class="table table-borderless gfg">
      <thead>
      </thead>
      <tbody>
      <?php
	  @$userid=$_SESSION['frontuserid'];
      $summery=mysqli_query($con,"select * from `lifafa` where `userid`='".$userid."' order by id desc");
	  $summeryRows=mysqli_num_rows($summery);
	  if($summeryRows!=''){
		  while($summeryResult=mysqli_fetch_array($summery)){
$post_date = $summeryResult['createdate'];
 $convert = date("h:i A d-m-Y",strtotime($post_date));
 $actiontypearray=explode("~",$summeryResult['status']);
 @$actiontype=$actiontypearray[0];
 @$actiontypeval=$actiontypearray[1];
if($actiontype=='0'){
	  ?>
	
	  <tr>
          <td class="td-text">
          <div class="listItem">
         
        <div  style="color: #757575; font-weight:400;font-size: 14px;" class="">  
        <p class="" style="font-size:14px;">
      ₹ <?php  $amount = $summeryResult['amount'];
               
               echo round($amount,2);?></p>
            
       <p class="" style="color: #757575; font-weight:400;font-size: 14px;">
     <a onclick="copy(this)" >https://epicgame.in/lifafa/?reward=<?php echo $summeryResult['random'];?></a></p> 
       <small><?php echo $summeryResult['time'];?></small></div>
            </div>
            </td> <td class="tdtext text-danger">
               
     <span style="color: #757575; font-weight:400;font-size: 14px;"><?php echo $summeryResult["tqua"]; ?> Limit / <?php echo $summeryResult["qua"]; ?> Remaining</span> <br>
          &emsp;
<small style="color: #757575; font-weight:400;font-size: 14px;"><a href="/lifafa_users.php?random=<?php echo $summeryResult['random'];?>" style="border-radius: 3px;color: white;padding: 2px 17px 2px 17px;background-color: #009688;" class="button">Check</a></small></td>
        </tr>
	
       
        
        
  
        <?php }}}else{?>
        <tr>
          <td colspan="2">
          <div class="">
            <div class="null_data"><strong>No data available</strong></div></div>
            </td>
          
        </tr>
        <?php }?>
      </tbody>
          
    </table>
</div>

 <br>
  </div>
</div>
<style>
    .regLog{
        width: fit-content;
        margin: 0 auto;
        display: table;
        
    }
    .regContent {
        margin: 0 auto;
        padding: 0 !important;
        color: #fff;
    font-size: 14px;
    background-color: rgba(50, 50, 51, .88);
    border-radius: 8px;
    }
    .fade1 {

   -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }
    
    @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;} 
      to {bottom: 30px; opacity: 1;}
    }
    
    @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
    }
    
    @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;} 
      to {bottom: 0; opacity: 0;}
    }
    
    @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
    }

    .modal-backdrop{
      background-color: transparent;
    }
 .modal{
        top:45%;
    }

</style>
<div id="alert" class="modal" role="dialog" >
  <div class="modal-dialog regLog" role="document">
    <div class="modal-content regContent">
      <div class="modal-body" >
       <div class="text-center" id="alertmessage">
      </div>
    </div>
  </div>
</div></div>
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
<script src="assets/js/jquery.validate.min.js"></script> 
<script>function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

<script>
   function copy(that){
       
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Success</p>";
       
var inp =document.createElement('input');
document.body.appendChild(inp)
inp.value =that.textContent
inp.select();
document.execCommand('copy',false);
inp.remove();
}
  </script>
<script>
  $(function(){
    $('#alert').on('show.bs.modal', function(){
        var alert = $(this);
        clearTimeout(alert.data('hideInterval'));
        alert.data('hideInterval', setTimeout(function(){
            alert.modal('hide');
        }, 2000));
    });
});
</script>
</body>
</html>