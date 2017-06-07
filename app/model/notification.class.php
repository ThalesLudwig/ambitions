<?php

class Notification {
    private static $id;
    private static $sender;
    private static $receiver;
    private static $content;
    private static $type;
    
    public function __construct($id,$sender,$receiver,$content,$type){
        self::$id = $id;
        self::$sender = $sender;
        self::$receiver = $receiver;
        self::$content = $content;
        self::$type = $type;
    }        
    
    public static function getId(){
        return self::$id;
    }
    
    public static function getSender(){
        return self::$sender;
    }
    
    public static function getReceiver(){
        return self::$receiver;
    }
    
    public static function getContent(){
        return self::$content;
    }
    
    public static function getType(){
        return self::$type;
    }
        
    function build(){
        $userCtr = new UserCtr();
        $sender = $userCtr->findById(self::$sender);
        if (self::$type == 0) {
            return self::getBondNotification($sender);
        }
        if (self::$type == 1) {
            return self::getCommentNotification($sender);
        }
    }
    
    private static function getBondNotification($sender){
        $returnString = '<div id="notification" class="panel">
                            <div id="notification-photo" align="left">
                                <a href="user?id='.self::$sender.'"><img class="img-circle" src="../../images/pics_profile/'.$sender->getProfilePic().'" style="width: 35px; height: 35px;"></a>                                
                            </div>
                            <div id="notification-content">
                                <a href="user?id='.self::$sender.'">'.$sender->getName().'</a> '.
                                self::$content.
                                '&nbsp&nbsp&nbsp
                                <a href="javascript:void" onclick=\'followUser('.self::$id.', '.self::$sender.')\'>
                                    <i class="material-icons">done</i>
                                </a>
                                <a href="javascript:void" onclick=\'deleteNotification("'.self::$id.'")\' style="color:red">
                                    <i class="material-icons">clear</i>
                                </a>
                            </div>
                            <br>                            
                        </div>';        
        return $returnString;
    }
    
    private static function getCommentNotification($sender){
        $returnString = '<div id="notification" class="panel">
                            <div id="notification-photo" align="left">
                                <a href="user?id='.self::$sender.'"><img class="img-circle" src="../../images/pics_profile/'.$sender->getProfilePic().'" style="width: 35px; height: 35px;"></a>                                
                            </div>
                            <div id="notification-content">
                                <a href="user?id='.self::$sender.'">'.$sender->getName().'</a> '.
                                self::$content.
                                '&nbsp&nbsp&nbsp                                
                                <a href="javascript:void" onclick=\'deleteNotification("'.self::$id.'")\' style="color:red">
                                    <i class="material-icons">clear</i>
                                </a>
                            </div>
                            <br>                            
                        </div>';        
        return $returnString;
    }
    
}
