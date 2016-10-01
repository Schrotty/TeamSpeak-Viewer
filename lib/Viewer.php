<?php
    require_once('TeamSpeak3/TeamSpeak3.php');
    require_once('../config/Config.php');
    
    $aResults = new stdClass();

    function GroupArray($aArray){
        $aSorted = array();

        $iArrayCount = count($aArray);
        $iIndex = 0;
        foreach($aArray as $sKey => $sValue){
            if($iIndex == 0){
                $aSorted[$sKey] = $sValue;
                continue;
            }

            foreach($aSorted as $sKy => $sSortedValue){
                if($sKey == $sKy){
                    $aSorted[$sKey] = $sValue;
                }
            }

            $iIndex++;
        }

        return $aSorted;
    }

    function getUser($sUsername, $sChannel){
        $oUser['client_nickname'] = $sUsername;
        $oUser['cid'] = $sChannel;

        return $oUser;
    }

    function cmp($a, $b){
        return strcmp($a['cid'], $b['cid']);
    }

    function getChannel($iID){
        $aChannels = array(
            '0'     =>      'Neues aus der Anstalt',
            '1'     =>      'Schrottys Schrottplatz',
            '2'     =>      'Programmierkeller',
            '3'     =>      'AFK'
        );

        return $aChannels[$iID];
    }

    try {
        TeamSpeak3::init();
        if(Config::$iDebug != 2 && Config::$iDebug != 3){
            $ts3 = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');

            $aUsers = $ts3->clientList();
        }

        if(Config::$iDebug == 2 || Config::$iDebug == 3){
            $aUsers = array(
                '0' =>  getUser('HOST_Herman', 0),
                '1' =>  getUser('GRAFIK_Günter', 3),
                '2' =>  getUser('DAU_Dieter', 0),
                '3' =>  getUser('C++_Charles', 1),
                '4' =>  getUser('BIOS_Bernd', 3),
                '5' =>  getUser('RUBY_Rodolf', 2)
            );
        }

        usort($aUsers, "cmp"); 
        foreach ($aUsers as $key => $client) {
            $clientid = $client['cid'];
            $pos = strpos($client['client_nickname'], "from");
            if($pos != true){
                if(Config::$iDebug == 2 || Config::$iDebug == 3){
                    $aResults->user[] = "" . $client['client_nickname'] . ";" . getChannel($client['cid']) . "";
                }else{
                    $aResults->user[] = "" . $client["client_nickname"] . ";" . $ts3->channelGetById($client['cid']) . "";
                }
            }
        }
    } catch(Exception $excep) {
        $aResults->error[] = (array)$excep->getMessage();
    }

    echo json_encode($aResults);
?>