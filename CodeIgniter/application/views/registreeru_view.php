<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div <div class="col-sm-offset-1 col-sm-10">
    <input type="radio" name="usertype" value="tavakasutaja" checked> Tavakasutaja
    <input type="radio" name="usertype" value="arikasutaja"> Ärikasutaja
</div>

<form class="form-horizontal" action="<?php echo base_url('index.php/Home/register_submit/');?>" method="post">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">E-mail:</label>
        <div class="col-sm-10">
            <input style="right: 50px" type="email" class="form-control" name="email"  placeholder="Enter email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Parool:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Parool uuesti:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password2" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Registreeru</button>
        </div>
    </div>
</form>
</body>
</html>
