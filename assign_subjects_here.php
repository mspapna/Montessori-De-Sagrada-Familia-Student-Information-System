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
$sql="INSERT INTO assign (teacher_id, subject_id) VALUES ('$_GET[teacher_id]','$_POST[subject_id]')";

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

  <?php if ($logged_user=$row['admin_name']) {include_once("template_pageTopAdminLogged.php");} ?>
  <div id="pageMiddle">
  <section>
    <h3>Administrator: <?php echo $logged_user; ?></h3>
    <p>Subjects handled by <b>
    <?php 
      $sql="select teacher_name from teacher where teacher_id='". $_GET['teacher_id'] . "'";
      $ses_sql=mysql_query($sql, $conn);
      $row = mysql_fetch_assoc($ses_sql);
      echo $row['teacher_name'] . "</b>:"
    ?> </p>
  <?php
    $sql = "SELECT subject.subject_id, subject_name, section, assign_id FROM subject JOIN assign ON  subject.subject_id = assign.subject_id and assign.teacher_id='". $_GET['teacher_id'] . "'";

    $result = mysql_query($sql, $conn);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Subject ID</th>
    <th>Name</th>		
    <th>Section</th>		 
    <th>Admin Operations</th>    
  </tr>
  ';
  
if (!mysql_query($sql, $conn))
  {
  die('Error: ' . mysql_error());
  }

     while($row = mysql_fetch_row($result))
      {
         echo "<tr> <td>" . $row[0]. "</td><td>" . $row[1]. "</td><td>" . $row[2]. "</td> <td><a href=success_delete_assign.php?assign_id=" . $row[3] . "><span style='color:red;'>Delete</span></a></td></tr>";
      }
      
    echo '</table>';
  ?>


	    <form action="" method="post" style="margin-top: 50px;">
	    <fieldset>
		    <legend >To assign subjects, enter a valid subject id</legend>
			<label for="subject_id">Subject ID</label>
			<input required type="text" name="subject_id" id="subject_id" autocomplete="off" autofocus />
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
