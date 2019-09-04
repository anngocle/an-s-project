<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>learn to php </title>
        <style>
           .cities {
  background-color: black;
  color: white;
  margin: 20px;
  padding: 20px;
} 
</style> 
            
    </head>
    <body>
       

<form action="/action_page.php" method ="post">
  First name:<br>
  <input type="text" name="name" value="" size="20" maxlength="40">
  <br>
  Email address:<br>
  <input type="text" name="email" value="" size="40" maxlength="60">
  <br>
  <h2>Gender</h2>
  <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other  
  
  <p><label>Age:
<select name="age">
<option value="0-29">Under 30 </option>
<option value="30-60">Between 30 and 60</option>
<option value="60+">Over 60 </option>
</select></label></p>
<p><label>Comments: <textarea name="comments" rows="3" cols="40"></textarea></label></p>
  <br>
  <input type="submit" name ="submit" value="Apply">
</form> 
        <?php
        // put your code here
        // Validate the name:
        if (!empty($_REQUEST['name'])) {
	 	 $name = $_REQUEST['name'];
	 } else {
	 	 $name = NULL;
	 	 echo '<p class="error">You forgot to enter your name!</p>';
	 }
         // Validate the email:
	 if (!empty($_REQUEST['email'])) {
	 	 $email = $_REQUEST['email'];
	 } else {
	 	 $email = NULL;
	 	 echo '<p class="error">You forgot to enter your email address!</p>';
	 }
	
	 // Validate the comments:
	 if (!empty($_REQUEST['comments'])) {
	 	 $comments = $_REQUEST['comments'];
	 } else {
	 	 $comments = NULL;
	 	 echo '<p class="error">You forgot to enter your comments!</p>';
	 }
	
	 // Validate the gender:
	 if (isset($_REQUEST['gender'])) {
	
	 	 $gender = $_REQUEST['gender'];
         }
	 	else { // $_REQUEST['gender'] is not set.
	 	 $gender = NULL;
	 	 echo '<p class="error">You forgot to select your gender!</p>';
	 }
         // Print a message based upon the gender value:
	 	 if ($gender == 'M') {
	 	 	 echo '<p><b>Good day, Sir!</b></p>';
	 	 } elseif ($gender == 'F') {
	 	 	 echo '<p><b>Good day, Madam!</b></p>';
	 	 } else { // Unacceptable value.
	 	 	 
	 	 	 echo '<p class="error">Gender should be either "M" or "F"!</p>';
	 	 }
	 	
	 
	
	 // If everything is OK, print the message:
	 if ($name && $email && $gender && $comments) {
	
	 	 echo "<p>Thank you, <b>$name</b>, for the following comments:<br />
	 	 <tt>$comments</tt></p>
	 	 <p>We will reply to you at <i>$email</i>.</p>\n";
	 	
	 } else { // Missing form value.
	 	 echo '<p class="error">Please go back and fill out the form again.</p>';
	 }
$months = array (1 => 'January','February', 'March', 'April', 'May','June', 'July', 'August', 'September','October', 'November', 'December');
$days = range(1,31);
$years = range(2011,2021);

// create put down menu
echo '<select name="month">';
foreach ($months as $key =>$value) {
echo "<option value=\"$key\">$value</option>\n";
}
echo '</select>';

// Generate the day and year pull-down menus:
    echo '<select name="day">';
    for ($day = 1; $day <= 31; $day++) {
 echo "<option value=\"$day\">$day</option>\n";
 }
	 echo '</select>';
//foreach ($days as $value) {
//echo "<option value=\"$value\"> $value</option>\n";
//}echo '</select>';

// Generate years 
echo '</select>';
echo '<select name="year">';
foreach ($years as $value) {
echo "<option value=\"$value\"> $value</option>\n";
}
echo '</select>';
        ?>
    </body>
</html>
