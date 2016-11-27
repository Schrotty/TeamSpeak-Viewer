<?php
    chdir('../');
    include('lib/core/Viewer.class.php');

    $oViewer = new Viewer();

    echo $oViewer->GetClientList();
?>