<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<p id="test"></p>

<?php

$xml = simplexml_load_string($toidud);
foreach ($xml->element as $item) {
    echo "<p>";
    echo $item->toidunimi;
    echo "</p>"; //siia tuleb kuidagi kujundus teha
    //vaata xml_file.xml
}
?>

andmebaasist tuleb XML formaadis, nagu <a href="<?php echo base_url('xml_file.xml');?>">siin</a>

</body>
</html>
