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

    <!--Webhost:--><meta name="google-signin-client_id" content="305223175599-fffnntmch2cfh9s9oh3ml8mcvgmtrur2.apps.googleusercontent.com">
    <!--LocalHost:<meta name="google-signin-client_id" content="254669445111-s780gs1euvbqq4464m5hokqq2b2ldu8e.apps.googleusercontent.com">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('scripts/googlesignin.js')?>"></script>
    <script src="<?php echo base_url('scripts/googlesignout.js')?>"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('styles/SwitchButton.css')?>">
</head>
<body<?php if (!empty($script)) {
    echo ' onload="'.$script.'"';
}
?>>
<img class="img-responsive" style="height: 50%" src="<?php echo base_url('images/paevakad.png');?>" alt="Päevakad">

