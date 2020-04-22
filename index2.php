
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

	<script src="https://rawgit.com/dwilhelm89/LeafletSlider/master/SliderControl.js" type="text/javascript"></script>


	<!-- GeoCSV: https://github.com/joker-x/Leaflet.geoCSV -->
	<script src="http://joker-x.github.io/Leaflet.geoCSV/leaflet.geocsv-src.js"></script>



		<script src="leaflet-hash.js"></script>
				<link rel="stylesheet" type="text/css" href="leaflet.social.css" />
			<script type='text/javascript' src="leaflet.social.js"></script>


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
#infodivtitolo{
background-color: rgba(255, 255, 255, 0.9);
font-family: Titillium Web, Arial, Sans-Serif;
padding: 8px;
font-size: 10px;
top: 10px;
left:50px;

max-height: 45px;

position: fixed;

overflow-y: auto;
overflow-x: hidden;
border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border: 2px solid #808080;

	box-shadow: 0 3px 14px rgba(0,0,0,0.4);
	animation-name: example;
  animation-duration: 4s;
}
#infodivfocus{
font-family: Titillium Web, Arial, Sans-Serif;
padding: 8px;
font-size: 10px;
top: 55px;
left:42px;

max-height: 45px;
max-width: 150px;
position: fixed;

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
#logoDPC{
position:fixed;
top: 220px;
padding: 5px;
right: 5px;
z-index: 1;
overflow-y: auto;
overflow-x: hidden;
border-radius: 10px;
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

.legend, .temporal-legend {
   			padding: 6px 20px;
    		font: 14px/16px Arial, Helvetica, sans-serif;
   			#background: red;
				color: white;
    		background: rgba(0, 30, 255, 0.8);
    		box-shadow: 0 0 15px rgba(255,30, 255,0.8);
    		border-radius: 5px;
				background-image: linear-gradient(top right, red 0%, black 100%);
				margin-top: -60px;

}

input[type=range] {
  -webkit-appearance: none;
  margin: 10px 0;
  width: 100%;
	margin-top: -18px;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
	margin-top: -5px;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 30px;
  width: 16px;
  border-radius: 3px;
	background: rgba(255, 24, 23, 0.99);
#  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -10px;

}

input[type=range]:focus::-webkit-slider-runnable-track {
  background: #367ebd;

}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;

}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 30px;
  width: 16px;
  border-radius: 3px;
	background: rgba(255, 24, 23, 0.99);
#  background: #ffffff;
  cursor: pointer;

}

input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;

}
input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;

}
input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;

}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
 	background: #ffffff;
  cursor: pointer;

}
input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;

}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;

}
#input{
	background:rgba(0, 30, 255, 0.5);
}

