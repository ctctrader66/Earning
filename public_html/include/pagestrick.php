<script>
  
	window.oncontextmenu = function () {
				return false;
			}
			$(document).keydown(function (event) {
				if (event.keyCode == 123) {
					return false;
				}
				else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
					return false;
				}
			});


//  document.onkeydown = function(e) {
//     if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 ||     e.keyCode === 117 || e.keycode === 17 || e.keycode === 85)) {
//         alert('Not Allowed');
//     }
//     return false;
// };

</script>