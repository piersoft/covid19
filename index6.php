
<?php
if(isset($_GET['incidenza']))
{
    // Do something
}else{
	$_GET['incidenza']=1;
}

 ?>
<!DOCTYPE html>
<html ontouchmove >
<head>

	<title>Coronavirus</title>
<META HTTP-EQUIV="Refresh" CONTENT="200">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:image" content="http://www.piersoft.it/covid19/map.png" />
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
	 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet" />

	 <link rel="stylesheet" href="https://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.css" />
		<!--[if lte IE 8]> <link rel="stylesheet" href="http://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.ie.css" />  <![endif]-->
		<script src="https://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.js"></script>

		<!-- GeoCSV: https://github.com/joker-x/Leaflet.geoCSV -->
	<!--	<script src="leaflet.geocsv-src2.js"></script>-->

		<script src="https://joker-x.github.io/Leaflet.geoCSV/lib/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>


		<!-- Leaflet 0.5: https://github.com/CloudMade/Leaflet-->
	<link rel="stylesheet" href="http://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.css" />
	<!--[if lte IE 8]> <link rel="stylesheet" href="../../lib/leaflet.ie.css" />  <![endif]-->
	<script src="http://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.js"></script>

	<!-- MarkerCluster https://github.com/danzel/Leaflet.markercluster -->
	<link rel="stylesheet" href="http://joker-x.github.io/Leaflet.geoCSV/lib/MarkerCluster.css" />
	<link rel="stylesheet" href="http://joker-x.github.io/Leaflet.geoCSV/lib/MarkerCluster.Default.css" />
	<!--[if lte IE 8]> <link rel="stylesheet" href="../../lib/MarkerCluster.Default.ie.css" /> <![endif]-->
	<script src="http://joker-x.github.io/Leaflet.geoCSV/lib/leaflet.markercluster-src.js"></script>

	<!-- GeoCSV: https://github.com/joker-x/Leaflet.geoCSV -->
	<script src="http://joker-x.github.io/Leaflet.geoCSV/leaflet.geocsv-src.js"></script>



<script src="leaflet-hash.js"></script>
		<link rel="stylesheet" type="text/css" href="leaflet.social.css" />
	<script type='text/javascript' src="leaflet.social.js"></script>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"></link>
	<link rel="stylesheet" href="leaflet.menu.min.css"></link>
	<link rel="stylesheet" href="easy-button.css"></link>
	<script src="easy-button.js"></script>
	<script src="leaflet.menu.min.js"></script>


	<style>
		html, body {
			  font-family: Titillium Web, Arial, Sans-Serif;
			height: 100%;
			margin: 0;
		}
		#map {
			width: 100%;
			margin: 0;
			padding: 0;
			height: 100%;
			z-index:0;
		}

		.countryLabel{
		//	background: transparent;
		  background: rgba(255, 255, 255, 0);
		  border:0;
			color: blue;
		  border-radius:0px;
		  box-shadow: 0 0px 0px;
		}

		#popup{
			background-color: #fefefe;
			font-family: Titillium Web, Arial, Sans-Serif;

margin: 15% auto; /* 15% from the top and centered */
padding: 20px;
border: 1px solid #888;
#width: 80%; /* Could be more or less, depending on screen size */

		}

		#infodiv{
			visibility:hidden;
		#	margin:auto;
		#	position:relative;

		background-color: rgba(255, 255, 255, 0.9);
		font-family: Titillium Web, Arial, Sans-Serif;
		padding: 5px;
		font-size: 10px;
		bottom: 60px;
		left:5px;

		max-height: 150px;

		position: fixed;

		overflow-y: auto;
		overflow-x: hidden;
		border-radius: 10px;
					-moz-border-radius: 10px;
					-webkit-border-radius: 10px;
					border: 2px solid #808080;

					box-shadow: 0 3px 14px rgba(0,0,0,0.4)
		}

		#infodiv1{
		background-color: rgba(255, 255, 255, 0.9);
		font-family: Titillium Web, Arial, Sans-Serif;
		padding: 2px;
		font-size: 10px;
		top: 300px;
		padding: 5px;
		right: 5px;

		max-height: 30px;

		#margin:auto;
		position:fixed;

		overflow-y: hidden;
		overflow-x: hidden;

		border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)

		}

		#show-hide {
				#	border: 1px solid black;
					text-align:center;
				}

