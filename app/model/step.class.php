<?php

class Step {    
    private static $id;    
    private static $ambition;
    private static $title;
    private static $completed;
    
    public function __construct($id,$ambition,$title,$completed){
        self::$id = $id;
        self::$ambition = $ambition;
        self::$title = $title;
        self::$completed = $completed;
    }
    
    public static function getId(){
        return self::$id;
    }
    public static function getAmbition(){
        return self::$ambition;
    }
    public static function getTitle(){
        return self::$title;
    }
    public static function getCompleted(){
        return self::$completed;
    }
    
    public function build(){
        $ambCtr = new AmbitionCtr();
        $amb = $ambCtr->findByAmbId(self::$ambition);
        $owner = $amb->getUser();        
        //if the active user is the ambition owner
        if ($_SESSION['id']==$owner){
            $returnString = '<div class="panel panel-default">
                            <div class="panel-body">
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'removeStep('.self::$ambition.', '.$_SESSION['id'].', '.self::$id.')\'>
                                    <i class="material-icons">delete</i>
                                </button>
                                &nbsp
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick=\'changeStepState('.self::$ambition.', '.$_SESSION['id'].', '.self::$id.')\'>
                                    '.$this->checkIfCompleted().'
                                </button>                                
                                &nbsp
                                '.self::$title.'                                
                            </div>
                        </div>';
        }
        //if it's not the owner
        else {
            $returnString = '<div class="panel panel-default">
                            <div class="panel-body">
                                '.self::$title.'
                            </div>                            
                        </div>';
        }        
        return $returnString;
    }
    
    public function checkIfCompleted() {
        if (self::$completed == 0) {
            //if the step is NOT completed
            return '<i class="material-icons">done</i>';
        }
        else {
            return '<i class="material-icons" style="color: red">done_all</i>';
        }
    }
}
