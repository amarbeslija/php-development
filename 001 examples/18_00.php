<form method="post" action="#"> 

<input type="text" name="username" /> 

<input type="text" name="password" /> 

<input type="submit" value="ok" /> 

</form> 

<?php

$username=$_POST['username']; 

$password=$_POST['password']; 

 

$r = mysqli_query("select * from users where username='$username' and password='$password'");  

if( mysql_num_rows($r)>0) 

{ 

 // authentication successful    

} 

// administrator' -- 
// prazno

// select * from users where username='administrator' -- ' and password = '' 

// &#39; 

// mysqli_real_escape_string("My single quote ' "); 