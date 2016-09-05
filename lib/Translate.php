<?php
    require_once('config/Config.php');
    require_once('lang/' . Config::$sLanguage . '/lang.php');

    class Translation {
        public static function TranslateString($sTransString){
            if(Config::$iDebug < 1){
                echo $sTranslation = Language::$aLang[$sTransString];
                return;
            }
            
            echo $sTransString;
        }
    }
?>