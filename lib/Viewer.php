<?php
    require_once('TeamSpeak3/TeamSpeak3.php');
    require_once('../config/Config.php');
    
    $aResults = new stdClass();

    try {
        TeamSpeak3::init();
        //$ts3 = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');
        $ts3 = TeamSpeak3::factory("serverquery://TSViewer:l75cLOKM@178.254.36.180:10011/?server_port=9987");

        foreach ($ts3->clientList() as $key => $client) {
            $clientid = $client['clid'];
            $pos = strpos($client, "from");
            if($pos != true){
                $aResults->user[] = "" . $client["client_nickname"] . ";" . $ts3->channelGetById($client['cid']) . "";
            }
        }   
    } catch(Exception $excep) {
        $aResults->error[] = (array)$excep->getMessage();
    }

    echo json_encode($aResults);
?>