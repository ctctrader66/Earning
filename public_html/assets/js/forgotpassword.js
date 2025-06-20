
$(document).ready(function () { 


//=================================================change password=====================================================
$("#changepasswordform").on('submit',(function(e) {
e.preventDefault();

var fnpassword = $('input#npassword').val();
var fcpassword = $('input#cpassword').val();
var userid = $('input#userid').val();
var email = $('input#mail').val();

		
if ((fnpassword)== "") {
            $("input#npassword").focus();
			$('#npassword').addClass('borderline');
            return false;
			}
if ((fcpassword)== "") {
            $("input#cpassword").focus();
			$('#cpassword').addClass('borderline');
            return false;
			}

		$.ajax({
			type: "POST", 
			url: "changepasswordNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 0) {
			
	$('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<p>Entered Wrong Otp!</p>";
	
// 	 	window.location.href = "forgot-password.php";
            return false;

			}	
			else if (arr[0]== 1) {
			
	$('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<p>Password change successfully</p>";
	
	 	window.location.href = "main.php";
            return false;

			}	
			else if(arr[0]==2)
			{ 
		$('#alert2').modal({backdrop: 'static', keyboard: false})  
     $('#alert2').modal('show');
	 document.getElementById('alertmessage2').innerHTML = "<p>Password not matched</p>";
            return false;

				}
			
			}
		});
	
	
}));
//==============================change password end====================================================================

});