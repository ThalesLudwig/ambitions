<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ambitions</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.grey-red.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../../css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        require_once '../../config.php';
        require_once '../view/index-view.php';
        $grammarArray = $g->getGrammarSignup();
        $grammarArrayMenu = $g->getGrammarLogin();
        ?>

        <style>
            html,body {    
                overflow:no-content;
                background-color: #F23149;
            }
        </style>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header"  style="background-color: white !important">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title" style="color: #F23149; font-weight: bold">AMBITIONS</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation. We hide it in small screens. -->
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                        <a class="mdl-navigation__link index-nav-link" href="../../index.php"><?php echo $grammarArrayMenu[1] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="<?php echo $loginUrl ?>"><?php echo $grammarArrayMenu[2] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="login.php"><?php echo $grammarArrayMenu[6] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="help.php"><?php echo $grammarArrayMenu[8] ?></a>
                    </nav>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">AMBITIONS</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../../index.php"><?php echo $grammarArrayMenu[1] ?></a>
                    <a class="mdl-navigation__link" href="<?php echo $loginUrl ?>"><?php echo $grammarArrayMenu[2] ?></a>
                    <a class="mdl-navigation__link" href="login.php"><?php echo $grammarArrayMenu[6] ?></a>
                    <a class="mdl-navigation__link" href="help.php"><?php echo $grammarArrayMenu[8] ?></a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Your content goes here -->
                    <div class="login-panel">                        
                        <form  action="../../actions/signup-action.php" method="post">
                            <br>
                            <legend style="color: gray"><?php echo $grammarArray[1] ?></legend>
                            
                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="text" class="mdl-textfield__input" id="inputName" name="inputName" required="">
                                <label class="mdl-textfield__label" for="inputName"><?php echo $grammarArray[2] ?></label>
                            </div>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="text" class="mdl-textfield__input" id="inputSurname" name="inputSurname" required="">
                                <label class="mdl-textfield__label" for="inputSurname"><?php echo $grammarArray[3] ?></label>
                            </div>

                            <div class="mdl-textfield mdl-js-textfield">                                        
                                <input type="email" class="mdl-textfield__input" id="inputEmail" name="inputEmail" required="">
                                <label class="mdl-textfield__label" for="inputEmail"><?php echo $grammarArray[5] ?></label>                                        
                            </div>

                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="password" class="mdl-textfield__input" id="inputPassword" name="inputPassword" required="">
                                <label class="mdl-textfield__label" for="inputPassword"><?php echo $grammarArray[6] ?></label>
                            </div>
                            <br><br>
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" name="btnSignup"><?php echo $grammarArray[10] ?></button>
                            <br><br>
                        </form>
                    </div>
                </div>
            </main>
        </div>
        
        <?php
        //The the auth failed
        if (isset($_GET['0'])) {
            echo '<script>alert("' . $grammarArray[11] . '")</script>';
        }
        ?>

    </body>
    <!-- Scripts -->
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
</html>
