<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Marker Simple</title>
<!-- Boostrap v4.0 -->
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" crossorigin="anonymous">

<style>
    html, body, #map {
        height: 100%;
        width: 100%;
    }
    input.transparent-input{
        background-color:rgba(0,0,0,0) !important;
        border:none !important;
        }
    #myBtn {
        position: fixed;
        top: 18.5px;
        left: 80px;
        z-index: 99;
        font-size: 12px;
        border: none;
        outline: none;
        padding: 15px;
        border-radius: 50px;
        }
</style>
</head>
<body >

<label style="position: fixed;z-index: 99999;color:#808080; top:35.5px;left:140px;">
<?php 
    foreach ($Data->getResultArray() as $row){
    $location[] = $row['Latitude'].",".$row['Logitude'].",'".$row['NameLocation'].",".$row['Provinsi']."'";
    }
    //print_r(json_encode($location));
?></label>
<button id="myBtn" type="button" class="btn btn-light btn-sm">Add</button>

<div style="position: fixed;z-index: 99999;color:#808080; bottom:-11px;left:70px;"><p>&copy; <?= date('Y') ?> Yoga Lesmana</p></div>
<label style="position: fixed;z-index: 99999;color:#808080; top:21.5px;left:140px;">Lat</label>
<label style="position: fixed;z-index: 99999;color:#808080; top:35.5px;left:140px;">Lon</label>
<label id="lat" style="position: fixed;z-index: 9999;color:#808080; top:21.5px;left:170px;"></label>

<label id="lng" style="position: fixed;z-index: 99999;color:#808080; top:35.5px;left:170px;"></label>
<div id="map"></div>



<script type="text/javascript" src="<?php echo base_url('Assets/jQuery/jquery-3.6.0.js');?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/gmaps/gmapapi.js');?>" crossorigin="anonymous"></script>



