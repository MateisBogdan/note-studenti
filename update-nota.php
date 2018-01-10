<?php require 'header.php';

 
 ?>
 <fieldset>
<form  accept-charset="UTF-8" id="update-nota" action="#" method="post" enctype="multipart/form-data">
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
	<input type="submit" name="Update nota">
	</form>
	</fieldset>
<script>
	var identifiers;
function get_JSON(){
	$.getJSON("http://localhost/note%20studenti/note/read_one.php?id="+getParameterByName('id'),function(data){
$("#materie-list").val(data.materieID);
$("#student-list").val(data.studentID);
$("#nota").val(data.Nota);
});
}
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
get_JSON();
$(document).on('submit',"#update-nota", function(){
	var form_data=JSON.stringify($(this).serializeObject());
	$.ajax({
		url:"http://localhost/note%20studenti/note/update.php",
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