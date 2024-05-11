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
		<?php 
			if($this->session->flashdata('response'))
			{?> <div class="alert alert-success"><h6><?php echo $this->session->flashdata('response');?></h6></div>
		<?php
			}
			if($this->session->flashdata('reserr'))
			{?> <div class="alert alert-danger"><h6><?php echo $this->session->flashdata('reserr');?></h6></div>
			<?php	
			}	
			?>
	<h3>Login</h3>
	
	<form action="<?php echo base_url();?>Login/login" method="POST">
	<div class="form-group">
	<label for="email">Vendor Email</label>
		<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email of Vendor">
	</div>
	<div class="form-group">
	<label for="password">Password</label>
		<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
	</div>
	<div class="form-group">
	  <label for="user_type">User Type </label>
		<select id="user_type" name="user_type" class="form-control">
			<option selected disabled>Select User Type</option>
			<?php 
				foreach($vtype as $type) {
					echo "<option value='".$type['vendor_type_id']."'>".$type['vendor_type']."</option>";
				}
			?>
		</select>
	</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</html>