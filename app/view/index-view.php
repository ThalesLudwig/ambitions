<?php

/* 
 * Index View file 
 */

//getting the grammar
$grammarArray = $g->getGrammarIndex();

//sets the Facebook login URL
$fb = new Facebook\Facebook([
      'app_id' => '1642348145983562',
      'app_secret' => 'b57f78f290716cf68e6a25afb11f661e',
      'default_graph_version' => 'v2.4',
      ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'public_profile', 'user_friends'];
$loginUrl = $helper->getLoginUrl('../../actions/facebook-login-action.php', $permissions);

//if has session, login
if (isset($_SESSION['id'])){
    header("Location: home.php");
}

//if has cookies, login
if (isset($_COOKIE['id'])){
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['surname'] = $_COOKIE['surname'];    
    $_SESSION['password'] = $_COOKIE['password'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['pic_profile'] = $_COOKIE['pic_profile'];
    $_SESSION['pic_cover'] = $_COOKIE['pic_cover'];
    $_SESSION['private'] = $_COOKIE['private'];
    header("Location: home.php");
}