#infodivtitolo{
background-color: rgba(255, 255, 255, 0.9);
font-family: Titillium Web, Arial, Sans-Serif;
padding: 8px;
font-size: 10px;
top: 10px;
left:50px;

max-height: 50px;

position: fixed;

overflow-y: auto;
overflow-x: hidden;
border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border: 2px solid #808080;

	box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
div {
  font-family: Titillium Web, Arial, Sans-Serif;
	font-size: 13px;
#text-align: center;
}

#loader {
    position:absolute; top:0; bottom:0; width:100%;
    background:rgba(255, 255, 255, 0.95);
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
    left:40%;
    top:50%;
}
div.circlered {

/* Regola standard */
		background-image: linear-gradient(top right, red 0%, black 100%);
    background-color: red;
    border-color: red;
    border-radius: 70px;
    border-style: solid;
    border-width: 2px;
	  font-color: white;
    width:5px;
    height:5px;
		background:rgba(0, 30, 255, 0.2);
}
#logomappa{
position:fixed;
top:90px;
right:10px;
z-index: 0;
overflow-y: auto;
overflow-x: hidden;
#border-radius: 10px;
	#		-moz-border-radius: 10px;
	#		-webkit-border-radius: 10px;
	#		border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}
#logomappa2{
#position:fixed;
margin-top:4px;
top:120px;
right:10px;
z-index: 1;
overflow-y: auto;
overflow-x: hidden;
box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}

#logo{
#position:fixed;
top:220px;
margin-top:4px;
right:10px;
z-index: 1;
overflow-y: auto;
overflow-x: hidden;
#border-radius: 10px;
	#		-moz-border-radius: 10px;
	#		-webkit-border-radius: 10px;
	#		border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}
#logoreg{
position:fixed;
top:150px;
right:10px;
z-index: 1;
overflow-y: auto;
overflow-x: hidden;
#border-radius: 10px;
	#		-moz-border-radius: 10px;
	#		-webkit-border-radius: 10px;
	#		border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}
#logonewc{
position:fixed;
top:150px;
right:10px;
z-index: 1;
overflow-y: auto;
overflow-x: hidden;
#border-radius: 10px;
	#		-moz-border-radius: 10px;
	#		-webkit-border-radius: 10px;
	#		border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)

}

#logomappatime{
	#position:fixed;
	margin-top:4px;
	top:205px;
	right:10px;
	z-index: 1;
	overflow-y: auto;
	overflow-x: hidden;
	box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
#logomappatimereg{
	#position:fixed;
	margin-top:4px;
	top:225px;
	right:10px;
	z-index: 1;
	overflow-y: auto;
	overflow-x: hidden;
	box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
#logomappadecessi{
	#position:fixed;
	margin-top:4px;
	top:205px;
	right:10px;
	z-index: 1;
	overflow-y: auto;
	overflow-x: hidden;
	box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
#note{

	bottom:220px;
	left:5px;
	background-color: rgba(255, 255, 255, 0.9);
	font-family: Titillium Web, Arial, Sans-Serif;
	padding: 5px;
	font-size: 10px;

	max-width: 500px;
	max-height: 200px;

	position: fixed;

	overflow-y: auto;
	overflow-x: hidden;
	border-radius: 10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border: 2px solid #808080;

		box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
.modal {
  display: none; /* Hidden by default */
#  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
	left: 0;
  top:  0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
#  overflow: scroll; /* Enable scroll if needed */
#  background-color: rgb(0,0,0); /* Fallback color */
#  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 1% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 75%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.legend1 {
    line-height: 18px;
    color: #555;
		top: 280px;
		background:rgba(255, 255, 255, 0.5);
		overflow-y: auto;
		overflow-x: hidden;
		border-radius: 10px;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px;
			border: 2px solid #808080;

			box-shadow: 0 3px 14px rgba(0,0,0,0.4)
}
.legend1 i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
		margin-top: -16px;
}

