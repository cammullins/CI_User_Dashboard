<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
  <title>Your Test App Profile Page</title>
</head>
<body>
<div class='show_header'>
	<ul>
		<li><span class='bold'>Test App</span></span>
		<li><a href="/dashboard">Dashboard</a></li>
		<li><a href="/users/edit_profile">Edit My Profile</a></li>
		<li><span class='log_off'><a href="/loginRegister/logoff">Log Off</a></span></li>
	</ul>
</div>
	<h2><?= $this->session->userdata['first_name'] . " " . $this->session->userdata['last_name'] ?></h2>
	<table>
		<tbody>
			<tr>
				<td>Registered at:</td>
				<td><?= $this->session->userdata['created_at'] ?></td>
			</tr>
			<tr>
				<td>User ID:</td>
				<td>#<?= $this->session->userdata['id'] ?></td>
			</tr>
			<tr>
				<td>Email Address:</td>
				<td><?= $this->session->userdata['email'] ?></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><?= $this->session->userdata['description'] ?></td>
			</tr>
		</tbody>
	</table>
<div id='post'>
	<h3>Leave a Message for <?= $this->session->userdata['first_name'] ?></h3>
<span class='red'>
<?php
  if ($this->session->flashdata("post_error")) 
    {
      echo $this->session->flashdata("post_error");
    }
?></span>
	<form action='/posts/make_post' method='post'>
		<input type='text' name='post_message'>
		<input type='submit' value='Post' class='submit_button'>
	</form>
</div>
<div id='comment_feed'>
<?php
		foreach ($post as $post) 
		{ ?>
			<form>
				<label><?= $post['full_name'] . "  " . $post['post_time'] ?></label>
				<input type='text' value='<?= $post['post'] ?>' disabled>
		<div id="comment_section">
			<span class='red'>
<?php
  if ($this->session->flashdata("comment_error")) 
    {
      echo $this->session->flashdata("comment_error");
    }
?></span>
			<form>
			<form action='/posts/comments' method='post'>
				<input type='hidden' name='comment' value="<?= $post['post_id'] ?>">
				<input type='text' name='new_comment'>
				<input type='submit' value='Post Comment' class='submit_button'>
			</form>
		</div>
<?php	} ?>

</div>
</body>
</html>