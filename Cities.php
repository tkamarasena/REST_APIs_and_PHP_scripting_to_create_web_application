

<!--link with cityDetails.php page-->
<?php
$error = '';

if(isset($_GET['cid'])){
    $cid = $_GET['cid'];
   $path = "https://restcountries.com/v3.1/alpha/" . $cid;
   $data = json_decode(file_get_contents($path), true);
   
   if(!$data){
       $error= "Faild to retreive city informations!!";
    }
    
}else{
       $error= "City id missing in the URL!!";
   }

//$cid = $_GET['cid'];
//$path = "https://restcountries.com/v3.1/alpha/" . $cid;
//$data = json_decode(file_get_contents($path), true);

                
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
            <div id="navigation" class="container-fluid"> 
                <a class="l1" href="Rest.php">Home</a>&nbsp; 
            </div>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10">                           
                 
 
      <div class="container">
          <div>
                <h2 class="text-center">City Information</h2>
            </div>
            <div class="row">
                <div class="col-1">&nbsp;</div>
                <div class="col-10">
                    <div class="clearfix">&nbsp;</div>
                    <table class="table table-striped">
                        <tr>
                            <th class="text-primary">Search City</th>
                            <th><input type="text" id="city_name" name="city_name" class="col-8 form-control"></th>
                        </tr>
                    </table>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">City Name</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Country</th>
                            </tr>
                        </thead>
                        <tbody id="cities">

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
                crossorigin="anonymous">
        </script>

            
   </div>
            
        
                       </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>                  
            </div>
            
    

</div></div>
        
    
        
<script>
    $('#city_name').keyup(function () {
                var cityName = $('#city_name').val();
                if (cityName && cityName !== "") {
                    callApi(cityName);
                } else {
                    $("#cities").empty();

                }

                // Call the API
                function callApi(query) {
                    const settings = {
                        async: true,
                        crossDomain: true,
                        url: `https://city-and-state-search-api.p.rapidapi.com/search?q=${query}`,
                        method: 'GET',
                        headers: {
                            'X-RapidAPI-Key': 'ENTER_RAPID_API_KEY_HERE' ,   // enter RAPID API key here
                            'X-RapidAPI-Host': 'city-and-state-search-api.p.rapidapi.com'
                        }
                    };

                    $.ajax(settings).done(function (response) {
                        var cid = "<?php echo $data[0]['cca2']; ?>";

                        html = "";
                        for (var i = 0; i < 5; i++) {


                            html +=
                                `<tr>
                            <th scope="row">${response[i].id}</th>
                            <td>${response[i].name}</td>
                            <td>${response[i].state_code}</td>
                            <td>${response[i].country_name}</td>
                            <td><a class="btn btn-success" href="cityDetails.php?countryname=${response[i].country_name}&c=${response[i].name}">
                                    City Details</a></td>
                        </tr>`;
                        }


                        $("#cities").empty();
                        $("#cities").append(html);

                    });

                }



            });
</script>

<div id="footer">
                <div class="text text-dark" align="center">
                    All Right Received © Tharinda Kaushalya 2023</div>    
        </div>
        
 </body>
</html>       
        
        
        
        