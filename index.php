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




        //collection for the locations
//        $loc_collection->insert($merged);
//        var_dump($merged);



        $uri = "mongodb://heroku_2g7zhsrw:fptu2g7faerobjk513p7frl9sq@ds013222.mlab.com:13222/heroku_2g7zhsrw";
        $conn = new Mongo($uri);
        $db = $conn->heroku_2g7zhsrw;
        echo (" **Connection to database successful** ");
        echo($conn);
        $collection = $db->locations;
        $position = array($dbikeinfo['position']);
        $location_name = array($dbikeinfo['name']);
        $merged = array_merge($location_name, $position);
        foreach($merged as $element): 
            #do something 
            print_r($element);
          endforeach; 
//        for ($i = 0; $i < count($dbikeinfo); $i++) {
//            $position = array($dbikeinfo[$i]['position']);
//            $location_name = array($dbikeinfo[$i]['name']);
////            print_r($position);
////            print_r($location_name);
//            $merged = array_merge($location_name, $position);
//            print_r($dbikeinfo);
//
//            
//
////            function insert_cow($loc_collection, $merged) {
////                $merged['y'] = 1;
////                $loc_collection->insert($merged);
////                insert_cow($loc_collection, $merged);
////                var_dump($merged);
////            }
//
//            $i++;
//        }

        echo " **Station database selected**  <br><br>";

//        $dbd = json_decode($json_array, true);
//        print_r($dbd);
//        $collection->insert($dbd);
//        $collection->insert($json_array);
        $conn->close();
        ?>
    </head>
</html>
