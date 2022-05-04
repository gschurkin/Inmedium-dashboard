<?php 

function getMonitors() {
    $curl = curl_init();
          
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.uptimerobot.com/v2/getMonitors",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "api_key=ur768760-9b4f4a67c85e47495c372087&format=json",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
    ));
            
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl); 

    $result = json_decode($response, true);

    return $result;
}

?>