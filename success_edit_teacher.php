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


    $sql = "SELECT * FROM teacher where teacher_id='". $_GET['teacher_id'] . "'";
    $result = mysql_query($sql);

    $row = mysql_fetch_row($result);

    if(isset($_POST["submit"]))
{ 
$sql="update teacher set teacher_name='$_POST[teacher_name]', password='$_POST[password]', contact_no='$_POST[contact_no]', email='$_POST[email_address]', address='$_POST[address]' where teacher_id='". $_GET['teacher_id'] . "'";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
    header('Location: success_create_student.php'); 
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
    <h4>Edit teacher profile.</h4>

		<form action="" method="post">
		<fieldset>
			<legend>Edit the following information...</legend>
			<label for="teacher_id">Teacher Login ID</label>
			<input required type="text" name="teacher_id" id="teacher_id" autocomplete="off" value="<?php echo $row[0]; ?>" autofocus />
			<br/>
			<label for="teacher_name">Teacher Name</label>
			<input required type="text" name="teacher_name" id="teacher_name" autocomplete="off" value="<?php echo $row[1]; ?>" />
			<br/>
			<label for="password">Password</label>
			<input required type="password" name="password" id="password" value="<?php echo $row[2]; ?>" />
			<br/>
			<label for="password">Confirm Password</label>
			<input required type="password" name="password" id="password" value="<?php echo $row[2]; ?>" />
			<br/>
			<label for="contact_no">Contact No.</label>
			<input required type="text" name="contact_no" id="contact_no" value="<?php echo $row[4]; ?>" />
			<br/>
			<label for="email_address">Email</label>
			<input required type="email" name="email_address" id="email_address" value="<?php echo $row[5]; ?>" />
			<br/>
			<label for="address">Address</label>
			<textarea required type="text" name="address" id="address"><?php echo $row[3]; ?></textarea>
			<br/>
			
		</fieldset>
		<input name="submit" type="submit" value="Submit" />
  	</form>

    
  <?php include_once("admin_menu.php"); ?>

  </section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
