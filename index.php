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
//        //so we are using valid json
//        print_r($json_array);
        //convert the json to a php array for query
        $dbikeinfo = json_decode($json_array, true);
//        print_r($decoded);
//        print_r($dbikeinfo[1]['name']);
        for ($i = 0; $i <= count($dbikeinfo); $i++) {
            print_r($dbikeinfo[$i]['position']);
            print "\n";
            $i++;
        }



        $uri = "mongodb://heroku_2g7zhsrw:fptu2g7faerobjk513p7frl9sq@ds013222.mlab.com:13222/heroku_2g7zhsrw";
        $conn = new Mongo($uri);
        $db = $conn->heroku_2g7zhsrw;
        echo (" **Connection to database successful** ");
        echo($conn);
        $collection = $db->locations;
        echo " **Station database selected**  <br><br>";

//        $dbd = json_decode($json_array, true);
//        print_r($dbd);
//        $collection->insert($dbd);
//        $collection->insert($json_array);
        $conn->close();
        ?>
    </head>
</html>
