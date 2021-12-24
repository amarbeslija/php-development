<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>A Web Page</title> 
</head> 
<body> 
<form action="" method="post"> 
First Name: <input type="text" name="FName"/> 
Last Name: <input type="text" name="LName"/> 
City:      <input type="text" name="City"/> 
State:     <input type="text" name="State"/> 
Message:   <textarea name="Message" cols="30" rows="5"></textarea> 
<input type="submit" name="submit" value="Submit Data"/> 
</form> 
</body> 
</html>

<?php 

echo "Your First Name is: " . $_POST["FName"] . "<br/>"; 
echo "Your Last Name is: " . $_POST["LName"] . "<br/>"; 
echo "Your City is: " . $_POST["City"] . "<br/>"; 
echo "Your State is: " . $_POST["State"] . "<br/>"; 
echo "<br/>"; 
echo "Your Message is: " . $_POST["Message"]; 

 

?> 