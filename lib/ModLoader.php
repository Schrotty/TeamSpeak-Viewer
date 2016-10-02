<?php

    require_once('config/Config.php');
    require_once('lib/Translator.php');

    class ModLoader {
        public $oTranslator;
        private $aModArray;

        const MOD_PATH = 'modules/';
        const SETTINGS_FILE = '/settings.php';
        const MODAL_FILE = '/modal.php';

        public function __construct(){
            $this->oTranslator = new Translator();
            $this->aModArray = Config::$aModules;
        }

        public function LoadSettings(){
            if($this->aModArray != null && Config::$bLoadMods == true){
                foreach($this->aModArray as $sMod => $aMods){
                    foreach($aMods as $sType => $sFile){
                        if($sType == 'settings'){
                            $sSettingsFile = self::MOD_PATH . $sMod . self::SETTINGS_FILE;
                            if(file_exists($sSettingsFile)){
                                include_once($sSettingsFile);
                            }
                        }
                    }
                }
            }
        }

        public function LoadModal(){
            if($this->aModArray != null && Config::$bLoadMods == true){
                foreach($this->aModArray as $sMod => $aMods){
                    foreach($aMods as $sType => $sFile){
                        if($sType == 'modal'){
                            $sModalFile = self::MOD_PATH . $sMod . self::MODAL_FILE;
                            if(file_exists($sModalFile)){
                                include_once($sModalFile);
                            }
                        }
                    }
                }
            }
        }
    }
?>