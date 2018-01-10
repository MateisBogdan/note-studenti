 <?php require 'header.php';

 
 ?>
<fieldset>
	<form  accept-charset="UTF-8" id="update-student" action="#" method="post" enctype="multipart/form-data">
	<p>Nume student</p>
	<input id="nume-student" class="long" type="text" name="nume"><br>
	<p>Grupa</p>
	<input  id="grupa-student" class="long" type="number"  name="Grupa" step=1><br>
	<p>CNP</p>
	<input id="cnp-student" class="long" type="number" name="CNP" > <br>
	<p> Telefon</p>
	<input id="id-student" type="hidden" name="ID">
	<input id="telefon-student" class="long" type="number" name="telefon" > <br>
	<input id="submitted" type="submit" name="Submit" value="Update student">
	
	</fieldset>
	</form>
	
<script>

$(document).ready(function(){
	
	$.getJSON("http://localhost/note%20studenti/student/read_one.php?id="+getParameterByName('id'),function(data){
		  $('#nume-student').val(data.nume);
			$('#grupa-student').val(data.Grupa);
			$('#cnp-student').val(data.CNP);
			$('#telefon-student').val(data.Telefon);
			$('#id-student').val(data.id);
		
		
		
	});
});
$(document).on('submit','#update-student',function(){
	var form_data=JSON.stringify($(this).serializeObject());
	
	$.ajax({
		url:'http://localhost/note%20studenti/student/update.php',
		type:'POST',
		contentType:'application/json',
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





</script>
	