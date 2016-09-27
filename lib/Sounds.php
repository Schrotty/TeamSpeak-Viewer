<?php
    require_once('config/Config.php');

    $sFolder = 'modules/sounds/';

    chdir($sFolder);

    $sRoot = getcwd();
    $aFolderContent = scandir($sRoot);
    $iIndex = 0;

    foreach ($aFolderContent as $key => $sFile) {
        if($sFile != "." && $sFile != ".."){
            $sPackTitle = pathinfo($sFile)['filename'];
            $sPackInfoPath = getcwd() . "/" . $sPackTitle . "/pack.json";

            $rHandle = fopen($sPackInfoPath, "r+");
            $aContent = json_decode(fread($rHandle, filesize($sPackInfoPath)), true);
            fclose($rHandle);

            if($iIndex == 0){
                echo '<div class="row">';
            }

            echo '<div class="col-md-6 col-md-4 sound-image">';
                echo '<div id="' . $sFile . '-sp" class="thumbnail-wrapper" role="sound" value="' . $sFile . '">';
                    echo '<div class="thumbnail">';
                        echo '<img class="gallery-image" src="' . $sFolder . $sPackTitle .'/logo.png">';
                        echo '<div class="image-text" value="' . $sFile . '">' . $aContent['title'] . '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            if($iIndex == 2){
                echo '</div>';
                $iIndex = 0;

                continue;
            }

            if($key == count($aFolderContent) - 1){
                echo "</div>";
            }

            $iIndex++; 
        }
    }

    chdir("../../");
?>