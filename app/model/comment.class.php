<?php

class Comment {

    private static $id;
    private static $owner;
    private static $ambition;
    private static $content;

    public function __construct($id, $owner, $ambition, $content) {
        self::$id = $id;
        self::$owner = $owner;
        self::$ambition = $ambition;
        self::$content = $content;
    }

    public static function getId() {
        return self::$id;
    }

    public static function getOwner() {
        return self::$owner;
    }

    public static function getAmbition() {
        return self::$ambition;
    }

    public static function getContent() {
        return self::$content;
    }

    public static function getLinkToProfile($commentOwner){
        $linkString = "";
        if ($_SESSION['id'] == self::$owner) {
            $linkString = "home";
        }
        else {
            $linkString = 'user?id='.$commentOwner->getId();
        }
        return $linkString;
    }
    
    public function build() {
        //getting the owner user
        $userCtr = new UserCtr();
        $commentOwner = $userCtr->findById(self::$owner);
        //getting the ambition's owner
        $ambCtr = new AmbitionCtr();
        $amb = $ambCtr->findByAmbId(self::$ambition);
        $ambOwner = $amb->getUser();

        //if the active user is the COMMENT owner OR he is the AMBITION owner
        //print the Remove button
        if ($_SESSION['id'] == self::$owner || $_SESSION['id'] == $ambOwner) {
            $returnString = '<div class="panel panel-default">
                                <div class="panel-body">
                                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'removeComment('.self::$ambition.', '.$ambOwner.', '.self::$id.', '.self::$owner.')\'>
                                        <i class="material-icons">delete</i>
                                    </button>
                                    &nbsp
                                    <a href="'.self::getLinkToProfile($commentOwner).'"><img class="img-circle" src="../../images/pics_profile/' . $commentOwner->getProfilePic() . '" style="width: 35px; height: 35px;"></a>
                                    &nbsp
                                    <a href="'.self::getLinkToProfile($commentOwner).'"> ' . $commentOwner->getName() . ' ' . $commentOwner->getSurname() . ': </a>
                                    &nbsp
                                    ' . self::$content . '
                                </div>
                            </div>';
        } else {
            //if the active user is NEITHER the AMBITION owner NOR the COMMENT owner
            $returnString = '<div class="panel panel-default">
                                <div class="panel-body">
                                    &nbsp
                                    <a href="'.self::getLinkToProfile($commentOwner).'"><img class="img-circle" src="../../images/pics_profile/' . $commentOwner->getProfilePic() . '" style="width: 35px; height: 35px;"></a>
                                    &nbsp
                                    <a href="'.self::getLinkToProfile($commentOwner).'"> ' . $commentOwner->getName() . ' ' . $commentOwner->getSurname() . ': </a>
                                    &nbsp
                                    ' . self::$content . '
                                </div>                            
                            </div>';
        }

        return $returnString;
    }

}
