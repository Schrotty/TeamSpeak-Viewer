      
      <?php require_once( __DIR__ . '/core/Gallery.class.php'); $oGallery = new Gallery(); ?>
      <!-- Background Gallery -->
      <div class="modal fade" tabindex="-1" role="dialog" id="background-gallery">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><?php $this->oTranslator->TranslateString("background-gallery") ?></h4>
            </div>
            <div id="gallery-body" class="modal-body">
              <?php $oGallery->CreateGallery(); ?>

              <nav class="gallery-nav" aria-label="...">
                <ul class="pager">
                    <li id="previous-page" class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> <?php $this->oTranslator->TranslateString("previous-page") ?></a></li>
                    <li id="next-page" class="next"><a href="#"><?php $this->oTranslator->TranslateString("next-page") ?> <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
             </nav>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php $this->oTranslator->TranslateString("close") ?></button>
            </div>
          </div>
        </div>
      </div>