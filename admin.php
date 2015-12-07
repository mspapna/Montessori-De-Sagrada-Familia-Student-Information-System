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

  <?php include_once("template_pageTopAdminLogged.php"); ?>
  <div id="pageMiddle">
  <section>
    <h3>Welcome <?php echo $logged_user; ?>!</h3>
    <p>Choose an operation at the side. </p>
  </section>
  <?php include_once("admin_menu.php"); ?>
  </div>
  <?php include_once("templates/template_pageBottom.php"); ?>
</body>
</html>
