<?php


$path = "https://restcountries.com/v3.1/region/asia";
$data = json_decode(file_get_contents($path),true);
//var_dump($data);


$flag = $_GET['flag'];
    $cName = $_GET['cName'];
    $cOffName = $_GET['cOfficial'];
    $cContinent = $_GET['cContinent'];
    $cLanguages = $_GET['cLanguages'];
    $cBorders = $_GET['cBorders'];
    $cPopulation = $_GET['cPopulation'];
    $cArea = $_GET['cArea'];
    $cCapital = $_GET['cCapital'];
    $cRegion = $_GET['cRegion'];
    $cCurrency = $_GET['cCurrency'];
    $cSubregion = $_GET['cSubregion'];
    $cCode = $_GET['cCode'];


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Countries Details
        </title>
        <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="rest.css"/>
    </head>
    
    
    <body>
        
    <div id="main">
        <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
        <div id="navigation" class="container-fluid" style='text-align: right'> 
            <a class="l1" href="Rest.php">Home</a>&nbsp; 
            <a class="l1" href="Countries.php">Countries</a>&nbsp;
            
        </div>
        
        <div id="content">
            <h3 style="text-align: center"><?php echo $cName; ?></h3>
                <div class="container">
                    
                        <div class="row">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-10">
                            <div class="clearfix">&nbsp;</div>
                           <table border="1" class="table table-striped">


                               <tr>
                                   <td colspan="2" style="text-align: center">
                                       <img src="<?php echo $flag;?>"/>
                                   </td>
                               </tr>

                               <tr>
                                            <th>Official Name </th>
                                          <th><?php echo $cOffName; ?></th>
                                        </tr>
                                         <tr>
                                            <th>Capital </th>
                                            <th><?php echo $cCapital; ?></th>
                                        </tr>
                                         <tr>
                                            <th>Code </th>
                                            <th><?php echo $cCode; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Currency </th>
                                            <th><?php echo $cCurrency; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Subregion </th>
                                            <th><?php echo $cSubregion; ?></th>
                                        </tr>
                                         <tr>
                                            <th>Continent </th>
                                            <th><?php echo $cContinent; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Languages </th>
                                            <th><?php echo $cLanguages; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Borders </th>
                                            <th><?php echo $cBorders; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Population </th>
                                            <th><?php echo $cPopulation; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Area</th>
                                            <th><?php echo $cArea; ?></th>
                                        </tr>





                           </table>


                            </div>

                            <div class="col-2">&nbsp;</div>
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





