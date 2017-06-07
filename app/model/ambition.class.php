<?php

class Ambition {

    private static $id;
    private static $user;
    private static $title;
    private static $description;
    private static $completed;
    private static $start_date;
    private static $end_date;
    private static $priority;
    private static $dateFormat;

    public function __construct($id, $user, $title, $desc, $completed, $start_date, $end_date, $priority) {
        self::$id = $id;
        self::$user = $user;
        self::$title = $title;
        self::$description = $desc;
        self::$completed = $completed;
        self::$start_date = $start_date;
        self::$end_date = $end_date;
        self::$priority = $priority;
    }

    public static function getId() {
        return self::$id;
    }

    public static function getUser() {
        return self::$user;
    }

    public static function getTitle() {
        return self::$title;
    }

    public static function getDescription() {
        return self::$description;
    }

    public static function getCompleted() {
        return self::$completed;
    }

    public static function getStartDate() {
        return self::$start_date;
    }

    public static function getEndDate() {
        return self::$end_date;
    }

    public static function getPriority() {
        return self::$priority;
    }

    public static function getDateFormat() {
        self::$dateFormat = date("d/m/Y", strtotime(self::$start_date));
        return self::$dateFormat;
    }
    
    public static function getEndDateFormat() {
        $dateArray = explode("-", self::$end_date);
        $year = $dateArray[0];
        $month = $dateArray[1];
        $day = $dateArray[2];
        $dateParsed = $day.'/'.$month.'/'.$year;
        return $dateParsed;
    }

    public static function getImagePath() {
        $ambImageExists = file_exists('../../images/pics_ambitions/' . self::$id . '.jpg');
        if ($ambImageExists == 1) {
            return self::$id;
        } else {
            return 'default' . mt_rand(1, 4);
        }
    }
    
    public static function getProgress() {
        $ambCtr = new AmbitionCtr();
        $progress = $ambCtr->checkProgress(self::$id);
        return $progress;
    }
    
    public static function build() {
        $activeUser = $_SESSION['id'];
        $userCtr = new UserCtr();
        $owner = $userCtr->findById(self::$user);
        $ownerName = $owner->getName();
        $ownerSurname = $owner->getSurname();
        $ownerId = $owner->getId();
        $ownerPhoto = $owner->getProfilePic();
        $ambImage = self::getImagePath();
        
        if (self::$completed == 1) {
            //TODO            
        } else {
            //TODO
        }

        if ($activeUser != $ownerId) {
            //case the active user and the post owner are NOT the same person 
            $returnLine = '<div class="mdl-card card-custom mdl-shadow--2dp" id="' . self::$id . '">
                                <div class="mdl-card__title card-title-custom" style="background: url(\'../..//images/pics_ambitions/' . $ambImage . '.jpg\') center / cover;">                                
                                    <div class="amb-profile-pic">                                        
                                        <a href="user?id=' . $ownerId . '"><img class="img-circle" src="../../images/pics_profile/' . $ownerPhoto . '" alt="profile_pic" style="width: 55px; height: 55px;"></a>
                                    </div>
                                    <h2 class="mdl-card__title-text amb-card-title" onclick=\'showViewPanel('.self::$id.', '.self::$user.')\'>' . self::$title . '</h2>                               
                                </div>
                                <div class="mdl-card__supporting-text">
                                    ' . $ownerName . ' ' . $ownerSurname . '
                                    <br>
                                    ' . self::getDateFormat() . '
                                </div>
                                <div class="mdl-card__actions mdl-card--border" align="right">                                
                                    <span style="color: grey">'.self::getProgress().'%</span> <!-- achievement status -->
                                    <button id="amb-button-like" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'alert("Em breve!  / Coming Soon!")\' > <!-- like button -->
                                        <i class="material-icons">favorite_border</i>
                                    </button>                                    
                                </div>
                                <div class="mdl-card__menu">
                                    <button id="amb-button-details-'.self::$id.'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'showViewPanel('.self::$id.', '.self::$user.')\' > <!-- details button -->
                                        <i class="material-icons" style="color: white">search</i>
                                    </button>
                                </div>                                
                            </div>
                        <br>';
        } else {
            //case the active user and the post owner ARE the same person            
            $returnLine = '<div class="mdl-card card-custom mdl-shadow--2dp" id="' . self::$id . '">
                                <div class="mdl-card__title card-title-custom" style="background: url(\'../..//images/pics_ambitions/' . $ambImage . '.jpg\') center / cover;">                                
                                    <div class="amb-profile-pic">
                                        <a href="home"><img class="img-circle" src="../../images/pics_profile/' . $ownerPhoto . '" alt="profile_pic" style="width: 50px; height: 50px;"></a>                                        
                                    </div>
                                    <h2 class="mdl-card__title-text amb-card-title" onclick=\'showViewPanel('.self::$id.', '.self::$user.')\'>' . self::$title . '</h2>                               
                                </div>
                                <div class="mdl-card__supporting-text">
                                    ' . $ownerName . ' ' . $ownerSurname . '
                                    <br>
                                    ' . self::getDateFormat() . '
                                </div>
                                <div class="mdl-card__actions mdl-card--border" align="right">                                
                                    <span style="color: grey">'.self::getProgress().'%</span> <!-- achievement status -->
                                    <button id="amb-button-like-'.self::$id.'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'alert("Em breve! / Coming Soon!")\' > <!-- like button -->
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                    <button id="amb-button-delete-'.self::$id.'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'deleteAmbition("' . self::$id . '")\'> <!-- delete button -->
                                        <i class="material-icons">delete</i>
                                    </button>                                    
                                </div>
                                <div class="mdl-card__menu">
                                    <button id="amb-button-details-'.self::$id.'" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'showViewPanel('.self::$id.', '.self::$user.')\' > <!-- details button -->
                                        <i class="material-icons" style="color: white">search</i>
                                    </button>
                                </div>                                
                            </div>
                        <br>
                        <!-- Tooltips -->
                        <div class="mdl-tooltip mdl-tooltip--large" for="amb-button-like-'.self::$id.'">Like</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="amb-button-details-'.self::$id.'">Details</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="amb-button-delete-'.self::$id.'">Delete</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="amb-button-achieve-'.self::$id.'">Achieve</div>';
        }
        return $returnLine;
    }

}
