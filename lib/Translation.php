<?php
    chdir('../');

    function CanTranslate($aLang, $sIndex){
        foreach($aLang as $sKey => $sLang){
            if($sKey == $sIndex){
                return true;
            }
        }

        return false;
    }

    if(isset($_POST['lang'])){
        include('lang/' . $_POST['lang'] . '/lang.php');
        if($_POST['info'] == 'title'){
            echo json_encode($sLangTitle);
            return;
        }

        if(!CanTranslate($aLang, $_POST['index'])){
            echo json_encode($_POST['index']);
            return;
        }
        
        echo json_encode($aLang[$_POST['index']]);
    }
?>