.legend {
    line-height: 18px;
    color: #555;
}
.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}

}


	</style>
	<script type="text/javascript">
				function show_hide(){
					var visualizza = document.getElementById("show-hide");
					var mydiv = document.getElementById("infodiv");

					if (visualizza.innerHTML == "Crediti e note"){
						mydiv.style.visibility = "visible";
						visualizza.innerHTML = "Nascondi";
					}
					else if (visualizza.innerHTML == "Nascondi") {
						mydiv.style.visibility = "hidden";
						visualizza.innerHTML = "Crediti e note";
					}
				}
			</script>
</head>
<body>

<div id='map'></div>


<!--
<div id="logo3" style="leaflet-popup-content-wrapper">
<p>Ricarica la pagina se </br>i dati non si vedono</p>
</div>
-->
<div id='loader' ><span class='message'><p class="pic"><img src="http://www.piersoft.it/covid19/ajax-loader3.gif"></p></span></div>

	<div id="infodiv1" style="leaflet-popup-content-wrapper">
			<p id="show-hide" onclick="show_hide();" onmouseover="this.style.color='black'" onmouseout="this.style.color='black'">Crediti e note</p>
	</div>
		<div id="infodiv" style="leaflet-popup-content-wrapper">
			<p>
			Sorgenti dei dati aperti:<br><a href="https://github.com/pcm-dpc/COVID-19" targer="_blank">Dipartimento Protezione Civile Lic. CCBY4.0<br></a><a href="https://www.istat.it/it/archivio/104317" targer="_blank">Basi territoriali ISTAT Lic. CCBY3.0</a><br><a href="http://www.dati.salute.gov.it/dati/dettaglioDataset.jsp?menu=dati&idPag=96" targer="_blank">Ministero Salute Lic. IoDL2.0</a></br>by @piersoft. Lic. CCBYSA<br>Mappa non ufficiale.L'autore non è responsabile dei dati</p>
	<p class="pic">kindly hosted by  <a href="https://www.digimat.it/" target="_blank"><img src="digimat.png"></a></br></p>
	<p class="pic"><a href="http://www.salute.gov.it/portale/nuovocoronavirus/dettaglioNotizieNuovoCoronavirus.jsp?lingua=italiano&menu=notizie&p=dalministero&id=4279" target="_blank"><img src="banner.jpg" width="250px"></a></br></p>

	<div id="note" style="leaflet-popup-content-wrapper">
			<p>
			Note:<br>
			<?php
			$contenuto=file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vRx5j3Xw7f7C3TmCShTTXCy7T8tFu0cV_GrHPf28lDOh8cZjsjGsD5xriQSsS7TMFejYqwPf93wsGS5/pub?gid=1222645974&single=true&output=csv");
			$contenuto=str_replace("\n","</br>",$contenuto);
			if( isset($contenuto) && ($contenuto!==null) ){
			echo ($contenuto);
			}
			?>
		</p>
		</div>

		</div>


<div id="infodivtitolo" style="leaflet-popup-content-wrapper">
	<p><b>
	<?php
 if (htmlspecialchars($_GET["incidenza"])=="1")	echo 'Covid19 - Progressivo contagio Province.</br>Incidenza ogni 10000 residenti' ?>
 <?php
 if (htmlspecialchars($_GET["incidenza"])=="2")	echo 'Covid19 - Progressivo contagio Regioni.</br>Terapie Intensive ' ?>

 <?php
 if (htmlspecialchars($_GET["incidenza"])=="3")	echo '<b>Covid19 - Progressivo contagio Regioni.</br>Nuovi attualmente positivi' ?>

 <?php
 if (htmlspecialchars($_GET["incidenza"])=="0")	echo 'Covid19 - Progressivo contagio Province.</br>Casi totali' ?>
</b></p></div>
<!--
<div id="logoreg" style="leaflet-popup-content-wrapper">
<a href="https://infogram.com/coronavirus-per-regioni-1h7v4p8713j86k0?live" target="_blank"><img src="logoreg.png" width="80px" title="infografica" alt="infografica"></a>

