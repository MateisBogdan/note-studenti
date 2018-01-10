<?php require 'header.php'; 
?>
<html>
    <head>

	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <script src="jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    			<title> Catalog studenti</title>
				
	</head>
	<body>
	<div class="container">
	<table id="note">
	
	<thead >
                       <tr>
							
                           <th> Nota </th>
                           <th> Materie</th>
						   <th>Nume </th>
						  
						   <th>Edit</th>
						   </tr>
						   </thead>

                   <tbody id="note-body">
				   </tbody>
				   </table>
<script>
 $(document).ready(function(){
	$.getJSON("note/read.php",function (data){
		$.each( data, function( key, val ) {
			 $("#note").append("<tr> <td>"  + val.Nota +"</td> <td>"+val.NumeMaterie+"</td> <td>"+val.NumeStudent+"</td> <td> <a id=\"edit\" href=\"update-nota.php?id="+val.ID+"\"> Edit</a></td>");
			
		});
				$("#note").append("</tr>");
			
	});
 });	
	
	
	
</script>