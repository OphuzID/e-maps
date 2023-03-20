<!DOCTYPE HTML>
<html manifest="appcache.manifest">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>e-Maps GAPI v3</title>
<!-- Boostrap v4.0 -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url('assets/FontAwesome/css/all.css');?>" crossorigin="anonymous">

<!-- DataTables v1.10.21 -->
<link rel="stylesheet" href="<?php echo base_url('assets/DataTables/datatables.min.css');?>" crossorigin="anonymous">

<style>
    html, body, #map {
        height: 100%;
        width: 100%;
    }
        th { font-size: 14px; }
		td { font-size: 14px; }
		div.dataTables_wrapper div.dataTables_info {padding-top: 0px;}
 		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
		padding: 1px 1px 1px 1px;
		}
    input.transparent-input{
        background-color:rgba(0,0,0,0) !important;
        border:none !important;
        }
    #myBtn {
        position: fixed;
        top: 38.5px;
        left: 10px;
        z-index: 99;
        font-size: 12px;
        border: none;
        outline: none;
        padding: 15px;
        border-radius: 50px;
        }
    .myBtnMenu {
        position: fixed;
        height:38px;
        z-index: 99;
        font-size:12px;
        border: none;
        outline: none;
        border-radius: 50px;
        }





.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  background-color: rgba(10, 0, 0, 0.8);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.marker {
  position: absolute;
  cursor: pointer;
}
</style>
</head>
<body>
<div id="mySidenav" class="sidenav sidebar-sticky">
<ul class="nav flex-column">
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
    <span>e-Maps Menu</span>
    <a class="d-flex align-items-center text-muted" href="#">
    <a style="font-size: 25px;" href="javascript:void(0)" onclick="closeNav()">&times;</a></a>
</h6>
    <li class="nav-item">
    <a class="nav-link active" href="#">
    <i class="fas fa-tachometer-alt"></i> Dashboard <span class="sr-only">(current)</span>
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fas fa-user"></i> Customers
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="fas fa-chart-bar"></i> Reports
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-layer-group"></i> Integrations
    </a>
    </li>
</ul>
</div>


<label style="position: fixed;z-index: 1;color:#808080; top:35.5px;left:140px;">
<?php 
    foreach ($Data->getResultArray() as $row){
    $location[] = $row['Latitude'].",".$row['Longitude'].",'".$row['NameLocation'].",".$row['Provinsi']."'";
    }

?></label>
<!--<button id="myBtn" type="button" class="btn btn-light btn-sm"><i class="fas fa-plus"></i></button>-->
<!--<button id="myBtnMenu" onclick="openNav()" type="button" class="btn btn-light btn-sm"><i class="fas fa-bars"></i></button>-->
<button style="top: 21.5px;left: 80px;" type="button" class="btn btn-light myBtnMenu" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-database"></i></button>
<a href="/"><button style="top: 21.5px;left: 30px;" type="button" class="btn btn-light myBtnMenu" ><i class="fas fa-home"></i></button></a>

<div style="position: fixed;z-index: 1;color:#808080; bottom:-11px;left:70px;"><p>&copy; <?= date('Y') ?> Yoga Lesmana | Page rendered in {elapsed_time} seconds</p></div>
<label style="position: fixed;z-index: 1;color:#808080; top:21.5px;left:140px;">Lat</label>
<label style="position: fixed;z-index: 1;color:#808080; top:35.5px;left:140px;">Lon</label>
<label id="lat" style="position: fixed;z-index: 1;color:#808080; top:21.5px;left:170px;"></label>
<label id="lng" style="position: fixed;z-index:1;color:#808080; top:35.5px;left:170px;"></label>

<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Data Area</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="DataArea" class="table table-sm table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th >No.</th>
                <th>Index</th>
                <th>Lokasi</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Type</th>
                <th>Provinsi</th>
                <th>Action</th>
            </tr>
        </thead>
        
      </table>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>-->
    </div>
  </div>
</div>
<!-- Modal -->

<div id="map"></div>



<script type="text/javascript" src="<?php echo base_url('Assets/jQuery/jquery-3.6.0.js');?>"></script>

<!-- Google API v3 -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>window.google && window.google.maps || document.write('<script src="<?php echo base_url("assets/gmap/gmapapi.js");?>"><\/script>')</script>


<!-- DataTables v1.10.21 -->
<script src="<?php echo base_url('assets/DataTables/DataTables/js/jquery.dataTables.min.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/DataTables/datatables.min.js');?>" crossorigin="anonymous"></script>

