$(document).ready(function () {
  //agrego oyente al switch
  $("#privacy_switch").on('change',set_privacy);
});

function set_privacy() {
  var privacy = ($('#privacy_switch').is(':checked')? 0 : 1);
  
$("#privacy").val(privacy);
}
