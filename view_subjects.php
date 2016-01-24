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
    <p>The list of subjects: </p>
  </section>
  <?php include_once("admin_menu.php"); ?>
  <?php
    $sql = "SELECT subject_id, subject_name, semester, section FROM subject";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Subject ID</th>
    <th>Name</th>		
    <th>Semester</th>
    <th>Section</th>
    <th colspan="3">Admin Operations</th>    
  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         echo "<tr> <td>" . $row["subject_id"]. "</td><td>" . $row["subject_name"]. "</td><td> " . $row["semester"]. "</td><td> " . $row["section"]. "</td> <td><a href=success_edit_subject.php?subject_id=" . $row['subject_id'] . "><span style='color:blue;'>Edit</span></a></td><td><a href=success_delete_subject.php?subject_id=" . $row['subject_id'] . "><span style='color:red;'>Delete</span></a></span></td><td><a href=enroll_students_here.php?subject_id=" . $row['subject_id'] . "><span style='color:green;'>Enroll Students Here</span></a></span></td></tr>";
      }
      
    echo '</table>';
  ?>

  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
