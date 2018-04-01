<p id="test"></p>

<?php

$xml = simplexml_load_string($toidud);
foreach ($xml->element as $item) {
	//echo $item->toidunimi;
	echo "<div class='col-xs-18 col-sm-6 col-md-3'>
			<div class='thumbnail right-caption span4'>
				<img src='http://placehold.it/120x160' alt=''>
					<div class='caption'>
						<h1>". $item->toidunimi ."    ". $item->hind." €</h1>
						<h5> ". $item->toidukoht." </h5>
						<p>". $item->lisainfo."</p>
					</div>
			</div>
		</div>";
}
?>

<br>
<br>

andmebaasist tuleb XML formaadis, nagu <a href="<?php echo base_url('xml_file.xml');?>">siin</a>