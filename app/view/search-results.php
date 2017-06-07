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
        $grammarArrayNavbar = $g->getGrammarNavbar();
        ?>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
             mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                        <a class="link-custom" style="color: white" href="edit-profile"><?php echo $_SESSION['name']; ?> &nbsp;&nbsp;&nbsp;</a> <!-- username -->
                        <i class="material-icons notification-button"><?php echo $notificationsPanel->checkButtonToPrint()?></i> <!-- notifications icon -->
                        <label class="mdl-button mdl-js-button mdl-button--icon"
                               for="fixed-header-drawer-exp">
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
                    <a class="mdl-navigation__link link-custom" href="edit-profile.php"><i class="material-icons">account_circle</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[8] ?></a>
                    <a class="mdl-navigation__link link-custom" href="connections.php"><i class="material-icons">supervisor_account</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[9] ?></a>
                    <hr>
                    <a class="mdl-navigation__link link-custom" href="settings.php"><i class="material-icons">settings</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[5] ?></a>
                    <a class="mdl-navigation__link link-custom" href="help.php"><i class="material-icons">question_answer</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[6] ?></a>
                    <a class="mdl-navigation__link link-custom" href="../../actions/signout.php"><i class="material-icons">exit_to_app</i>&nbsp;&nbsp;<?php echo $grammarArrayNavbar[7] ?></a>                    
                </nav>
            </div>
            <main class="mdl-layout__content">
                <!-- Page content -->
                <div class="page-content">
                    <br>
                    <div class="main-ambitions">
                        <?php
                        $searchValue = $_POST['search'];
                        $userCtr = new UserCtr();
                        $searchUser = $userCtr->findByName($searchValue);

                        if ($searchUser != null) {
                            //if there are results
                            for ($i = 0; $i < count($searchUser); $i++) {
                                $resultUser = $userCtr->findById($searchUser[$i]);
                                $resultUserName = $resultUser->getName();
                                $resultUserSurname = $resultUser->getSurname();
                                $resultUserPhoto = $resultUser->getProfilePic();
                                //if the user is not you
                                if ($searchUser[$i] != $_SESSION['id']) {
                                    echo '<div class="panel-body">';
                                    echo "<a href='user.php?id=" . $searchUser[$i] . "'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                                    echo '&nbsp&nbsp&nbsp';
                                    echo "<a href='user.php?id=" . $searchUser[$i] . "' style='color: black; font-size: 20px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                                    echo '</div>';
                                }
                                //if it's you
                                else {
                                    echo '<div class="panel-body">';
                                    echo "<a href='profile.php'><img class='img-circle' src='../../images/pics_profile/" . $resultUserPhoto . "' style='width:50px;'></a>";
                                    echo '&nbsp&nbsp&nbsp';
                                    echo "<a href='profile.php' style='color: black; font-size: 20px;'>" . $resultUserName . " " . $resultUserSurname . "</a>";
                                    echo '</div>';
                                }
                            }
                        } else {
                            echo '<div align="center" style="font-weight: bold">Sorry, I could not find anyone with that name.</div>';
                        }
                        ?>
                    </div>
                </div>
            </main>
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
