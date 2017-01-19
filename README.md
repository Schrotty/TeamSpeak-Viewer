# TeamSpeak-Viewer

1. Was ist der TeamSpeak Viewer?
2. Features
3. Geplante Features
3. Einrichtung
4. Einstellungen
5. Hintergrundgalerie
6. Benachritigungen
7. Themes
8. Sprachen
9. Bilder
10. Lizenz

## Was ist der TeamSpeak Viewer?
Eine Weboberfläche für einen TeamSpeak 3, um sich alle verbundenden Clients anzeigen zu lassen.

## Features
* Responsive dank Bootstrap
* Mobile Ansicht mit reduzierten Features für reduzierten Datenverbrauch
* Auflistung aller verbundenden Clients mitsamt des aktuellen Channels
* Hintergrundgalerie
* Verschieene Sprachen einstellbar
* Desktopbenachrichtigungen
  * Soundbenachritigugen inkl. verschiedener Soundpacks
  * Möglichkeit eigene Packs zu erstellen (Siehe Wiki)
* Automatische Aktualisierung
  * Die Aktualisierungsrate ist frei wählbar. (Siehe Einstellungen)

## Geplante Features
* Adminpanel
  * Ersetzt das konfigurieren über die Config.php

## Einrichtung
1. Das Repo. klonen oder als .zip herunterladen und auf einen Webserverr hochladen. Der Name des Ordners ist dabei nicht wichtig. Ein Beispiel könnte sein: _http://www.ihre-domain.de/tsview/_
2. Als Admin einen neuen ServerQuery anlegen.
  3. Dazu als Admin im TS Client anmelden und unter _Extras_ den Punkt _ServerQuery Login_ anwählen.
  4. Im folgenden wird ein Name für das Query festgelegt.
  5. Im nächsten Schritt wird der Name und das Passwort für das Query ausgegeben. Beides in die _config/Config.php_ eintragen und die bestehenden Einträge überschreiben.
  6. Wenn der Viewer auf einem anderen Server laufen soll als der TeamSpeak Server muss noch die Server IP angepasst werden. Die Ports können unverändert übernommen werden, wenn die Ports des Server nicht angepasst wurden.
  7. Sollte der Viewer auf einem anderen Server laufen muss dessen IP noch in die _query_ip_whitelist.txt_ des TeamSpeak Server eingetragen werden, da es sonst zu einem Floodban des Viewers kommt.

## Einstellungen
Die meisten Einstellungen liegen in der _config/Config.php_. Dort wird neben den Query & Server Einstellungen auch die Sprache des Viewers eingestellt.

Die Sprachdateien befinden sich unter _lang/[sprachkürzel]/_.

Die Aktualisierungsrate des Viewers wird in _js/viewer.js/_ eingestellt und zwar mit der Variable _refreshRateinSeconds_.

Die Hintergrundbilder liegen im Ordner _img/baackgrounds/_.
Empfohlen sind Bilder mit einer Auflösung von 1920x1080 Pixeln, wobei auch alle anderen Auflösungen akzeptiert werden.

<b>

        /* ### Application Settings ### */
        public static $iDebug = 0; /* 0 = Production;
                                      1 = Disable translation;
                                      2 = Enable fake users;
                                      3 = Disable translation and enable fake users
                                      Viewer Modus
                                      */
        
        /* ### Query Settings ### */
        public static $sQueryName = "dev_view"; //Name des Query
        public static $sQueryPasswd = "a1g7ZGQF"; //Passwort des Query
        public static $sQueryPort = "10011"; //Port des Query
        
        /* ### Server Settings ### */
        public static $sServerIP = "127.0.0.1"; //IP des TeamSpeak Servers
        public static $sServerPort = "9987"; //Port des TeamSpeak Servers
        
        /* ### Default Translation Settings ### */
        public static $sLanguage = "en"; //Defaut Sprache des Viewers
        
        /* ### Module Settings ### */
        public static $aModules = array('notifications', 'gallery', 'snow'); //Aktivierte Module
        public static $aMobileModules = array(); //Module für die mobile Ansicht
        
        /* ### Module & Theme Settings ### */
        public static $sTheme = "default"; //Default Theme des Viewers
        
</b>

## Hintergrundgalerie
In der Hintergrundgalerie kann jeder Benutzer einen eigenen Hintergrund für sich festlegen.
Aufgerufen wird die Galerie über die Einstellungen, welche mit dem Icon links oben erreichbar sind.

## Benachritigungen
In den Benachritigungseinstellungen kann jeder Nutzer für sich einstellen ob er darüber benachritigugt
werden möchte, wenn ein User den Server betritt/ verlässt.
Neben der Möglichkeit eines Benachritigungsbanners, gibt es noch die Möglichkeit 
zeitgleich eine Soundbenachrichtigung zu erhalten.

### Soundpacks
Die Benachritigungssounds lassen sich mit Soundpacks einstellen. Ein Soundpack
besteht dabei aus einem Sound für das Betreten bzw. des verlassen des Servers.
Als Default Pack sind die normalen TeamSpeak Sounds hinterlegt.
Wie eigene Soundpacks erstellt werden können steht im Wiki.

## Themes
In der aktuellen Version sind zwei Themes en    

## Bilder
![Default Image](http://i.imgur.com/xt0pPrT.jpg)
Default background

![Custom Image](http://i.imgur.com/cpXM7DW.jpg)
Custom background

![Background gallery](http://i.imgur.com/NLSjrW6.jpg)
Background gallery

## Lizenz
Dieses Projekt steht unter MIT Lizenz. Siehe LICENSE.md
