	<?php if (file_exists('../../include/connection.php')) {
    include('../../include/connection.php');
} else {
    echo "File not found.";
}?>
   <script>
    $.validator.setDefaults({
        submitHandler: function() {
        }
    });

//===============================================login validation=======================================================


$(document).ready(function () { 

$("#paymentForm").on('submit',(function(e) {
e.preventDefault();

var userammount = $('input#userammount').val();
var acid = $('select#acid').val();
    //alert(userammount);    
if((userammount)== "") {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
            }
if(userammount<<?php
echo minamountsetting($con, 'withdrawalamount');
?>) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
            }
if(userammount>100000) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
            }
if ($('input[name="optionsname"]:checked').length == 0) {
         return false; 
         }
if(acid=="") {
   $("select#acid").focus();
   $('#acid').addClass('borderline');
            return false;
            }    
if(password=="") {
   $("select#password").focus();
   $('#password').addClass('borderline');
            return false;
            }
            
$.ajax({
            type: "POST", 
            url: "withdrawalNow.php",              
            data: new FormData(this), 
            contentType: false,      
            cache: false,            
            processData:false,      

            success: function(html)  
            { //alert(html);
            var arr = html.split('~');
            
            if (arr[0]== 1) {
                    window.location.href = "withdrawals.php";
                $('input#userammount').val('');
            $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Success<p></>";
            return false;
            }
            else if(arr[0]==2)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Enter Correct Password<p>";
            return false;

                }    
            else if(arr[0]==3)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Invalid amount</p>";
            return false;

                }
            else if(arr[0]==4)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Please try after some time</p>";
            return false;

                }
                
                    else if(arr[0]==5)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Recharge Your Account For Withdrawal</p>";
          return false;
                }


else if(arr[0]==6)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Withdrawal Limit Reached, Try again Tomorrow!</p>";
          return false;
                }
                else if(arr[0]==8)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Try again Later!</p>";
          return false;
                }
                
            else if(arr[0]==7)
            { 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>You Need To Complete Betting of Amount ₹<?php
$total_recharge  = mysqli_query($con, "SELECT sum(amount) as total FROM `tbl_recharge` WHERE status = 1 AND userid = '" . $userid . "'");
$wagar_recharge1 = mysqli_fetch_array($total_recharge);

$wagar       = mysqli_query($con, "select * from `tbl_user` where `id`='" . $userid . "'");
$wagaramount = mysqli_fetch_array($wagar);
$fixwagar    = $wagaramount['wagar'];



$wagar_recharge = $wagar_recharge1['total'] * $fixwagar;

$total_bet1 = mysqli_query($con, "SELECT sum(amount) as total1 FROM `tbl_betting` where userid = '" . $userid . "' ");
$wagar_bet1 = mysqli_fetch_array($total_bet1);
$total_bet  = $wagar_bet1['total1'];



$wagar_check = $wagar_recharge - $total_bet;
echo $wagar_check;
?> For Withdrawal</p>";
          return false;
                }
            }
        });
}));



});

</script>