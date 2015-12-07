<?php
$con = mysql_connect("ap-cdbr-azure-southeast-a.cloudapp.net","bd9d1c39befab0","e280e9ea");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("studentinfo", $con);
?>
