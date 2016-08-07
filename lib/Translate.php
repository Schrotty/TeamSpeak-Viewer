<?php
    require_once('config/Config.php');
    require_once('lang/' . Config::$sLanguage . '/lang.php');

    class Translation {
        public static function TranslateString($sTransString){
            echo $sTranslation = Language::$aLang[$sTransString];
        }
    }
?>