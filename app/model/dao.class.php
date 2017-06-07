<?php

abstract class Dao {

    private $tableName;
    private $rs; //record set
    private $rowsSelAffected;

    public function __construct($tableName) {
        $this->tableName = $tableName;
    }

    public function insert($fields, $values) {
        try {
            //connect with the database
            Connection::connect();
            //mounts the sql query
            $sql = "INSERT INTO $this->tableName ($fields) VALUES ($values)";
            //opens the channel to make the query
            Connection::getConn()->beginTransaction();
            //execute the query and get results
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();
            //close connection
            Connection::disconnect();
            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function update($fieldsValues, $filter) {
        try {            
            Connection::connect();
            //creates the 'where' clause
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }
            //mounts the sql query
            $sql = "UPDATE $this->tableName SET $fieldsValues $filter";
            Connection::getConn()->beginTransaction();
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();
            Connection::disconnect();
            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function delete($filter) {
        try {
            Connection::connect();
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }
            $sql = "DELETE FROM $this->tableName $filter";
            Connection::getConn()->beginTransaction();
            $rowsAffected = Connection::getConn()->exec($sql);
            Connection::getConn()->commit();
            Connection::disconnect();
            return $rowsAffected;
        } catch (Exception $ex) {
            Connection::getConn()->rollBack();
            throw($ex);
        }
    }

    public function find($columns, $filter) {
        try {            
            Connection::connect();
            if ($filter != "") {
                $filter = " WHERE " . $filter;
            }
            $sql = "SELECT $columns FROM $this->tableName $filter";
            $this->rs = Connection::getConn()->query($sql);
            $this->rowsSelAffected = $this->rs->rowCount();
            Connection::disconnect();
            return $this->rowsSelAffected;
        } catch (Exception $ex) {
            throw($ex);
        }
    }

    public function executeSQL($sql) {
        Connection::connect();
        $this->rs = Connection::getConn()->query($sql);
        if (!$this->rs) {
            return NULL;
        }
        while ($row = $this->rs->fetch()) {
            $return[] = $row;
        }
        Connection::disconnect();
        return $return;
    }

    public function getRecordSet() {
        try {
            $return = NULL;
            if (!$this->rs) {
                return NULL;
            }
            while ($row = $this->rs->fetch()) {
                $return[] = $row;
            }
            return $return;
        } catch (Exception $ex) {
            throw($ex);
        }
    }
}
