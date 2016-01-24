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
    <p>The list of teachers: </p>
  </section>
  <?php include_once("admin_menu.php"); ?>
  <?php
    $sql = "SELECT teacher_id, teacher_name, contact_no, email FROM teacher";
    $result = mysql_query($sql);

    echo '<table style="width:100%; background-color:#fff;">
  <tr>
    <th>Teacher ID</th>
    <th>Name</th>		
    <th>Contact Number</th>
    <th>Email</th>
    <th colspan="3">Admin Operations</th>    
  </tr>
  ';
     while($row = mysql_fetch_array($result))
      {
         echo "<tr> <td>" . $row["teacher_id"]. "</td><td>" . $row["teacher_name"]. "</td><td> " . $row["contact_no"]. "</td><td> " . $row["email"]. "</td> <td><a href=success_edit_teacher.php?teacher_id=" . $row['teacher_id'] . "><span style='color:blue;'>Edit</span></a></td><td><a href=success_delete_teacher.php?teacher_id=" . $row['teacher_id'] . "><span style='color:red;'>Delete</span></a></span></td><td><a href=assign_subjects_here.php?teacher_id=" . $row['teacher_id'] . "><span style='color:green;'>Assign Subjects Here</span></a></span></td></tr>";
      }
      
    echo '</table>';
  ?>

  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
