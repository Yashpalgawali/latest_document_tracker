<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Document Tracker</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/home.css">
	<style>
 .container {
    
}
		</style>
</head>

<div class="container" >
      <div class="row">
	  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-center mb-5 fs-5">Login</h4>
			<hr>
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
		
		<form action="<?php echo base_url();?>Login/login" method="POST">
			<div class="form-group">
			<label for="email">Vendor Email</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Use Email as username">
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
		<button type="submit" class="btn btn-primary">Login</button><span class="ml-3" > <a href="">Forgot Password</a></span>
		</form>
		</div>
				</div>
		</div>
	</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</html>