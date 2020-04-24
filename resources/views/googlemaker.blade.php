<script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{config('services.google.key')}}&callback=initMap">


</script>





<style>
/* Set the size of the div element that contains the map */
#map {
    height: 400px;
    /* The height is 400 pixels */
    width: 70%;
   left: 70px;
    /* The width is the width of the web page */
}
</style>


<style  media="screen and (max-width: 767.98px)">
/* Set the size of the div element that contains the map */
#map {
    height: 400px;
    /* The height is 400 pixels */
    width: 100%;
    left: -50;
  
    /* The width is the width of the web page */
}


</style>

<script>
            // Initialize and add the map
            function initMap() {


                // The location of Uluru
                var uluru = {
                    lat: 40.416775,
                    lng: -3.703790
                };
                uluru.lat=parseFloat(document.getElementById('latitudemp').value);
                uluru.lng=parseFloat(document.getElementById('longitudemp').value);
                var empresa = document.getElementById('nombreempresa').value;

                // The map, centered at Uluru
                var map = new google.maps.Map(
                    document.getElementById('map'), {
                        zoom: 10,
                        center: uluru
                    });
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    title: empresa
                });
                

                var infoWindow = new google.maps.InfoWindow({
                    content: '<h1  style="color:blue;font-size:15px;">'+marker.title+'</h1>'
                });
                
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });

                google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(map, event.latLng);
});


                function placeMarker(map, location) {

                var latitud=document.getElementById('latr').value;
                var longitud=document.getElementById('longr').value;
                    var uluru = {
                    lat: parseFloat(latitud),
                    lng: parseFloat(longitud)
                };
                console.log(uluru);
                 var marker = new google.maps.Marker({
                position: uluru,
                map: map
                });
                marker.setPosition(uluru);
                var infowindow = new google.maps.InfoWindow({
                content: '<h1>Nueva ubicacion para la entrevista</h1>'
                });
             infowindow.open(map,marker);
                }
            }


            </script>


            <input type="hidden" value="{{$datosempresa->nombre}}" name="nombreempresa" id="nombreempresa">
            <input type="hidden" value="{{$laoferta->empresa->latitud}}" name="latitudemp" id="latitudemp">
            <input type="hidden" value="{{$laoferta->empresa->longitud}}" name="longitudemp" id="longitudemp">
            <div id="map"></div>