</div>
-->
<div>
<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=0" ><img src="mapcasi2.png" width="80px" title="mappacasi" alt="mappacasi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatime" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index2.php" ><img src="mappatime.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatimereg" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index3.php" ><img src="mappatimreg.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappadecessi" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index4.php" ><img src="mappadecessi.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}else if (htmlspecialchars($_GET["incidenza"])=="1"){
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=0" ><img src="mapcasi2.png" width="80px" title="mappacasi" alt="mappacasi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=2" ><img src="mapternew1.png" width="80px" title="mappaterapiaintensiva" alt="mappaterapiaintensiva"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatime" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index2.php" ><img src="mappatime.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatimereg" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index3.php" ><img src="mappatimreg.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappadecessi" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index4.php" ><img src="mappadecessi.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}else if (htmlspecialchars($_GET["incidenza"])=="3"){
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=0" ><img src="mapcasi2.png" width="80px" title="mappacasi" alt="mappacasi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=2" ><img src="mapternew1.png" width="80px" title="mappaterapiaintensiva" alt="mappaterapiaintensiva"></a>';
	echo '<div id="logomappatime" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index2.php" ><img src="mappatime.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatimereg" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index3.php" ><img src="mappatimreg.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappadecessi" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index4.php" ><img src="mappadecessi.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}else{
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=2" ><img src="mapternew1.png" width="80px" title="mappaterapiaintensiva" alt="mappaterapiaintensiva"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatime" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index2.php" ><img src="mappatime.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappatimereg" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index3.php" ><img src="mappatimreg.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappadecessi" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/index4.php" ><img src="mappadecessi.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}?>
</div>
<?php
function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobileDevice()){
	echo '	<div id="logo" style="leaflet-popup-content-wrapper">
	<a href="https://infogram.com/coronavirus-1hnq41zz0vdk63z?live" target="_blank"><img src="logo1.png" width="80px" title="infografica" alt="infografica"></a>

	</div>';
}else {


	echo '<div id="logo" style="leaflet-popup-content-wrapper"><img src="logo1.png" width="80px" title="infografica" alt="infografica"></div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
		<script id="infogram_0_cb8da50c-ce5b-472f-a63a-85371df81c9b" title="Coronavirus" src="https://e.infogram.com/js/dist/embed.js?Ouv" type="text/javascript"></script><div style="padding:8px 0;font-family:Arial!important;font-size:13px!important;line-height:15px!important;text-align:center;border-top:1px solid #dadada;margin:0 30px"><a href="https://infogram.com/cb8da50c-ce5b-472f-a63a-85371df81c9b" style="color:#989898!important;text-decoration:none!important;" target="_blank">Coronavirus</a><br><a href="https://infogram.com" style="color:#989898!important;text-decoration:none!important;" target="_blank" rel="nofollow">Infogram</a></div>
	</div>';
}
 ?>




<script type="text/javascript" src="<?php if (htmlspecialchars($_GET["incidenza"])=="2" || htmlspecialchars($_GET["incidenza"])=="3")	echo ('regioni2.js'); else echo ('provincenew1.js'); ?>"></script>

<script type="text/javascript">

	var map = L.map('map').setView([41.838,13.881], 6);

var osmfr =	L.tileLayer('http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		maxZoom: 20,attribution:'M&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors. Map by @piersoft'}
	);

var osm =	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors. Map by @piersoft'
}).addTo(map);

var baseMaps = {

"OSM fr": osmfr,
"OSM": osm
	 };
	 L.control.layers(baseMaps).addTo(map);

L.control.social({default_text: "Coronavirus Map by @piersoft"})
					.addTo(map);

