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
    <p>You're grades are as follows: </p>
  </section>
  <?php include_once("student_menu.php"); ?>
  <?php
    $sql = "SELECT subject_id, grade from enroll WHERE student_id='" . $login_session . "'";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Subject ID</th>
    <th>Subject Name</th>    
    <th>Grade</th>    

  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         $sql = "SELECT subject_name FROM subject WHERE subject_id='" . $row["subject_id"]. "'";
         $result2 = mysql_query($sql);
         $row2 = mysql_fetch_assoc($result2);

         echo "<tr> <td>" . $row["subject_id"]. "</td><td>" . $row2["subject_name"] . "</td><td>" . $row["grade"] . "</td></tr>";
      }
      
      
    echo '</table>';
  ?>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
