<?php include_once("connection_local.php"); ?>

<?php
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
    <h3>Welcome <?php echo $logged_user; ?>!</h3>
    <p>Choose an operation at the side. </p>
  </section>
  <?php include_once("student_menu.php"); ?>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
