<?php

class User {
    private static $id;    
    private static $name;
    private static $surname;
    private static $password;
    private static $email;
    private static $pic_profile;    
    private static $pic_cover;
    private static $private;
    
    public function __construct($id,$name,$surname,$password,$email,$photo,$cover,$points){
        self::$id = $id;
        self::$name = $name;
        self::$surname = $surname;
        self::$password = $password;
        self::$email = $email;
        self::$pic_profile = $photo; 
        self::$pic_cover = $cover; 
        self::$private = $points;
    }
    
    public static function getId(){
        return self::$id;
    }
    public static function getSurname(){
        return self::$surname;
    }
    public static function getName(){
        return self::$name;
    }
    public static function getPassword(){
        return self::$password;
    }
    public static function getEmail(){
        return self::$email;
    }   
    public static function getPrivate(){
        return self::$private;
    }
    public static function getProfilePic(){
        return self::$pic_profile;
    }
    public static function getCoverPic(){
        return self::$pic_cover;
    }
}
