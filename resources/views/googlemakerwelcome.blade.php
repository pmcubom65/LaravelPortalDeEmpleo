<script 
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{config('services.google.key')}}&callback=initMap" sync defer>


</script>
<script>
            // Initialize and add the map
            function initMap() {
                            // The location of Uluru
                            var uluru = {
                    lat: 40.451315,
                    lng: -3.599181
                };
     
                // The map, centered at Uluru
                var map = new google.maps.Map(
                    document.getElementById('map3'), {
                        zoom: 16,
                        center: uluru
                    });
         
                // The marker, positioned at Uluru
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    
                });
                

                var infoWindow = new google.maps.InfoWindow({
                    content: '<h1  style="color:blue;font-size:15px;">Ies Barajas</h1>'
                });
                
                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            }


            </script>


<div id="map3" ></div>












         