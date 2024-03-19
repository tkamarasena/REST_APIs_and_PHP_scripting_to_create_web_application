<!--How to read a json file-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Countries Details
        </title>
        <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css"/> <!--Link boostrap file-->
        
        <link rel="stylesheet" href="rest.css"/>
       
    
    
    </head>
    <body>
    <div class="main"> 
        
        <div id="header" class="bg bg-dark text text-white">Research and Development Lab </div>
        <div id="navigation" class="container-fluid" style='text-align: right'> 
            <a class="l1" href="Rest.php">Home</a>&nbsp; 
            
        </div>
        
        <div id="content">
            <h5 class="ali" style="text-align: center">Asian Countries </h5>
            <div class="container">
            



            <?php
                $path = "https://restcountries.com/v3.1/region/asia"; 

                $data = json_decode(file_get_contents($path),true); /*(file_get_contents($path)"Read content"

                //json_decode(file_get_contents($path));"decode to multi diamentioanl array"*/

                //var_dump($data);
                $n=0;
                $n1=0;
                $n2=0;
                $n3=0;
                $n4=0;

            ?>

            <table border="1" class="table table-striped ">
                <tr class="text text-primary">
                    <th>Flag</th>
                    <th>Country Name</th>
                    <th>Capital City</th>
                    <th>Region</th>
                    <th>Subregion</th>
                    <th>Currencies</th>
                    <th>Country Code</th>
                    <th>&nbsp;</th>

                </tr>

                <tr>
                <tr>
                    <?php
                    foreach ($data as $value){
                        if($value['region']== 'Asia'){
                            //$flag=$value['flags']['png'];

                     ?>
                         <tr><td><img src="<?php echo $value['flags']['png'];?>" width="50px"/></td>
                            <td><?php echo $value['name']['common']?></td>

                            <td><?php if(empty($value['capital'][0])){
                                echo "NULL";
                            }
                            else{
                                $capital=$value['capital'][0];
                                echo $value['capital'][0];
                            }?></td>

                            <td><?php echo $value['region']?></td>
                            <td><?php echo $value['subregion']?></td>
                            <td><?php if (isset($value['currencies']) && !empty($value['currencies'])) : ?>
                                    <?php foreach ($value['currencies'] as $y) : ?>
                                        <?= $y['name'] . '( ' . $y['symbol'] . ')'; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    No currency
                                <?php endif; ?></td>

                            <td><?php echo $value['cca2']?></td>
                            <td><a href="countrydetails.php? 
                                   flag=<?php echo $value['flags']['png']; ?>&
                                   cName=<?php echo $value['name']['common']; ?>&
                                   cOfficial=<?php echo $value['name']['official']; ?>&
                                   cContinent=<?php echo $value['continents'][0]; ?>&
                                   cLanguages=<?php 
                                         $arrl=$data[$n4]['languages'];
                                         echo join(", ",$arrl);
                                         $n4=$n4+1;
                                         ?>&
                                   cBorders=<?php 
                                       if(isset($data[$n1]['borders'])){
                                            $arrb=$data[$n1]['borders'];
                                            echo join(", ",$arrb);
                                        }
                                        $n1=$n1+1;
                                        ?>&
                                   cPopulation=<?php 
                                         echo number_format($data[$n2]['population']);                       
                                         $n2=$n2+1; 
                                         ?>&
                                   cArea=<?php 
                                         echo number_format($data[$n3]['area']);                       
                                         $n3=$n3+1; 
                                         ?>&
                                   cCapital=<?php
                                         if (empty($value['capital'][0])){
                                            $capital="NULL";
                                         }
                                         else{
                                            $capital=$value['capital'][0];
                                            echo $value['capital'][0];
                                         }            
                                            ?>&
                                   cRegion=<?php echo $value['region']; ?>&
                                   cCurrency=<?php print($y['name']); ?>&
                                   cSubregion=<?php echo $value['subregion']; ?>&
                                   cCode=<?php echo $value['cca2'];?> ">
                                <button class="btn btn-success" type="button">View</button></a></td>


                    <?php
                        }
                    }
                    ?>
                </tr>
                </tr>
            </table>


            </div>
        </div>
        <div id="footer">
                <div class="text text-dark" align="center">
                    All Right Received © Tharinda Kaushalya 2023 </div>    
        </div>
        
    </div>  
    </body>
    </html>

