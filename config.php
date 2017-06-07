<?php

/* 
 * Configuration file 
 */

require_once __DIR__ . '/Facebook/autoload.php';
require_once 'app/model/connection.class.php';
require_once 'app/model/grammar.class.php';
require_once 'app/model/location.class.php';
require_once 'app/model/dao.class.php';
require_once 'app/model/user.class.php';
require_once 'app/model/userDao.class.php';
require_once 'app/controller/userCtr.class.php';
//require_once 'app/model/navbar.class.php';
//require_once 'app/model/suggestion.class.php';
//require_once 'app/model/suggestionDao.class.php';
//require_once 'app/controller/suggestionCtr.class.php';
require_once 'app/controller/notificationCtr.class.php';
require_once 'app/model/notification.class.php';
require_once 'app/model/notificationDao.class.php';
//require_once 'app/controller/messageCtr.class.php';
//require_once 'app/model/message.class.php';
//require_once 'app/model/messageDao.class.php';
require_once 'app/controller/bondCtr.class.php';
require_once 'app/model/bondDao.class.php';
require_once 'app/controller/ambitionCtr.class.php';
require_once 'app/model/ambition.class.php';
require_once 'app/model/ambitionDao.class.php';
require_once 'app/controller/stepCtr.class.php';
require_once 'app/model/step.class.php';
require_once 'app/model/stepDao.class.php';
require_once 'panels/notifications-panel.class.php';
require_once 'panels/steps-panel.class.php';
require_once 'panels/comment-panel.class.php';
require_once 'app/controller/commentCtr.class.php';
require_once 'app/model/comment.class.php';
require_once 'app/model/commentDao.class.php';


//initiates the location
$l = new Location();
//initiates the grammar
$g = new grammar($_SESSION['location']);
//$g = new grammar('BR');
//$_SESSION['location'] = 'BR';