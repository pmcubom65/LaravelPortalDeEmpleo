<script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{config('services.google.key')}}&callback=initMap">


</script>





<style>
/* Set the size of the div element that contains the map */
#map {
    height: 400px;
    /* The height is 400 pixels */
    width: 85%;
   left: 70px;
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
                var dire = document.getElementById('direempresa').value;

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
                    title: empresa.concat(': ',dire)
                });
                

                var infoWindow = new google.maps.InfoWindow({
                    content: '<h1>'+marker.title+'</h1>'
                });
                
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });


            }


            </script>


            <input type="hidden" value="{{$entrevista->oferta_trabajador->ofertas->first()->empresa->usuario->name}}" name="nombreempresa" id="nombreempresa">
            <input type="hidden" value="{{$entrevista->latitud}}" name="latitudemp" id="latitudemp">
            <input type="hidden" value="{{$entrevista->longitud}}" name="longitudemp" id="longitudemp">
            <input type="hidden" value="{{$entrevista->direccion}}" name="direemp" id="direemp">
            <div id="map"></div>