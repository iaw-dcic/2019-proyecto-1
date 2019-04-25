$(document).ready(function(){

    var src = $('#avatarEdit').attr('src');

    $('#editButton').on('click', function(){  
        if($('#editButton').val() == "edit")
            setForm(1);
        else if($('#editButton').val() == "save")
            setForm(2);
    });

    $('#closeButton').on('click', function(){  
        setForm(3);
        $('#avatarEdit').attr('src', src);
    });

    $('#avatarEdit').on('click', function(){
        if($('#editButton').val() == "save")
            $('#fileAvatar').trigger('click');
        else{
            $('#imagepreview').attr('src', $('#avatarEdit').attr('src')); // here asign the image to the modal when the user click the enlarge link
            $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        }
    });

    $("#fileAvatar").change(function(){
        readURL(this);
    });

    $(".collapse.show").each(function(){
        $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
    });
    
    $(".collapse").on('show.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
    }).on('hide.bs.collapse', function(){
        $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
    });
})

function setForm(action){
    if(action == 1){
        $(".my-form-control").removeClass("backlines");
        $(".my-form-control").removeClass("editSelects");
        $('.my-form-control').prop('disabled',false);
        $("#editButton").removeClass('btn-primary');
        $("#editButton").addClass('btn-success');
        $("#avatarEdit").removeClass('avatarEdit');
        $("#avatarEdit").addClass('avatarUser');
        $("#editButton").text('Save');

        $("#refImage").attr("href", "#");

        $("#editButton").val('save');
    }else if(action == 2){
        $(".my-form-control").addClass("backlines");
        $(".my-form-control").addClass("editSelects");
        $("#editButton").removeClass('btn-success');
        $("#editButton").addClass('btn-primary');
        $("#avatarEdit").removeClass('avatarUser');
        $("#avatarEdit").addClass('avatarEdit');
        $("#editButton").text('Edit');

        $("#refImage").removeAttr("href");

        $('#myModal').modal('toggle');
        $("#editForm").submit();
        $('.my-form-control').prop('disabled',true);
        $("#editButton").val('edit');
    }else if(action == 3){
        $(".my-form-control").addClass("backlines");
        $(".my-form-control").addClass("editSelects");
        $("#editButton").removeClass('btn-success');
        $("#editButton").addClass('btn-primary');
        $("#avatarEdit").removeClass('avatarUser');
        $("#avatarEdit").addClass('avatarEdit');
        $("#editButton").text('Edit');

        $("#refImage").removeAttr("href");

        $('.my-form-control').prop('disabled',true);
        $("#editButton").val('edit');
        $('#editForm').trigger("reset");
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#avatarEdit').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}