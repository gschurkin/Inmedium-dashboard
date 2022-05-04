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
$counter = 1;

foreach ($result['monitors'] as $monitor) 
{
    if ($monitor["status"] == 8 || $monitor["status"] == 9) {
        $counter = $counter + 1;
    }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="refresh" content="60">
    <link href="public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="public/favicon.ico">
    
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
                            <span class="d-none d-md-inline ">Zuletzt aktualisiert </span><span
                                class="d-md-none d-inline">Stand </span><span id="datetime"></span> Uhr
                                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
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

                    <?php if ($counter == 1) { ?>
                        <svg class="my-4" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                            <g id="Gruppe_1" data-name="Gruppe 1" transform="translate(-965 384)">
                                <rect id="Rechteck_16" data-name="Rechteck 16" width="100" height="100" transform="translate(965 -384)" fill="#0090d4"/>
                                <g id="f-check" transform="translate(983 -366)">
                                <path id="Pfad_2" data-name="Pfad 2" d="M61.707,15.293l-7-7a1,1,0,0,0-1.414,0L23,38.586,10.707,26.293a1,1,0,0,0-1.414,0l-7,7a1,1,0,0,0,0,1.414l20,20a1,1,0,0,0,1.414,0l38-38A1,1,0,0,0,61.707,15.293Z" fill="#fff"/>
                                </g>
                            </g>
                        </svg>
                        <h1>Alles in Ordnung</h1>
                    <?php } elseif($counter > 1 and $counter <= 3) { ?>
                        <svg class="my-4" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                            <g id="Gruppe_8" data-name="Gruppe 8" transform="translate(-1265 384)">
                                <rect id="Rechteck_18" data-name="Rechteck 18" width="100" height="100" transform="translate(1265 -384)" fill="#ffc107"/>
                                <g id="warning-sign" transform="translate(1283.002 -367)">
                                <path id="Pfad_6" data-name="Pfad 6" d="M60.329,50.047,36.611,6.752a5.239,5.239,0,0,0-9.222,0L3.671,50.047a5.362,5.362,0,0,0,.09,5.358A5.216,5.216,0,0,0,8.282,58H55.718a5.216,5.216,0,0,0,4.521-2.6,5.362,5.362,0,0,0,.09-5.358ZM34.857,21,33.428,41.714H30.571L29.143,21ZM32,52a3,3,0,1,1,3-3A3,3,0,0,1,32,52Z" fill="#fff"/>
                                </g>
                            </g>
                        </svg>
                        <h1>Systeme eingeschränkt</h1>
                    <?php } else { ?>
                        <svg class="my-4" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
                            <g id="Gruppe_9" data-name="Gruppe 9" transform="translate(-1115 384)">
                                <rect id="Rechteck_17" data-name="Rechteck 17" width="100" height="100" transform="translate(1115 -384)" fill="#dc3545"/>
                                <g id="d-remove" transform="translate(1132.628 -366.372)">
                                <path id="Pfad_3" data-name="Pfad 3" d="M55.335,46.849,40.485,32l14.85-14.849a1,1,0,0,0,0-1.414L48.263,8.665a1,1,0,0,0-1.414,0L32,23.515,17.151,8.665a1,1,0,0,0-1.414,0L8.665,15.737a1,1,0,0,0,0,1.414L23.515,32,8.665,46.849a1,1,0,0,0,0,1.414l7.072,7.072a1,1,0,0,0,1.414,0L32,40.485l14.849,14.85a1,1,0,0,0,1.414,0l7.072-7.072A1,1,0,0,0,55.335,46.849Z" fill="#fff"/>
                                </g>
                            </g>
                        </svg>
                        <h1>Alle Systeme ausgefallen</h1>
                    <?php } ?>

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
                            <strong class="">Websites</strong>
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <?php if ($counter == 1) { ?>
                                    <small class="text-muted pr-1">Alles in Ordnung</small>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                        <g id="Gruppe_12" data-name="Gruppe 12" transform="translate(-892 132)">
                                            <rect id="Rechteck_25" data-name="Rechteck 25" width="32" height="32" transform="translate(892 -132)" fill="#0090d4"/>
                                            <g id="f-check" transform="translate(896 -128)">
                                            <path id="Pfad_11" data-name="Pfad 11" d="M9,21,1,13l3-3,5,5L21,3l3,3Z" fill="#fff"/>
                                            </g>
                                        </g>
                                    </svg>
                                <?php } elseif($counter > 1 and $counter <= 3) { ?>
                                    <small class="text-muted pr-1">Systeme eingeschränkt</small>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                        <g id="Gruppe_10" data-name="Gruppe 10" transform="translate(-974 132)">
                                            <rect id="Rechteck_26" data-name="Rechteck 26" width="32" height="32" transform="translate(974 -132)" fill="#ffc107"/>
                                            <g id="warning-sign" transform="translate(977.996 -128)">
                                            <path id="Pfad_12" data-name="Pfad 12" d="M23.641,18.485,14.732,1.643a3.093,3.093,0,0,0-5.464,0L.359,18.485A3.079,3.079,0,0,0,3.092,23H20.908a3.079,3.079,0,0,0,2.733-4.515ZM12,20a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,12,20Zm1-5H11l-.5-8h3Z" fill="#fff"/>
                                            </g>
                                        </g>
                                    </svg>
                                <?php } else { ?>
                                    <small class="text-muted pr-1">Alle Systeme ausgefallen</small>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                        <g id="Gruppe_11" data-name="Gruppe 11" transform="translate(-929 132)">
                                            <rect id="Rechteck_24" data-name="Rechteck 24" width="32" height="32" transform="translate(929 -132)" fill="#dc3545"/>
                                            <g id="d-remove" transform="translate(934 -127)">
                                            <path id="Pfad_10" data-name="Pfad 10" d="M20.727,4,18,1.273a.879.879,0,0,0-1.273,0L11,7,5.273,1.273A.879.879,0,0,0,4,1.273L1.273,4a.879.879,0,0,0,0,1.273L7,11,1.273,16.727a.879.879,0,0,0,0,1.273L4,20.727a.879.879,0,0,0,1.273,0L11,15l5.727,5.727a.879.879,0,0,0,1.273,0L20.727,18a.879.879,0,0,0,0-1.273L15,11l5.727-5.727A.879.879,0,0,0,20.727,4Z" fill="#fff"/>
                                            </g>
                                        </g>
                                    </svg>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row 
            
                <?php if ($counter == 1) { ?> 
                    d-none
                <?php } elseif($counter > 1 and $counter <= 3) { ?> 
                    bg-warning
                <?php } elseif($counter > 3) { ?> 
                    bg-danger
                <?php } ?> 

             pb-1">
        
            </div>


            <div class="row">
                <?php foreach ($result['monitors'] as $monitor){ ?>
                        <div onclick="location.href='<?php echo $monitor['url']?>';" class="col-12 col-md-6 stat-item" >
                            <div class="row py-3">
                                <div class="col">
                                    <small>
                                        <?php echo $monitor['friendly_name']?>
                                    </small>
                                </div>
                                <div class="col text-right">
                                    <?php if ($monitor['status'] == 2) { ?>
                                        <img src="public/media/svg/icon_in_ordnung.svg" />
                                    <?php } elseif ($monitor['status'] == 0) { ?>
                                        <img src="public/media/svg/icon_eingeschraenkt.svg" />
                                    <?php } elseif ($monitor['status'] == 8 || $monitor['status'] == 9) { ?>
                                        <img src="public/media/svg/icon_ausgefallen.svg" />
                                    <?php } else { ?>
                                        no data
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <section>
        <div class="container">
            <div class="row m-4">
                <div class="col text-center"></div>
            </div>
        </div>
    </section>

</body>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
</script>

</html>