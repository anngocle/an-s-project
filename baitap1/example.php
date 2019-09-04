<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        echo "Today is " . date("Y/m/d") . "<br>";
        // create months array()
$months = array (1 => 'January','February', 'March', 'April', 'May','June', 'July', 'August', 'September','October', 'November', 'December');
//Make the days and years arrays:
$days = range(1,31);
$years = range(2011,2031);
// Make the months pull-down menu:
echo '<select name="month">';
foreach ($months as $key =>$value){
    echo "<option value=\"$key\">$value</option>\n";
}
echo '</select>';
// Make the days pull-down menu:
echo '<select name="day">';
 foreach ($days as $value) {
 echo "<option value=\"$value\">$value</option>\n";
 }
 echo '</select>';
   // Make the years pull-down menu:
	 echo '<select name="year">';
         foreach ($years as $value) {
 echo "<option value=\"$value\">$value</option>\n";
 }
echo '</select>';      
   
// Create one array:
 $mexico = array('YU' => 'Yucatan','BC' => 'Baja California','OA' => 'Oaxaca');
 // Create another array:
$us = array ('MD' => 'Maryland','IL' => 'Illinois','PA' => 'Pennsylvania','IA' => 'Iowa');
// Combine the arrays:
$n_america = array('Mexico' => $mexico,'United States' => $us);
// Loop through the countries:
foreach ($n_america as $country =>$list) {
	// Print a heading:
	echo "<h2>$country</h2><ul>";
	 // Print each state, province, or territory:
foreach ($list as $k => $v) {
	echo "<li>$k - $v</li>\n";
	 	 }
	 	 // Close the list:
	 	 echo '</ul>';
	
	 } // End of main FOREACH
 $name = array('an','ban','long');
 sort($name);// săp xep theo thu tư abc
 $dem =count($name);
 echo $dem;
 foreach ($name as $value){
     echo "$value <br>";
 }
 echo " wellcome , le ngoc an github";
 
        ?>
    </body>
</html>
