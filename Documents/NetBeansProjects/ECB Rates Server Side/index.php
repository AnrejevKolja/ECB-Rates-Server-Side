<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ECB Rates Server Side</title>
    </head>
    <body>
        <?php
            $ecbUrl = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
            $xml=  simplexml_load_file($ecbUrl) or die("Error: Cannot create object");
            
            $date = $xml->Cube->Cube->attributes()[0];
            echo "<h2>Курсы на ".$date."</h2>";
            
            echo "<table>";
            echo "<tr><td>Валюта</td><td>Курс</td></tr>";
            foreach($xml->Cube->Cube->Cube as $pair) {
               $attr = $pair->attributes();
               echo "<tr><td>".$attr[0]."</td><td>".$attr[1]."</td></tr>";
            }
            echo "</table>"
        ?>
    </body>
</html>
