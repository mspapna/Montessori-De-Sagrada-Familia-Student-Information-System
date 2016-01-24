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
$sql="INSERT INTO enroll (subject_id, student_id) VALUES ('$_GET[subject_id]','$_POST[student_id]')";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
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
    <p>Enrolled students in  <b>
    <?php 
      $sql="select subject_name from subject where subject_id='". $_GET['subject_id'] . "'";
      $ses_sql=mysql_query($sql, $conn);
      $row = mysql_fetch_assoc($ses_sql);
      echo $row['subject_name'] . "</b>:"
    ?> </p>
  <?php
    $sql = "SELECT student.student_id, student_name, enroll_id  FROM student JOIN enroll ON  student.student_id = enroll.student_id and enroll.subject_id='". $_GET['subject_id'] . "'";

    $result = mysql_query($sql, $conn);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Student ID</th>
    <th>Name</th>		
    <th>Admin Operations</th>    
  </tr>
  ';
  
if (!mysql_query($sql, $conn))
  {
  die('Error: ' . mysql_error());
  }

     while($row = mysql_fetch_row($result))
      {
         echo "<tr> <td>" . $row[0]. "</td><td>" . $row[1]. "</td><td><a href=success_delete_enroll.php?enroll_id=" . $row[2] . "><span style='color:red;'>Delete</span></a></td></tr>";
      }
      
    echo '</table>';
  ?>


	    <form action="" method="post" style="margin-top: 50px;">
	    <fieldset>
		    <legend >To enroll students, enter a valid student no.</legend>
			<label for="student_id">Student ID</label>
			<input required type="text" name="student_id" id="student_id" autocomplete="off" autofocus />
			<br/>
       
      </fieldset>
	    <input name="submit" type="submit" value="Submit" />
      </form>   
  
  </section>
  <?php include_once("admin_menu.php"); ?>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
