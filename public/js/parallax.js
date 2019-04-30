$(document).ready(function () {


    $(window).resize(function() {

        if ($(this).width() < 1024) {
      
          $('.parallax').hide();
      
        } else {
      
          $('.parallax').show();
      
          }
      
      });

 

});