<?php include_once("connection_local.php"); ?>
<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
      $result = mysql_query("SELECT * FROM teacher WHERE teacher_id='" . $_POST["teacher_id"] . "' and password = '". $_POST["password"]."'");
      $row  = mysql_fetch_array($result);
      if(is_array($row)) {
          $_SESSION["teacher_id"] = $row["teacher_id"];
          $_SESSION["teacher_name"] = $row["teacher_name"];
      } else {
        $message = "Invalid Username or Password!";
      }
    }

    if(isset($_SESSION["teacher_id"])) {
      header("Location:teacher.php");
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
					<h1>Teacher Login</h1>
				</header>
				<form action="" method="post">
					<fieldset>
						<legend>Enter your credentials</legend>
						<label for="teacher_id">Teacher Login ID</label>
						<input required type="text" name="teacher_id" id="teacher_id" autocomplete="off" />
						<br/>
						<label for="password">Password</label>
						<input required type="password" name="password" id="password"/>
						<br/>
					</fieldset>
					<input type="submit" value="Login" />
				</form>

			</section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
