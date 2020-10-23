<?php

$lat=$_GET["lat"];
$lon=$_GET["lon"];
$r=$_GET["r"];

?>

<!DOCTYPE html>
<html lang="it">
  <head>
  <title>Trasporti GTFS Demo Tutorial</title>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
  <link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.3/normalize.css" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css" />
   <link rel="stylesheet" href="http://turbo87.github.io/leaflet-sidebar/src/L.Control.Sidebar.css" />
   <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="MarkerCluster.css" />
        <link rel="stylesheet" href="MarkerCluster.Default.css" />
        <meta property="og:image" content="http://www.piersoft.it/gtfsmatera/bus_.png"/>
  <script src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
<script src="http://turbo87.github.io/leaflet-sidebar/src/L.Control.Sidebar.js"></script>
   <script src="leaflet.markercluster.js"></script>
   <script src="http://joker-x.github.io/Leaflet.geoCSV/lib/jquery.js"></script>

<script type="text/javascript">

function microAjax(B,A){this.bindFunction=function(E,D){return function(){return E.apply(D,[D])}};this.stateChange=function(D){if(this.request.readyState==4 ){this.callbackFunction(this.request.responseText)}};this.getRequest=function(){if(window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP")}else { if(window.XMLHttpRequest){return new XMLHttpRequest()}}return false};this.postBody=(arguments[2]||"");this.callbackFunction=A;this.url=B;this.request=this.getRequest();if(this.request){var C=this.request;C.onreadystatechange=this.bindFunction(this.stateChange,this);if(this.postBody!==""){C.open("POST",B,true);C.setRequestHeader("X-Requested-With","XMLHttpRequest");C.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");C.setRequestHeader("Connection","close")}else{C.open("GET",B,true)}C.send(this.postBody)}};
function microAjax2(B,A){this.bindFunction=function(E,D){return function(){return E.apply(D,[D])}};this.stateChange=function(D){if(this.request.readyState==4 ){this.callbackFunction(this.request.responseText)}};this.getRequest=function(){if(window.ActiveXObject){return new ActiveXObject("Microsoft.XMLHTTP")}else { if(window.XMLHttpRequest){return new XMLHttpRequest()}}return false};this.postBody=(arguments[2]||"");this.callbackFunction=A;this.url=B;this.request=this.getRequest();if(this.request){var C=this.request;C.onreadystatechange=this.bindFunction(this.stateChange,this);if(this.postBody!==""){C.open("POST",B,true);C.setRequestHeader("X-Requested-With","XMLHttpRequest");C.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");C.setRequestHeader("Connection","close")}else{C.open("GET",B,true)}C.send(this.postBody)}};

</script>
  <style>
  #mapdiv{
        position:fixed;
        top:0;
        right:0;
        left:0;
        bottom:0;
        font-family: Titillium Web, Arial, Sans-Serif;
}
#logo{
position:fixed;
top:10px;
left:50px;
z-index: 0;
// border-radius: 5px;
//      -moz-border-radius: 5px;
//    -webkit-border-radius: 5px;
//    border: 2px solid #808080;
//    background-color:#fff;
//    padding:2px;
//    box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}
div.circlered {
	/* IE10 */
background-image: -ms-linear-gradient(top right, red 0%, black 100%);

/* Mozilla Firefox */
background-image: -moz-linear-gradient(top right, red 0%, black 100%);

/* Opera */
background-image: -o-linear-gradient(top right, red 0%, black 100%);

/* Webkit (Safari/Chrome 10) */
background-image: -webkit-gradient(linear, right top, left bottom, color-stop(0, red), color-stop(1,black));

/* Webkit (Chrome 11+) */
background-image: -webkit-linear-gradient(top right, red 0%, black 100%);

/* Regola standard */
background-image: linear-gradient(top right, red 0%, black 100%);
    background-color: red;
    border-color: black;
    border-radius: 50px;
    border-style: solid;
    border-width: 1px;
	font-color: white;
    width:5px;
    height:5px;
}
#infodiv{
background-color: rgba(255, 255, 255, 0.95);

font-family: Titillium Web, Arial, Sans-Serif;
padding: 2px;


font-size: 10px;
bottom: 13px;
left:0px;


max-height: 50px;

position: fixed;

overflow-y: auto;
overflow-x: hidden;
}
#loader {
    position:absolute; top:0; bottom:0; width:100%;
    background:rgba(255, 255, 255, 0.9);
    transition:background 1s ease-out;
    -webkit-transition:background 1s ease-out;

}
#loader.done {
    background:rgba(255, 255, 255, 0);
}
#loader.hide {
    display:none;
}
#loader .message {
    position:absolute;
    left:50%;
    top:50%;
}
p.pic {
    width: 48px;
    margin-right: auto;
    margin-left: 18px;
}

        .lorem {
            font-style: Titillium Web;
            color: #AAA;
        }
</style>
  </head>

<body>

  <div data-tap-disabled="true">

 <div id="mapdiv"></div>

