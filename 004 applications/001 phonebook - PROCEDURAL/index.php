<html>

<head>
<meta charset="UTF-8">
<title> Phonebook </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

	<div id="wrap">
		<div id="search">

		<img src="img/phonebookimage.png">
		
			<a href="insert.php"> <img src="img/addcontact.png" height="50px" title="Add new contact"></a>
			<a href="remove.php"> <img src="img/removecontact.png" height="50px" title="Remove contact"> </a>
		
		<form action="#" method="GET">
		<input type="text" placeholder="Search phonebook" name="criteria">
		<input type="submit" value="Search"> <br>
		</form>
		
		</div>

	<?php 
	
	include("inc/getResults.php");
	
	?>

	</div>

</body>

</html>