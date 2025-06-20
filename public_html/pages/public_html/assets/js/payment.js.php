	<?php if (file_exists('../../include/connection.php')) {
    include('../../include/connection.php');
} else {
    echo "File not found.";
}?>
	$.validator.setDefaults({
		submitHandler: function() {
		}
	});

//===============================================login validation=======================================================


$(document).ready(function () { 

$("#paymentdetailForm").on('submit',(function(e) {
e.preventDefault();
var userammount = $('input#userammount').val();
	//alert(userammount);	
if((userammount)== "") {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
			}
if(userammount<<?php echo minamountsetting($con,'rechargeamount');?>) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
			}
if(userammount>100000) {
   $("input#userammount").focus();
   $('#userammount').addClass('borderline');
            return false;
			}

 document.getElementById('finalamount').value=userammount;


		$.ajax({
			type: "POST", 
			url: "paymentdetailsessionNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
			window.location.href = "epay.php";
			}
				
			else if(arr[0]==0)
			{ document.getElementById('serror').innerHTML = ('<font size="2" style="color:#f00;">Some Technical error !</font>');
				}
			
			}
		});
	
	
}));

});