<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
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
<div id='edit_top'>
<h1>Edit User #<?= $user['id'] ?></h1>
<form action='/dashboard' method='post'>
	<input type='submit' value='Return to Dashboard' class='blue_button'>
</form>
</div>
<span class='red'>
<?php
  if ($this->session->flashdata("edit_error")) 
    {
      echo $this->session->flashdata("edit_error");
    }
?></span>
<div id='edit'>
	<form action="/users/update/<?= $user['id'] ?>" method='post'>
		<fieldset>
			<legend>Edit Information</legend>
			<label>Email Address:</label>
				<input type='email' name='edit_email' value="<?= $user['email'] ?>">
			<label>First Name:</label>
				<input type='text' name='edit_first_name' value="<?= $user['first_name'] ?>">
			<label>Last Name:</label>
				<input type='text' name='edit_last_name' value="<?= $user['last_name'] ?>">
			<label>User Level:</label>
				<select name='edit_user_level'>
					<option value='Normal'>Normal</option>
					<option value='Admin'>Admin</option>
				</select>
			<input type='submit' value='Save' class='submit_button'>
		</fieldset>
	</form>
	<form action="/users/update_password/<?= $user['id'] ?>" method='post'>
		<fieldset>
			<legend>Change Password</legend>
			<label>New Password:</label>
				<input type='password' name='edit_password' >
			<label>Confirm Password Change:</label>
				<input type='password' name='edit_confirm_password'>
			<input type='submit' value='Update Password' class='submit_button'>
		</fieldset>
	</form>
</div>
</body>
</html>