var hash = new L.Hash(map);
	var dataLayer1 = new L.geoJson();
	var mydiv = document.getElementById("infodiv");
	var visualizza = document.getElementById("show-hide");

	var menu = L.leafletMenu(map, {
					items: {
							Infografiche: {
									onClick: function () {
										document.createElement('');
									},
							},
							Regioni_casi_terapia_intensiva: {
									href: 'https://www.piersoft.it/covid19/?incidenza=2',
							},
							Province_casi_totali: {
									href: 'https://www.piersoft.it/covid19/?incidenza=0',
							},
							Regioni_nuovi_casi_giornalieri: {
									href: 'https://www.piersoft.it/covid19/?incidenza=3',
							}
							,
							Time_Map: {
									href: 'https://www.piersoft.it/covid19/index2.php',
							}
							,
							Time_Map_attualmente_positivi: {
									href: 'https://www.piersoft.it/covid19/index3.php',
							}
							,
							Time_Map_decessi: {
									href: 'https://www.piersoft.it/covid19/index4.php',
							}
					}
	});
	var menuButton = L.easyButton({
			states: [{
					stateName: 'show-menu',
					icon: 'fa fa-tasks',
					title: 'Show Menu',
					onClick: function (btn, map) {
							menu.options.button = btn;
							menu.show();
							btn.state('hide-menu');
					}
			},{
					stateName: 'hide-menu',
					icon: 'fa fa-tasks',
					title: 'Hide Menu',
					onClick: function (btn, map) {
						show_hide();
							menu.hide();
							btn.state('show-menu');
					}
			}],
			id: 'styles-menu',
	});
	menuButton.addTo(map);

	function test(check)
	{
		console.log('Check = '+check);
		if (check==1){
		//	alert('Ricarica la pagina tra 30 secondi. Abbiamo molti accessi. Grazie');
		setTimeout(reload, 500);
	}else{
		<?php
	if (htmlspecialchars($_GET["incidenza"])=="1" || htmlspecialchars($_GET["incidenza"])=="0"){
			echo 'setTimeout(csvtomap(), 100);';
		}
		?>
//		csvtomap();
		finishedLoading();
	}

		}

		var data1=<?php


	function csvtojson($file,$delimiter)
	{
			if (($handle = fopen($file, "r")) === false)
			{
							die("can't open the file.");
			}

			$csv_headers = fgetcsv($handle, 4000, $delimiter);
			$csv_json = array();

			while ($row = fgetcsv($handle, 4000, $delimiter))
			{
							$csv_json[] = array_combine($csv_headers, $row);
			}

			fclose($handle);
			return json_encode($csv_json);
	}

$url="datageo.txt";
			print_r(csvtojson($url,','));

		 ?>;

var f=5; //fattore di divisione per i colori


	// get color dipende dal totale casi normalizzati sulla popolazione (incidenza1000)
	function getColor1000(d) {

 	//	console.log('sono qui');
		return d/f > 10 ? '#800026' :
				d/f > 5  ? '#BD0026' :
			d/f > 2  ? '#E31A1C' :
				d/f> 1  ? '#FC4E2A' :
			d/f > 0.50   ? '#FD8D3C' :
				d/f > 0.20   ? '#FEB24C' :
			d/f > 0.10   ? '#FED976' :
			d/f >= 0		 ? '#FFFFFF' :
							'#FFEDA0';
	}
	function getColorreg(d) {
console.log('d: '+d);
console.log('d/f*100: '+d/f*100);

		return d/f*100 > 50 ? '#800026' :
				d/f*100 > 30  ? '#BD0026' :
				d/f*100 > 25  ? '#E31A1C' :
			d/f*100 > 10 ? '#FC4E2A' :
				d/f*100 > 5   ? '#FD8D3C' :
			d/f*100 > 3   ? '#FEB24C' :
			d/f*100> 1   ? '#FED976' :
			d/f >= 0		 ? '#FFFFFF' :
							'#FFEDA0';
	}

	// get color dipende dal totale casi
	function getColor(d) {

		return d/f > 1000 ? '#800026' :
				d/f > 500  ? '#BD0026' :
				d/f > 200  ? '#E31A1C' :
				d/f > 100  ? '#FC4E2A' :
				d/f > 50   ? '#FD8D3C' :
			d/f > 20   ? '#FEB24C' :
			d/f > 10   ? '#FED976' :
			d/f >= 0		 ? '#FFEDA0' :
							'#FFEDA0';
	}

	function style(feature) {
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.casi)
		};
	}
	function stylereg(feature) {
	//	console.log(feature.properties.percentualeoccupazioneletti);
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColorreg(feature.properties.percentualeoccupazioneletti)
		};
	}

	function style10000(feature) {
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor1000(feature.properties.incidenza10000)
		};
	}
	function stylenewcases(feature) {
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature.properties.nuovi_attualmente_positivi)
		};
	}


	var legend = L.control({position: 'topright'});

	legend.onAdd = function (map) {

	    var div = L.DomUtil.create('div', 'info legend1'),
			<?php
			if (htmlspecialchars($_GET["incidenza"])=="1" ){

			echo 'grades = [0.1,0.5,1,2,5,10,50,100]';

			}else if (htmlspecialchars($_GET["incidenza"])=="2"){
				echo 'grades = [1, 3, 5, 10,25,30,50,100]';

		}else if (htmlspecialchars($_GET["incidenza"])=="3"){
			echo 'grades = [0,1, 3, 5, 10,25,30,50,100,200]';

	}	else{
	//	0,10,20,50,100,200,500,1000
		//		echo 'grades = [0,1,5,10,50,250,2000]';
		echo 'grades = [0,10,20,50,100,200,500,1000]';
		}
			?>
	        ,
	        labels = [];


					<?php
					if (htmlspecialchars($_GET["incidenza"])=="1" ){

					echo 'var f1=1;';


				}else{
					echo 'var f1=f;';
				}?>
					//console.log(grades);
	    // loop through our density intervals and generate a label with a colored square for each interval
	    for (var i = 0; i < grades.length; i++) {

	        div.innerHTML +=
	            '<i style="background:' +

							<?php
							if (htmlspecialchars($_GET["incidenza"])=="1" ){

							echo 'getColor1000(grades[i]/f1/1)';


							}else if (htmlspecialchars($_GET["incidenza"])=="2"){
								echo 'getColorreg(grades[i]/f1/2.5)';

						}else if (htmlspecialchars($_GET["incidenza"])=="3"){
							echo 'getColor(grades[i]/f1*100)';

					}else{
								echo 'getColor1000(grades[i]/f/2.5)';
						}
							?>
							 + '"></i> ' +
	            (grades[i]*f1).toFixed(2) + ((grades[i+1]*f1).toFixed(2) ? '&ndash;' + (grades[i+1]*f1).toFixed(2) + '<br>' : '+');
	    }

	    return div;
	};

	legend.addTo(map);





