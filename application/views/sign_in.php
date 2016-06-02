<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sign in to Test App</title>
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
<h1>Sign in!</h1>
<span class=red>
<?php
  if ($this->session->flashdata("login_error")) 
    {
      echo $this->session->flashdata("login_error");
    }
?></span>
<div id="signin">
	<form action='/loginRegister/login' method='post'>
		<label>Email Address:</label>
			<input type='email' name='login_email'>
		<label>Password:</label>
			<input type='password' name='login_password'>
			<input type='submit' value='Sign In' id='signin_button' class='submit_button'>
	</form>
	<a href="/welcome/register">Don't have an Account? Register here</a>
</div>
</body>
</html>