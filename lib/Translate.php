<?php
    require_once('config/Config.php');

    class Translation {
        private $sLang;
        private $olang;
        private $bError;

        public function __construct(){
            $this->sLang = Config::$sLanguage;
            if(isset($_GET['lang'])){
                $this->sLang = $_GET['lang'];
            }

            if($this->LanguageExists('lang/' . $this->sLang . '/lang.php')){
                require('lang/' . $this->sLang . '/lang.php');
            }else{
                require('lang/' . Config::$sLanguage . '/lang.php');
                $this->sLang = Config::$sLanguage;
            }

            $this->oLang = new $this->sLang();
        }

        public function LanguageExists($sLang){
            return file_exists($sLang);
        }

        public function TranslateString($sTransString){
            if($this->CanTranslate($sTransString)){
                if(Config::$iDebug < 1){
                    echo $sTranslation = $this->oLang->aLang[$sTransString];
                    return;
                }
                            
                echo $sTransString;
                return;
            }   

            echo $sTransString;
        }

        public function ListTranslation(){
            $aLangFolders = scandir('lang/');
            foreach($aLangFolders as $sKey => $sLangFolder){
                if($sLangFolder != "." && $sLangFolder != ".." && $sLangFolder != ".htaccess"){
                    require_once('lang/' . $sLangFolder . '/lang.php'); //hate it...
                    $oTmpLang = new $sLangFolder();
                    echo '<li><a class="option" value=' . $sLangFolder . '>' . $oTmpLang->sLangTitle . '</a></li>';
                }
            }
        }

        public function CanTranslate($sTransString){
            $this->oLang = new $this->sLang();
            foreach($this->oLang->aLang as $sKey => $slang){
                if($sKey == $sTransString){
                    return true;
                }
            }

            return false;
        }
    }
?>