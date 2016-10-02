<?php
    require_once('config/Config.php');

    $sFolder = 'img/backgrounds/';

    chdir($sFolder);

    function createGalleryPages($aFiles, $sFolder){
        $iPageIndex = 1;
        foreach($aFiles as $aContent){
            if($iPageIndex == 1){
                echo '<div class="gallery-page active-page" id="' . $iPageIndex . '">';
            }else{
                echo '<div class="gallery-page" id="' . $iPageIndex . '">';
            }

            echo '<div class="row">';
            foreach($aContent as $sKey => $aFiles){
                foreach($aFiles as $sKey => $sFile){
                    $sImageTitle = pathinfo($sFile)['filename'];

                    echo '<div class="col-md-6 col-md-4">';
                        echo '<div id="' . $sImageTitle . '" class="thumbnail-wrapper" role="background" value="' . $sFile . '">';
                            echo '<div class="thumbnail">';
                                echo '<img class="gallery-image" src="' . $sFolder . '/' . $sFile .'">';
                                echo '<div class="image-text" value="' . $sFile . '">' . $sImageTitle . '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            }

            echo '</div></div>';

            $iPageIndex++;
        }

        return $iPageIndex;
    }

    $sRoot = getcwd();
    $aFolderContent = scandir($sRoot);
    $iFileIndex = 0;

    $aFilter = array();
    for($i = 0; $i < count($aFolderContent); $i++){
        if($aFolderContent[$i] != "." && $aFolderContent[$i] != ".."){
            $aFilter[] = $aFolderContent[$i];
        }
    }

    $aFilter = array_chunk(array_chunk($aFilter, 3), 3);
    $iPageCount = createGalleryPages($aFilter, $sFolder);

    chdir("../../");
?>