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
        $grammarArray = $g->getGrammarLogin();
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
                        <a class="mdl-navigation__link index-nav-link" href="../../index.php"><?php echo $grammarArray[1] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="<?php echo $loginUrl ?>"><?php echo $grammarArray[2] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="register.php"><?php echo $grammarArray[3] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="help.php"><?php echo $grammarArray[8] ?></a>
                    </nav>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">AMBITIONS</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="../../index.php"><?php echo $grammarArray[1] ?></a>
                    <a class="mdl-navigation__link" href="<?php echo $loginUrl ?>"><?php echo $grammarArray[2] ?></a>
                    <a class="mdl-navigation__link" href="register.php"><?php echo $grammarArray[3] ?></a>
                    <a class="mdl-navigation__link" href="help.php"><?php echo $grammarArray[8] ?></a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Your content goes here -->
                    <div class="login-panel">
                        <!-- Signup Form -->                
                        <form method="post" action="../../actions/login-action.php">
                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="email" class="mdl-textfield__input" name="inputUsername" id="inputUsername" required=""/>
                                <label class="mdl-textfield__label" for="inputUsername"><?php echo $grammarArray[4] ?></label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input type="password" class="mdl-textfield__input" name="inputPassword" id="inputPassword" required=""/>
                                <label class="mdl-textfield__label" for="inputPassword"><?php echo $grammarArray[5] ?></label>
                            </div>
                            <br>                    
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" name="btnLogin"><?php echo $grammarArray[6] ?></button>                                                    
                            <br><br>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <?php
        //The the auth failed
        if (isset($_GET['0'])) {
            echo '<script>alert("' . $grammarArray[7] . '")</script>';
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
