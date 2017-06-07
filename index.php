<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Samaritan</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.grey-red.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        require_once './config.php';
        require_once './app/view/index-view.php';
        $grammarArray = $g->getGrammarIndex();
        ?>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header"  style="background-color: white !important">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title" style="color: #F23149; font-weight: bold">AMBITIONS</span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation. We hide it in small screens. -->
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                        <a class="mdl-navigation__link index-nav-link" href="<?php echo $loginUrl ?>"><?php echo $grammarArray[10] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="app/view/login.php"><?php echo $grammarArray[8] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="app/view/register.php"><?php echo $grammarArray[1] ?></a>
                        <a class="mdl-navigation__link index-nav-link" href="app/view/help.php"><?php echo $grammarArray[21] ?></a>
                    </nav>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">AMBITIONS</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="<?php echo $loginUrl ?>"><?php echo $grammarArray[10] ?></a>
                    <a class="mdl-navigation__link" href="app/view/login.php"><?php echo $grammarArray[8] ?></a>
                    <a class="mdl-navigation__link" href="app/view/register.php"><?php echo $grammarArray[1] ?></a>
                    <a class="mdl-navigation__link" href="app/view/help.php"><?php echo $grammarArray[21] ?></a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Your content goes here -->
                    <div class="index-body" align="center">
                        
                        
                        <div class="index-header-text">
                            <?php echo $grammarArray[5] ?> <!-- Your future, online --> 
                            <br><br><br>
                            <?php echo $grammarArray[7] ?> <!-- Meet Ambitions --> 
                        </div>
                        
                        
                        <div class="index-header-logo"> <!-- logo --> 
                            <img src="images/samaritan-icon.png"  width="100" height="100">                             
                        </div>
                        
                        
                        <div class="index-body-1">
                            <div class="index-title" align="center"><?php echo $grammarArray[6] ?></div> <!-- Planning your life -->
                            <br><br>
                            <?php echo $grammarArray[9] ?>
                        </div>
                        
                        
                        <div class="index-body-2">                            
                            <div class="index-body-2-text">
                                <div class="index-title" align="center"><?php echo $grammarArray[4] ?></div> <!-- Wherever you want -->
                                <br><br><br><br>
                                <?php echo $grammarArray[2] ?>
                                <br><br>
                                <?php echo $grammarArray[3] ?>                                
                            </div>
                            <br>                                                       
                        </div>
                        
                        
                        <div class="index-body-3">
                            <div class="index-body-3-text">
                                <div class="index-title" align="center"><?php echo $grammarArray[19] ?></div> <!-- Whatever you want -->
                                <br><br><br>
                                <img src="images/index-face.jpg" class="img-circle jane-img">
                                <div class="index-body-3-jane">Jane Doe</div>
                                <div id="content-1" class="index-body-3-amb"><?php echo $grammarArray[11] ?></div>
                                <div id="content-2" class="index-body-3-amb"><?php echo $grammarArray[12] ?></div>
                                <div id="content-3" class="index-body-3-amb"><?php echo $grammarArray[13] ?></div>
                                <div id="content-4" class="index-body-3-amb"><?php echo $grammarArray[14] ?></div>
                                <div id="content-5" class="index-body-3-amb"><?php echo $grammarArray[15] ?></div>
                                <div id="content-6" class="index-body-3-amb"><?php echo $grammarArray[16] ?></div>
                                <div id="content-7" class="index-body-3-amb"><?php echo $grammarArray[17] ?></div>
                                <div id="content-8" class="index-body-3-amb"><?php echo $grammarArray[18] ?></div>
                            </div>                            
                        </div>
                        
                        
                        <div class="index-body-4">
                            <div class="index-body-4-text">
                                <br><br><br><br>
                                <p style="font-size: 47px;">AMBITIONS</p>
                                <br><br><br>
                                <?php echo $grammarArray[20] ?>
                                <br><br><br>
                                <a href="app/view/login.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent"><?php echo $grammarArray[8] ?></a>
                            </div>                            
                        </div>
                        
                        
                    </div>
                </div>
                <div class="footer">Copyright © 2015 Ambitions | Index Images: Unsplash</div>
            </main>
        </div>

    </body>
    <!-- Scripts -->
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//malsup.github.io/jquery.form.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
    <script src="js/index.js"></script>
</html>
