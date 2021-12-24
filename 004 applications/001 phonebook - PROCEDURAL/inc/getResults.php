<?php

require("connect.php");

if(isset($_GET['criteria'])) {
	
	
	if(!empty($_GET['criteria'])) {
		
		$criteria = trim($_GET['criteria']);
		$criteria = mysqli_real_escape_string($conn,$criteria);
		$query = "SELECT * FROM contacts WHERE fname LIKE '%{$criteria}%' OR lname LIKE '%{$criteria}%'";
		
		$result  = mysqli_query($conn,$query);
		
				if(mysqli_num_rows($result)>0){
					
					while($row = mysqli_fetch_assoc($result)) {
						
						?>
						
						<div id="result">
						<img src="img/user.png">
						<p><b>Name: </b> <?php echo $row['fname'] . " " . $row['lname']; ?> </p>
					<p><b>Tel: </b> <?php echo $row['tel']; ?> </p>
						
						</div>
						
						
						<?php
					}
					
					echo "Number of results: " . mysqli_num_rows($result);
					
				} else {
					
					echo "No results";
					
				}
		
		
		
	}else {
		
		echo "Criteria is empty";
		
	}
	
	
}

?>