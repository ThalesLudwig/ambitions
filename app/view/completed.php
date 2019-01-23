<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ambitions</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.red-indigo.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../../css/style.css" rel="stylesheet">
    </head>
    <body>

        <?php
        session_start();
        require '../../config.php';
        //check if the user logged in
        if ($_SESSION['id'] == null) {
            header('Location: ../../index.php');
        }
        $notificationsPanel = new NotificationsPanel();
        $grammarArray = $g->getGrammarHome();
        $grammarArrayNavbar = $g->getGrammarNavbar();
        ?>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
             mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                        <a class="link-custom" style="color: white" href="edit-profile.php"><?php echo $_SESSION['name']; ?> &nbsp;&nbsp;&nbsp;</a> <!-- username -->
                        <i class="material-icons notification-button"><?php echo $notificationsPanel->checkButtonToPrint() ?></i> <!-- notifications icon -->
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <form action="search-results.php" method="post">
                                <input class="mdl-textfield__input" name="search" type="text" name="sample" id="fixed-header-drawer-exp">
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">AMBITIONS</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link link-custom" href="home.php"><i class="material-icons">home</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[1] ?></a>
                    <a class="mdl-navigation__link link-custom" href="in-progress.php"><i class="material-icons">hourglass_empty</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[2] ?></a>
                    <a class="mdl-navigation__link link-custom" href="completed.php"><i class="material-icons">done_all</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[3] ?></a>
                    <a class="mdl-navigation__link link-custom" href="waiting.php"><i class="material-icons">timer_off</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[4] ?></a>
                    <hr>
                    <a class="mdl-navigation__link link-custom" href="connections.php"><i class="material-icons">supervisor_account</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[9] ?></a>
                    <hr>
                    <a class="mdl-navigation__link link-custom" href="settings.php"><i class="material-icons">settings</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[5] ?></a>
                    <a class="mdl-navigation__link link-custom" href="help.php"><i class="material-icons">question_answer</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[6] ?></a>
                    <a class="mdl-navigation__link link-custom" href="../../actions/signout.php"><i class="material-icons">exit_to_app</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[7] ?></a>                    
                </nav>
            </div>
            <main class="mdl-layout__content">
                <!-- Page content -->
                <br>
                <!-- Google Advertising -->
                <div class="advertising panel" id="advertising">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Ambitions -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-6610045308676351"
                         data-ad-slot="6921360222"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>                        
                </div>
                <br>
                <div class="page-content">
                    <div class="main-ambitions">
                        <div class="panel panel-new-ambition mdl-shadow--2dp"> <!-- New Ambition form -->
                            <form method="post" action="../../actions/save-ambition-action.php?back=home">                        
                                <div class="mdl-textfield mdl-js-textfield input-new-amb">
                                    <input class="mdl-textfield__input" type="text" name="inputTitle" id="inputTitle" required="">                                    
                                    <label class="mdl-textfield__label" for="inputTitle"><?php echo $grammarArray[1] ?></label>
                                </div>
                                &nbsp;
                                <input class="mdl-button mdl-js-button mdl-button--raised" type="submit" name="btnSaveAmbition" value="<?php echo $grammarArray[2] ?>">
                            </form>                        
                        </div> <!-- End of New Ambition Form -->
                        <?php
                        $ambitionCtr = new AmbitionCtr();
                        $ambitionCtr->printAmbitionsByStatus($_SESSION['id'], 1);
                        ?>
                        <br>
                    </div>
                </div>
            </main>
        </div>

        <!-- View Ambition Panel -->
        <div id="view-ambition-panel" tabindex="-1">
            &nbsp;&nbsp;&nbsp;
            <button id="view-ambition-panel-back" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                <i class="material-icons">arrow_forward</i>
            </button>
            &nbsp;
            <div id="view-ambition-panel-content"><?php echo $grammarArray[6] ?></div>
        </div>

    </body>
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <script src="../../js/viewAmbition.js"></script>
    <script src="../../js/redirect.js"></script>
    <script src="../../js/search.js"></script>
    <script src="../../js/notifications.js"></script>
</html>
