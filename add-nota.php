<?php require 'header.php';

 
 ?>
 <fieldset>
<form  accept-charset="UTF-8" id="add-nota" action="#" method="post" enctype="multipart/form-data">
	<p>Nume materie</p>
	<select name="matID" id="materie-list">
	<option  value="null">Please select materie</option>
	</select><br>
	<p>Nume student</p>
	<select name="stdID" id="student-list">
	<option  value="null">Please select student</option>
	</select> <br>
	<p> Nota</p>
	<input type="number" id="nota" name="nota" min="1" max="10"><br> <br>
	<input type="submit" name="Add nota">
	</form>
	</fieldset>
<script>
$(document).ready(function(){
	
	$.getJSON("http://localhost/note%20studenti/materii/read.php",function(data){
		$.each( data, function( key, val ) {
			 $("#materie-list").append($('<option/>',{
				 value:val.ID,
				 text:val.Nume
			 }));
		});
});
$.getJSON("http://localhost/note%20studenti/student/read.php",function(data){
		$.each( data, function( key, val ) {
			 $("#student-list").append($('<option/>',{
				 value:val.ID,
				 text:val.Nume
			 }));
		});
});
$(document).on('submit',"#add-nota", function(){
	var form_data=JSON.stringify($(this).serializeObject());
	$.ajax({
		url:"http://localhost/note%20studenti/note/create.php",
		type:"POST",
		contentType:'applcation/json',
		data:form_data,
		success : function(result) {
        // product was created, go back to products list
        alert("Succesfully updated");
    },
	error:function(xhr,resp,text){
		console.log(xhr,resp,text);
	}
	});
});

});
</script>