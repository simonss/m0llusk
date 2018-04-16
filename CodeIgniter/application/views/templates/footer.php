<footer class="footer" style="background-color: #222222">
	<div class="container-fluid" >
		<br>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-4">
				<h2 style="color: #acada5">Päevakad</h2>
				<p class="text-left" style="color: #acada5"><b><?=_AADRESS?>: </b>Juhan Liivi 2, Tartu</p>
				<p class="text-left" style="color: #acada5"><b><?=_MEIL?>: </b>paevakad@gmail.com</p>
                <p class="text-left" style="color: #acada5"><a href="<?php echo base_url('index.php/Home/statistika');?>" title="Statsistika andmete ja kasutajate kohta"><b><?=_STATISTIKA?></b></a></p>
			</div>
			<div class="col-sm-6"><div id="map" style="width:100%;height: 300px;"></div></div>
			<div class="col-sm-1"></div>
		</div>
		<br>
	</div>
</footer>

<!-- Google Maps Script -->
<script>
	function myMap()
	{
		var uluru = {lat: 58.3782485, lng: 26.7146733};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 10,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_PEI7fw8gSgzdvpsLTIi9CwjTtFsbAbY&callback=myMap"></script>
