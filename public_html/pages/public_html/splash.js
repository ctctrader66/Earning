
                $.fn.center = function () {
  this.css("position","fixed");
  this.css("top", Math.max(0, (
    ($(window).height() - $(this).outerHeight()) / 2) + 
     $(window).scrollTop()) + "px"
  );
  this.css("left", Math.max(0, (
    ($(window).width() - $(this).outerWidth()) / 2) + 
     $(window).scrollLeft()) + "px"
  );
  return this;
}

$("#overlay").show();
$("#overlay-content").show().center();

setTimeout(function(){    
  $("#overlay").fadeOut();
}, 3000);
       