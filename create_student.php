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
$sql="INSERT INTO student (student_id,  student_name, password, year_level, course, gender, address, email, contact_no, guardian)
VALUES
('$_POST[student_id]','$_POST[student_name]','$_POST[password]','$_POST[year_level]','$_POST[course]','$_POST[gender]','$_POST[address]','$_POST[email_address]','$_POST[contact_no]','$_POST[guardian]')";

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
    <h4>Create a new student profile.</h4>

		<form action="" method="post">
		<fieldset>
			<legend>Filling out the needed information for the student...</legend>
			<label for="student_id">Student Login ID</label>
			<input required type="text"  pattern="\d*"  name="student_id" id="student_id" autocomplete="off" autofocus />
			<br/>
			<label for="student_name">Student Name</label>
			<input required type="text" name="student_name" id="student_name" autocomplete="off" autofocus />
			<br/> 
			<label for="password">Password</label>
			<input required type="password" name="password" id="password" />
			<br/>
			<label for="course">Course</label>
			<select required type="text" name="course" id="course"  >
			  <option>Computer Science</option>
			  <option>Architecture</option>
			  <option>Civil Engineering</option>
			  <option>Electrical Engineering</option>
			</select>
			<br/>
			<label for="year_level">Year Level</label>
			<select required name="year_level" id="year_level" >
			  <option>Freshman</option>
			  <option>Sophomore</option>
			  <option>Junior</option>
			  <option>Senior</option>
			</select>
			<br/>
			<label for="gender">Gender</label>
			<select required name="gender" id="gender" >
			  <option>Male</option>
			  <option>Female</option>
			  <option>Other</option>
			</select>
			<br/>
			<label for="contact_no">Contact No.</label>
			<input required type="text"  pattern="\d*"  name="contact_no" id="contact_no" />
			<br/>
			<label for="email_address">Email</label>
			<input required type="email" name="email_address" id="email_address" />
			<br/>
			<label for="address">Address</label>
			<textarea required type="text" name="address" id="address"></textarea>
			<br/>
			<label for="guardian">Guardian's Name</label>
			<input required type="text" name="guardian" id="guardian" />
			<br/>

			
		</fieldset>
		<input name="submit" type="submit" value="Create Student" />
  	</form>

  <?php include_once("admin_menu.php"); ?>

  </section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
