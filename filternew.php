<?php
//if (htmlspecialchars($_GET["regione"])="Valle d'Aosta") $_GET["regione"]="Valle d\'Aosta";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="refresh" content="60" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/styles.css" />
  </head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
  <body>
    <div id="wrapper">


                <div class="box">
                <div id="chart1"></div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
     <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

    <!-- installing few libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
  <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/downloadjs/1.4.8/download.min.js"></script>-->
  <!--  <script src="assets/scripts4.js"></script>-->
    <script src="assets/download.js"></script>

    <script>
    var options1 = {
      series: [],
      chart: {
        height: 250,
        type: 'area',
      },
      plotOptions: {
         bar: {
           dataLabels: {
             position: 'top', // top, center, bottom
           },
         }
       },
      dataLabels: {
        enabled: true,
          offsetY: -10,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
      },
      yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false
          }

        },
      title: {
        //text: '<?php echo htmlspecialchars($_GET["regione"]); ?>',
      },
      xaxis: {
        type: 'datetime',
        datetimeFormatter: {
            year: 'yyyy',
            month: "MMM 'yy",
            day: 'dd MMM',
            hour: 'HH:mm',
        }
      },
      noData: {
        text: 'Loading...'
      },
      colors: ['#77B6EA'],
      dataLabels: {
        enabled: true,
      }
    };


      var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
      chart1.render();

    var url = 'https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni.json';
    //var url = 'https://api.thingspeak.com/channels/402750/feeds.json?results=200&timezone=Europe/Rome';
    $.getJSON(url, function(response) {

      for (var i = 0; i < response.length; i++) {

      if (response[i].denominazione_regione.includes("Valle")) response[i].denominazione_regione="Valle d_Aosta";
      //console.log(response[i].denominazione_regione);
      }

      var outputtmp = response.filter(s => s.denominazione_regione === '<?php echo htmlspecialchars($_GET["regione"]); ?>');

      var output = outputtmp.map( s => ({x:s.data, y:s.<?php echo htmlspecialchars($_GET["data"]); ?>}) );

      var output1 = response.map( s => ({x:s.data, y:s.<?php echo htmlspecialchars($_GET["data"]); ?>}) );

      var output2 = response.map( s => ({x:s.data, y:s.<?php echo htmlspecialchars($_GET["data"]); ?>}) );

      var output3 = response.map( s => ({x:s.data, y:s.<?php echo htmlspecialchars($_GET["data"]); ?>}) );

      chart1.updateSeries([{
        name: '<?php echo htmlspecialchars($_GET["regione"]); ?>',
        data: output,

      }])

      });

    </script>
  </body>
</html>
