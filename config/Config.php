<?php
    class Config {
        /** ### Application Settings ### */
        public static $iDebug = 0; //0 = Production; 1 = Disable translation; 2 = Enable fake users; 3 = Disable translation and enable fake users

        /* ### Query Settings ### */
        public static $sQueryName = "dev_view";
        public static $sQueryPasswd = "a1g7ZGQF";
        public static $sQueryPort = "10011";

        /* ### Server Settings ### */
        public static $sServerIP = "127.0.0.1";
        public static $sServerPort = "9987";

        /* ### Default Translation Settings ### */
        public static $sLanguage = "en";

        /* ### Module Settings ### */
        public static $bLoadMods = true;
        public static $aModules = array(
            'notifications' => array(
                'settings' => 'settings.php',
                'modal' => 'modal.php'
            )
        );

        /* ### Module & Theme Settings ### */
        public static $sTheme = "default";
    }
?>  