<?php

$country_name = $_GET['countryname'];
$city_name = $_GET['c'];


$path = "https://restcountries.com/v3.1/all"; 
$data = json_decode(file_get_contents($path),true);
//var_dump($data);



 $curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://city-and-state-search-api.p.rapidapi.com/cities/".$city_name,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: city-and-state-search-api.p.rapidapi.com",
		"X-RapidAPI-Key: ENTER_RAPID_API_KEY_HERE"    // enter RAPID API key here
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$value= json_decode($response,true);
       // var_dump($value);           
                    
                    $id= $value['id'];
                    $name= $value['name'];
                    $stateName= $value['state_name'];
                    $countryName= $value['country_name'];
                    $lat= $value['latitude'];
                    $long= $value['longitude'];
                    
                    
}
                    
                              
   ?>            

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            City information
        </title>
        <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/> <!--Link boostrap file-->
        <link rel="stylesheet" href="rest.css"/>
    </head>
    <body>
    <div id="main">
        <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
        <div id="navigation" class="container-fluid" style='text-align: right'> 
            <a class="l1" href="Rest.php">Home</a>&nbsp; 
            <a class="l1" href="Cities.php">Cities</a>&nbsp;
        </div>
        <div id="content">
            <div class="container">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10">
                            <h4 class="ali" style="text-align: center">City Information</h4>
                            <div class="container">
                                <hr/>
                                    <table border="1" class="table table-striped ">


                                        <tr><td>City ID</td>
                                                     <td><?php echo $id?></td></tr>

                                        <tr><td>City Name</td>
                                            <td><?php echo $name?></td></tr>

                                        <tr><td>State Name</td>
                                                 <td><?php echo $stateName?></td></tr>

                                        <tr><td>Country Name</td>
                                                 <td><?php echo $countryName?></td></tr>

                                        <tr><td>Country Flag</td>
                                            <td><img src="<?php  
                                                    foreach ($data as $val) {
                                                        if($val['name']['common'] == $countryName){
                                                            echo $val['flags']['png'];
                                                        }

                                                    }?>" width="150"/></td></tr>



                                        <tr><td colspan="2"><div id="map" style="position:inherit !important;width:900px !important;height:400px !important;"></div> </td></tr>

                                   </table>
                            </div>
                            <div class="col-md-10">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <div class="text text-dark" align="center">
                    All Right Received © Tharinda Kaushalya 2023 </div>    
            </div>
        </div>
<script>
  function initMap() {
    var geocoder = new google.maps.Geocoder();
    var mapOptions = {
      zoom: 12,
      center: { lat: <?php echo $lat; ?>, lng: <?php echo $long;?> } // Default center (change as needed)
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var address = "<?php echo $city_name; ?>" // Replace "City Name" with the desired city name

    geocoder.geocode({ address: address }, function (results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
      } else {
        console.log("Geocode was not successful for the following reason: " + status);
      }
    });
  }

  // Load the Google Maps API and call the initMap function when it's loaded
  function loadMap() {
    var script = document.createElement("script");
    script.src = "https://maps.googleapis.com/maps/api/js?key=ENTER_API_KEY&callback=initMap";  // enter Google developer map API key here
    document.body.appendChild(script);
  }

  loadMap();
</script>
        
        
    </div>   
    </body>
</html>

