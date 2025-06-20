$(document).ready(function () {
  $("#send_verification").click(function (e) {
    e.preventDefault();

    var mobile = $("#mobile").val();

    $.ajax({
      url: "send_otp.php",
      data: { mobile: mobile },
      method: "post",
      success: function (response) {
          $("#alert").modal({ backdrop: "static", keyboard: false });
          $("#alert").modal("show");
          document.getElementById("alertmessage").innerHTML =
            "<p>OTP Sended</p>";
          return false;
			//alert(html);
            	// end
        // alert(response);
      },
    });
  });

  $("#bankcardform").on("submit", function (e) {
    e.preventDefault();

    var name = $("input#name").val();
    var ifsc = $("input#ifsc").val();
    var bank = $("input#bank").val();
    var state = $('input#state').val();
    var city = $('input#city').val();
    var adddress = $('input#adddress').val();
    var account = $("input#account").val();
    var mobile = $("input#mobile").val();
    var email = $("input#email").val();
    //alert(userammount);
    if (name == "") {
      $("input#name").focus();
      $("#name").addClass("borderline");
      return false;
    }
    if (ifsc == "") {
      $("input#ifsc").focus();
      $("#ifsc").addClass("borderline");
      return false;
    }
    if (bank == "") {
      $("input#bank").focus();
      $("#bank").addClass("borderline");
      return false;
    }
    if (account == "") {
      $("input#account").focus();
      $("#account").addClass("borderline");
      return false;
    }
    if (mobile == "") {
      $("input#mobile").focus();
      $("#mobile").addClass("borderline");
      return false;
    }
    if (state == "") {
      $("input#state").focus();
      $("#state").addClass("borderline");
      return false;
    }
    if (city == "") {
      $("input#city").focus();
      $("#city").addClass("borderline");
      return false;
    }
    if (address == "") {
      $("input#address").focus();
      $("#address").addClass("borderline");
      return false;
    }
    if (email == "") {
      $("input#email").focus();
      $("#email").addClass("borderline");
      return false;
    }

    $.ajax({
      type: "POST",
      url: "addbankcardNow.php",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,

      success: function (html) {
        // alert(html);
        var arr = html.split("~");

        if (arr[0] == 1) {
          $("input#name").val("");
          $("input#ifsc").val("");
          $("input#bank").val("");
          $("input#account").val("");
          $('input#state').val('');
		  $('input#city').val('');
		  $('input#address').val('');
          $("input#mobile").val("");
          $("input#email").val("");
          $("#alert").modal({ backdrop: "static", keyboard: false });
          $("#alert").modal("show");
          document.getElementById("alertmessage").innerHTML =
            "<p>Bank added succesfully<p></>";
            	window.location.href = "manage_bankcard.php";
          return false;
        } else if (arr[0] == 2) {
          $("#alert").modal({ backdrop: "static", keyboard: false });
          $("#alert").modal("show");
          document.getElementById("alertmessage").innerHTML =
            "<p>Bank Allready Add othar Account ! <p></>";
          return false;
        } else if (arr[0] == 0) {
          $("#alert").modal({ backdrop: "static", keyboard: false });
          $("#alert").modal("show");
          document.getElementById("alertmessage").innerHTML =
            "<p>Error found</p>";
          return false;
        } else if (arr[0] == 3) {
          $("#alert").modal({ backdrop: "static", keyboard: false });
          $("#alert").modal("show");
          document.getElementById("alertmessage").innerHTML =
            "<p>Invalid OTP</p>";
          return false;
        }
      },
    });
  });
});
