<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
  <title>Welcome to Test App</title>
</head>
<body>
	<div class='show_header'>
		<ul>
			<li><span class='bold'>Test App</span></span>
			<li><a href="/">Home</a></li>
			<li><span class='log_off'><a href="/loginRegister">Sign In</a></span></li>
		</ul>
	</div>
<div id="welcome_header">
	<h1>Welcometo the Test</h1>
	<h4>We're going to build a cool app using an MVC Framework! This application was built with the Village88 folks!</h4>
	<form action='/welcome/start' method='post'>
		<input type='submit' value='Start' class="blue_button">
	</form>
</div>
<div id="welcome_description">
	<div id="description_manage">
		<h3>Manage Users</h3>
		<p>Using this application, you'll learn how to add, remove, and edit users for the application</p>
	</div>
	<div id="description_leave">
		<h3>Leave messages</h3>
		<p>Users will be able to leave a message to another user using this application.</p>
	</div>
	<div id="description_edit">
		<h3>Edit User Information</h3>
		<p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
	</div>
</div>
</body>
</html>