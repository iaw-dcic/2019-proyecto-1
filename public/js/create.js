     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
		 if(i<10){ //solo se pueden agregar 10 peliculas por lista
		
		  $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+
		  "' type='text' placeholder='Título' class='form-control input-md'  /> </td><td><input  name='Titulo"+i+
		  "' type='text' placeholder='Director'  class='form-control input-md'></td>");

		  $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
		  i++; 
	   }
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});