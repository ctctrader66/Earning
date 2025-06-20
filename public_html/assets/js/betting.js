$(document).ready(function () { 

$("#bettingForm").on('submit',(function(e) {
e.preventDefault();

var finalamount = $('input#finalamount').val();
var counter = $('input#counter').val();
var userid=$('input#userid').val();
var inputgameid=$('input#inputgameid').val();
var tab=$('input#tab').val();


if((finalamount)== 0) {

$('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;
			}
if(finalamount<10) {
  
  $('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;
			}
if(finalamount>100000) {
  
  $('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;
			}

if(counter<30)
{
$('#payment').modal('hide');
$('#alert').modal({backdrop: 'static', keyboard: false})  
$('#alert').modal('show');
document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;

	}

if($('#presalerule').is(':checked')){}
else{
  $('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Accpet Presale Rule</font>";
        return false;
	
	}			


$.ajax({
			type: "POST", 
			url: "betNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ //alert(html);
			var arr = html.split('~');
			if (arr[0]== 1) {
			    waitlist(tab,userid,tab+'wait');
				$('#payment').modal('hide');
				var balance=parseFloat(arr[1]).toFixed(2);
			document.getElementById('balance').innerHTML =balance;
			$('#alert').modal({backdrop: 'static', keyboard: false})  
$('#alert').modal('show');
document.getElementById('alertmessage').innerHTML = "<font>Success</font>";
            return false;

			}
			else if(arr[0]==2)
			{ 
			$('#payment').modal('hide');
$('#alert').modal({backdrop: 'static', keyboard: false})  
$('#alert').modal('show');
document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;

				}
				else if (arr[0]==3){
					$('#payment').modal('hide');
$('#alert').modal({backdrop: 'static', keyboard: false})  
$('#alert').modal('show');
document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;

					}else if(arr[0]==4) {

$('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;
			}
else if(arr[0]==5) {
  
  $('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Failed</font>";
            return false;
			}
	else if(arr[0]==6) {
  
  $('#payment').modal('hide');
  $('#alert').modal({backdrop: 'static', keyboard: false})  
     $('#alert').modal('show');
	 document.getElementById('alertmessage').innerHTML = "<font>Low Balance</font>";
            return false;
			}		
			}
		});	
}));

//=============================payment detail=========================================================================

});

function waitlist(category,userid,containerid)
{ //alert(containerid);
var inputgameid=$("#futureid").val();

	$.ajax({
    type: "Post",
    data:"category=" + category+ "& userid=" + userid +"& periodid=" + inputgameid,
    url: "getwaitlist.php",
    success: function (html) { //alert(html);
		document.getElementById(containerid).innerHTML=html;
		},
      error: function (e) {}
      });
	}