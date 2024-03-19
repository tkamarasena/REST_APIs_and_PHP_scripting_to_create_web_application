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

<html>
   
    <head>
        <meta charset="UTF-8">
        <title>
            Covid19 Information
        </title>
        <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/> <!--Link boostrap file-->
        <link rel="stylesheet" href="rest.css"/>
       
    
    
    </head>
    <body>
    <div id="main">
        <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
        <div id="navigation" class="container-fluid" style='text-align: right'> 
            <a class="l1" href="Rest.php">Home</a>&nbsp; 
            
        </div>

                    <div id="content">
                        <div class="container">
                            
                            <div class="row">
                                <div class="col-md-1">&nbsp;</div>
                                <div class="col-md-10">
                                    <h4 class="ali" style="text-align: center">COVID19 Inforation in Europe</h4>
                                    <hr/>
                                    <div class="container">
                                    <table class="table">
                                        <tr>
                                        <th>Country</th>
                                        <th>Population</th>
                                        <th>Total Covid Cases</th>
                                        <th>Total Deaths</th>
                                        <th>Tests</th>
                                        <th>Continent</th>

                                        <th>&nbsp;</th>

                                    </tr>

                                    <?php
                                    foreach ($x as $value) {
                                        if($value['continent']== 'Europe'){
                                     ?>

                                    <tr>
                                        <td><?php echo $value['country']; ?></td>
                                        <td><?php echo $value['population']?$value['population']:'0'; ?></td>
                                        <td><?php echo $value['cases']['total']?$value['cases']['total']:'0'; ?></td>
                                        <td><?php echo $value['deaths']['total']?$value['deaths']['total']:'0'; ?></td>
                                        <td><?php echo $value['tests']['total']?$value['tests']['total']:'0'; ?></td>
                                        <td><?php echo $value['continent'] ?></td>

                                    </tr>
                                    <?php 
                                        }
                                    }
                                    ?>

                                    </table>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>
                                </div>
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
