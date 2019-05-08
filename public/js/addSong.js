var i = 1;
$(document).on("click",".addSong",function(){

    var row = $(".clone").eq(0).clone().show();
    $(row).removeClass("clone");
    var aux = $(row).find(".cloneName");
    var aux2 = $(row).find(".cloneLink");
    $(aux).attr('name', $(aux).attr('name') + i);
    $(aux).val("");
    $(aux2).attr('name', $(aux2).attr('name') + i);
    $(aux2).val("");
    $(".element-wrapper").append(row);
    var myElement = $("#var");
    $(myElement).attr('value',i);
    i++;







}); 