//		console.log(data1);
join(data1);

var check=0;

function join(data){



var primo="<?php if (htmlspecialchars($_GET["incidenza"])=="2" || htmlspecialchars($_GET["incidenza"])=="3") {
	echo ('element.properties.Regione');
}else{
	echo ('element.properties.prov_acr');
}?>";

var secondo="<?php if (htmlspecialchars($_GET["incidenza"])=="2" || htmlspecialchars($_GET["incidenza"])=="3") {
	echo ('newElement.regione');
}else{
	echo ('newElement.SIGLA');
}?>";

//console.log(primo);
//console.log(secondo);
			//for each feture of GeoJSON set new value as property
			statesData.features.forEach(function(element){

			data.find(function(newElement) {

			//	console.log(newElement.regione);
										if(eval(primo)==eval(secondo))
										 {
											 	element.properties.totale_ospedalizzati=newElement.totale_ospedalizzati;
											 	 element.properties.note=newElement.note;
											 	 element.properties.noteregioni=newElement.noteregioni;
											 	 element.properties.incidenza10000=newElement.incidenza10000;
												 element.properties.casi=newElement.value;
												 element.properties.popolazione=newElement.popolazione;
												 element.properties.postiletto=newElement.postiletto;
												 element.properties.postilettoregione=newElement.postilettoregione;
												 element.properties.terapiaintensiva=newElement.terapiaintensiva;
												 element.properties.percentualeoccupazioneletti=newElement.percentualeoccupazioneletti;
												 element.properties.totalicasiattiviregione=newElement.totalicasiattiviregione;
												 element.properties.data=newElement.data;
												 element.properties.totale_casi=newElement.totale_casi;
												 element.properties.nuovi_attualmente_positivi=newElement.nuovi_attualmente_positivi;
												 element.properties.deceduti=newElement.deceduti;
												 element.properties.nuovi10000=newElement.nuovi10000;

 											//  element.properties.lat=newElement.lat;
  									  //  element.properties.lon=newElement.lon;
										 }

		});
			});

			statesData.features.forEach(function(element){
			if(typeof element.properties.incidenza1000 == 'undefined')
			{
				element.properties.newValue=100; //newValue property is added to feature with default value of 0

			}
			});

}



