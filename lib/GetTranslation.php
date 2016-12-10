<?php
    chdir('../');
    if(isset($_POST['lang'])){
        include('lang/' . $_POST['lang'] . '/lang.php');
        include('lib/core/Translator.class.php');
        
        $oTranslator = new Translator();
        if($_POST['info'] == 'title'){
            echo json_encode($sLangTitle);
            return;
        }

        if(!$oTranslator->CanTranslate($aLang, $_POST['index'])){
            echo json_encode($_POST['index']);
            return;
        }
        
        echo json_encode($aLang[$_POST['index']]);
    }
?>