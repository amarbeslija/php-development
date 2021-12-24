<html>

<head>
<meta charset="UTF-8">
<title> Phonebook </title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

	<div id="wrap">
		<div id="search">

		<img src="img/addcontact.png">
		
			<a href="index.php"> <img src="img/phonebookimage.png" height="50px" title="Search"></a>
			<a href="remove.php"> <img src="img/removecontact.png" height="50px" title="Remove contact"> </a>
		
		<form action="#" method="POST">
		
			<label> First name: <br>
		<input type="text" name="fname"> </label><br>
			<label> Last name: <br>
		<input type="text" name="lname"> </label><br>
			<label> Tel: <br>
		<input type="text" name="tel"> </label><br>
		
		<input type="submit" name="insert" value="insert"> <br>
		
		
		</form>
		
		</div>
		
		<div id="message">
		<?php
		
		if(isset($_POST['insert'])) {
			
		if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['tel'])) {
			
			if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])) {
				
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$tel = trim($_POST['tel']);	
			
			require('inc/connect.php');
			
			$fname = mysqli_real_escape_string($conn,$fname);
			$lname = mysqli_real_escape_string($conn,$lname);
			$tel = mysqli_real_escape_string($conn,$tel);
			
			$query = "INSERT INTO contacts(fname, lname, tel ) VALUES ('{$fname}','{$lname}','{$tel}')";
			
			if (mysqli_query($conn,$query) === TRUE){
				echo "New record succesfully created";
			} else {
				echo "Error!";
			}
				
			} else {
				
				echo "All fields must be filled in.";
				
			}
			
		}	else {
			
			echo "All parameters must be sent.";
			
		}
			
		}
		
		?>
		</div>
		
	</div>

</body>

</html>