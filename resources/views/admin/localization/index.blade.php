@extends('admin.index')

@section('content')

<script src="{{asset('reources/js/googlemaps.js')}}">
	alert("teste");
	
</script>

<form action="world_map">
 <div class="row">
   <div class="col-md-6">
	 <div class="form-group">
	   
	     <input type="submit"  class="btn btn-primary" value="Inseir Cordenadas">
	 </div>
   </div>
   <br><br>
<div class="row">
   <div class="col-md-6">
	 <div class="form-group">
	     <label for="latitude">Latitude</label>
	     <input type="text" name="lat" id="lat" class="form-control" placeholder="Latitude" required>
	 </div>
   </div>

   <div class="col-md-6">
	 <div class="form-group">
	     <label for="latitude">longetude</label>
	     <input type="text" name="lng" id="lng" class="form-control" placeholder="Longetude" required>
	 </div>
   </div>
</div>
</form>
<div>
	<br>
</div>
<div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
		<div class="card flex-fill w-100">
				<div class="card-header">

					<h5 class="card-title mb-0">Localização em Tempo Real </h5>
				</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
		</div>
</div>
						
<script src="js/app.js"></script>

	<script>
		function initMaps() {

			var hybridMap = {
				zoom: 100,
				center: {
					lat: -19.8148096,
					lng: 34.865152
				},
			
				mapTypeId: google.maps.MapTypeId.HYBRID
			};
			new google.maps.Map(document.getElementById("world_map"), hybridMap);
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMaps" async defer></script>
@endsection