<?php

    require_once('config/Config.php');
    require_once('lib/Translator.php');

    class ModLoader {
        public $oTranslator;
        private $aModArray;
        private $sWorkingDir;

        const MOD_PATH = 'modules/';
        const INFO_FILE = '/info.php';

        public function __construct(){
            $this->sWorkingDir =  getcwd() . '/';
            $this->oTranslator = new Translator();
            $this->aModArray = Config::$aModules;
        }

        public function LoadFiles($sFileType){
            if($this->aModArray != null){
                if(count($this->aModArray) != 0){
                    foreach($this->aModArray as $sMod){
                        $sInfoFile = self::MOD_PATH . $sMod . self::INFO_FILE;
                        if(file_exists($this->sWorkingDir . $sInfoFile)){
                            $aFiles = $this->GetFileList($sInfoFile);
                            foreach($aFiles as $sType => $aTypeFiles){
                                foreach ($aTypeFiles as $sKeyword => $sFile) {
                                    if($sFileType == $sKeyword){
                                        $sFilePath = self::MOD_PATH . $sMod . '/' . $sType . '/' . $sFile;
                                        $this->LoadFile($sFilePath, $sType);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        private function GetFileList($sInfoFilePath){
            include($this->sWorkingDir . $sInfoFilePath);

            return $aModule['files'];
        }

        private function LoadFile($sFilePath, $sFileType){
            switch ($sFileType) {
                case 'php':
                    include_once($this->sWorkingDir . $sFilePath);
                    break;

                case 'js':
                    echo '<script src="' . $sFilePath . '"></script>';
                    break;

                case 'css':
                    echo '<link href="' . $sFilePath . '" rel="stylesheet">';
                    break;
            }
        }
    }
?>