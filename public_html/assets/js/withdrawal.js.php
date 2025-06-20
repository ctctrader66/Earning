<?php
include("../../include/connection.php");?>
	<script>
	$.validator.setDefaults({
		submitHandler: function() {
		}
	});

//===============================================login validation=======================================================
$().ready(function() {
	

$("#paymentdetailForm").validate({
			
			rules: {
				
			name: {
					required: true,
				},
				
			mobile: {
					required: true,
					number: true,
					minlength: 10
				},
			email: {
					required: true,
				},				
			},
			messages: {
				
			
				
				email: "Please enter a valid email address",
				remember: "Please accept our policy",
			}
			
		});			
	});

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
if(userammount<<?php echo minamountsetting($con,'withdrawalamount');?>) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
			}
if(userammount>100000) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
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
				$('input#userammount').val('');
			$('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<p>Success<p></>";
            return false;
			}
			else if(arr[0]==2) {
				$('input#userammount').val('');
			$('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<p>Please bet more<p></>";
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
	 document.getElementById('alertmessage').innerHTML = "<p>Insufficiant Fund</p>";
            return false;

				}
				
			else if(arr[0]==5)
			{ 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>You Need to Recharge Your Account First, After You Will Eligible For Withdrawal</p>";
          return false;
                }


else if(arr[0]==6)
			{ 
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Withdrawal Limit Reached</p>";
          return false;
                }
				
			else if(arr[0]==7)
			{ 
			    //alert(arr[0]);
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>You Need To Complete Bet Volume </p>";
          return false;
                }
                else if(arr[0]==8)
			{ 
			    //alert(arr[0]);
  $('#alert').modal({backdrop: 'static', keyboard: false})
     $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>You are not allowed to withdraw</p>";
          return false;
                }
			}
		});
}));



});

</script>