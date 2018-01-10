<!DOCTYPE html>
<html>
    <head>

	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <script src="jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<title> Student grades management</title>
				<ul class="test">
	<li class="test"><a class="test" href="index.php">Main page </a></li>
   <li class="test"><a class="test" href="add-nota.php">Adauga Nota</a></li>
    <li class="test"><a class="test" href="catalog.php">Note</a></li>
    <li class="test"><a class="test" href="add-materie.php">Adauga Materii</a></li>
	<li class="test"><a class="test" href="add-student.php">Adauga Student</a></li>
	</ul>
	</head>
	<script>
	$.fn.serializeObject = function(){
    var json = {};
    var data = this.serializeArray();
    $.each(data, function() {
        if (json[this.name] !== undefined) {
            if (!json[this.name].push) {
                json[this.name] = [json[this.name]];
            }
            json[this.name].push(this.value || '');
        } else {
            json[this.name] = this.value || '';
        }
    });
    return json;
};
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
</script>