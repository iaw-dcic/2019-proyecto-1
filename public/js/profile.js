var table = $('.table-list').DataTable({
    "ordering": false,
    "info":     false,
    "aLengthMenu": [[5, 10, 15], [5, 10, 15]],
    "iDisplayLength": 5
});

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $("#listModal").on('hidden.bs.modal', function () {
        $('#listForm').trigger("reset");
    });

    $("#myModal").on('hidden.bs.modal', function () {
        $('#editForm').trigger("reset");
        setForm(3);
    });

    $("#itemModal").on('hidden.bs.modal', function () {
        $('#itemForm').trigger("reset");
    });    

    $("#itemEdit").on('hidden.bs.modal', function () {
        $('#editItemForm').trigger("reset");
    });    

    $("#listEdit").on('hidden.bs.modal', function () {
        $('#editListForm').trigger("reset");
    });    

    $('.table-list').on('click', 'tbody tr .deleteRow', function () {
        var item_id = $(this).parents('tr').attr("id");
        
        $.ajax({
            url: "deleteitem",
            type: 'post',
            data: {item_id: item_id,},
            success: function (response) {
               
            }
        });

        table.row( $(this).parents('tr') ).remove().draw();
    });

    $('.table-list').on('click', 'tbody tr .editRow', function () {
        var data = table.row( $(this).parents('tr') ).data();

        $("#itemName").val(data[0]);
        $("#itemAuthor").val(data[1]);
        $("#editorialName").val(data[2]);
        $("#publicationDate").val(data[3]);


        $("#country_id > option").each(function() {
            if(this.text == data[4]){
                $("#country_id").val(this.value);
            }
        });


        $("#synopsis").val(data[5]);
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

function addItem(list_id){
    $("#table_id").val(list_id);
}

function editItem(list_id){
    $("#item_id").val(list_id);
}

function editList(list_id, list_name, list_description, list_estate){
    $("#list_id").val(list_id);
    
    $("#name_list").val(list_name);
    if(list_estate == 0){
        $('#privacity_list').prop('checked',true);
    }
    else if(list_estate == 1)   
        $('#privacity_list2').prop('checked',true);
    $("#description_list").val(list_description);
}