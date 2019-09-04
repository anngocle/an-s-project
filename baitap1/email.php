<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gửi Email</title>
    </head>
    <body>
        <?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {       // put your code here
     // Minimal form validation:
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['comments']) ) {   
    // Create the body:
        $body = "Name: {$_POST['name']}\n \nComments: {$_POST['comments']}";
        // Make it no longer than 80 characters long:
        $body = wordwrap($body, 80);
        // Send the email:
        mail('anngocle411@gmail.com','Contact Form Submission',$body, "From: {$_POST['email']}");
        // Print a message:
	 echo '<p><em>Thank you for contacting me. I will reply some day.</em></p>';	
	 	 	 // Clear $_POST (so that the form's not sticky):
 	  $_POST = array( );
 	
    } else {
 echo '<p style="font-weight: bold;color: #C00">Please fill out the form completely.</p>';
      }
    
}
      ?>
        
<p><h2>Please fill out this form to contact me</h2></p>
<form action="email.php" method="post">
<p>Name: <input type="text" name="name" size="30" maxlength="60" value="<?php if (isset($_POST['name']))
echo $_POST['name']; ?>" /></p>
<p>Email Address: <input type="text" name="email" size="30" maxlength="80" value="<?php if (isset($_POST['email']))
echo $_POST['email']; ?>" /></p>
<p>Comments: <textarea name="comments" rows="5" cols="30"><?php if (isset($_POST['comments'])) echo $_POST	
['comments']; ?></textarea></p>
 <p><input type="submit" name="submit"
value="Send!" /></p>
	 </form>
    </body>
</html>
