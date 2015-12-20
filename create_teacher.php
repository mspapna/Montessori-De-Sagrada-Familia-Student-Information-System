<?php
    $conn = mysql_connect("localhost", "root", "ask");
    $db = mysql_select_db("mdsf_student_information_system", $conn);
    session_start();// Starting Session
    // Storing Session
    $user_check=$_SESSION['admin_id'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("SELECT * FROM administrator WHERE admin_id='" . $user_check . "'", $conn);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['admin_id'];
    $logged_user=$row['admin_name'];
    if(!isset($login_session)){
      mysql_close($conn); // Closing Connection
      header('Location: index.php'); // Redirecting To Home Page
    }
    

    if(isset($_POST["submit"]))
{ 
$sql="INSERT INTO teacher (teacher_id,  teacher_name, password, address, email, contact_no)
VALUES
('$_POST[teacher_id]','$_POST[teacher_name]','$_POST[password]','$_POST[address]','$_POST[email_address]','$_POST[contact_no]')";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
    header('Location: success_create_teacher.php'); 
  }
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

  <?php include_once("template_pageTopAdminLogged.php"); ?>
  <div id="pageMiddle">
  <section>
    <h3>Administrator: <?php echo $logged_user; ?></h3>
    <h4>Create a new teacher profile.</h4>

		<form action="" method="post">
		<fieldset>
			<legend>Filling out the needed information for the teacher...</legend>
			<label for="teacher_id">Teacher Login ID</label>
			<input required type="text" pattern="\d*"  name="teacher_id" id="teacher_id" autocomplete="off" autofocus />
			<br/>
			<label for="teacher_name">Teacher Name</label>
			<input required type="text" name="teacher_name" id="teacher_name" autocomplete="off" autofocus />
			<br/>
			<label for="password">Password</label>
			<input required type="password" name="password" id="password" />
			<br/>
			<label for="contact_no">Contact No.</label>
			<input required type="text" pattern="\d*"  name="contact_no" id="contact_no" />
			<br/>
			<label for="email_address">Email</label>
			<input required type="email" name="email_address" id="email_address" />
			<br/>
			<label for="address">Address</label>
			<textarea required type="text" name="address" id="address"></textarea>
			<br/>
			
		</fieldset>
		<input name="submit" type="submit" value="Create Teacher" />
  	</form>

    
  <?php include_once("admin_menu.php"); ?>

  </section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
