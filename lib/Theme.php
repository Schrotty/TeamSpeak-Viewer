<?php
    require_once("config/Config.php");

    $sTheme = "themes/" . Config::$sTheme . "/custom.css";

    echo '<link href="' . $sTheme . '" rel="stylesheet">';
?>