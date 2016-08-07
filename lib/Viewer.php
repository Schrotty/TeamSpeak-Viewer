<?php
    require_once('TeamSpeak3/TeamSpeak3.php');
    require_once('../config/Config.php');
    
    $aResults = new stdClass();

    try {
        TeamSpeak3::init();
        $ts3 = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');

        foreach ($ts3->clientList() as $key => $client) {
            $clientid = $client['clid'];
            $pos = strpos($client, "from");
            if($pos != true){
                $aResults->user[] = "<tr><td class='client-name'>" . $client["client_nickname"] . "</td><td>" . $ts3->channelGetById($client['cid']) . "</td></tr>";
            }
        }   
    } catch(Exception $excep) {
        $aResults->error[] = (array)$excep->getMessage();
    }

    echo json_encode($aResults);
?>