function addDataToMap() {
	var geojson = L.geoJson(statesData, {
		onEachFeature: function(feature, layer) {
			if(typeof feature.properties.casi === "undefined")
			{
			 check=1;
			}
		//	console.log('prova'+feature.properties.newValue);
		var percentualetmp=feature.properties.percentualeoccupazioneletti*100;
		var perc=percentualetmp.toFixed(2);
		var reg;
		if (typeof feature.properties.Regione !== "undefined")
		{
			reg=feature.properties.Regione;

			reg=feature.properties.Regione.replace("Valle d'Aosta","Valle d_Aosta");

}
		//console.log(perc);
			var popupString = '<div class="popup">';
			<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
				echo "popupString += '<b>' + feature.properties.Regione + '</b><br />';";
				echo "popupString += 'Casi in Terapia Intensiva : <b>' + feature.properties.terapiaintensiva + '</b><br />';";
				echo "popupString += 'Totale(*) capienza dichiarata posti letto Terap.Int.: <b>' + feature.properties.postilettoregione + '</b><br />';";
				echo "popupString += 'Percentuale occupazione posti letto Terap.Int. : <b>' + perc + '%</b><br />';";
				echo "popupString += 'Casi totali attivi: <b>' + feature.properties.totalicasiattiviregione + '</b><br />';";
				echo "popupString += 'Casi totali: <b>' + feature.properties.totale_casi + '</b><br />';";
				echo "popupString += 'Totale ospedalizzati: <b>' + feature.properties.totale_ospedalizzati + '</b><br />';";
				echo "popupString += 'Deceduti: <b>' + feature.properties.deceduti + '</b><br />';";
?>	if (document.body.clientWidth <= 767) {
	<?php echo "popupString += '<a href=\"filternew.php?regione='+ reg+'&data=terapia_intensiva\"\">Vai alla serie storica</a></br>';"; ?>
}else{
	<?php echo "popupString += '<div><iframe src=\"filternew.php?regione='+ reg +'&data=terapia_intensiva\"\" width=\"280\" scrolling=\"no\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>
				popupString += '(*)Nota Bene: i posti letto Terap.Int. per la capienza dichiarata sono al 31.12.2019<br />';
}
<?php
			}else	if (htmlspecialchars($_GET["incidenza"])=="1"){
				echo "popupString += 'Provincia di <b>' + feature.properties.prov_name + '</b> ('+feature.properties.popolazione+' ab.)<br />';";

					echo "popupString += 'Ogni 10000 abitanti, ci sono <b>' + feature.properties.incidenza10000 + ' casi</b><br />';";
					echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.casi + '</b><br />';";
					?>	if (document.body.clientWidth <= 767) {
						<?php echo "popupString += '<a href=\"filterprov.php?provincia='+ feature.properties.prov_name+'&data=totale_casi&prov='+feature.properties.prov_acr+'\">Vai alla serie storica nuovi casi</a></br>';"; ?>
					}else{
						<?php echo "popupString += '<div><iframe src=\"filterprov.php?provincia='+ feature.properties.prov_name +'&data=totale_casi&prov='+feature.properties.prov_acr+'\" width=\"280\" scrolling=\"no\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

					}
					<?php
				}else	if (htmlspecialchars($_GET["incidenza"])=="3"){
					echo "popupString += '<b>' + feature.properties.Regione + '</b><br />';";
					echo "popupString += 'Nuovi attualmente positivi: <b>' + feature.properties.nuovi_attualmente_positivi + '</b><br />';";
					echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.totale_casi + '</b><br />';";
					echo "popupString += 'Totale ospedalizzati: <b>' + feature.properties.totale_ospedalizzati + '</b><br />';";

					?>	if (document.body.clientWidth <= 767) {
						<?php echo "popupString += '<a href=\"filternew.php?regione='+ reg+'&data=nuovi_attualmente_positivi\">Vai alla serie storica nuovi casi</a></br>';"; ?>
					}else{
						<?php echo "popupString += '<div><iframe src=\"filternew.php?regione='+ reg +'&data=nuovi_attualmente_positivi\" width=\"280\" scrolling=\"no\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

					}
					<?php
					}else {
					echo "popupString += 'Provincia di <b>' + feature.properties.prov_name + '</b><br />';";
			//		echo "popupString += 'Totale capienza Prov. posti letto Terap. Intensiva: <b>' + feature.properties.postiletto + '</b><br />';";
					echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.casi + '</b><br />';";
					?>	if (document.body.clientWidth <= 767) {
						<?php echo "popupString += '<a href=\"filterprov.php?provincia='+ feature.properties.prov_name+'&data=totale_casi&prov='+feature.properties.prov_acr+'\">Vai alla serie storica nuovi casi</a></br>';"; ?>
					}else{
						<?php echo "popupString += '<div><iframe src=\"filterprov.php?provincia='+ feature.properties.prov_name +'&data=totale_casi&prov='+feature.properties.prov_acr+'\" width=\"280\" scrolling=\"no\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

					}
					<?php
				}
				?>

				if (feature.properties.noteregioni !=""){
				//	popupString += 'Note: <b>' + feature.properties.noteregioni + '</b><br />';
				}

						popupString += 'Ultimo aggiornamento: <b>' + feature.properties.data + '</b><br />';

												//  for (var k in feature.properties) {
												//      var v = feature.properties[k];
												//      popupString += '<b>'+k + '</b>: ' + v + '<br />';
												//  }
				popupString += '</div>';

				if (document.body.clientWidth <= 767) {
						layer.bindPopup(popupString, {
				                                maxWidth: "200",
								 maxHeight: "230",
				                                closeButton: false
				                            });

				}else{
				layer.bindPopup(popupString);
				}

			//	layer.bindPopup(popupString);

			<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
		echo 'layer.bindTooltip(perc+"%",{permanent:true,direction:\'center\',className: \'countryLabel\'});';
}else if (htmlspecialchars($_GET["incidenza"])=="3"){
	echo 'layer.bindTooltip(feature.properties.nuovi_attualmente_positivi,{permanent:true,direction:\'center\',className: \'countryLabel\'});';

}
			?>



			},
			<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
				echo 'style: stylereg,';
			}else if (htmlspecialchars($_GET["incidenza"])=="1"){
				echo 'style: style10000,';
			}else if (htmlspecialchars($_GET["incidenza"])=="3"){
				echo 'style: stylenewcases,';
			} else echo 'style: style,';
			?>
	}).addTo(map);

};

	var isf=1;

	var bankias = L.geoCsv(null, {
		onEachFeature: function (feature, layer) {
		//	console.log(feature.properties);
			var popupString = '<div class="popup">';

			popupString += '<b>' + feature.properties.incidenza10000 + '</b>';
			popupString += '</div>';

			layer.bindPopup('<div class="popup">Ogni 10000 abitanti, ci sono <b>'+feature.properties.incidenza10000+' </b>casi</div>');
			layer.on({
				mouseover: function(e)
				{
					this.openPopup();
				//	this.setStyle({color: 'yellow'});
			},

			mouseout: function(e) {
				this.closePopup();
				map._handlers.forEach(function(handler) {
						handler.enable();
				});

	}
		});

		},
		pointToLayer: function (feature, latlng) {
	//		return L.marker(latlng, damsicon(feature));
		//}

var casistica=feature.properties.incidenza10000;

<?php if (htmlspecialchars($_GET["incidenza"])=="3"){

echo 'casistica=feature.properties.nuovi_attualmente_positivi;';
}?>


		return L.marker(latlng,
			 {
		icon : L.divIcon({
			className : 'circlered',
                      iconSize : [casistica/isf,casistica/isf],
											html: '<div style="display: table; height:'+casistica/isf+'px; overflow: hidden; "><div align="center" style="display: table-cell; vertical-align: middle;"><div style="width:'+casistica/isf+'px;"></div></div></div>'}),
                      title: ''}
										);


	},
		fieldSeparator: ',',
		firstLineTitles: true
	});

function csvtomap(){
	$.ajax ({
		type:'GET',
		dataType:'text',
		url:'datageo.txt',
	   error: function() {
			// check=1;
	     alert('Porta pazienza non riesco a caricare i dati');
	   },
		success: function(csv) {
		//	console.log(csv);
			var csvn=csv.replace("lon","lng");
	     var cluster = new L.MarkerClusterGroup({
	spiderfyOnMaxZoom: false,
  disableClusteringAtZoom: 4
});

			bankias.addData(csvn);
			cluster.addLayer(bankias);
			map.addLayer(cluster);
		//	map.fitBounds(cluster.getBounds());
		},
	   complete: function() {


	     // $('#cargando').delay(500).fadeOut('slow');
	   }
	});

};


addDataToMap();


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


	function reload()
	{

	//	 addDataToMap();
  location.reload();
	}


	test(check);

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("logo");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
