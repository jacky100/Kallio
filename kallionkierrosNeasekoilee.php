<?php 
require_once("config/config.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
		
         <link href="opensans_regular/stylesheet.css" rel="stylesheet">
	       <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">		
	       <link href="tyyli.css" rel="stylesheet">
            <title>Kallionkierros</title>
   </head>    
    
<body class="minttu">
    <div class="sivu">
   
    <header>
        <a href="kallionkierros.html"></a>
    </header>
        
    <main>
    <h1>Kippis!</h1>
    
        
     <script src="http://code.jquery.com/jquery.min.js" type='text/javascript'></script>
        
     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdrDkVOK-e9FVtjG0fr1EzY4gRpU9AsvM "></script>
    <script type="text/javascript">
        var infowindow = null;
        $(document).ready(function () { initialize();  });

    function initialize() {

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
              
                
        } )};

       
    

    var sites = [
	['Pääkonttori', 60.187422, 24.956309,21, 
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Pääkonttori</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Pääkonttori</b>, on mukava paikka juoda olutta ' + 
            '<a href="https://www.facebook.com/pages/P%C3%A4%C3%A4konttori/215611865132358?fref=ts">Baarin sivulle</a> ' + '</div>'+ '</div>'],
	['Tenho', 60.187302, 24.955187, 21,   
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Tenho</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Tenho</b>, on rento paikka juoda bissee ' + '<a href="http://www.ravintolatenho.fi/">Baarin sivulle</a> ' +'</div>'+ '</div>'],
        
    ['Relaxin', 60.187346, 24.955686, 21,   
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Relaxin</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Relaxin</b>, on hyvä paikka bongaa siiderivalaita ' + '</div>'+ '</div>'],
    ['Tenkka', 60.187290, 24.954895, 21,   
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Tenkka</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Tenkka</b> on vanhojen pappojen kaljoittelumesta' + '</div>'+ '</div>'],
];
    



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
                icon: "img/merkki.png",
                
            });

            var contentString = "Some content";

            google.maps.event.addListener(marker, "click", function () {
                infowindow.setContent(this.html);
                infowindow.open(map, this);
            });
            
            
		
    google.maps.event.addDomListener(window, 'load', initialize);

    
    }};
        
</script>
        
        <div id="map_canvas" style="width: 100%; height: 500px;"></div>
    
	

        <?php
        if($_POST['like']) {
        $sql = "UPDATE 'A_Arvostelu' set 'AArvostelu' = 'AArvostelu' +1 where `ABaari` = '2'";
        $result=mysql_query($sql);
            $sql->execute();
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type = "submit" value = "AArvostelu" name='like'/>
        </form>
        
    </main>
    </div>
</body>
</html>








