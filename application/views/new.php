<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add a New User</title>
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
<body>
	<div class='show_header'>
		<ul>
			<li><span class='bold'>Test App</span></span>
			<li><a href="/dashboard">Dashboard</a></li>
			<li><a href="/dashboard/profile">Profile</a></li>
			<li><span class='log_off'><a href="/loginRegister/logoff">Log Off</a></span></li>
		</ul>
	</div>
<div id='new_user_top'>
	<h1>Add a new user</h1>
	<form action='/dashboard' metho='post'>
		<input type='submit' value='Return to Dashboard' class='blue_button'>
	</form>
</div>
<div id="add_new_user">
	<form action='/loginRegister/create_new' method='post'>
		<label>Email Address:</label>
			<input type='email' name='register_email'>
		<label>First Name:</label>
			<input type='text' name='register_first_name'>
		<label>Last Name:</label>
			<input type='text' name='register_last_name'>
		<label>Password:</label>
			<input type='password' name='register_password'>
		<label>Confirm Password:</label>
			<input type='password' name='register_confirm_password'>
			<input type='submit' value='Create' class='submit_button'>
	</form>
</div>
</body>
</html>