<?php

class StepCtr {

    private $dao;

    public function __construct() {
        $this->dao = new StepDao();
    }

    public function __destruct() {
        unset($this->dao);
    }

    public function save($ambition, $title, $completed) {
        //saves the user, returns 1 for success, 0 for failure
        $query = $this->dao->insert(
                "ambition, title, completed", "'$ambition','$title','$completed'");
        return $query;
    }

    public function deleteById($id) {
        $linha = 'id=' . $id;
        $q = $this->dao->delete($linha);
        return $q;
    }

    public function uploadCompleted($id, $ambId) {
        $stepCompleted = $this->findCompleted($id);
        switch ($stepCompleted) {
            case 0:
                $stepCompleted = 1;
                //puts the Ambition in the In Progress state
                $ambCtr = new AmbitionCtr();
                $ambCtr->updateAchieved($ambId, 2);
                break;
            case 1:
                $stepCompleted = 0;
                break;            
            default:
                $stepCompleted = 0;
        }
        $query = $this->dao->update("completed='" . $stepCompleted . "'", "id=" . $id);
        //returns 1 for success, 0 for failure        
        return $query;
    }

    public function findByAmbitionAsArray($ambitionId) {
        $this->dao->find("*", "ambition='$ambitionId'");
        $row = $this->dao->getRecordSet();
        $steps = array();

        for ($i = 0; $i < count($row); $i++) {
            $stepId = $row[$i]["id"];
            $stepAmb = $row[$i]["ambition"];
            $stepTitle = $row[$i]["title"];
            $stepCompleted = $row[$i]["completed"];
            $step = array(0 => $stepId, 1 => $stepAmb, 2 => $stepTitle, 3 => $stepCompleted);
            $steps[$i] = $step;
        }
        if (!$steps == null) {
            return $steps;
        } else {
            return null;
        }
    }


    public function findCompleted($id) {
        $this->dao->find("*", "id='$id'");
        $row = $this->dao->getRecordSet();
        for ($i = 0; $i < count($row); $i++) {
            $stepCompleted = $row[$i]["completed"];
        }
        return $stepCompleted;
    }

    public function findByAmbition($ambitionId) {
        $this->dao->find("*", "ambition='$ambitionId'");
        $row = $this->dao->getRecordSet();
        $steps = array();

        for ($i = 0; $i < count($row); $i++) {
            $stepId = $row[$i]["id"];
            $stepAmb = $row[$i]["ambition"];
            $stepTitle = $row[$i]["title"];
            $stepCompleted = $row[$i]["completed"];
            $step = new Step($stepId, $stepAmb, $stepTitle, $stepCompleted);
            $stepsString = $step->build();
            $steps[$i] = $stepsString;
        }
        if (!$steps == null) {
            return $steps;
        } else {
            return null;
        }
    }

    public function findForDeletion($ambitionId) {
        $this->dao->find("*", "ambition='$ambitionId'");
        $row = $this->dao->getRecordSet();
        $steps = array();

        for ($i = 0; $i < count($row); $i++) {
            $steps[$i] = $row[$i]["id"];
        }
        if (!$steps == null) {
            return $steps;
        } else {
            return null;
        }
    }

}
