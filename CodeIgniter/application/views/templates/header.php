<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title><?php if (!empty($title)) {
        echo $title;
        }?>Päevakad</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="päevakad, päevapraed, tartu, tallinn">
    <meta name="author" content="paevakad">

    <!--Webhost:<meta name="google-signin-client_id" content="305223175599-fffnntmch2cfh9s9oh3ml8mcvgmtrur2.apps.googleusercontent.com">-->
    <!--LocalHost:--><meta name="google-signin-client_id" content="254669445111-s780gs1euvbqq4464m5hokqq2b2ldu8e.apps.googleusercontent.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('scripts/googlesignin.js')?>"></script>
    <script src="<?php echo base_url('scripts/googlesignout.js')?>"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/SwitchButton.css')?>">
</head>
<body <?php if (!empty($script)) {
    echo ' onload="'.$script.'"';
}

// Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
	$_SESSION['lang'] = $_GET['lang'];

	if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
		echo "<script type='text/javascript'> location.reload(); </script>";
	}
}

// Include Language file
if(isset($_SESSION['lang'])){
	include "lang_".$_SESSION['lang'].".php";
}else{
	include "lang_est.php";
}
?>>

<script>
	function changeLang(){
		document.getElementById('form_lang').submit();
	}
</script>
<div style="background-color: #222222">
<form method='get' action='' id='form_lang' style="float: right">
	Select Language : <select name='lang' onchange='changeLang();' >
		<option value='eng' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng'){ echo "selected"; } ?> >English</option>
		<option value='est' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'est'){ echo "selected"; } ?> >Estonian</option>
	</select>
</form>
</div>
<!--enne webhosti üleslaadimist tuleb javascripti failides aadress ära muuta (ja googleusercontent ka)-->
<img class="img-responsive" style="width: 100%" src="<?php echo base_url('images/paevakad.png');?>" alt="Päevakad">


