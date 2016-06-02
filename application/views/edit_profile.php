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
<h1>Edit <?= $this->session->userdata['first_name'] ?>'s Profile</h1>
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
	<form action="/users/update/<?= $this->session->userdata['id'] ?>" method='post'>
		<fieldset>
			<legend>Edit Information</legend>
			<label>Email Address:</label>
				<input type='email' name='edit_email' value="<?= $this->session->userdata['email'] ?>">
			<label>First Name:</label>
				<input type='text' name='edit_first_name' value="<?= $this->session->userdata['first_name'] ?>">
			<label>Last Name:</label>
				<input type='text' name='edit_last_name' value="<?= $this->session->userdata['last_name'] ?>">
			<input type='submit' value='Save' class='submit_button'>
		</fieldset>
	</form>
	<form action="/users/update_password/<?= $this->session->userdata['id'] ?>" method='post'>
		<fieldset>
			<legend>Change Password</legend>
			<label>New Password:</label>
				<input type='password' name='edit_password' >
			<label>Confirm Password Change:</label>
				<input type='password' name='edit_confirm_password'>
			<input type='submit' value='Update Password' class='submit_button'>
		</fieldset>
	</form>
	<form action='/users/update_description/<?= $this->session->userdata['id'] ?>' method='post'>
		<fieldset id='edit_description'>
			<legend>Edit Description:</legend>
			<input type='text' width='400px' name='edit_description' value="<?= $this->session->userdata['description'] ?>">
			<input type='submit' value='Save' class='submit_button'>
		</fieldset>
	</form>	
</div>
</body>
</html>