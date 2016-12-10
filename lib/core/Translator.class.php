<?php
    require_once('config/Config.php');

    class Translator {
        private $sLang;
        private $alang;
        private $bError;

        public function __construct(){
            $this->sLang = Config::$sLanguage;
            if(isset($_GET['lang'])){
                $this->sLang = $_GET['lang'];
            }

            if($this->LanguageExists('lang/' . $this->sLang . '/lang.php')){
                include('lang/' . $this->sLang . '/lang.php');
                
            }else{
                include('lang/' . Config::$sLanguage . '/lang.php');
                $this->sLang = Config::$sLanguage;
            }

            $this->aLang = $aLang;
        }

        public function LanguageExists($sLang){
            return file_exists($sLang);
        }

        public function TranslateString($sTransString){
            if($this->CanTranslate($this->aLang, $sTransString)){
                if(Config::$iDebug == 1 || Config::$iDebug == 3){                    
                    echo $sTransString;
                    return;
                }
                            
                echo $sTranslation = $this->aLang[$sTransString];
                return;
            }   

            echo $sTransString;
        }

        public function ListTranslation(){
            $aLangFolders = scandir('lang/');
            foreach($aLangFolders as $sKey => $sLangFolder){
                if($sLangFolder != "." && $sLangFolder != ".." && $sLangFolder != ".htaccess"){
                    include('lang/' . $sLangFolder . '/lang.php'); //hate it...
                    echo '<li><a class="option lang-option" value=' . $sLangFolder . '>' . $sLangTitle . '</a></li>';
                }
            }
        }

        public function CanTranslate($aLangArr, $sTransString){
            foreach($aLangArr as $sKey => $sLang){
                if($sKey == $sTransString){
                    return true;
                }
            }

            return false;
        }
    }
?>