<script type="text/javascript">

  window.base_url = <?php echo json_encode(base_url()); ?>;
 

  function initialize() {
    var base_url = window.location.origin;
    const iconBase =
    {   url: window.base_url+"/assets/gmaps/image/png/GoogleMarking.png",
        scaledSize: new google.maps.Size(25, 35), // scaled size
        origin: new google.maps.Point(-60,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
  
    $.ajax({url:"<?php echo site_url('home/get_location')?>",
    "type": "GET",
    success: function(result){
    var locations = JSON.parse(result);
   
    var locations_ = [
      [ 5.5289, 95.2918,'Kabupaten Aceh Besar, Aceh'],
      [ 5.4053, 95.9636,'Kabupaten Pidie, Aceh'],
      [ 5.5483, 95.3238,'Kota Banda Aceh, Aceh'],
      [ -6.1200, 106.1502,'Kota Serang, Banten'],
      [ -3.7331, 102.4504,'Kab. Bengkulu Tengah, Bengkulu'],
      [ -3.266325, 101.980461,'Kab. Bengkulu Utara, Bengkulu'],
      [ -2.550839999999937,101.10638000000006,'Kab. Mukomuko, Bengkulu'],
      [ -3.1666699999999537, 102.50000000000006,'Kab. Rejang Lebong, Bengkulu'],
      [ 3.5541756, 98.8786266,'Kab. Deli Serdang, Sumatera Utara'],
      [ 2.3117900000000304, 98.88637000000006,'Kabupaten Humbang Hasundutan, Sumatera Utara'],
      [ 2.39793, 99.21678,'Kabupaten Toba, Sumatera Utara'],
      [ 3.598401, 98.489166,'Kota Binjai, Sumatera Utara'],
      [ 3.5951956, 98.6722227,'Kota Medan, Sumatera Utara'],
      [ 2.970042,  99.068169,'Kota Pematang Siantar, Sumatera Utara'],
      [ -0.61898, 100.11997,'Kab. Padang Pariaman, Sumatera Barat'],
      [ -1.35, 100.567,'Kab. Pesisir Selatan, Sumatera Barat'],
      [ -0.2159, 100.6334,'Kota Payakumbuh, Sumatera Barat'],
      [ -0.333332, 103.166832666,'Kab. Indragiri Hilir, Riau'],
      [ 0.88333, 100.48333,'Kab. Rokan Hulu, Riau'],
      [ 0.811881,  101.797961,'Kab. Siak, Riau'],
      [ 0.533505,  101.447403,'Kota Pekanbaru, Riau'],
      [ -2.083666332, 101.474664768,'Kab. Kerinci, Jambi'],
      [ -2.499999999999943,	104.00000000000006,'Kab. Musi Banyuasin, Sumatera Selatan'],
      [ -3.249999999999943, 105.16667000000007,'Kab. Ogan Ilir, Sumatera Selatan'],
      [ -4.65728, 104.00659,'Kab. Ogan Komering Ulu, Sumatera Selatan'],
      [ -5.453099999999949,	104.98770000000007,'Kab. Lampung Selatan, Lampung'],
      [ -5.450000,	105.266670,'Kota Bandar Lampung, Lampung'],
      [ -5.0999996, 105.324665368,'Kota Metro, Lampung'],
      [ -1.91667, 105.93333,'Kab. Bangka, Kepulauan Bangka Belitung'],
      [ -2.0593695,105.1940395,'Kab. Bangka Barat, Kepulauan Bangka Belitung'],
      [ -2.8678037,	108.1428669,'Kab. Bangka Timur, Kepulauan Bangka Belitung'],
      [ 1.221836, 104.557549,'Kab. Bintan, Kepulauan Riau'],
      [ 2.924690000000055, 105.74407000000008,'Kab. Kepulauan Anambas, Kepulauan Riau'],
      [ 3.9384,108.38401,'Kab. Natuna, Kepulauan Riau'],
      [ -6.200000,106.816666,'Provinsi DKI Jakarta, DKI Jakarta'],
      [ -6.595038,106.816635,'Kab. Bogor, Jawa Barat'],
      [ -7.326220,108.329346,'Kab. Ciamis, Jawa Barat'],
      [ -7.227906,107.908699,'Kab. Garut, Jawa Barat'],
      [ -6.923700,106.928726,'Kab. Sukabumi, Jawa Barat'],
      [ -6.737246,108.550659,'Kota Cirebon, Jawa Barat'],
      [ -7.319563,108.202972,'Kota Tasikmalaya, Jawa Barat'],
      [ -7.4238544,109.2297912,'Kab. Banyumas, Jawa Tengah'],
      [ -6.967782, 111.413333575696,'Kab. Blora, Jawa Tengah'],
      [ -6.892344, 109.026947,'Kab. Brebes, Jawa Tengah'],
      [ -7.024666568,110.919329656,'Kab. Grobogan, Jawa Tengah'],
      [ -7.676190,109.663699,'Kab. Kebumen, Jawa Tengah'],
      [ -6.732099999999946,111.07100000000008,'Kab. Pati, Jawa Tengah'],
      [ -7.7166638,110.0166666,'Kab. Purworejo, Jawa Tengah'],
      [ -8.051218,110.694313,'Kab. Gunungkidul, DI Yogyakarta'],
      [ -7.71556,110.35556,'Kab. Sleman, DI Yogyakarta'],
      [ -8.2325,114.35755,'Kab. Banyuwangi, Jawa Timur'],
      [ -8.184486,113.668076,'Kab. Jember, Jawa Timur'],
      [ -8.233507,113.220802,'Kab. Lumajang, Jawa Timur'],
      [ -7.866688,111.466614,'Kab. Ponorogo, Jawa Timur'],
      [ -7.70623, 114.00976,'Kab. Situbondo, Jawa Timur'],
      [ -7.983908, 112.621391,'Kota Malang, Jawa Timur'],
      [ -8.2086521,115.4382347,'Kab. Lombok Barat,NTB'],
      [ -8.6853476, 116.282209754645,'Kab. Lombok Tengah, NTB'],
      [ -8.4920254,117.4209206,'Kab. Sumbawa, NTB'],
      [ -10.04767825, 123.995781436266,'Kab. Kupang, NTT'],
      [ -8.6870782,120.5361845,'Kab. Manggarai, NTT'],
      [ -8.7037352,121.2924998,'Kab. Ngada, NTT'],
      [ -10.178757,123.597603,'Kota Kupang, NTT'],
      [ -1.859098,109.971901,'Kab. Ketapang, Kalimantan Barat'],
      [ 0.25472,110.45,'Kab. Sanggau, Kalimantan Barat'],
      [ 0.90925, 108.98463,'Kota Singkawang, Kalimantan Barat'],
      [ -1.4999999999999432,112.50000000000011,'Kab. Katingan, Kalimantan Tengah'],
      [ -1.8526377,111.2845025,'Kab. Lamandau, Kalimantan Tengah'],
      [ -2.2136, 113.9108,'Kota Palangkaraya, Kalimantan Tengah'],
      [ 0.520395, 117.603374,'Kab. Kutai Timur, Kalimantan Timur'],
      [ -0.502106, 117.153709,'Kota Samarinda, Kalimantan Timur'],
      [ 2.9,117.1,'Kab. Bulungan,Kalimantan Utara'],
      [ 3.485050000000058,116.99965000000009,'Kab. Tana Tidung,Kalimantan Utara'],
      [ 3.31332, 117.59152,'Kota Tarakan,Kalimantan Utara'],
      [ 1.2537000000000376,124.83000000000004,'Kab. Minahasa,Sulawesi Utara'],
      [ 1.45528,125.2554532,'Kota Bitung,Sulawesi Utara'],
      [ 1.460126, 124.826347,'Kota Manado,Sulawesi Utara'],
      [ -1.640814,123.550408,'Kab. Banggai,Sulawesi Tengah'],
      [ -1.04261765,119.674469265066,'Kab. Donggala,Sulawesi Tengah'],
      [ -1.6568513,120.5421575,'Kab. Poso,Sulawesi Tengah'],
      [ -0.8917, 119.8707,'Kota Palu,Sulawesi Tengah'],
      [ -5.420999999999935,120.23990000000003,'Kab. Bulukumba,Sulawesi Selatan'],
      [ -5.166669999999954,119.66667000000007,'Kab. Gowa,Sulawesi Selatan'],
      [ -3.5657637,119.770527269267,'Kab. Luwu Utara,Sulawesi Selatan'],
      [ -4.951488, 119.577049,'Kab. Maros,Sulawesi Selatan'],
      [ -4.0045933,119.629966,'Kota Pare Pare,Sulawesi Selatan'],
      [ -4.804624,123.1752067,'Kab. Buton,Sulawesi Tenggara'],
      [ -3.9449999999999363,122.49889000000007,'Kab. Konawe,Sulawesi Tenggara'],
      [ -4.2027,122.4467,'Kab. Konawe Selatan,Sulawesi Tenggara'],
      [ -5.535833, 123.758056,'Kab. Wakatobi,Sulawesi Tenggara'],
      [ -5.46667,122.633,'Kota Bau Bau,Sulawesi Tenggara'],
      [ 0.5260200000000737,122.35601000000008,'Kab. Boalemo,Gorontalo'],
      [ 0.5392300000000319,123.11291000000006,'Kab. Bone Bolango,Gorontalo'],
      [ 0.5728000000000293,122.23370000000011,'Kab. Gorontalo,Gorontalo'],
      [ 0.556174, 123.058548,'Kota Gorontalo,Gorontalo'],
      [ -3.4173234,119.319507152196,'Kab. Polewali Mandar,Sulawesi Barat'],
      [ -6.711099999999931,108.55960000000005,'Kab. Buru,Maluku'],
      [ -3.514729999999929,126.8486200000001,'Kab. Buru Selatan,Maluku'],
      [ 0.5000000000000568,104.50000000000006,'Kab. Kepulauan Aru,Maluku'],
      [ -0.9666699999999651,101.58333000000005,'Kota Tual,Maluku'],
      [ 0.48056,128.25,'Kab. Halmahera Tengah,Maluku Utara'],
      [ -2.92641,132.29608,'Kab. Fak Fak,Papua Barat'],
      [ -3.6397187,133.7402301,'Kab. Kaimana,Papua Barat'],
      [ -1.5049499999999512,132.28638,'Kab. Sorong,Papua Barat'],
      [ -0.8666632,131.249999,'Kota Sorong,Papua Barat'],
      [ -2.89707999999996,140.76643,'Kab. Keerom,Papua'],
      [ -1.7564788,136.367660782307,'Kab. Kepulauan Yapen,Papua'],
      [ -8.499112, 140.404984,'Kab. Merauke,Papua'],
      
      
    ];
    //console.log(locations);

    var myLatlng = new google.maps.LatLng(-1.200000, 118.816666);
    var marker, i;
    var myOptions = {
      zoom: 6,
      center: myLatlng,
      zoomControl: true,
      disableDoubleClickZoom: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map"), myOptions);


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
        icon:iconBase,
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

