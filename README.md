# TeamSpeak-Viewer

1. Was ist der TeamSpeak Viewer?
2. Features
3. Geplante Features
3. Einrichtung
4. Einstellungen
5. Bilder

## Was ist der TeamSpeak Viewer?
Eine Weboberfläche für einen TeamSpeak 3, um sich alle verbundenden Clients anzeigen zu lassen.

## Features
* Responsive dank Bootstrap
* Auflistung aller verbundenden Clients mitsamt des aktuellen Channels.
* Automatische Aktualisierung, ohne dies gesamte Seite neuladen zu müssen.
  * Die Aktualisierungsrate ist frei wählbar. (Siehe Einstellungen)

## Geplante Features
* Eine Galerie für Hintergrundbilder.
* Desktopbenachrichtigungen.
* Ein Adminpanel.

Wie genau die einzelnen Features umgesetzt werden sollen steht noch nicht genau fest. Einen Entwurf der Galerie kann unter Bilder betrachtet werden.

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

<b>

        /* ### Query Settings ### */
        public static $sQueryName = "dev_view"; //Query Name
        public static $sQueryPasswd = "a1g7ZGQF"; //Query Passwort
        public static $sQueryPort = "10011"; //TeamSpeak Query Port
        
        /* ### Server Settings ### */
        public static $sServerIP = "127.0.0.1"; //TeamSpeak Server IP
        public static $sServerPort = "9987"; //TeamSpeak Server Port
        
        /* ### Translation Settings ### */
        public static $sLanguage = "de";  //Sprache des Viewers
</b>

## Bilder
