<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <?php
    if (!empty($message)) echo $message;
    ?>
</div>
<form class="form-horizontal" action="<?php echo base_url('index.php/Home/login_submit/');?>" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2" for="email">Email:</label>
		<div class="col-sm-10">
			<input style="right: 50px" type="email" class="form-control" name="name"
            <?php
            if (!empty($email)) {
                echo 'value="'.$email.'"';
            } else {
                echo 'placeholder="Enter email"' ;
            }
            ?>>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Password:</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" name="password" placeholder="Enter password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox">
				<label><input type="checkbox"> Remember me</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
</form>
<div class="col-sm-offset-1">
    <a href="<?php echo base_url('index.php/Home/register');?>">Registreeru</a>
</div>
</body>
</html>
