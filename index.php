</html>

<!DOCTYPE HTML>
<html>
    <title>dbiketracker</title>
    <head>
        <?php
        ini_set('memory_limit', '1024M');
        ini_set("allow_url_fopen", 1);

        $api_key = "ec447add626cfb0869dd4747a7e50e21d39d1850";
        $contract_name = "Dublin";
        //phpinfo();
        $url = "https://api.jcdecaux.com/vls/v1/stations?contract=Dublin&apiKey=ec447add626cfb0869dd4747a7e50e21d39d1850";
        $json_array = file_get_contents($url);
        //convert the json to a php assoc array for query
        $dbikeinfo = json_decode($json_array, true);
        //connection settings
        //uri to connect to our db
        $uri = "mongodb://heroku_2g7zhsrw:fptu2g7faerobjk513p7frl9sq@ds013222.mlab.com:13222/heroku_2g7zhsrw";
        //connection using the new Mongo connection
        $conn = new Mongo($uri);
        //connect to the specific database labelled heroku_2g7zhsrw
        $db = $conn->heroku_2g7zhsrw;
        //echo that our connection was successful
        echo (" **Connection to database successful** ");
        echo($conn);

        $js = "function() {
    return this.name == 'SMITHFIELD NORTH' && this.name == 'PARNELL SQUARE NORTH';
}";
        $cursor = $collection->find(array('$where' => $js));
        foreach ($cursor as $doc) {
            var_dump($doc);
        }





        //close the connection
        $conn->close();
        ?>
    </head>
</html>
