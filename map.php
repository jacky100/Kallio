<link href="https://fonts.googleapis.com/css?family=Exo+2:400,600italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">		
<link href="css/style.css" rel="stylesheet">
     
<script src="http://code.jquery.com/jquery.min.js" type='text/javascript'></script>       
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM "></script>
<script type="text/javascript">

    var infowindow = null;
    $(document).ready(function () { initialize();});

    function initialize(){

    var centerMap = new google.maps.LatLng(60.187238, 24.956011);

    var myOptions = {
        zoom: 17,
        center: centerMap,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles:      
                [ 
                        { "stylers": [ { "saturation": 30 }, 
                            { "lightness": 100 } ] }, 
                        { "elementType": "geometry", "stylers": [ { "color": "#f5f5f5" } ] }, 
                        { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, 
                        { "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, 
                        { "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f5f5" } ] }, 
                        { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#bdbdbd" } ] }, 
                        { "featureType": "landscape", "stylers": [ { "color": "#bfbfbf" }, { "saturation": -5 } ] }, 
                        { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] }, 
                        { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, 
                        { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#dbdbdb" }, { "visibility": "simplified" } ] }, 
                        { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, 
                        { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#ffffff" } ] }, 
                        { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, 
                        { "featureType": "road.highway", "stylers": [ { "saturation": -5 }, { "visibility": "off" } ] }, 
                        { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#dadada" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, 
                        { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, 
                        { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#e5e5e5" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] }, 
                        { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#c9c9c9" } ] }, 
                        { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] } ] 
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    setMarkers(map, sites);
    infowindow = new google.maps.InfoWindow({

        })
    };
    
    fetch('baaritKartalle.php').then(function(response) {
                    // Convert to JSON
                    return response.json();
                }).then(function(j) {
                    // Yay, `j` is a JavaScript object
                    console.log(j);
                    sites = j;
                    initialize();
                });
    

    function setMarkers(map, markers) {

    for (var i = 0; i < markers.length; i++) {
        var sites = markers[i];
        var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
        var marker = new google.maps.Marker({
            position: siteLatLng,
            map: map,
            title: sites[0],
            zIndex: sites[3],
            html: sites[4],
            icon: "img/merkki.png"}
        );

    var contentString = "Some content";

    google.maps.event.addListener(marker, "click", function () {
        infowindow.setContent(this.html);
        infowindow.open(map, this);});
    google.maps.event.addDomListener(window, 'load', initialize);}};
</script>
    <div id="map_canvas" style="width: 1000px; height: 500px; margin: auto; text-align: center;"></div>
