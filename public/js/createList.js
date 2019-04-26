$("#addItemButton").click(function(e){
	e.preventDefault();
	$("#items").append("<div><input type='text' name='item_name[]' placeholder='item name'><button type='delete-input'>-</button><br></div>");
});

$(document).on('click', 'button[type="delete-input"]', function(e){
	$(this).parent().remove();
});

/*
$(document).on('click', 'button[type="delete-item"]', function(e){

	e.preventDefault();

	$.ajax({
		type:'DELETE',
		url:'/topVoted',
		success:function(data){
			$("#most-viewed").removeClass("active");
			$("#new-lists").removeClass("active");
			$("#top-voted").addClass("active");
			$("#content").html(data.content);
		}
	});
});*/
