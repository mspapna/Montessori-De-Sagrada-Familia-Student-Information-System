<?php
    $conn = mysql_connect("localhost", "root", "ask");
    $db = mysql_select_db("mdsf_student_information_system", $conn);
    session_start();// Starting Session
    // Storing Session
    $user_check=$_SESSION['student_id'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("SELECT * FROM student WHERE student_id='" . $user_check . "'", $conn);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['student_id'];
    $logged_user=$row['student_name'];
    if(!isset($login_session)){
      mysql_close(  $conn); // Closing Connection
      header('Location: student.php'); // Redirecting To Home Page
    }
    
    $sql = "SELECT * FROM student where student_id='". $login_session . "'";
    $result = mysql_query($sql);

    $row = mysql_fetch_row($result);

    if(isset($_POST["submit"]))
{ 
$sql="update student set password='$_POST[password]', gender='$_POST[gender]', address='$_POST[address]', email='$_POST[email_address]', contact_no='$_POST[contact_no]', guardian='$_POST[guardian]' where student_id='$_POST[student_id]'";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
  else
  {
    header('Location: student.php'); 
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

  <?php include_once("templates/template_pageTopLoggedStudent.php"); ?>

  <div id="pageMiddle">
  <section>
    <h3>Student: <?php echo $logged_user; ?></h3>
    <p>You can only edit the fields within the white background.</p>
  </section>
  <?php include_once("student_menu.php"); ?>
		<form action="" method="post">
		<fieldset>
			<legend>Edit only white fields...</legend>
			<label for="student_id">Student Login ID</label>
			<input required type="text"  pattern="\d*"  name="student_id" id="student_id" autocomplete="off" style="background-color: #ECEFF1;" value="<?php echo $row[0]; ?>" autofocus />
			<br/>
			<label for="student_name">Student Name</label>
			<input required type="text" name="student_name" id="student_name" autocomplete="off" style="background-color: #ECEFF1;" value="<?php echo $row[1]; ?>" autofocus />
			<br/> 
			<label for="password">Password</label>
			<input required type="password" name="password" id="password" value="<?php echo $row[2]; ?>" />
			<br/>
			<label for="course">Course</label>
			<select required type="text" name="course" id="course"  style="background-color: #ECEFF1;" >
			  <option selected="selected"><?php echo $row[6]; ?></option>
			  <option>Computer Science</option>
			  <option>Architecture</option>
			  <option>Civil Engineering</option>
			  <option>Electrical Engineering</option>
			</select>
			<br/>
			<label for="year_level">Year Level</label>
			<select required name="year_level" id="year_level" style="background-color: #ECEFF1;" >
			  <option selected="selected"><?php echo $row[7]; ?></option>
			  <option>Freshman</option>
			  <option>Sophomore</option>
			  <option>Junior</option>
			  <option>Senior</option>
			</select>
			<br/>
			<label for="gender">Gender</label>
			<select required name="gender" id="gender" >
			  <option selected="selected"><?php echo $row[3]; ?></option>
			  <option>Male</option>
			  <option>Female</option>
			  <option>Other</option>
			</select>
			<br/>
			<label for="contact_no">Contact No.</label>
			<input required type="text"  pattern="\d*"  name="contact_no" id="contact_no" value="<?php echo $row[5]; ?>" />
			<br/>
			<label for="email_address">Email</label>
			<input required type="email" name="email_address" id="email_address" value="<?php echo $row[9]; ?>" />
			<br/>
			<label for="address">Address</label>
			<textarea required type="text" name="address" id="address" ><?php echo $row[4]; ?></textarea>
			<br/>
			<label for="guardian">Guardian's Name</label>
			<input required type="text" name="guardian" id="guardian" value="<?php echo $row[8]; ?>" />
			<br/>

			
		</fieldset>
		<input name="submit" type="submit" value="Submit" />
  	</form>  
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
