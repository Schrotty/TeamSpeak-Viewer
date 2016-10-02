<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="./img/icon/favicon.png"/>

    <!-- Translation -->
    <?php require_once('lib/Translator.php'); $oTranslation = new Translator(); ?>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php $oTranslation->TranslateString("title") ?></title>

    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/mobile.css" rel="stylesheet">
    <link href="css/pace.style.css" rel="stylesheet">

    <!-- Custom Theme -->
    <?php require_once('lib/Theme.php'); ?>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div class="panel panel-default">
          <div class="panel-heading">
              <image id="settings-icon" class="click-img" src="./img/icon/extender.png">
              <h3 class="panel-title translate" id="application-title"><?php $oTranslation->TranslateString("application-title") ?></h3>
              <image id="refresh-icon" class="click-img" src="./img/icon/refresh.png">
              <div style="clear:left; width:30px;"></div>
          </div>
          <div class="table-container">
              <table class="table" id="table-view">
                <thead>
                  <tr>
                    <th class="translate" id="username-text"><?php $oTranslation->TranslateString("username") ?></th>
                    <th class="translate" id="channel-text"><?php $oTranslation->TranslateString("channel") ?></th>
                  </tr>
                </thead>
                <tbody id="viewer-body"></tbody>
              </table>
          </div>
      </div>

      <div class="panel panel-default" id="settings-panel">
        <div class="panel-heading">
          <h3 class="panel-title" id="settings-title"><?php $oTranslation->TranslateString("settings") ?></h3>
          <image id="close-icon" class="click-img" src="./img/icon/close.png">
          <div style="clear:left; width:30px;"></div>
        </div>
        <div class="panel-body">

          <!-- Language -->
          <div class="settings-col">
            <div class="col-md-6"><?php $oTranslation->TranslateString("translation") ?></div>
            <div class="col-md-6">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="language-drop-down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <?php $oTranslation->TranslateString("translation") ?>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="language-drop-down">
                  <?php $oTranslation->ListTranslation() ?>
                </ul>
              </div>
            </div>
          </div>

          <!-- Backgrounds -->
          <div class="settings-col">
            <div class="col-md-6"><?php $oTranslation->TranslateString("background-gallery") ?></div>
            <div class="col-md-6">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#background-gallery"><?php $oTranslation->TranslateString("background-gallery-btn") ?></button>
            </div>
          </div>

          <!-- Notification Sounds -->
          <div class="settings-col">
            <div class="col-md-6"><?php $oTranslation->TranslateString("notification-sounds") ?></div>
            <div class="col-md-6">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#sound-gallery"><?php $oTranslation->TranslateString("notification-sounds-btn") ?></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Background Gallery -->
      <div class="modal fade" tabindex="-1" role="dialog" id="background-gallery">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><?php $oTranslation->TranslateString("background-gallery") ?></h4>
            </div>
            <div id="gallery-body" class="modal-body">
              <?php require_once('lib/Gallery.php'); ?>

              <nav class="gallery-nav" aria-label="...">
                <ul class="pager">
                    <li id="previous-page" class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> <?php $oTranslation->TranslateString("previous-page") ?></a></li>
                    <li id="next-page" class="next"><a href="#"><?php $oTranslation->TranslateString("next-page") ?> <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
             </nav>   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php $oTranslation->TranslateString("close") ?></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Notification Sounds -->
      <div class="modal fade" tabindex="-1" role="dialog" id="sound-gallery">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><?php $oTranslation->TranslateString("notification-sounds") ?></h4>
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
                      <button id="join-sound" class="btn btn-default" type="button"><?php $oTranslation->TranslateString("notification-join-test-btn") ?></button>
                      <button id="left-sound" class="btn btn-default" type="button"><?php $oTranslation->TranslateString("notification-left-test-btn") ?></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><?php $oTranslation->TranslateString("close") ?></button>
            </div>
          </div>
        </div>
      </div>

      <div id="alert-panel" class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p id="alert-para"></p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Third-Party -->
    <script src="js/pace.min.js"></script>
    <script src="js/push.min.js"></script>
    <script src="js/store.min.js"></script>
    <script src="js/howler.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/util.js"></script>
    <script src="js/sounder.js"></script>
    <script src="js/config.js"></script>
    <script src="js/viewer.js"></script>
    <script src="js/action.js"></script>
  </body>
</html>