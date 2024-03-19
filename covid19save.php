<?php
$conn= new mysqli("localhost","root","","covid2023");

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
        <meta charset="UTF-8">
        <title>
            Covid19 Information
        </title>
        <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/> <!--Link boostrap file-->
        <link rel="stylesheet" href="rest.css"/>

    </head>
    
    
    <body>
        <div class="main"> 
        
            <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
             

            </div>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10">
                            <h4 class="ali" style="text-align: center">Saved Covid-19 Information</h4>
                            <hr/>
                            <div class="container-fluid">
                                <table class="table">
                                    <tr>
                                        <th>Country Name</th>
                                        <th>Population</th>
                                        <th>Total Covid Cases</th>
                                        <th>Total Deaths</th>
                                        <th>Tests</th>
                                        <th>Continent</th>
                                        <th>Date</th>
                                       </tr>
                                       <?php
                                       $pcrarr=$data['response'];
                                       foreach ($pcrarr as $value) {


                                            $cName= $value['country'] ;
                                            $population= $value['population']?$value['population']:'0';
                                            $cases= $value['cases']['total']?$value['cases']['total']:'0';
                                            $deaths= $value['deaths']['total']?$value['deaths']['total']:'0';
                                            $tests= $value['tests']['total']?$value['tests']['total']:'0';
                                            if(empty($value['continent'])){
                                                $continent= 'NULL';
                                            }
                                            else{
                                                $continent= $value['continent'];
                                            }
                                            $date= $value['day'];

                                            $request= "INSERT INTO covidcases(countryName,population,totalcases,deaths,tests,"
                                                    . "continent,date) VALUES ('$cName','$population','$cases','$deaths',"
                                                    . "'$tests','$continent','$date')";

                                            //mysqli_query($conn, $request);
                                            $conn->query($request);
                                            ?>
                                       <tr>
                                           <td><?php echo $value['country']; ?></td>
                                            <td><?php echo $value['population']?$value['population']:'0'; ?></td>
                                            <td><?php echo $value['cases']['total']?$value['cases']['total']:'0'; ?></td>
                                            <td><?php echo $value['deaths']['total']?$value['deaths']['total']:'0'; ?></td>
                                            <td><?php echo $value['tests']['total']?$value['tests']['total']:'0'; ?></td>
                                            <td><?php echo $value['continent']; ?></td>
                                            <td><?php echo $value['day'];?></td>
                                       </tr>

                                       <?php
                                       }
                                       ?>

                                </table>

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