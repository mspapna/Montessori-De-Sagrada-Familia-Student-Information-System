<?php include_once("connection_local.php"); ?>

<?php
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
$sql="INSERT INTO subject (subject_name, semester, section)
VALUES
('$_POST[subject_name]','$_POST[semester]','$_POST[section]')";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
    header('Location: success_create_subject.php'); 
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
    <h4>Create a new subject.</h4>
    
		<form action="" method="post">
		<fieldset>
			<legend>Filling out the needed information for a subject...</legend>
			<label for="subject_name">Subject Name</label>
			<input required type="text" name="subject_name" id="subject_name" autocomplete="off" autofocus />
			<br/>
			<label for="semester">Semester</label>
			<select required type="text" name="semester" id="semester" >
			  <option>First Semester</option>
			  <option>Second Semester</option>
			</select>
			<br/>
			<label for="section">Section</label>
			<input required type="text" name="section" id="section">
			<br/>
			
		</fieldset>
		<input name="submit" type="submit" value="Create A Subject" />
  	</form>
    
  <?php include_once("admin_menu.php"); ?>
  </section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
