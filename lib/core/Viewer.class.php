<?php
    require_once('lib/TeamSpeak3/TeamSpeak3.php');
    require_once('config/Config.php');
    
    class Viewer {
        private $oConnection;
        private $aResults;
        private $aUsers;

        public function __construct(){
            $this->aResults = new stdClass();

            try {
                TeamSpeak3::init();
                if(Config::$iDebug != 2 && Config::$iDebug != 3){
                    $this->oConnection = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');
                }
            }catch(Exception $oExcec){
                $this->aResults->error[] = (array)$oExcec->getMessage();
            }
        }

        private function GroupArray($aArray){
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

        private function GetUser($sUsername, $sChannel){
            $oUser['client_nickname'] = $sUsername;
            $oUser['cid'] = $sChannel;

            return $oUser;
        }

        private static function CompareValues($a, $b){
            return strcmp($a['cid'], $b['cid']);
        }

        private function getChannel($iID){
            $aChannels = array(
                '0'     =>      'Neues aus der Anstalt',
                '1'     =>      'Schrottys Schrottplatz',
                '2'     =>      'Programmierkeller',
                '3'     =>      'AFK'
            );

            return $aChannels[$iID];
        }

        public function GetClientList(){
            try {
                if(Config::$iDebug == 2 || Config::$iDebug == 3){
                    $this->aUsers = array(
                        '0' =>  $this->getUser('HOST_Herman', 0),
                        '1' =>  $this->getUser('GRAFIK_Günter', 3),
                        '2' =>  $this->getUser('DAU_Dieter', 0),
                        '3' =>  $this->getUser('C++_Charles', 1),
                        '4' =>  $this->getUser('BIOS_Bernd', 3),
                        '5' =>  $this->getUser('RUBY_Rodolf', 2)
                    );
                }else{
                    $this->aUsers = $this->oConnection->clientList();
                }

                usort($this->aUsers, array('Viewer', 'CompareValues')); 
                foreach ($this->aUsers as $sKey => $oClient) {
                    $sClientId = $oClient['cid'];
                    $iPos = strpos($oClient['client_nickname'], "from");
                    if($iPos != true){
                        if(Config::$iDebug == 2 || Config::$iDebug == 3){
                            $this->aResults->user[] = "" . $oClient['client_nickname'] . ";" . $this->getChannel($oClient['cid']) . "";
                        }else{
                            $this->aResults->user[] = "" . $oClient["client_nickname"] . ";" . $this->oConnection->channelGetById($oClient['cid']) . "";
                        }
                    }
                }
            } catch(Exception $excep) {
                $this->aResults->error[] = (array)$excep->getMessage();
            }

            return json_encode($this->aResults);
        }
    }
?>