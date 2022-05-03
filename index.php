
<?php
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

foreach ($result['monitors'] as $monitor) 
{
    foreach ($monitor as $key) {
        echo $key."\n";
    }
}
          
/* if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $result;
} */

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/css/style.css" rel="stylesheet" />
    <title>Statusboard</title>
</head>

<body>
    <!-- Header -->
    <section>
        <nav class="container-fluid border-bottom">
            <div class="container px-0">
                <div class="row py-3">
                    <div class="col">
                        <a class="navbar-brand" href="#">
                            <svg id="IN_Signet_4cC_Komprimiert_" data-name="IN Signet 4cC (Komprimiert)"
                                xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                <rect id="Rechteck_14" data-name="Rechteck 14" width="40" height="40" fill="#fff" />
                                <path id="Pfad_1" data-name="Pfad 1"
                                    d="M0,0V40H40V0ZM14.97,7.859l2.667,2.667L14.97,13.192,12.3,10.526Zm12.148,22.8H23.365V21.249c0-2.356-.451-3.217-2.526-3.217a8.5,8.5,0,0,0-3.979,1.228v11.4H13.079V15.139h3.781V16.79a9.308,9.308,0,0,1,5.206-2.046c4.741,0,5.065,2.864,5.065,6.081V30.66Z"
                                    fill="#0090d4" />
                            </svg>
                        </a>
                        <span>
                            System-Status
                        </span>
                    </div>
                    <div class="col text-right pt-2">
                        <small class="text-muted align-bottom text-right">
                            <span class="d-none d-md-inline">Zuletzt aktualisiert </span><span
                                class="d-md-none d-inline">Stand </span><span id="datetime"></span> Uhr
                        </small>
                    </div>
                </div>

            </div>
        </nav>
    </section>

    <!-- Meldung -->
    <section>
        <div class="container">
            <div class="row m-5">
                <div class="col text-center">
                    <svg class="mb-3" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                        <g id="Gruppe_8" data-name="Gruppe 8" transform="translate(-1265 384)">
                            <rect id="Rechteck_18" data-name="Rechteck 18" width="100" height="100"
                                transform="translate(1265 -384)" fill="#ffc107" />
                            <g id="warning-sign" transform="translate(1283.002 -367)">
                                <path id="Pfad_6" data-name="Pfad 6"
                                    d="M60.329,50.047,36.611,6.752a5.239,5.239,0,0,0-9.222,0L3.671,50.047a5.362,5.362,0,0,0,.09,5.358A5.216,5.216,0,0,0,8.282,58H55.718a5.216,5.216,0,0,0,4.521-2.6,5.362,5.362,0,0,0,.09-5.358ZM34.857,21,33.428,41.714H30.571L29.143,21ZM32,52a3,3,0,1,1,3-3A3,3,0,0,1,32,52Z"
                                    fill="#fff" />
                            </g>
                        </g>
                    </svg>
                    <h1>Systeme eingeschränkt</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Websites List -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col bg-light">
                    <div class="row pt-3 pb-3">
                        <div class="col">
                            <h5 class="">Websites</h5>
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <small class="text-muted pr-1">Systeme eingeschränkt</small>
                                <svg class="" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 32 32">
                                    <g id="Gruppe_37" data-name="Gruppe 37" transform="translate(-974 132)">
                                        <rect id="Rechteck_26" data-name="Rechteck 26" width="32" height="32"
                                            transform="translate(974 -132)" fill="#ffc107" />
                                        <g id="warning-sign" transform="translate(977.996 -128)">
                                            <path id="Pfad_12" data-name="Pfad 12"
                                                d="M23.641,18.485,14.732,1.643a3.093,3.093,0,0,0-5.464,0L.359,18.485A3.079,3.079,0,0,0,3.092,23H20.908a3.079,3.079,0,0,0,2.733-4.515ZM12,20a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,12,20Zm1-5H11l-.5-8h3Z"
                                                fill="#fff" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-none d-md-block row bg-warning pb-1"></div> <!-- if warning and bg-danger if danger -->

            <?php 
            
            ?>
            <div class="row">
                <!-- for schleife -->
                <div class="col-12 col-md-6 stat-item">
                    <div class="row py-3">
                        <div class="col">
                            website.com
                        </div>
                        <div class="col text-right">
                            <img src="public/media/svg/icon_in_ordnung.svg" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 stat-item">
                    <div class="row py-3">
                        <div class="col">
                            website2.com
                        </div>
                        <div class="col text-right">
                            <img src="public/media/svg/icon_in_ordnung.svg" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section>
    </section>

</body>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script>

</html>