<?php
    require_once('../TeamSpeak3/TeamSpeak3.php');
    require_once('../../config/Config.php');

    class AvatarDownloader {
        public function __construct(){
            $this->DownloadAvatar();
        }

        public function DownloadAvatar(){
            try {
                // connect to local server, authenticate and spawn an object for the virtual server on port 9987
                $ts3_VirtualServer = TeamSpeak3::factory('serverquery://' . Config::$sQueryName . ':' . Config::$sQueryPasswd . '@' . Config::$sServerIP . ':' . Config::$sQueryPort . '/?server_port=' . Config::$sServerPort . '');

                // spawn an object for the client using a specified nickname
                $ts3_Client = $ts3_VirtualServer->clientGetByName("serveradmin");
                // download the clients avatar file
                $avatar = $ts3_Client->avatarDownload();
                //echo $ts3_Client->avatarGetName() . "<br />";
                // send header and display image
                header("Content-Type: " . TeamSpeak3_Helper_Convert::imageMimeType($avatar));
                echo $avatar; 
            } catch (TeamSpeak3_Exception $e) {
                // print the error message returned by the server
                echo "Error " . $e->getCode() . ": " . $e->getMessage();
            }
        }
    }

    $obj = new AvatarDownloader();
    $obj->DownloadAvatar();
?>