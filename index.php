<?php 
require "header.php";
/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "student/read.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

$output = curl_exec($ch);
curl_close($ch);
echo "<pre>$output</pre>";*/

 
 ?>
   
	<body>
	<div class="container">
	<table id="students">
                   <thead >
                       <tr>
							
                           <th> Nume </th>
                           <th> Grupa</th>
						   <th>CNP </th>
						   <th> Telefon </th>
							<th> Del				   </th>
							<th> Edit </th>
                       </tr>
                   </thead>

                   <tbody>
				   </tbody>
				   </table>
 <script>
var items=[]; 

 $(document).ready(function(){
		$.getJSON("student/read.php",function (data){
			$.each( data, function( key, val ) {
				 $("#students").append( "<tr> <td>"  + val.Nume + "</td>" + "<td>"  + val.Grupa + "</td>" 
				 + "<td>"  + val.CNP + "</td>" + "<td>"  + val.Telefon + "</td>" + "<td> <a id=\"delete\" href=\"#\"onclick=DeleteS("+val.ID+ ")> Delete </a></td>" + "<td> <a id=\"edit\" href=\"update-student.php?id="+val.ID+"\"> Edit</a></td>");

				
				 
			});
			
				$("#students").append("</tr>");
			});
 });
 
function DeleteS(identifier){
	var id= identifier;
	$.ajax({
        url: "http://localhost/note%20studenti/student/delete.php",
        type : "POST",
        dataType : 'json',
		data: JSON.stringify({ID: id}),
		success: function(result){
			alert("Sucessfully deleted student");
			
		},
		error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
			alert(JSON.stringify({ID: id}));
		}
	});
}

 </script>
 </div>
 </body>