.legend {
    line-height: 18px;
    color: #555;
		margin-top: -16px;
}
.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
		margin-top: -16px;
}

}


	#legendTitle {
  	  text-align: center;
   	 	margin-bottom: 15px;
   		font-variant: small-caps;
	}
	.symbolsContainer {
    		float: left;
		margin-left: 50px;
	}
	.legendCircle {
		background-image: linear-gradient(top right, red 0%, black 100%);
		background-color: red;
		border-color: red;
		border-radius: 70px;
		border-style: solid;
		border-width: 2px;
		font-color: white;
		background:rgba(0, 30, 255, 0.2);
     	border-radius:50%;
     	border: 1px solid #537898;
     #	background: rgba(113, 133, 152, .6);
	 	    display: inline-block;
	}
	.legendValue {
    	#	position: absolute;
    		right: 8px;
				color: '#537898';
				border-color: red;
				margin-top: -16px;
	}
	#show-hide {
			#	border: 1px solid black;
				text-align:center;
			}

			#mydiv {
				visibility:hidden;
				width: 50%;
				border: 1px solid green;
				margin:auto;
				position:relative;
				top: 20px;
				padding:50px;
				text-align:center;
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
			@keyframes example {
  from {background-color: red;}
  to {background-color: white;}
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
<body onclick >

<div id='map'></div>


<!--
<div id="logo3" style="leaflet-popup-content-wrapper">
<p>Ricarica la pagina se </br>i dati non si vedono</p>
</div>
-->
<div id='loader'><span class='message'><p class="pic"><img src="http://www.piersoft.it/covid19/ajax-loader3.gif"></p></span></div>
<div id="infodiv1" style="leaflet-popup-content-wrapper">
	<p id="show-hide" onclick="show_hide();" onmouseover="this.style.color='black'" onmouseout="this.style.color='black'">Crediti e note</p>
</div>
	<div id="infodiv" style="leaflet-popup-content-wrapper">
		<p>
		Sorgenti dei dati aperti:<br><a href="https://github.com/pcm-dpc/COVID-19" targer="_blank">Dipartimento Protezione Civile Lic. CCBY4.0<br></a><a href="https://www.istat.it/it/archivio/104317" targer="_blank">Basi territoriali ISTAT Lic. CCBY3.0</a><br><a href="http://www.dati.salute.gov.it/dati/dettaglioDataset.jsp?menu=dati&idPag=96" targer="_blank">Ministero Salute Lic. IoDL2.0</a></br>by @piersoft. Lic. CCBYSA<br>Mappa non ufficiale.L'autore non è responsabile dei dati</p>
<p class="pic">kindly hosted by  <a href="https://www.digimat.it/" target="_blank"><img src="digimat.png"></a></br></p>
<p class="pic"><a href="http://www.salute.gov.it/portale/nuovocoronavirus/dettaglioNotizieNuovoCoronavirus.jsp?lingua=italiano&menu=notizie&p=dalministero&id=4279" target="_blank"><img src="banner.jpg" width="250px"></a></br></p>
<!--
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
-->
	</div>

<div id="infodivtitolo" style="leaflet-popup-content-wrapper" >
	<p>
		<b>
	<?php
 if (htmlspecialchars($_GET["incidenza"])=="1")	echo 'Covid19 - Progressivo contagio Province nel TEMPO</br><font color="red">USARE LO SLIDER IN BASSO A DESTRA</font>' ?>
 <?php
 if (htmlspecialchars($_GET["incidenza"])=="2")	echo 'Covid19 - Progressivo contagio Regioni.</br>Terapie Intensive ' ?>

 <?php
 if (htmlspecialchars($_GET["incidenza"])=="3")	echo '<b>Covid19 - Progressivo contagio Regioni.</br>Nuovi casi giornalieri' ?>

 <?php
 if (htmlspecialchars($_GET["incidenza"])=="0")	echo 'Covid19 - Progressivo contagio Province.</br>Casi totali' ?>
</b></p>
</div>
<!--
<div id="logoreg" style="leaflet-popup-content-wrapper">
<a href="https://infogram.com/coronavirus-per-regioni-1h7v4p8713j86k0?live" target="_blank"><img src="logoreg.png" width="80px" title="infografica" alt="infografica"></a>

</div>
-->
<div>
	<div id="infodivfocus" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/focusdecessi.php" target="_blank" ><img src="tassimortalità.png" width="190px" title="mapnewcases" alt="mapnewcases"></a>

<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=0" ><img src="mapcasi2.png" width="80px" title="mappacasi" alt="mappacasi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}else if (htmlspecialchars($_GET["incidenza"])=="1"){
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=0" ><img src="mapcasi2.png" width="80px" title="mappacasi" alt="mappacasi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=2" ><img src="mapternew1.png" width="80px" title="mappaterapiaintensiva" alt="mappaterapiaintensiva"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
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

}else{
	echo '<div id="logomappa" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=1" ><img src="mappatassinew.png" width="80px" title="mappatassi" alt="mappatassi"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=2" ><img src="mapternew1.png" width="80px" title="mappaterapiaintensiva" alt="mappaterapiaintensiva"></a>';
	echo '<div id="logomappa2" style="leaflet-popup-content-wrapper">
	<a href="http://www.piersoft.it/covid19/?incidenza=3" ><img src="mapcasigiorno1.png" width="80px" title="mapnewcases" alt="mapnewcases"></a>';

}?>
</div>
<?php
function isMobileDevice() {
    return preg_match("/(android|avantgo|blackberry|bolt|safari|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
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

					var dataLayer = new L.geoJson();
					var dataLayer1 = new L.geoJson();

					var cluster = new L.MarkerClusterGroup({
	 	spiderfyOnMaxZoom: false,
	   disableClusteringAtZoom: 4
	 });

	 function changeColors(){
	    dataLayer.setStyle(getColorreg)
	 }
	 function changeColorsPr(d){
	 	 dataLayer.setStyle(getColor1000(d))
	 }
var hash = new L.Hash(map);


	function test(check)
	{
		console.log('Check = '+check);
		if (check==1){
		//	alert('Ricarica la pagina tra 30 secondi. Abbiamo molti accessi. Grazie');
		setTimeout(reload, 500);
	}else{
		<?php
	if (htmlspecialchars($_GET["incidenza"])=="1" || htmlspecialchars($_GET["incidenza"])=="0"){
			echo 'setTimeout(csvtomap2(), 100);';
		}
		?>
//		csvtomap();
		finishedLoading()
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
	function getColor1000(d,min,max) {
	//	test();
	minc=0;
	maxc=10;
if(min!=""){
	minc=min;
	maxc=max;
}
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
	//	test();
		return d*100 > 50 ? '#800026' :
				d*100 > 30  ? '#BD0026' :
				d*100 > 25  ? '#E31A1C' :
				d*100 > 10 ? '#FC4E2A' :
				d*100 > 5   ? '#FD8D3C' :
				d*100 > 3   ? '#FEB24C' :
				d*100> 1   ? '#FED976' :
				d == 0		 ? '#FFFFFF' :
							'#FFEDA0';
	}

	// get color dipende dal totale casi
	function getColor(d) {
//		console.log('sono qui: '+d);
	//	test();
		return d > 1000 ? '#800026' :
				d > 500  ? '#BD0026' :
				d > 200  ? '#E31A1C' :
				d > 100  ? '#FC4E2A' :
				d > 50   ? '#FD8D3C' :
				d > 20   ? '#FEB24C' :
				d > 10   ? '#FED976' :
				d == 0		 ? '#FFFFFF' :
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

	function styleP(feature) {
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor(feature)
		};

	}
	function style10000(feature,min,max) {
		return {
			font: 140/10+'px Titillium Web,sans-serif',
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.7,
			fillColor: getColor1000(feature.properties.incidenza10000,min,max)
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

			echo 'grades = [0,0.1,0.2,0.5,1,2,5,8,14]';

			}else if (htmlspecialchars($_GET["incidenza"])=="2"){
				echo 'grades = [0, 1, 3, 5, 10, 25, 30, 50]';

		}else{
				echo 'grades = [0, 10, 20, 50, 100, 200, 500, 1000]';
		}
			?>
	        ,
	        labels = [];
					<?php
					if (htmlspecialchars($_GET["incidenza"])=="1" ){

					echo 'var f1=0.2;';


				}else{
					echo 'var f1=f;';
				}?>
					//console.log(grades);
	    // loop through our density intervals and generate a label with a colored square for each interval
	    for (var i = 0; i < grades.length; i++) {

	        div.innerHTML +=
	            '<i style="background:' + getColor1000(grades[i]/f1) + '"></i> ' +
	            grades[i]*f + (grades[i+1]*f ? '&ndash;' + grades[i+1]*f + '<br>' : '+');
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
											 //	 element.properties.prov_acr=newElement.prov_acr;
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
												 if (newElement.nuovi_positivi != undefined) element.properties.nuovi_attualmente_positivi=newElement.nuovi_positivi;

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



function addDataToMap(value) {
	dataLayer = L.geoJson(statesData, {
		onEachFeature: function(feature, layer) {
			if(typeof feature.properties.casi === "undefined")
			{
			 check=1;
			}
			if (value === "undefined"){
				feature.properties.casi ==value;
			}
		//	console.log('prova'+feature.properties.newValue);
		var percentualetmp=feature.properties.percentualeoccupazioneletti*100;
		var perc=percentualetmp.toFixed(2);
		//console.log(perc);
			var popupString = '<div class="popup">';
			<?php if (htmlspecialchars($_GET["incidenza"])=="2"){
				echo "popupString += '<b>' + feature.properties.Regione + '</b><br />';";
				echo "popupString += 'Casi in Terapia Intensiva : <b>' + feature.properties.terapiaintensiva + '</b><br />';";
				echo "popupString += 'Totale capienza dichiarata posti letto Terap.Int.: <b>' + feature.properties.postilettoregione + '</b><br />';";
				echo "popupString += 'Percentuale occupazione posti letto Terap.Int. : <b>' + perc + '%</b><br />';";
				echo "popupString += 'Casi totali attivi: <b>' + feature.properties.totalicasiattiviregione + '</b><br />';";
				echo "popupString += 'Casi totali: <b>' + feature.properties.totale_casi + '</b><br />';";
				echo "popupString += 'Deceduti: <b>' + feature.properties.deceduti + '</b><br />';";
?>	if (document.body.clientWidth <= 767) {
	<?php echo "popupString += '<a href=\"filternew.php?regione='+ feature.properties.Regione+'&data=terapia_intensiva\"\">Vai alla serie storica</a></br>';"; ?>
}else{
	<?php echo "popupString += '<div><iframe src=\"filternew.php?regione='+ feature.properties.Regione +'&data=terapia_intensiva\"\" width=\"280\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

}
<?php
			}else	if (htmlspecialchars($_GET["incidenza"])=="1"){
				echo "popupString += 'Provincia di <b>' + feature.properties.prov_name + '</b> ('+feature.properties.popolazione+' ab.)<br />';";

					echo "popupString += 'Ogni 10000 abitanti, ci sono <b>' + feature.properties.incidenza10000 + ' casi</b><br />';";
					echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.casi + '</b><br />';";
					?>	if (document.body.clientWidth <= 767) {
						<?php echo "popupString += '<a href=\"filterprov.php?provincia='+ feature.properties.prov_name+'&data=totale_casi&prov='+feature.properties.prov_acr+'\">Vai alla serie storica nuovi casi</a></br>';"; ?>
					}else{
						<?php echo "popupString += '<div><iframe src=\"filterprov.php?provincia='+ feature.properties.prov_name +'&data=totale_casi&prov='+feature.properties.prov_acr+'\" width=\"280\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

					}
					<?php
				}else	if (htmlspecialchars($_GET["incidenza"])=="3"){
					echo "popupString += '<b>' + feature.properties.Regione + '</b><br />';";
					echo "popupString += 'Nuovi casi giornalieri: <b>' + feature.properties.nuovi_attualmente_positivi + '</b><br />';";
					echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.totale_casi + '</b><br />';";
					?>	if (document.body.clientWidth <= 767) {
						<?php echo "popupString += '<a href=\"filternew.php?regione='+ feature.properties.Regione+'&data=nuovi_attualmente_positivi\">Vai alla serie storica nuovi casi</a></br>';"; ?>
					}else{
						<?php echo "popupString += '<div><iframe src=\"filternew.php?regione='+ feature.properties.Regione +'&data=nuovi_attualmente_positivi\" width=\"280\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

					}
					<?php
					}else {
						echo "popupString += 'Provincia di <b>' + feature.properties.prov_name + '</b><br />';";
				//		echo "popupString += 'Totale capienza Prov. posti letto Terap. Intensiva: <b>' + feature.properties.postiletto + '</b><br />';";
						echo "popupString += 'Casi totali assoluti: <b>' + feature.properties.casi + '</b><br />';";
						?>	if (document.body.clientWidth <= 767) {
							<?php echo "popupString += '<a href=\"filterprov.php?provincia='+ feature.properties.prov_name+'&data=totale_casi&prov='+feature.properties.prov_acr+'\">Vai alla serie storica nuovi casi</a></br>';"; ?>
						}else{
							<?php echo "popupString += '<div><iframe src=\"filterprov.php?provincia='+ feature.properties.prov_name +'&data=totale_casi&prov='+feature.properties.prov_acr+'\" width=\"280\" scrolling=\"no\" height=\"320\" frameBorder=\"0\">prova</iframe></div>';";?>

						}
						<?php
					}
					?>

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
		echo 'layer.bindTooltip(feature.properties.terapiaintensiva,{permanent:true,direction:\'center\',className: \'countryLabel\'});';
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



	var isf=30;

function damsicon(feature){

	return {
	icon : L.divIcon({

		className : 'circlered',
		iconSize : [feature.properties.totale_casi/isf,feature.properties.totale_casi/isf],
		html: '<div style="display: table; height:'+feature.properties.totale_casi/isf+'px; overflow: hidden; "><div align="center" style="display: table-cell; vertical-align: middle;"><div style="width:'+feature.properties.totale_casi/isf+'px;"></div></div></div>'}),


	}
}



/*
map.on('zoomend', function(e) {
    var currentZoom = map.getZoom();
    console.log("Current Zoom" + " " + currentZoom);
    if (currentZoom <= 8) {
        isf = 50;
    } else {
        isf = 2;
    }
    console.log("Dams Radius" + " " + isf);
		 // timeline.setStyle(damsStyle);
});
*/


	var bankias = L.geoCsv(null, {
		onEachFeature: function (feature, dataLayer1) {
			//console.log(feature.properties);
			var popupString = '<div class="popup">';

			popupString += '<b>' + feature.properties.totale_casi + '</b>';
			popupString += '</div>';

		//	layer.bindPopup(popupString);

		},
		pointToLayer: function (feature, latlng) {
	//		return L.marker(latlng, damsicon(feature));
		//}

var casistica=feature.properties.totale_casi;

<?php if (htmlspecialchars($_GET["incidenza"])=="3"){

echo 'casistica=feature.properties.nuovi_attualmente_positivi;';
}?>

		return L.marker(latlng,
			 {
		icon : L.divIcon({
			className : 'circlered',
                      iconSize : [casistica/isf,casistica/isf],
											html: '<div style="display: table; height:'+casistica/isf+'px; overflow: hidden; "><div align="center" style="display: table-cell; vertical-align: middle;"><div style="width:'+casistica/isf+'px;"></div></div></div>'}),
                      title: ''});

	},
		fieldSeparator: ',',
		firstLineTitles: true,
	});


</script>

 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
 <script src="https://rawgit.com/dwilhelm89/LeafletSlider/master/SliderControl.js" type="text/javascript"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.0/leaflet.css" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css">
<style>



</style>
<script type="text/javascript">

function csvtomap(){
	$.ajax ({
		type:'GET',
		dataType:'text',
		url:'data.txt',
	   error: function() {
			// check=1;
	     alert('Porta pazienza non riesco a caricare i dati');
	   },
		success: function(csv) {
		//	console.log(csv);
			var csvn=csv.replace("lon","lng");


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


//addDataToMap();



var cities;
function createPropSymbols(timestamps, data) {

						cities = L.geoJson(data, {

			pointToLayer: function(feature, latlng) {


			return L.circleMarker(latlng, {
				 fillColor: "#001eff",
				 color: 'red',
				 weight: 1,
				 fillOpacity: 0.4
				}).on({
					mouseover: function(e) {
						this.openPopup();
						this.setStyle({color: 'yellow'});

					},
					mouseout: function(e) {
						this.closePopup();
						this.setStyle({color: '#001eff'});
						map._handlers.forEach(function(handler) {
								handler.enable();
						});

					}
				});
			}
		}).addTo(map);
		updatePropSymbols(timestamps[0]);
		//	alert("Mappa temporale. Usa lo slides in basso per vedere la propagazione del Covid19");
	}
function createTemporalLegend(startTimestamp) {

		var temporalLegend = L.control({ position: 'bottomright' });

		temporalLegend.onAdd = function(map) {
			var output = L.DomUtil.create("output", "temporal-legend");
 			$(output).text(startTimestamp)
			return output;
		}

		temporalLegend.addTo(map);
	}

function createSliderUI(timestamps,min,max) {
	if (min < 10) {
	//	min = 10;
	}
	if (max > 8000) {
		max = 8000;
	}

	var dateOffset = (24*60*60*1000) * 1;
	var giorno=new Date(Math.round(((timestamps[0]) - 25569)*86400*1000));
	giorno.setDate(giorno.getDate() );


//console.log('Max: '+timestamps[timestamps.length-1]);
		var sliderControl = L.control({ position: 'bottomright'} );

		sliderControl.onAdd = function(map) {

			var slider = L.DomUtil.create("input", "range-slider");


			L.DomEvent.addListener(slider, 'mousedown', function(e) {

				L.DomEvent.stopPropagation(e);
				map._handlers.forEach(function(handler) {
						handler.disable();

				});
			});
			L.DomEvent.addListener(slider, 'mouseout', function(e) {

				L.DomEvent.stopPropagation(e);
				map._handlers.forEach(function(handler) {
						handler.enable();

				});
			});

			$(slider)
				.attr({'type':'range',
					'max': timestamps[timestamps.length-1],
					'min': timestamps[0],
					'step': 1,
			//		'value': 	String(ita)})

				'value': String(timestamps[0])})
		  		.on('input change', function(ita) {
					//	console.log(String(timestamps[0]));
				//		updatePropSymbols(timestamps[0]);
		  		updatePropSymbols($(this).val().toString());

				//	$(".temporal-legend").text(this.value);
			//			$(".temporal-legend").text(this.ita);
		  	});
			return slider;
		}

		sliderControl.addTo(map);

		createTemporalLegend(giorno.toLocaleDateString("it-IT"));
	}




function updatePropSymbols(timestamp) {

var dateOffset = (24*60*60*1000) * 1;
var giorno1=new Date(((timestamp) - 25569)*86400*1000);
var multiplier = 100;

	var giorno=new Date(Math.round(((timestamp) - 25569)*86400*1000));
	giorno.setDate(giorno.getDate() );
//	console.log('Timestamp: '+ giorno.toLocaleDateString("it-IT"));


		//		map.removeLayer(dataLayer);
		//			addDataToMap(cities.timestamp);



var casistica = [];

			cities.eachLayer(function(layer) {

				casistica.push(layer.feature.properties);
				var props = layer.feature.properties;
		//		console.log('Timestamp '+layer.feature.properties[timestamp]);
		//		console.log('Provincia '+layer.feature.properties.sigla_provincia);
		//		console.log('Popolazione '+layer.feature.properties.popolazione);

		//		console.log('Ci sono '+element.properties.casi);


			//	var radius = calcPropRadius(layer.feature.properties.name);
				var radius = calcPropRadius(props[timestamp]);
var incidenza= Math.round((props[timestamp]/props.popolazione)*10000 * multiplier) / multiplier
			//	var popupContent = "<b>" + String(props[timestamp]) +
			var popupContent = "<b>" + String(props[timestamp]) +
						" casi</b> " +
						"in provincia di <i>" + props.name +
						"</i><br>pari a "+incidenza+" ogni 10000 abitanti, al<br>" +
						giorno.toLocaleDateString("it-IT");
						$(".temporal-legend").text(giorno.toLocaleDateString("it-IT"));
				layer.setRadius(radius);
				layer.bindPopup(popupContent, { offset: new L.Point(0,-radius) });

			});

			statesData.features.forEach(function(element){
				casistica.find(function(newElement) {

				//	console.log('dovestai: '+element.properties.prov_acr);
				if(newElement.sigla_provincia==element.properties.prov_acr)
											 {
		//		if (layer.feature.properties.name = element.properties.prov_name){
						element.properties.casi=newElement[timestamp];
						element.properties.popolazione=newElement.popolazione;
						element.properties.incidenza10000=Math.round((newElement[timestamp]/element.properties.popolazione)*10000 * multiplier) / multiplier ;
			//			console.log('Ci sono '+JSON.stringify(newElement[timestamp]))
				//				console.log('Ci sono '+element.properties.incidenza10000);
							}
					});
		//	}
				//	console.log('Ci sono '+casistica.timestamp);
			});
			map.removeLayer(dataLayer);
			addDataToMap();
			dataLayer.bringToBack();
			dataLayer.setStyle(style10000,min10000,max10000);
		}

	function calcPropRadius(attributeValue) {


			var scaleFactor = 0.05;
			var area = attributeValue * scaleFactor;
			return Math.sqrt(area/Math.PI)*2;
		}

		var min = Infinity;
		var max = -Infinity;
		var min10000 = Infinity;
		var max10000 = -Infinity;


		function processData(data) {
			//console.log(data);
				var timestamps = [];
				var multiplier = 100;

				for (var feature in data.features) {

					var properties = data.features[feature].properties;

					for (var attribute in properties) {
						if ( attribute != 'id' &&
						  attribute != 'name' &&
						  attribute != 'lat' &&
							attribute != 'popolazione' &&
							attribute != 'sigla_provincia' &&
						  attribute != 'long' ) {
						//		attribute.replace("Massa Carrara","Massa-Carrara");
						//		attribute.replace("Trento","P.A. Trento");
						//		attribute.replace("Bolzano","P.A. Bolzano");
							if ( $.inArray(attribute,timestamps) === -1) {

								timestamps.push(attribute);

							}
							if (properties[attribute] < min10000) {
								min10000 = Math.round((properties[attribute]/properties.popolazione)*10000 * multiplier) / multiplier;
							}

							if (properties[attribute] > max10000) {
								max10000 = Math.round((properties[attribute]/properties.popolazione)*10000 * multiplier) / multiplier;
							}
					//		console.log('Min10000: '+min10000+' Max10000: '+max10000);
							if (properties[attribute] < min) {
								min = properties[attribute];
							}

							if (properties[attribute] > max) {
								max = properties[attribute];
							}
							//	console.log('Max:'+max);
						}
					}
				}
//console.log(timestamps+' '+min+' '+max);
				return {

					timestamps : timestamps,
					min : min,
					max : max
				}
			}

var csvn;
//var temp1=["timestamps","stato","codice_regione","denominazione_regione","codice_provincia","denominazione_provincia","sigla_provincia","lat","lng","totale_casi\n"];
var timest=[];
var temp1;

function createLegend(min, max) {

		if (min < 10) {
			min = 10;
		}
		if (max > 4000) {
		//	max = 4000;
		}

		function roundNumber(inNumber) {

				return (Math.round(inNumber/10) * 10);
		}

		var legend = L.control( { position: 'topleft' } );

		legend.onAdd = function(map) {

		var legendContainer = L.DomUtil.create("div", "legend");
		var symbolsContainer = L.DomUtil.create("div", "symbolsContainer");
		var classes = [roundNumber(min), roundNumber((max-min)/2), roundNumber(max)];
		var legendCircle;
		var lastRadius = 0;
		var currentRadius;
		var margin;

		L.DomEvent.addListener(legendContainer, 'mousedown', function(e) {
			L.DomEvent.stopPropagation(e);
		});

		$(legendContainer).append("<h2 id='legendTitle'>#Totale casi</h2>");

		for (var i = 0; i <= classes.length-1; i++) {

			legendCircle = L.DomUtil.create("div", "legendCircle");

			currentRadius = calcPropRadius(classes[i]);

			margin = -currentRadius - lastRadius - 2;

			$(legendCircle).attr("style", "width: " + currentRadius*2 +
				"px; height: " + currentRadius*2 +
				"px; margin-left: " + margin + "px" );
			$(legendCircle).append("<span class='legendValue'>"+classes[i]+"</span>");

			$(symbolsContainer).append(legendCircle);

			lastRadius = currentRadius;

		}

		$(legendContainer).append(symbolsContainer);

		return legendContainer;

		};

		legend.addTo(map);

	} // end createLegend();



function csvtomap2(){

$.getJSON("data.geojson")
		.done(function(jsonData) {

		//	var outGeoJson = {}
		//	outGeoJson['properties'] = jsonData
		//	outGeoJson['type']= "Feature"
		//	outGeoJson['geometry']= {"type": "Point", "coordinates":
		//		[jsonData['lat'], jsonData['long']]}

				var info = processData(jsonData);
			//	console.log(jsonData);
				createPropSymbols(info.timestamps, jsonData);
		//	createLegend(info.min,info.max);
			createSliderUI(info.timestamps,info.min,info.max);


	 	})
	.fail(function() { alert("There has been a problem loading the data.")});

}


<?php
if (htmlspecialchars($_GET["incidenza"])=="1" || htmlspecialchars($_GET["incidenza"])=="0"){
//	echo 'setTimeout(csvtomap1(), 200);';
}else if (htmlspecialchars($_GET["incidenza"])=="2"){
//	echo 'check=0';
//	echo 'setTimeout(csvtomap(), 500);';
}
?>



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
