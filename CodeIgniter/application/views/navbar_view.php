<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url('index.php/Home') ?>"  <?php if($this->uri->segment(1)=="Home"){echo 'class="active"';}?>>Täna</a></li>
			<li><a href="<?php echo  base_url('index.php/Home/homme')?>" <?php if($this->uri->segment(1)=="homme"){echo 'class="active"';}?>>Homme</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url('index.php/Home/login');?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>
	</div>
</nav>
</body>
</html>