<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/popper.min.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/FontAwesome/js/solid.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/FontAwesome/js/fontawesome.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/FontAwesome/js/map-font-icons.js');?>" crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function() {
    var table;
	var tRx;
	var table 	= $("#DataArea").DataTable({ 
    "processing": true, //Feature control the processing indicator.
		"serverSide": false, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.
		"pageLength": 15,
		dom: 'frtip',
		responsive: true,
    "autoWidth": true,
		"columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?php echo site_url('home/ajax_list')?>",
			"type": "POST",
		},
    });
    });
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
    window.base_url = <?php echo json_encode(base_url()); ?>;
    function getGmapTileImgSrc(coord, zoom) {
        return "http://mt0.googleapis.com/vt?src=apiv3&x=" + coord.x + "&y=" + coord.y + "&z=" + zoom;
    }

  function initialize() {
    var base_url = window.location.origin;
    const iconBase =
    {   url: window.base_url+"/assets/gmaps/image/png/GoogleMarking.png",
        scaledSize: new google.maps.Size(25, 35), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
        
    $.ajax({url:"<?php echo site_url('home/get_location')?>",
    "type": "GET",
    success: function(result){
    var locations = JSON.parse(result);
   
    var myLatlng = new google.maps.LatLng(-1.200000, 118.816666);
    var marker, i;
    var element = document.getElementById("map");

   /* var myOptions = {
      zoom: 5,
      center: myLatlng,
      zoomControl: true,
      disableDoubleClickZoom: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }*/

    var map = new google.maps.Map(element, {
    center: new google.maps.LatLng(-1.200000, 118.816666),
    zoom: 5,
    mapTypeId: "MyGmap",

    });

    map.mapTypes.set("MyGmap", new google.maps.ImageMapType({
        getTileUrl: getGmapTileImgSrc,
        tileSize: new google.maps.Size(256, 256),
        
        name: "MyGmap",
        maxZoom: 15
    }));



    //var map = new google.maps.Map(document.getElementById("map"), myOptions);
    var icons = {
        Districts: {
            icon: window.base_url+"/assets/gmaps/image/png/DistrictsMarking.png"
        },
        City: {
            icon: window.base_url+"/assets/gmaps/image/png/CityMarking.png" //<i class='fas fa-map-marker'></i>
            /*icon: 'bar',
            color: '#346698',
            fontSize: '35px',*/
        },
        info: {
            icon: iconBase + 'info-i_maps.png'
        }
        };


    const contentString_ ='<div id="infodiv" style="width: 300px">300px wide infowindow!  if the mouse is not here, will close after 3 seconds</div>';
    const contentString  ='<div style="width:500px;"><form>'+
                           '<div class="form-group">'+
                               '<label for="exampleInputEmail1">Email address</label>'+
                               '<input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">'+
                               '<small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>'+
                            '</div>'+
                            '<div class="form-group">'+
                             '<label for="exampleInputPassword1">Password</label>'+
                                '<input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">'+
                            '</div>'+
                            '<div class="form-check">'+
                                '<input type="checkbox" class="form-check-input" id="exampleCheck1">'+
                                '<label class="form-check-label" for="exampleCheck1">Check me out</label>'+
                            '</div>'+
                            '<button type="submit" class="btn btn-primary">Submit</button>'+
                          '</form></div>';
    var infowindow = new google.maps.InfoWindow({content:contentString});
    

    for (var i = 0; i < locations.length; i++) {  
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(parseFloat(locations[i][0]), parseFloat(locations[i][1])),
        title:locations[i][2],
        map: map,
        draggable:false,
        icon:icons[locations[i][3]].icon,
        
    });

    


    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
        infowindow.setContent(locations[i][2]);
        infowindow.open(map, marker);
        }
    })(marker, i));

    }


    google.maps.event.addListener(marker, 'dragend', function() {
        infowindow.open(map, marker)
        map.setCenter(marker.getPosition())
        
    });
    google.maps.event.addListener(marker, 'mouseover', function() {
        infowindow.open(map, marker)
    });
    /*google.maps.event.addListener(marker, 'mouseout', function() {
        t = setTimeout(function() {
            infowindow.close()
        }, 3000);
    });*/

   
    google.maps.event.addListener(marker,'drag',function() {
        document.getElementById('lat').textContent = marker.position.lat();
        document.getElementById('lng').textContent = marker.position.lng();
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

  google.maps.event.addDomListener(document.getElementById('myBtn'), 'click', function(e) {
   
        var marker = new google.maps.Marker({
        position:myLatlng,
        map: map,
        draggable:true,
        
        });
        
        google.maps.event.addListener(marker,'drag',function(e) {
            document.getElementById('lat').textContent = marker.position.lat();
            document.getElementById('lng').textContent = marker.position.lng();
          //  infowindow.open(map, marker);
        });


        google.maps.event.addListener(marker, 'click', function(e) {
        infowindow.setContent(contentString);
        infowindow.open(map, marker);

        google.maps.event.addListener(marker, 'dblclick', function(e)
        {marker.setMap(null)});
       
        });
        
    });




    } //From ajax success
    });//From $.ajax




  }


  google.maps.event.addDomListener(window, 'load', initialize);
</script>


</body>

</html>

