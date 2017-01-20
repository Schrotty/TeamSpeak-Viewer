<?php
    /**
     * Created by PhpStorm.
     * User: ruben
     * Date: 14.10.2016
     * Time: 18:10
     */
    try {

        include(getcwd() . '/MobileDetect/Mobile_Detect.php');
        $oDetector = new Mobile_Detect();

        $sResult = ($oDetector->isMobile() && !$oDetector->isTablet()) ? 'true' : 'false';
    }catch(Exception $e){
        echo $e->getMessage();
    }

    echo $sResult;
