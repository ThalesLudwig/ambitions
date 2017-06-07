<?php

class NotificationCtr {
    
    private $dao;

    public function __construct(){
        $this->dao=new NotificationDao();
    }
    
    public function __destruct(){
        unset($this->dao); 
    }
    
    public function save($sender,$receiver,$content,$type){
        //returns 1 for success, 0 for failure
        $query=$this->dao->insert(
                        "sender, receiver, content, type",
                        "'$sender','$receiver','$content','$type'");
        return $query;
    }
    
    public function deleteById($id){
        $query = 'id='.$id;        
        $q = $this->dao->delete($query);
        return $q;
    }
    
    public function deleteAllBySenderOrReceiver($userId){
        $notificationsArray = $this->findBySenderOrReceiver($userId);
        for ($i=0; $i<count($notificationsArray); $i++) {
            $this->deleteById($notificationsArray[$i]);
        }
    }
    
    public function findByReceiver($receiver){
        $this->dao->find("*","receiver='$receiver'");
        $row = $this->dao->getRecordSet();
        $notifications=array();
        for ( $i = 0; $i < count($row);  $i++ ){
            $id = $row[$i]["id"];
            $sender = $row[$i]["sender"];
            $receiver = $row[$i]["receiver"];
            $content = $row[$i]["content"];
            $type = $row[$i]["type"];
            $notification = new Notification($id, $sender, $receiver, $content, $type);
            $notifications[$i] = $notification->build();
        }
        if(!$notifications==null){
            return $notifications;
        }
        else{
            return null;
        }
    }
    
    public function findBySenderOrReceiver($userId) {
        $this->dao->find("*", "sender='$userId' OR receiver='$userId'");
        $row = $this->dao->getRecordSet();
        $notifications = array();
        for ($i = 0; $i < count($row); $i++) {
            $notifications[$i] = $row[$i]["id"];            
        }
        if (!$notifications == null) {
            return $notifications;
        } else {
            return null;
        }
    }
    
    public function findBySenderAndReceiver($sender, $receiver) {
        $this->dao->find("*", "sender='$sender' AND receiver='$receiver'");
        $row = $this->dao->getRecordSet();
        $notifications = array();
        for ($i = 0; $i < count($row); $i++) {
            $notifications[$i] = $row[$i]["id"];            
        }
        if (!$notifications == null) {
            return $notifications;
        } else {
            return null;
        }
    }
    
    public function findBySenderAndReceiverAndType($sender, $receiver) {
        $this->dao->find("*", "sender='$sender' AND receiver='$receiver' AND type=0");
        $row = $this->dao->getRecordSet();
        $notifications = array();
        for ($i = 0; $i < count($row); $i++) {
            $notifications[$i] = $row[$i]["id"];            
        }
        if (!$notifications == null) {
            return $notifications;
        } else {
            return null;
        }
    }
    
}
