<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Register for Test App</title>
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
	<div class='show_header'>
		<ul>
			<li><span class='bold'>Test App</span></span>
			<li><a href="/">Home</a></li>
			<li><span class='log_off'><a href="/loginRegister">Sign In</a></span></li>
		</ul>
	</div>
<h1>Register</h1>
<span class='red'>
<?php
  if ($this->session->flashdata("registration_error")) 
    {
      echo $this->session->flashdata("registration_error");
    }
?></span>
<div id="register">
	<form action='/loginRegister/register' method='post'>
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
			<input type='submit' value='Register' class='submit_button'>
	</form>
	<a href="/welcome/start">Already have an account? Sign in</a>
</div>
</body>
</html>