<div id="infodiv" style="leaflet-popup-content-wrapper">
  <p><b>Trasporti Miccolis spa<br></b>
  Mappa con fermate, linee e orari dei Bus dei TPL della <a href="http://dati.comune.matera.it/dataset/trasporti-pubblici-locali-comune-di-matera-gtfs">Miccolis spa</a>. <a href="http://www.piersoft.it/?p=1017">Map e turorial</a> by @piersoft. GTFS Lic. CC-BY <a href="http://dati.comune.matera.it/dataset/trasporti-pubblici-locali-comune-di-matera-gtfs">OpenData Comune di Matera</a></p>
</div>
<div id="logo" style="leaflet-popup-content-wrapper">
<a href="https://www.piersoft.it/gtfsmatera/" target="_blank"><img src="logo.png" width="40px" title="localizzami" alt="localizzami"></a>
</div>
<div id="sidebar" style="z-index: 1;">

</div>
<div id='loader'><span class='message'><p class="pic"><img src="http://www.piersoft.it/gtfsmatera/ajax-loader3.gif"></p></span></div>
</div>
<script type="text/javascript">
</script>
<script language="javascript" type="text/javascript">
<!--

// -->
</script>
  <script type="text/javascript">
  var dataLayer = new L.geoJson();
    var lat='<?php printf($_GET['lat']); ?>',
        lon='<?php printf($_GET['lon']); ?>',
        zoom=18;

        var OpenStreetMap_France = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        	maxZoom: 20,
        	attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var transport = new L.TileLayer('http://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png?apikey=4643f97f7287443bbaf68e36de6b4ecf', {minZoom: 0, maxZoom: 20, attribution: 'Map Data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors.'});
        var realvista = L.tileLayer.wms("http://213.215.135.196/reflector/open/service?", {
                layers: 'rv1',
                format: 'image/jpeg',attribution: '<a href="http://www.realvista.it/website/Joomla/" target="_blank">RealVista &copy; CC-BY Tiles</a> | <a href="http://openstreetmap.org">OpenStreetMap</a> contributors.'
              });

        var osm = new L.TileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: 'Map Data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors. map by @piersoft'});
    //    var mapquest = new L.TileLayer('http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png', {subdomains: '1234', maxZoom: 18, attribution: 'Map Data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'});

        var map = new L.Map('mapdiv', {
            editInOSMControl: true,
            editInOSMControlOptions: {
                position: "topright"
            },
            center: new L.LatLng(lat, lon),
            zoom: zoom,
            layers: [OpenStreetMap_France]
        });

        var baseMaps = {
    "Trasporti": transport,
    "OpenStreetMap_France": OpenStreetMap_France,
    "RealVista": realvista
        };

    var sidebar = L.control.sidebar('sidebar', {
          closeButton: true,
          position: 'right'
      });
      map.addControl(sidebar);
      map.addLayer(dataLayer);
        L.control.layers(baseMaps).addTo(map);
        var markeryou = L.marker([parseFloat('<?php printf($_GET['lat']); ?>'), parseFloat('<?php printf($_GET['lon']); ?>')]).addTo(map);
        markeryou.bindPopup("<b>Sei qui</b>");
       var ico=L.icon({iconUrl:'circle.png', iconSize:[25,25],iconAnchor:[12,12]});
       var markers = L.markerClusterGroup({spiderfyOnMaxZoom: false, showCoverageOnHover: true,zoomToBoundsOnClick: true,disableClusteringAtZoom: 18});

       var marker = new L.marker([lat,lon],{
           draggable: true
       }).addTo(map);

       marker.on("drag", function(e) {
           var marker = e.target;
           var position = marker.getLatLng();
           window.open("locator.php?lat="+position.lat+"&lon="+position.lng,"_self");
          // map.panTo(new L.LatLng(position.lat, position.lng));
       });

        function loadLayer(url)
        {
                var myLayer = L.geoJson(url,{
                        onEachFeature:function onEachFeature(feature, layer) {
                                if (feature.properties && feature.properties.id) {

                                }

                        },
                        pointToLayer: function (feature, latlng) {
                          var classs='circlered';

                        var marker = new L.Marker(latlng, { icon: L.divIcon({
                          className : classs,
                                          iconSize : [20,20],
                      html: '<div style="display: table; height:'+20+'px; overflow: hidden; "><div align="center" style="display: table-cell; vertical-align: middle;"><div style="width:'+20+'px;"><font color="white">'+feature.properties.stop_code+'</font></div></div></div>'}),
                                          title: feature.properties.stop_code
                                        });


                        markers[feature.properties.id] = marker;
                        marker.bindPopup('',{maxWidth:50, autoPan:true});

                        return marker;
                      //  }
              //  });
            },
            firstLineTitles: true
          });
                //map.addLayer(myLayer);
                markers.addLayer(myLayer);
                map.addLayer(markers);
                markers.on('popupopen', function(e){
                  map.closePopup();
                  sidebar.getCloseButton();
                  sidebar.hide();
                  var marker = e.popup._source.feature.properties.stop_id;
                  var name = e.popup._source.feature.properties.stop_name;
                  var stop_ids=e.popup._source.feature.properties.stop_ids;
                  var stop_arrives=e.popup._source.feature.properties.stop_arrives;
                  var trip_ids=e.popup._source.feature.properties.trip_ids;
                  var route_short_namer=e.popup._source.feature.properties.route_short_namer;
                  var route_long_namer=e.popup._source.feature.properties.route_long_namer;
                  var route_idr=e.popup._source.feature.properties.route_idr;
                  var service_idc=e.popup._source.feature.properties.service_idc;
                  var trip_idt=e.popup._source.feature.properties.trip_idt;
                  var service_idt=e.popup._source.feature.properties.service_idt;
                  var route_idt=e.popup._source.feature.properties.route_idt;
                  var calendar_monday=e.popup._source.feature.properties.calendar_monday;
                  var start_date=e.popup._source.feature.properties.start_date;
                  var end_date=e.popup._source.feature.properties.end_date;

                  console.log(marker+" "+name+" calendar monday"+calendar_monday+"startdate"+start_date+" enddate "+ end_date);
                  sidebar.show();
                var contenedor = document.getElementById('sidebar');
                if(marker == '')
                {contenedor.innerHTML = '';
                } else{
                var infodiv=  document.getElementById('infodiv');
                if(infodiv) document.getElementById('infodiv').remove();

                var logo= document.getElementById('logo');
                if(infodiv) document.getElementById('logo').remove();
                map.closePopup();
                sidebar.getCloseButton();

                  contenedor.innerHTML = '<iframe width="100%" height="100%" src="https://www.piersoft.it/gtfsmatera/tmp.php?id='+marker+'&sname='+name+'&stop_ids='+stop_ids+'&stop_arrives='+stop_arrives+'&trip_ids='+trip_ids+'&route_short_namer='+route_short_namer+'&route_long_namer='+route_long_namer+'&route_idr='+route_idr+'&service_idc='+service_idc+'&trip_idt='+trip_idt+'&service_idt='+service_idt+'&route_idt='+route_idt+'&calendar_monday='+calendar_monday+'&start_date='+start_date+'&end_date='+end_date+'" frameborder="0" allowfullscreen></iframe>';
        //      var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
        //      var URL = "http://matera.geosocialcity.it/where/sign/stop.action?id=1_"+marker;
        //      var win = window.open(URL, strWindowFeatures);

        //      contenedor.innerHTML = '<iframe width="100%" height="600" src="http://matera.geosocialcity.it/where/sign/stop.action?id=1_'+marker+'" frameborder="0" allowfullscreen></iframe>';

          //      contenedor.innerHTML = '<iframe width="100%" height="600" src="http://matera.geosocialcity.it/where/standard/stop.action?id=1_'+marker+'" frameborder="0" allowfullscreen></iframe>';
          console.log(contenedor.innerHTML);
                }
                //finishedLoadinglong(corse);
              });

              //  markers.addLayer(myLayer);
              //  map.addLayer(markers);
              //  markers.on('click',MostrarVideo(feature.properties.stop_code));
        }


        microAjax('json/mappaf.json',function (res) {
        var feat=JSON.parse(res);
        loadLayer(feat);
        //route();
          finishedLoading();
        } );

  function startLoading() {
    loader.className = '';
  }

  function finishedLoading() {
    // first, toggle the class 'done', which makes the loading screen
    // fade out
    loader.className = 'done';
    setTimeout(function() {
        // then, after a half-second, add the class 'hide', which hides
        // it completely and ensures that the user can interact with the
        // map again.
        loader.className = 'hide';
    }, 500);
  }
      sidebar.on('show', function () {
          console.log('Sidebar will be visible.');
      });

      sidebar.on('shown', function () {
          console.log('Sidebar is visible.');
      });

      sidebar.on('hide', function () {
          console.log('Sidebar will be hidden.');
      });

      sidebar.on('hidden', function () {
          console.log('Sidebar is hidden.');
      });

      L.DomEvent.on(sidebar.getCloseButton(), 'click', function () {
          console.log('Close button clicked.');
          location.reload();
      });

      function addDataToMapUCL(data, map) {
        var dataLayer1 = L.geoJson(data,{

              onEachFeature: function(feature, layer) {
                var popupString = '<div class="popup">';
                var direzione="ANDATA";
                if (feature.properties.direction_id ==1) direzione="RITORNO";
                  popupString += '<b>Numero: </b>' + feature.properties.name + '<br />';
                  popupString += '<b>Linea: </b>' + feature.properties.route_long_name + '<br />';
                  popupString += '<b>Direzione: </b> ' + direzione + '<br />';

                                  //  for (var k in feature.properties) {
                                  //      var v = feature.properties[k];
                                  //      popupString += '<b>'+k + '</b>: ' + v + '<br />';
                                  //  }
                  popupString += '</div>';
                  layer.bindPopup(popupString);
              layer.setStyle({
               weight: 5,
               opacity: 0.7,
               color: '#'+feature.properties.route_color,
               dashArray: '3',
               fillOpacity: 0.3,
               fillColor: '#000000'
              })
              //console.log(feature.properties.routes_route_color);
              }

              });
          dataLayer1.addTo(map);

      }

      $.getJSON("json/routes.geojson", function(data) { addDataToMapUCL(data, map); });

  </script>

  </body>
  </html>
