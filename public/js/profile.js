$(document).ready(function(){
    $('#editButton').on('click', function(){  
        if($('#editButton').val() == "edit"){
            $(".my-form-control").removeClass("backlines");
            $(".my-form-control").removeClass("editSelects");
            $('.my-form-control').prop('disabled',false);
            $("#editButton").removeClass('btn-primary');
            $("#editButton").addClass('btn-success');
            $("#avatarEdit").removeClass('avatarEdit');
            $("#avatarEdit").addClass('avatarUser');
            $("#editButton").text('Save');

            $("#editButton").val('save');
        }else if($('#editButton').val() == "save"){
            $(".my-form-control").addClass("backlines");
            $(".my-form-control").addClass("editSelects");
            $("#editButton").removeClass('btn-success');
            $("#editButton").addClass('btn-primary');
            $("#avatarEdit").removeClass('avatarUser');
            $("#avatarEdit").addClass('avatarEdit');
            $("#editButton").text('Edit');

            $('#myModal').modal('toggle');
            $("#editForm").submit();
            $('.my-form-control').prop('disabled',true);
            $("#editButton").val('edit');
        }
    })
})