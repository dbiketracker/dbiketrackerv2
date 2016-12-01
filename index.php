</html>

<!DOCTYPE HTML>
<html>
    <title>dbiketracker</title>
    <head>
        <?php
        ini_set("allow_url_fopen", 1);
        $api_key = "ec447add626cfb0869dd4747a7e50e21d39d1850";
        $contract_name = "Dublin";
        //phpinfo();
        $url = "https://api.jcdecaux.com/vls/v1/stations?contract=Dublin&apiKey=ec447add626cfb0869dd4747a7e50e21d39d1850";
        $json_array = file_get_contents($url);
        //$converted = json_decode($json_array,true);
        //print_r($json_array);
        
        
        
        $uri = "mongodb://heroku_2g7zhsrw:fptu2g7faerobjk513p7frl9sq@ds013222.mlab.com:13222/heroku_2g7zhsrw";
        $conn = new Mongo($uri);
        $db = $conn->heroku_2g7zhsrw;
        echo (" **Connection to database successful** ");
        echo($conn);
        $collection = $db->stationsv2;
        echo " **Station database selected**  <br><br>";
       

        $dbd = json_decode($json_array, true);
        echo $dbd[0]->number->name[0]->value; 
        $url="http://www.worldweatheronline.com/feed/weather.ashx?q=schruns,austria&format=json&num_of_days=5&key=8f2d1ea151085304102710";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
echo $data[0]->weather->weatherIconUrl[0]->value;   
//        print_r($dbd);
//        $collection->insert($dbd);
        $conn->close();
        ?>
    </head>
</html>
