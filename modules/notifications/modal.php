<div class="modal fade" tabindex="-1" role="dialog" id="sound-gallery">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php $this->oTranslator->TranslateString("notification-settings") ?></h4>
        </div>
        <div class="modal-body">
            <?php require_once('lib/Sounds.php'); ?>   

            <!-- Test Area -->
            <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">%</span>
                <input id="volume" type="text" class="form-control" placeholder="Volume">
                <div class="input-group-btn">
                    <button id="join-sound" class="btn btn-default" type="button"><?php $this->oTranslator->TranslateString("notification-join-test-btn") ?></button>
                    <button id="left-sound" class="btn btn-default" type="button"><?php $this->oTranslator->TranslateString("notification-left-test-btn") ?></button>
                </div>
                </div>
            </div>
            </div>

            <!-- Enable/ Disable Notifications -->
            <div id="notification-state" class="row">
            <div class="col-md-12">
                <input data-onstyle="default" data-style="slow" data-on="<?php $this->oTranslator->TranslateString("notifications-enabled") ?>" data-off="<?php $this->oTranslator->TranslateString("notifications-disabled") ?>" id="enable-notifications" data-width="100%" data-toggle="toggle" type="checkbox">
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php $this->oTranslator->TranslateString("close") ?></button>
        </div>
        </div>
    </div>
</div>