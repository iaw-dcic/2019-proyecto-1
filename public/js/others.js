$( document ).ready(function() {


    var myresp;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#birthdate').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    $('#publication_date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });


    $('#publicationDate').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    $('.avatarImage').on('click', function(){
        $('#fileAvatar').trigger('click');
    });

    $("#fileAvatar").change(function(){
        readURL(this);
    });

    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
            url: "findusers",
            data: {
                    term : request.term
            },
            dataType: "json",
            success: function(data){
                var resp = $.map(data,function(obj){
                    // console.log(obj.name);
                    return obj.name;
                });

                var resp2 = $.map(data,function(obj){
                    return obj;
                });

               myresp = resp2;
               response(resp);
            }
        });
    },
    minLength: 1,
    autoFocus:true,
    select: function( event, ui ) {
        $( "#search" ).val( ui.item.label );
        $("#content-principal").empty()
        $("#content-lists").remove();        

        for(var i = 0; i < myresp.length ; i++){
            $.get('profiles', {name: myresp[i].name, avatar: myresp[i].avatar, id: myresp[i].id}, function(data) {
                $("#content-principal").append(data);
            });
        }
        return false;
    }
    });

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.avatarImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}