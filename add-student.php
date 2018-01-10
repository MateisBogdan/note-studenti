 <?php require 'header.php';

 
 ?>
<fieldset>
	<form  accept-charset="UTF-8" action="student/create.php" method="post" enctype="multipart/form-data">
	<p>Nume student</p>
	<input class="long" type="text" name="nume"><br>
	<p>Grupa</p>
	<input class="long" type="number"  name="Grupa" step=1><br>
	<p>CNP</p>
	<input class="long" type="number" name="CNP" > <br>
	<p> Telefon</p>
	<input class="long" type="number" name="telefon" > <br>
	<input type="submit" name="Submit" value="Create student">
	
	</fieldset>
	</form>