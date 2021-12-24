<h1> Form Validation </h1> 

<form action = "" method = "post"> 
<p> Enter your Name : <input type = "text" name = "name" />  </p> 
<p> Enter your Email : <input type = "text" name = "email" /> </p> 
<p style = "float:left; margin-right:20px;"> <input type = "submit" name = "submit" value = "Validate Form" /> </p> 
<p style = "float:left;"> <input type = "reset" name = "reset" value = "Reset Form" /> </p> 
</form> 

<?php 

//check for form submit 

 if($_SERVER['REQUEST_METHOD'] == 'POST') { 

 class formValidation { 
 var $name; 
 var $email;	  

 // method declaration 
function getData(){ 
    $this-> name = "".$_POST['name'];			  	 	 

    // Validate the name: 
    if (!empty($_REQUEST['name'])) { 
        $this->name = $_REQUEST['name']; 
        echo "Name you entered is  : ". $this->name;	   
    } else {	 	 
        echo '<p class="error" style="color:red; padding-top="200px";>You forgot to enter your name!</p>'; 
    } 

}		 

 // method declaration 

function getEmail() { 

    $this->email = "".$_REQUEST['email'];			  

    //Validating email: 	 
    if (!empty($_REQUEST['email'])) { 
        $this->email = $_REQUEST['email']; 
        echo "<br>"; 
        echo "Email you entered is  : " .$this->email; 
    }else { 
        echo '<p class="error" style="color:red;">You forgot to enter your Email!</p>'; 
    }		  

}

}
// End of class formValidation.   

 // Object creation 
$x = new formValidation(); 

 //calling method 
 $x->getData(); 
 $x->getEmail();   
 }//end of if statement 

?> 