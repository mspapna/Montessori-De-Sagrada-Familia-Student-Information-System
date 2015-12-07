<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
      $conn = mysql_connect("localhost","root","ask");
      mysql_select_db("mdsf_student_information_system",$conn);
      $result = mysql_query("SELECT * FROM administrator WHERE admin_id='" . $_POST["admin_id"] . "' and password = '". $_POST["password"]."'");
      $row  = mysql_fetch_array($result);
      if(is_array($row)) {
          $_SESSION["admin_id"] = $row["admin_id"];
          $_SESSION["admin_name"] = $row["admin_name"];
      } else {
        $message = "Invalid Username or Password!";
      }
    }

    if(isset($_SESSION["admin_id"])) {
      header("Location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Montessori De Sagrada Familia</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

    
  <?php include_once("template_pageTop.php"); ?>

  <div id="pageMiddle">
			<section>
				<header>
					<h1>Admin Login</h1>
				</header>
				<form action="" method="post">
				
					<fieldset>
						<legend>Enter your credentials</legend>
						<label for="admin_id">Admin Login ID</label>
						<input required type="text" name="admin_id" id="admin_id" autocomplete="off" />
						<br/>
						<label for="password">Password</label>
						<input required type="password" name="password" id="password" />
						<br/>
					</fieldset>
					<input name="submit" type="submit" value="Login" />
				</form> 
         <?php if($message!="") { echo $message; } ?>
			</section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
