<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Document Tracker</title>
	<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/home.css">
	
</head>

<div class="container">

	<h3 class="form-control">Welcome <?php echo $this->session->userdata('vendor_name') ?></h3>
	
	
	<a href="<?php echo base_url();?>Vendor">Add Vendor</a>
	<a href="<?php echo base_url();?>Vendor/addvendortype">Add Vendor Type</a>
	<a href="<?php echo base_url();?>Vendor/viewvendortype">Add Vendor Type</a>

</div>

</div>
</html>