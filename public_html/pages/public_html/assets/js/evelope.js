function submitenvelope()
{
var address = $('input#address').val();

	
         $.ajax({
			type: "Post",
            data: "action=" + action ,
            url: "addenvelopeNow.php",       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			
			if (arr[0]== 1) {
	$('input#address').val('');
	$('#alert').modal({backdrop: 'static', keyboard: false})  
    $('#alert').modal('show');
	document.getElementById('alertmessage').innerHTML = "<h4>Success!</h4>";
window.location.href = "main.php";
            return false;
			}
			else if(arr[0]==2)
			{
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<h4>Fail !</h4>";
            return false;

				}	
			
			
			}
		});
	
	}