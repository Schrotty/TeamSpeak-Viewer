<?php
    require_once('config/Config.php');
    require_once 'lib/MobileDetect/Mobile_Detect.php';

    /**
     * Class Gallery
     */
    class Gallery {

        /**
         * @var
         */
        private $sRootFolder;

        /**
         * @var string
         */
        private $sFolder;

        /**
         * Gallery constructor.
         */
        public function __construct(){
            $this->sFolder = 'img/backgrounds';
        }

        /**
         * @param $iPageIndex
         * @param $aFiles
         * @return mixed
         */
        private function CreateGalleryPages($iPageIndex, $aFiles){
            foreach($aFiles as $sFolder =>  $aContent){
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

                        if (is_array($sFile)) continue;
                        $aImageInfo = explode(";", $sFile);

                        $sImagePack = $aImageInfo[1];
                        $sImageTitle = pathinfo($aImageInfo[0])['filename'];

                        //print new image
                        echo '<div class="col-md-6 col-md-4">';
                            if($sImagePack != "z_default"){
                                echo '<div class="ribbon"><span>'. $sImagePack .'</span></div>';
                            }

                            echo '<div id="' . $sImageTitle . '" class="thumbnail-wrapper" role="background" value="' . $sImagePack . '/' . $aImageInfo[0] . '">';
                                echo '<div class="thumbnail">';
                                    echo '<img class="gallery-image" src="' . $this->sFolder . '/' . $sImagePack . '/' . $aImageInfo[0] .'">';
                                    echo '<div class="image-text" value="' . $aImageInfo[0] . '">' . $sImageTitle . '</div>';
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

        /**
         *
         */
        public function CreateGallery(){
            chdir($this->sFolder);
            $this->sRootFolder = getcwd();

            //$aFolderContent = scandir($this->sRootFolder);

            $this->GetImagePackFolder();

            chdir("../../");
        }

        /**
         *
         */
        private function GetImagePackFolder(){
            $iPageIndex = 1;
            $aFilter = array();

            $aFolders = scandir(getcwd());
            foreach ($aFolders as $sFolder){
                if($sFolder != "." && $sFolder != "..") {
                    $aFolderContent = scandir(getcwd() . '/' . $sFolder . '/');
                    //print_r($aFolderContent);
                    for ($i = 0; $i < count($aFolderContent); $i++) {
                        if ($aFolderContent[$i] != "." && $aFolderContent[$i] != ".." && $aFolderContent[$i] != $sFolder) {
                            $aFilter[] = $aFolderContent[$i] . ';' . $sFolder;
                        }
                    }
                }
            }

            $aFilter = array_chunk(array_chunk($aFilter, 3), 3);
            $this->CreateGalleryPages($iPageIndex, $aFilter);
        }
    }
?>