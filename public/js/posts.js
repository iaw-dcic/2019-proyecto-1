$('#like-button').click(function(e){
	e.preventDefault();

	var listid = $(this).attr('lista')

	$.ajax({
		type:'GET',
		url:'/like/'+listid,
		success:function(data){
			$("#likes-number").html(data.content);
		}
	});
});
