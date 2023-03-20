<!DOCTYPE html>
<html manifest="appcache.manifest">
<head>
	<meta charset="UTF-8">
	<title>e-Maps HRV</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" src="<?php echo base_url('/assets/Logo.png');?>"/>
	<!-- Boostrap v4.0 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/gmaps/style.css');?>" crossorigin="anonymous">
	
	<!-- STYLES -->
    <style>
        #myBtn {
      
        position: fixed;
        top: 17px;
        left: 80px;
        z-index: 99;
        font-size: 12px;
        border: none;
        outline: none;
        padding: 15px;
        border-radius: 50px;
        }

        #myBtn:hover {
      /*  background-color: #555;*/
        }
    </style>


</head>
<body onload="initMap()">

<button id="myBtn" type="button" class="btn btn-light btn-sm">Add</button>
<div style="position: fixed;z-index: 9999;color:#808080; bottom:-10px;left:70px;"><p>&copy; <?= date('Y') ?> Yoga Lesmana | Page rendered in {elapsed_time} seconds</p></div>
<div id="map"></div>
<!-- HEADER: MENU + HEROE SECTION -->
<!--
<header>

	 <div class="menu">
		<ul>
		<li class="logo" style="display: flex;align-items:center;"><a href="#" target="_blank"><img height="44" title="Antares Logo"
			src="<?php echo base_url('/assets/Logo.png');?>"></a><span style="padding-left:10px;">Rendered {elapsed_time} seconds</span>																													
		</li>
		</ul>
	</div>
</header>
	-->

<!-- CONTENT -->

<section>
		<!-- <h2><?php echo $Text;?></h2>
		<h2><?php echo $Data;?></h2>-->
		<!--<div id="googleMap" style="width:100%;height:380px;"></div>-->
		



</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->


	
<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>
	<script type="text/javascript" src="<?php echo base_url('Assets/jQuery/jquery-3.6.0.js');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/popper.min.js');?>" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="<?php echo base_url('assets/gmaps/gmapapi.js');?>" crossorigin="anonymous"></script>




<script>
    /* function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          center: new google.maps.LatLng(-6.7844688, 118.0453817),
          zoom: 12
        });
	}
	function initialize() {
		var propertiPeta = {
			center:new google.maps.LatLng(-8.5830695,116.3202515),
			zoom:5,
			mapTypeId:google.maps.MapTypeId.satellite
		};
		var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	*/
</script>
<script>
directionsService = new google.maps.DirectionsService();
directionsDisplay = new google.maps.DirectionsRenderer();

var UK = new google.maps.LatLng(53.409532, -2.010498);
var IT = new google.maps.LatLng(42.745334, 12.738430);
var ID = new google.maps.LatLng(-1.200000, 118.816666);

var noStreetNames = [{
    featureType: "road",
    elementType: "labels",
    stylers: [{
        visibility: "off"}]}];

hideLabels = new google.maps.StyledMapType(noStreetNames, {
    name: "hideLabels"
});


var myOptions = {
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: ID
}

var showPosition = function(position) {
    var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    var marker = new google.maps.Marker({
        position: userLatLng,
        title: 'Your Location',
        draggable: true,
        map: map
    });

    var infowindow = new google.maps.InfoWindow({
        content: '<div id="infodiv" style="width: 300px">300px wide infowindow!  if the mouse is not here, will close after 3 seconds</div>'
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        infowindow.open(map, marker)
        map.setCenter(marker.getPosition())
    });

    google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow.open(map, marker)
    });

    google.maps.event.addListener(marker, 'mouseout', function() {
        t = setTimeout(function() {
            infowindow.close()
        }, 3000);
    });

    google.maps.event.addListener(infowindow, 'domready', function() {
        $('#infodiv').on('mouseenter', function() {
            clearTimeout(t);
        }).on('mouseleave', function() {
            t = setTimeout(function() {
                infowindow.close()
            }, 1000);
        })
    });

    var input = document.getElementById('nptsearch');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.bindTo('bounds', map);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(7);
        }

        var image = new google.maps.MarkerImage(
        place.icon, new google.maps.Size(71, 71), new google.maps.Point(0, 0), new google.maps.Point(17, 34), new google.maps.Size(35, 35));
        marker.setIcon(image);
        marker.setPosition(place.geometry.location);

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
    });

    map.setCenter(marker.getPosition());
}

navigator.geolocation.getCurrentPosition(showPosition);

map = new google.maps.Map(document.getElementById("map"), myOptions);
directionsDisplay.setMap(map);

map.mapTypes.set('hide_street_names', hideLabels);

function offsetCenter(latlng, offsetx, offsety) {
    var scale = Math.pow(2, map.getZoom());
    var nw = new google.maps.LatLng(
    map.getBounds().getNorthEast().lat(), map.getBounds().getSouthWest().lng());

    var worldCoordinateCenter = map.getProjection().fromLatLngToPoint(latlng);
    var pixelOffset = new google.maps.Point((offsetx / scale) || 0, (offsety / scale) || 0)

    var worldCoordinateNewCenter = new google.maps.Point(
    worldCoordinateCenter.x - pixelOffset.x, worldCoordinateCenter.y + pixelOffset.y);

    var newCenter = map.getProjection().fromPointToLatLng(worldCoordinateNewCenter);

    map.setCenter(newCenter);
}

function addmarker(latilongi) {
    var marker = new google.maps.Marker({
        position: latilongi,
        title: 'new marker',
        draggable: true,
        map: map
    });

    var infowindow = new google.maps.InfoWindow({
        content: '<div id="infodiv2">infowindow!</div>'
    });
    //map.setZoom(15);
    map.setCenter(marker.getPosition())
    //infowindow.open(map, marker)
}

$(window).on('resize', function() {
    var currCenter = map.getCenter();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(currCenter);
})

$('#btnlabels').toggle(function() {
    map.setZoom(15);
    map.setMapTypeId('hide_street_names')
}, function() {
    map.setMapTypeId(google.maps.MapTypeId.ROADMAP)
})

$('#btnoffset').on('click', function() {
    offsetCenter(map.getCenter(), 0, -100)
})

$('#myBtn').on('click', function() {
    addmarker(ID)
})
</script>


</body>
</html>
