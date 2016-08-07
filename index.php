<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Translation -->
    <?php require_once('lib/Translate.php'); ?>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TeamSpeak Viewer</title>

    <!-- Roboto Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">

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
              <h3 class="panel-title translate" id="application-title"><?php Translation::TranslateString("application-title") ?></h3>
              <image id="refresh-icon" class="click-img" src="./img/icon/refresh.png">
              <div style="clear:left; width:30px;"></div>
          </div>
          <div class="table-container">
              <table class="table" id="table-view">
                <thead>
                  <tr>
                    <th class="translate" id="username-text"><?php Translation::TranslateString("username-text") ?></th>
                    <th class="translate" id="channel-text"><?php Translation::TranslateString("channel-text") ?></th>
                  </tr>
                </thead>
                <tbody id="viewer-body"></tbody>
              </table>
          </div>
      </div>

      <div id="alert-panel" class="alert alert-danger" role="alert">
        <p id="alert-para"></p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="js/util.js"></script>
    <script src="js/config.js"></script>
    <script src="js/viewer.js"></script>
  </body>
</html>