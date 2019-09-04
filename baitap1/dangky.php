<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name =viewport" content="width=device-width, initial-scale=1">
        <title>Trang dang ky thanh vien</title>
         
    </head>
    <?php require_once("includes/dbconnect.php"); ?>
    <body>
      <style>
  .header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
.error {color: #FF0000;}
input[type=text], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 7%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  
}
input[type=submit]:hover {
  background-color: #45a049;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div class="header">
  <h1>CHÀO MỪNG TỚI TRANG ĐĂNG KÝ THÀNH VIÊN </h1>
  <?php
 
if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["Username"];
		$password = $_POST["Password"];
		$name = $_POST["Hovaten"];
		$email = $_POST["Email"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $name == "" || $email == "") {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{

   $sql = "INSERT INTO users(username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
			// thực thi câu $sql với biến conn lấy từ file dbconnect.php
			mysqli_query($conn,$sql);
			echo "Chúc mừng bạn đã đăng ký thành công";
   }
}
  
  ?>


  
	<div>
         
            <form action="dangky.php" method="post">
    <label for="uname">Username</label>
    <input type="text" id="fname" name="Username" placeholder="Your name..">
  
    <br>
    <label for="pword">Password</label>
    <input type="text" id="pword" name="Password" placeholder=" Password.. ">
  
    <br>
    <label for="hten">Hovaten</label>
    <input type="text" id="hten" name="Hovaten" placeholder=" ten.. ">
    
    <br>
    <label for="email">Email</label>
    <input type="text" id="email" name="Email" placeholder=" ten@vn.vn.. ">
  
    <br>
     <input type="submit" name ="btn_submit" value="Submit">
     </div>
     
        <?php
       
       

        ?>
    </body>
</html>