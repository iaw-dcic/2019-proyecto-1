$(document).ready(function () {
  //agrego oyente al switch
  $("#privacy_switch").on('change',set_privacy);
  //seteo el switch de privacidad segun el estado de la lista
  set_privacy_switch();
  //agrego estilo a los botones de paginado
  $(".page-link").addClass('material-dark');
});

function set_privacy() {
  var privacy = ($('#privacy_switch').is(':checked')? 1 : 0);

$("#privacy").val(privacy);
}
function set_privacy_switch() {
  var status = $("#privacy").val() == 0 ? false : true ;
  $("#privacy_switch").prop('checked',status);
}
