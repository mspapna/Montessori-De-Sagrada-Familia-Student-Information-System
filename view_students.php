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
    <p>The list of students: </p>
  </section>
  <?php include_once("admin_menu.php"); ?>
  <?php
    $sql = "SELECT student_id, student_name, course, year_level FROM student";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Student ID</th>
    <th>Name</th>		
    <th>Course</th>
    <th>Year Level</th>
    <th colspan="2">Admin Operations</th>    
  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         echo "<tr> <td>" . $row["student_id"]. "</td><td>" . $row["student_name"]. "</td><td> " . $row["course"]. "</td><td> " . $row["year_level"]. "</td> <td><a href=success_edit_student.php?student_id=" . $row['student_id'] . "><span style='color:blue;'>Edit</span></a></td><td><a href=success_delete_student.php?student_id=" . $row['student_id'] . "><span style='color:red;'>Delete</span></a></td></tr>";
      }
      
    echo '</table>';
  ?>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
