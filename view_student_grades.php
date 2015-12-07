<?php
    $conn = mysql_connect("localhost", "root", "ask");
    $db = mysql_select_db("mdsf_student_information_system", $conn);
    session_start();// Starting Session
    // Storing Session
    $user_check=$_SESSION['teacher_id'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysql_query("SELECT * FROM teacher WHERE teacher_id='" . $user_check . "'", $conn);
    $row = mysql_fetch_assoc($ses_sql);
    $login_session =$row['teacher_id'];
    $logged_user=$row['teacher_name'];
    if(!isset($login_session)){
      mysql_close(  $conn); // Closing Connection
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

  <?php include_once("templates/template_pageTopLoggedTeacher.php"); ?>

  <div id="pageMiddle">
  <section>
    <h3>Teacher: <?php echo $logged_user; ?></h3>
    <?php 
        $sql = "SELECT subject_name FROM subject WHERE subject_id='" . $_GET["subject_id"] . "'";
        $result = mysql_query($sql);    
        $row = mysql_fetch_assoc($result)
     ?>
    <p>The following are the grades of the students for the subject: <b><?php echo $row["subject_name"]; ?></b></p>
  </section>
  <?php include_once("teacher_menu.php"); ?>
  <?php
    $sql = "SELECT student_id FROM enroll WHERE subject_id='" . $_GET["subject_id"] . "'";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Student ID</th>
    <th>Student Name</th>    
    <th>Grade</th>    

  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         $sql = "SELECT student_name FROM student WHERE student_id='" . $row["student_id"]. "'";
         $result2 = mysql_query($sql);
         $row2 = mysql_fetch_assoc($result2);

         $sql = "SELECT grade FROM enroll WHERE subject_id='" . $_GET["subject_id"] . "' AND student_id='" . $row["student_id"] . "'";
         $result3 = mysql_query($sql);
         $row3 = mysql_fetch_assoc($result3);

         echo "<tr> <td>" . $row["student_id"]. "</td><td>" . $row2["student_name"] . "</td><td>" . $row3["grade"] . "</td></tr>";
      }
      
      
    echo '</table>';
  ?>

  </div>
  <?php include_once("templates/template_pageBottom.php"); ?>
</body>
</html>
