var element = document.getElementById("map");

var mapTypeIds = [];
for(var type in google.maps.MapTypeId) {
    mapTypeIds.push(google.maps.MapTypeId[type]);
}

var map = new google.maps.Map(element, {
    center: new google.maps.LatLng(-1.200000, 118.816666),
    zoom: 5,
    mapTypeId: "MyGmap",
    mapTypeControlOptions: {
        mapTypeIds: mapTypeIds,
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    }
});


map.mapTypes.set("MyGmap", new google.maps.ImageMapType({
    getTileUrl: getGmapTileImgSrc,
    tileSize: new google.maps.Size(256, 256),
    name: "MyGmap",
    maxZoom: 15
}));




google.maps.event.addListener(map, 'click', function(point) {
    var marker = new google.maps.Marker({
        position: point.latLng,
        map: map
    });

    google.maps.event.addListener(marker, 'dblclick', function() {
        marker.setMap(null);
    });

    google.maps.event.addListener(marker, 'click', function() {
        new google.maps.InfoWindow({
            content: 'lat: ' + point.latLng.lat() + '<br>lng:' + point.latLng.lng()
        }).open(map, marker);
    });
});

function CustomControl(controlDiv, map, title, handler) {
    controlDiv.style.padding = '5px';

    var controlUI = document.createElement('DIV');
    controlUI.style.backgroundColor = 'white';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '2px';
    controlUI.style.cursor = 'pointer';
    controlUI.style.textAlign = 'center';
    controlUI.title = title;
    controlDiv.appendChild(controlUI);

    var controlText = document.createElement('DIV');
    controlText.style.fontFamily = 'Arial,sans-serif';
    controlText.style.fontSize = '12px';
    controlText.style.paddingLeft = '4px';
    controlText.style.paddingRight = '4px';
    controlText.innerHTML = title;
    controlUI.appendChild(controlText);

    google.maps.event.addDomListener(controlUI, 'click', handler);
}

var clearWebStorageDiv = document.createElement('DIV');
var clearWebStorageButton = new CustomControl(clearWebStorageDiv, map,
    'Clear Web Storage',  clearWebStorage);

var prepareWebStorageDiv = document.createElement('DIV');
var prepareWebStorageButton = new CustomControl(prepareWebStorageDiv, map,
    'Prepare Web Storage', prepareWebStorage);

clearWebStorageDiv.index = 1;
prepareWebStorageDiv.index = 1;
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(clearWebStorageDiv);
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(prepareWebStorageDiv);
