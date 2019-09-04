<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wellcome to Calculator page's </title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <?php include "includes/header1.php" ?> 
    </head>
    <body>
    <?php
 $filters = array('chieudai' => array('filter' => FILTER_VALIDATE_REGEXP,'options' => array('regexp' => '/^[a-z]+$/i')),'chieurong' => array('filter' => FILTER_VALIDATE_REGEXP,'options' => array('min_range' => '/^[a-z]+$/i')));
$clean = filter_input_array(INPUT_POST, $filters);{
       // kiem tra cac dieu kien khi nhap du lieu vao
       $a1 = filter_input(INPUT_POST, 'chieudai', FILTER_VALIDATE_INT);
       $b1 = filter_input(INPUT_POST, 'chieurong', FILTER_VALIDATE_INT);
if ($a1 === false || $b1 ===false) {
print "Submitted a is invalid.";
}	
	else{
	 	 $s = $a1*$b1;
 	 	 echo " <h2> dien tich s la:$s </h2>";
        }
    }
?>
                 
   <h1>Hinh chu nhat</h1>
                <form action="calculator.php" method="post">
	 	 <p>Chieudai: <input type="text" name="chieudai" /></p>
                 <p>Chieurong: <input type="text" name="chieurong"/></p>
	 	 <p><input type="submit" name="submit" value="Calculate!" /></p>
	 </form>

          <?php include "includes/footer1.php" ?> 
        
                 <?php
        // put your code here
?>
    </body>
</html>
