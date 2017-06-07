<?php

class CommentCtr {

    private $dao;

    public function __construct() {
        $this->dao = new CommentDao();
    }

    public function __destruct() {
        unset($this->dao);
    }

    public function save($ambition, $owner, $content) {
        //saves the user, returns 1 for success, 0 for failure
        $query = $this->dao->insert(
                "ambition, owner, content", "'$ambition','$owner','$content'");
        return $query;
    }

    public function deleteById($id) {
        $linha = 'id=' . $id;
        $q = $this->dao->delete($linha);
        return $q;
    }
    
    public function deleteAllByOwner($userId){
        $commentsArray = $this->findByOwner($userId);
        for ($i=0; $i<count($commentsArray); $i++) {
            $this->deleteById($i);
        }
    }

    public function findByOwner($userId) {
        $this->dao->find("*", "owner='$userId'");
        $row = $this->dao->getRecordSet();
        $comments = array();
        for ($i = 0; $i < count($row); $i++) {
            $comments[$i] = $id = $row[$i]["id"];            
        }
        if (!$comments == null) {
            return $comments;
        } else {
            return null;
        }
    }
    
    public function findByAmbition($ambitionId) {
        $this->dao->find("*", "ambition='$ambitionId'");
        $row = $this->dao->getRecordSet();
        $comments = array();
        for ($i = 0; $i < count($row); $i++) {
            $id = $row[$i]["id"];
            $ambition = $row[$i]["ambition"];
            $owner = $row[$i]["owner"];
            $content = $row[$i]["content"];
            $comment = new Comment($id, $owner, $ambition, $content);
            $commentString = $comment->build();
            $comments[$i] = $commentString;
        }
        if (!$comments == null) {
            return $comments;
        } else {
            return null;
        }
    }
    
    public function findForDeletion($ambitionId) {
        $this->dao->find("*", "ambition='$ambitionId'");
        $row = $this->dao->getRecordSet();
        $comments = array();

        for ($i = 0; $i < count($row); $i++) {
            $comments[$i] = $row[$i]["id"];
        }
        if (!$comments == null) {
            return $comments;
        } else {
            return null;
        }
    }

}
