
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$("#top-voted").click(function(e){

	e.preventDefault();

	$.ajax({
		type:'GET',
		url:'/topVoted',
		success:function(data){
			$("#most-viewed").removeClass("active");
			$("#new-lists").removeClass("active");
			$("#top-voted").addClass("active");
			$("#content").html(data.content);
		}
	});
});

$("#new-lists").click(function(e){

	e.preventDefault();

	$.ajax({
		type:'GET',
		url:'/newLists',
		success:function(data){
			$("#most-viewed").removeClass("active");
			$("#top-voted").removeClass("active");
			$("#new-lists").addClass("active");
			$("#content").html(data.content);
		}
	});
});
