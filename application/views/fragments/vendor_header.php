<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>Login">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Document</a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo base_url();?>document">Add Document</a></li>
            <li><a class="nav-link" href="<?php echo base_url();?>document/viewdocuments">View Document</a></li>
          </ul>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Welcome 
            <?php echo $this->session->userdata('vendor_name');?>
          </a>
          <ul class="dropdown-menu">
            <li></li>
            <li><a class="nav-link" href="<?php echo base_url();?>Login/logout">Logout</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
