
require('./bootstrap');

//truncate cards' descriptions
$(function(){
    $(".card-text.p").each(function(i){
      len=$(this).text().length;
      if(len>80)
      {
        $(this).text($(this).text().substr(0,80)+'…');
      }
    });
});

//show file name on file input
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

