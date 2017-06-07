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
        $grammarArray = $g->getGrammarEditProfile();
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
                            <input class="mdl-textfield__input" type="text" name="sample"
                                   id="fixed-header-drawer-exp">
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
                    <form method="post" action="../../actions/update-profile-action.php" enctype="multipart/form-data">                                    
                        <div style="margin: 20px">
                            <!-- change name -->
                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="text" class="mdl-textfield__input" name="inputName" id="inputName"/>
                                <label class="mdl-textfield__label" for="inputName"><?php echo $grammarArray[2] ?></label>
                            </div>

                            <!-- change surname -->
                            <br>                                
                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="text" class="mdl-textfield__input" name="inputSurname" id="inputSurname"/>
                                <label class="mdl-textfield__label" for="inputSurname"><?php echo $grammarArray[3] ?></label>
                            </div>

                            <!-- change cover -->
                            <br><br>
                            <label class="custom-file-upload-edit-profile">
                                <i class="material-icons">add_a_photo</i>
                                <input name="inputCoverPic" type="file"/>
                                <?php echo $grammarArray[4] ?>
                            </label>
                            <br>
                            <?php echo $grammarArray[5] ?>                                
                            <br><br>

                            <!-- change profile picture -->                                
                            <label class="custom-file-upload-edit-profile">
                                <i class="material-icons">add_a_photo</i>
                                <input name="inputProfilePic" type="file"/>
                                <?php echo $grammarArray[6] ?>
                            </label>
                            <br>
                            <?php echo $grammarArray[5] ?>
                            <br>
                            <?php echo $grammarArray[7] ?>
                            <br><br>

                            <!-- submit button -->                                
                            <input type="submit" name="btnUpdateProfile" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="Update">
                        </div>                        
                    </form>
                </div>
            </main>
        </div>

        <?php
        if (isset($_GET['1'])) {
            //there is an error
            echo '<script>alert("' . $grammarArray[8] . '")</script>';
        }
        if (isset($_GET['0'])) {
            //editing successful
            echo '<script>alert("' . $grammarArray[1] . '")</script>';
        }
        ?>

    </body>
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <script src="../../js/viewAmbition.js"></script>
    <script src="../../js/redirect.js"></script>
    <script src="../../js/notifications.js"></script>
    <script src="../../js/search.js"></script>
</html>
