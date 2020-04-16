<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZcGruDejF0sPT7TA6Z4ZpuRtAq3uEKQc&callback=initMap">


</script>

<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
google.maps.event.addDomListener(window, 'load', intilize);

function intilize() {
    var autocomplete = new google.maps.places.Autocomplete();
    

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
     

        var place = autocomplete.getPlace();
        var location = "Address: " + place.formatted_address + "<br/>";
        location += "Latitude: " + place.geometry.location.lat() + "<br/>";
        location += "Longitude: " + place.geometry.location.lng();
        document.getElementById('lblresult').innerHTML = location
    });

};
</script>



<style>
/* Set the size of the div element that contains the map */
#map {
    height: 400px;
    /* The height is 400 pixels */
    width: 100%;
    /* The width is the width of the web page */
}
</style>


<div id="map"></div>
<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/place?q=madrid&key=AIzaSyCZcGruDejF0sPT7TA6Z4ZpuRtAq3uEKQc" allowfullscreen></iframe>

<script>
// Initialize and add the map
function initMap() {
    

    // The location of Uluru
    var uluru = {
        lat: 40.416775,
        lng: -3.703790
    };
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
</script>

