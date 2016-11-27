 <?php
    require_once 'TeamSpeak3/TeamSpeak3.php';
    require_once('../config/Config.php');

    try {
        $ts3 = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');
        $ts3Client = $ts3->clientGetByName("serveradmin");

        $avatar = $ts3Client->avatarDownload();

        header('Content-type: ' . TeamSpeak3_Helper_Convert::imageMimeType($avatar));

        echo $avatar; 
    }catch(Exception $e){
        echo $e . "<br />";
    }