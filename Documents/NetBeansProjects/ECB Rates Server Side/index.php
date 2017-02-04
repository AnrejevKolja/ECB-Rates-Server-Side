<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ECB Rates Server Side</title>
        <style>
            td{
                padding: 10px;
            }
            .odd{
                background-color: gray;
            }
            .even{
                background-color: white;
            }
        </style>
    </head>
    <body>
        <?php
            $ecbUrl = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
            $xml=  simplexml_load_file($ecbUrl) or die("Error: Cannot create object");
            
            $date = $xml->Cube->Cube->attributes()[0];
            echo "<h2>Курсы на ".$date."</h2>";
            
            echo "<table>";
            echo "<tr><td>Валюта</td><td>Курс</td></tr>";
            $count = 1;
            foreach($xml->Cube->Cube->Cube as $pair) {
               $attr = $pair->attributes();
               $classname = ($count%2 != 0) ? "odd" : "even";
               echo "<tr class='$classname'><td>".$attr[0]."</td><td>".$attr[1]."</td></tr>";
               $count = $count + 1;
            }
            echo "</table>"
        ?>
    </body>
</html>
