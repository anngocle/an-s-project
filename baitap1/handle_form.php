<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
<style>
label {
font-weight: bold;
color: #300ACC;
}
</style>
    </head>
    <body>
 

        <?php
        
    // collect value of input field
    
          # Script 2.2 - handle_form.php
        // put your code here 
       
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = htmlspecialchars($_REQUEST['name']); 
    //validate the name
    if (empty($_REQUEST['name'])) 
        {
         $name = NULL;
	 echo '<p class="error">You forgot to enter your name!</p>';
        } 
    else {
	
         $name = $_REQUEST['name'];
	 }
   
    $email = htmlspecialchars($_REQUEST['email']);
    //validate the email
    
	 if (!empty($_REQUEST['email'])) {
	 	 $email = $_REQUEST['email'];
            if (strpos($_REQUEST['email'], '@') === false) {
                print 'There was no @ in the e-mail address!';
                    }  
                    else{
                        echo 'email is valid ';
                    }
	 } else {
	 	 $email = NULL;
	 	 echo '<p class="error">You forgot to enter your email address!</p>';
	 }
	
    //validate comment
    $comments = htmlspecialchars($_REQUEST['comments']);
    if (!empty($_REQUEST['comments'])) {
	 	 $comments = $_REQUEST['comments'];
	 } else {
	 	 $comments = NULL;
	 	 echo '<p class="error">You forgot to enter your comments!</p>';
	 }
    
         // vilidate gender
    # Before the echo statement, add a conditional that creates a $gender variable
         if(isset($_REQUEST['gender'])){
             $gender =$_REQUEST['gender'];
             if ($gender=='M'){
                 echo '<p> Dir Sir </p>';
             }
             elseif($gender=='F'){
                 echo '<p> dir Madam </p>';
             }
         }
         else { // $_REQUEST['gender'] is not set.
	 	 $gender = NULL;
	 	 echo '<p class="error">You forgot to select your gender!</p>';
	 } 
    // if everything is ok, print the message
         if($name && $email && $gender && $comments){
          echo "<p>Thank you, <b>$name</b>,for the following comments:<br />
	 <tt>$comments</tt></p>
	 <p>We will reply to you at<i>$email</i>.</p>\n";  
         }
         else { // Missing form value.
	 echo '<p class="error">Please go back and fill out the form again.</p>';
	 }

}
     ?>
   
 <form action="handle_form.php" method="post">    
        <fieldset>
            <legend><Strong>Input information</strong> </legend>
<p><label>Name: <input type= "text" name="name" size="20" maxlength="40" /></label></p>
<p><label>Email Address: <input type="text" name="email" size="40" maxlength="60" /> </label></p>
<p><b>Gender</b></p>
<input type="radio" name="gender" value="male" checked> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<p><label>Age:
<select name="age">
<option value="0-29">Under 30 </option>
<option value="30-60">Between 30 and 60</option>
<option value="60+">Over 60 </option>
</select></label></p>
<p><label>Comments: <textarea name="comments" rows="3" cols="40"></textarea></label></p>
 <p align="left"><input type="submit" name="submit" value= "Submit My Information" /></p>
        </fieldset>

    </form>
    
        
    </body>
    
    
    
</html>
