<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmLQ7T-fWHRisGsqZcuEpi55TECdSSZgQ&sensor=false"></script>
<script type="text/javascript">
    
    function initialize() {
        var latLng = new google.maps.LatLng(47.2060162, 7.542674);
				
        var mapOptions = {
            center: latLng,
            zoom: 16
        };
				
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: latLng,
            title:"Rötiquai 16, 4500 Solothurn"
        });
        marker.setMap(map);
    }
    
   google.maps.event.addDomListener(window, 'load', initialize);
    
</script>

<h1>Kontakt</h1>
<p>Fussball Fanshop, Rötiquai 16, 4500 Solothurn </p>
<div id="map" >   
<!--Map -->
</div>