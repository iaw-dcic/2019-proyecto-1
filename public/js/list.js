$(document).ready(function () {
  //agrego oyente al switch
  $("#privacy_switch").on('change',set_privacy);

  //agrego estilo a los botones de paginado
  $(".page-link").addClass('material-dark');
});

function set_privacy() {
  var privacy = ($('#privacy_switch').is(':checked')? 1 : 0);

$("#privacy").val(privacy);
}
