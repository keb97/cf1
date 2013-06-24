<!DOCTYPE html>
<html>
<head>
<title>Code Fellows HTML task</title>
</head>
<body>
<form method = "post" action = "cfhtmltask.php">
Todo: <input type="text" name ="newtodo" id="newtodo">
<input type="submit" name="formSubmit" value="Submit"><br>
</form>

<?php

if (!file_exists("todo.csv")){
	fclose(fopen("todo.csv","wb"));
}

$todos = $_POST["newtodo"]; 

if (isset($_GET["td"])){
	$csvDeleteString = file_get_contents("todo.csv");
	$todoArray = explode("\n", $csvDeleteString);
	$csvToWrite = fopen("todo.csv","wb");
	foreach ($todoArray as $todoline){
		if ($todoline!=$_GET["td"] And $todoline!=""){
			fwrite($csvToWrite, "\n$todoline");
		}
	}
	fclose($csvToWrite);
}

if (isset($todos)){
	$csvTodos = fopen("todo.csv","ab"); 
	fwrite($csvTodos,"\n$todos");
	fclose($csvTosos);
}


$csvTodosr = fopen("todo.csv", "r");

while (!feof($csvTodosr)){
	$newestTodo = fgets($csvTodosr);
	print "<a href=\"cfhtmltask.php?td=$newestTodo\" style=\"text-decoration:none\"><font color = \"000000\">$newestTodo</font></a><br>";
}

fclose($csvTodosr);


?>


</body>
</html>