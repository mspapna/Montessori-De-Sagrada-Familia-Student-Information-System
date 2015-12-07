<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
      $conn = mysql_connect("localhost","root","ask");
      mysql_select_db("mdsf_student_information_system",$conn);
      $result = mysql_query("SELECT * FROM student WHERE student_id='" . $_POST["student_id"] . "' and password = '". $_POST["password"]."'");
      $row  = mysql_fetch_array($result);
      if(is_array($row)) {
          $_SESSION["student_id"] = $row["student_id"];
          $_SESSION["student_name"] = $row["student_name"];
      } else {
        $message = "Invalid Username or Password!";
      }
    }

    if(isset($_SESSION["student_id"])) {
      header("Location:student.php");
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
					<h1>Student Login</h1>
				</header>
				<form action="" method="post">
					<fieldset>
						<legend>Enter your credentials</legend>
						<label for="student_id">Student Login ID</label>
						<input required type="text" name="student_id" id="student_id" autocomplete="off" autofocus />
						<br/>
						<label for="password">Password</label>
						<input required type="password" name="password" id="password" />
						<br/>
					</fieldset>
					<input type="submit" value="Login" />
				</form>
			</section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
