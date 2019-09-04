<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>calendar</title>
    </head>
    <body>
        <?php
        // put your code here
        // Make the months array:
$months = array (1 => 'January','February', 'March', 'April', 'May','June', 'July', 'August', 'September','October', 'November', 'December');
// Make the months pull-down menu:
 echo '<select name="month">';
 foreach ($months as $key => $value) {
	 	 echo "<option value=\"$key\">$value</option>\n";
	 }
         echo '</select>';
         echo '<select name ="day">';
for ($day = 1; $day <= 31; $day++) {
echo "<option value=\"$day\">$day</option>\n";
 }
  
        ?>
    </body>
</html>
