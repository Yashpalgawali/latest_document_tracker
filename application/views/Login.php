<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Document Tracker</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/home.css">
	
</head>

<div class="container">

	<h3>Login</h3>
	
	<form action="<?php echo base_url();?>Login/login" method="POST">
	<div class="form-group">
	<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
	</div>
	<div class="form-group">
	<label for="username">Password</label>
		<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
	</div>
			<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</html>