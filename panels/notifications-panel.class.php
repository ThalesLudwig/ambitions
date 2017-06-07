<?php

class NotificationsPanel {
    /**
     * this object is responsable for building the notifications panel.
     */
    
    
    public function __construct(){
        require '../../config.php';
        $panel = '<div id="notifications-panel">                    
                    <div id="notifications-body" align="center">                        
                        <br>
                        '.$this->printNotifications().'
                    </div>                    
                </div>';                
        echo $panel;
    }
    
    
    function printNotifications(){
        require '../../config.php';
        $grammarArray = $g->getGrammarNotificationsPanel();        
        $notificationCtr = new NotificationCtr();
        $receiver = $_SESSION['id'];
        $notificationsArray = $notificationCtr->findByReceiver($receiver);
        $stringArray = '';        
        //if there are no notifications
        if ($notificationsArray==null){
            return $grammarArray[2];
        }
        else{
            for ($i=0; $i < count($notificationsArray); $i++){
                $stringArray = $stringArray . $notificationsArray[$i];
            }
            
        }        
        return $stringArray;
    }
    
    
    public function checkButtonToPrint(){
        //prints the notification 'bell' button
        $receiver = $_SESSION['id'];
        $notificationCtr = new NotificationCtr();
        $notificationsArray = $notificationCtr->findByReceiver($receiver);        
        if ($notificationsArray==null){
            return 'notifications_none';
        }
        else{
            return 'notifications_active';
        }
    }
    
}



