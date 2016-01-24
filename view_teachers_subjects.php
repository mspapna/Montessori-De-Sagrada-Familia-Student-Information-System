<?php include_once("connection_local.php"); ?>

<?php
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
    <p>The following are the subjects that you are currently handling: </p>
  </section>
  <?php include_once("teacher_menu.php"); ?>
  <?php
    $sql = "SELECT subject_id FROM assign WHERE teacher_id='" . $login_session . "'";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Subject ID</th>
    <th>Subject Name</th>    
    <th colspan="2">Teacher Operations</th>    

  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         $sql = "SELECT subject_name FROM subject WHERE subject_id='" . $row["subject_id"]. "'";
         $result2 = mysql_query($sql);
         $row2 = mysql_fetch_assoc($result2);

         echo "<tr> <td>" . $row["subject_id"]. "</td><td>" . $row2["subject_name"] . "</td><td><a href=view_student_grades.php?subject_id=" . $row['subject_id'] . "><span style='color:blue;'>View</span></a></td><td><a href=update_student_grades.php?subject_id=" . $row['subject_id'] . "><span style='color:green;'>Update</span></a></td></tr>";
      }
      
    echo '</table>';
  ?>

  </div>
  <?php include_once("templates/template_pageBottom.php"); ?>
</body>
</html>
