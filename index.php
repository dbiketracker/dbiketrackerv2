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
        
        
        
//        $uri = "mongodb://heroku_23dw8240:m6fb3mnio6qeob18q8m96ttc1l@ds147487.mlab.com:47487/heroku_23dw8240";
//        $conn = new Mongo($uri);
//        $db = $conn->heroku_23dw8240;
//        echo (" **Connection to database successful** ");
//        echo($conn);
//        $collection = $db->stations;
//        echo " **Station database selected**  <br><br>";
//
        $dbd = json_decode($json_array);
        print_r($dbd);
//        $collection->insert($dbd);
//        $conn->close();
        ?>
    </head>
</html>
