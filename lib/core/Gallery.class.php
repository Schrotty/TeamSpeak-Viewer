<?php
    require_once('config/Config.php');

    class Gallery {
        private $sRootFolder;
        private $sFolder;

        public function __construct(){
            $this->sFolder = 'img/backgrounds';
        }

        private function CreateGalleryPages($aFiles, $sFolder){
            $iPageIndex = 1;
            foreach($aFiles as $aContent){
                if($iPageIndex == 1){
                    //print active page begin
                    echo '<div class="gallery-page active-page" id="' . $iPageIndex . '">';
                }else{
                    //print regular page begin
                    echo '<div class="gallery-page" id="' . $iPageIndex . '">';
                }

                //print begin of new row
                echo '<div class="row">';
                foreach($aContent as $sKey => $aFiles){
                    foreach($aFiles as $sKey => $sFile){
                        $sImageTitle = pathinfo($sFile)['filename'];

                        //print new image
                        echo '<div class="col-md-6 col-md-4">';
                            echo '<div id="' . $sImageTitle . '" class="thumbnail-wrapper" role="background" value="' . $sFile . '">';
                                echo '<div class="thumbnail">';
                                    echo '<img class="gallery-image" src="' . $this->sFolder . '/' . $sFile .'">';
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

        public function CreateGallery(){
            chdir($this->sFolder);
            $this->sRootFolder = getcwd();

            $aFolderContent = scandir($this->sRootFolder);
            $iFileIndex = 0;

            $aFilter = array();
            for($i = 0; $i < count($aFolderContent); $i++){
                if($aFolderContent[$i] != "." && $aFolderContent[$i] != ".."){
                    $aFilter[] = $aFolderContent[$i];
                }
            }

            $aFilter = array_chunk(array_chunk($aFilter, 3), 3);
            $iPageCount = $this->CreateGalleryPages($aFilter, $this->sFolder);

            chdir("../../");
        }
    }
?>