<?php
    require_once('config/Config.php');

    $sFolder = 'img/backgrounds/';

    chdir($sFolder);

    $sRoot = getcwd();
    $aFolderContent = scandir($sRoot);
    $iIndex = 0;
    foreach ($aFolderContent as $key => $sFile) {
        if($sFile != "." && $sFile != ".."){
            $sImageTitle = pathinfo($sFile)['filename'];
            if($iIndex == 0){
                echo '<div class="row">';
            }

            echo '<div class="col-md-6 col-md-4">';
                echo '<div id="' . $sImageTitle . '" class="thumbnail-wrapper" role="background" value="' . $sFile . '">';
                    echo '<div class="thumbnail">';
                        echo '<img class="gallery-image" src="' . $sFolder . '/' . $sFile .'">';
                        echo '<div class="image-text" value="' . $sFile . '">' . $sImageTitle . '</div>';
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