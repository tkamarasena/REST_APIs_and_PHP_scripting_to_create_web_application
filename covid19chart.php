<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://covid-193.p.rapidapi.com/statistics",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: covid-193.p.rapidapi.com",
		"X-RapidAPI-Key: ENTER_RAPID_API_KEY_HERE"    // enter RAPID API key here
	],
]);

$response = curl_exec($curl);
//var_dump($response);

$error= curl_error($curl);
curl_close($curl);
if($error){
    echo "curl err #:" .$error;
}
 else {
    $data= json_decode($response,true);

$x=$data['response'];
//var_dump($x);
}
?>


<!DOCTYPE html>
<html>
  <head>
              <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/> <!--Link boostrap file-->
              <link rel="stylesheet" href="rest.css"/>
              
              
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script> google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', 'cases'],
        <?php foreach ($x as $value) {
            if($value['continent']== 'Europe'){?>
        ['<?php echo $value['country']; ?>', <?php echo $value['cases']['total']; ?>],
        
<?php
            }
}
?>
      ]);

      var options = {
        title: 'Cases vs Countries in Europe',
        chartArea: {width: '50%', height: '50%'},
        hAxis: {
        minValue: 0
        },
        vAxis: {
          title: 'Country'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    
    </script>
  
  </head>
  <body>
      <div id='main'>
            <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
            <div id="navigation" class="container-fluid" style='text-align: right'> 
                <a class="l1" href="Rest.php">Home</a>&nbsp; 

            </div>
            
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10">
                            <h4 class="ali" style="text-align: center">COVID19 Information in Europe - Bar Chart </h4>
                            
                            <div style="position: relative">
                                
                                 <div id="chart_div" style="width: 1000px; height: 500px; "></div>
                            
                            
                            </div>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>   
            </div>
            
            
            <div id="footer">
                <div class="text text-dark" align="center">
                    All Right Received © Tharinda Kaushalya 2023 </div>    
            </div>
      
      </div>
  </body>
</html>
