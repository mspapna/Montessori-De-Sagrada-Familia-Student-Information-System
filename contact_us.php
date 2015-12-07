<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Montessori De Sagrada Familia</title>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>
  <?php include_once("template_pageTop.php"); ?>
  <?php include("connection.php"); ?>
  
  <div id="pageMiddle">
			<section>
				<header>
					<h1>Send us a message</h1>
				</header>
				<form action="forum.cfm" method="post">
					<fieldset>
						<legend>Fill up the following</legend>
						<label for="dob">Name</label>
						<input type="text" name="name" id="name"  />
						<br/>
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email" autocomplete="off"/>
						<br/>
						<label for="dob">Contact No</label>
						<input type="text" name="contact_no" id="contact_no"  />
						<br/>
						<label for="dob">Message</label>
						<textarea required type="text" name="message" id="message"  ></textarea>
						<br/>

					</fieldset>
					

					<input type="submit" value="Send Message" />
				</form>
			</section>
  </div>
  <?php include_once("template_pageBottom.php"); ?>
</body>
</html>
