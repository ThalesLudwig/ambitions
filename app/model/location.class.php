<?php

/**
 * Returns the user's location
 */

class Location {
    
		/**
    public function __construct(){
        //getting the user's ip
        $ip = $_SERVER['REMOTE_ADDR'];
        //send to the webserver
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        //returns the country code
        $userCountry = $details->country; //BR if Brazil
        $_SESSION['location'] = $userCountry;        
    }
	**/
     
    
    /*
     * USE ONLY ON LOCALHOST
     *
	 * 
     */
    public function __construct(){
        $_SESSION['location'] = 'BR';
    }
     
}
