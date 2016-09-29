<?php
    chdir('../');
    if(isset($_POST['lang'])){
        include('lang/' . $_POST['lang'] . '/lang.php');
        if($_POST['info'] == 'title'){
            echo json_encode($sLangTitle);
            return;
        }

        echo json_encode($aLang[$_POST['index']]);
    }
?>