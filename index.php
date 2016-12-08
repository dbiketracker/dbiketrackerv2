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
        //convert the json to a php assoc array for query
        $dbikeinfo = json_decode($json_array, true);
        //array for the locations and name of the stations
        $location_name = array();
        $position = array();


        for ($i = 0; $i <= count($dbikeinfo); $i++) {
            $position = array($dbikeinfo[$i]['position']);
            $location_name = array($dbikeinfo[$i]['name']);
//            print_r($position);
//            print_r($location_name);
            array_merge($position, $location_name);
            $i++;
        }

        //collection for the locations
        $loc_collection = $conn->$db->locations;
//        $loc_collection->drop();
         
        $loc_collection->batchInsert($position . $location_name);
//        foreach ($location_name . $position as $loc) {
//            echo $location_name['_id'] . "\n"; // populated with instanceof MongoId
//        }

//        $stations = $collection->find()->sort(array('i' => 1));


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
