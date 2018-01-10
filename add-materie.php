<?php require 'header.php';

 
 ?>
<fieldset>
<form  accept-charset="UTF-8" id="add-materie" action="#" method="post" enctype="multipart/form-data">
	<p>Nume materie</p>
	<input id="nume-materie" class="long" type="text" name="nume"><br>
	<input id="add" name="Add materie" type="submit">
	</form>
	</fieldset>
	<script>
	$(document).on('submit','#add-materie',function(){
	var form_data=JSON.stringify($(this).serializeObject());
	
	$.ajax({
		url:'http://localhost/note%20studenti/obiecte/add-materie.php',
		type:'POST',
		contentType:'application/json',
		data:form_data,
		 success : function(result) {
        // product was created, go back to products list
        alert("Succesfully added");
    },
	error:function(xhr,resp,text){
		console.log(xhr,resp,text);
	}
		
	});
});
</script>