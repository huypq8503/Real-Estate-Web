<?php

namespace App\Models;

use PDO;

class baseModel
{
    protected $pdo = null;
    protected $sql = '';
    protected $sta = null;

    public function __construct()
    {
        //set connect
        $this->pdo = new PDO("mysql:host=" . DBHOST
            . ";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }

    function getValue($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];

    }

    public function setQuery($sql)
    {
        $this->sql = $sql;
    }

    //Function execute the query
    // hàm này sẽ làm hàm chạy câu truy vấn
    public function execute($options = array())
    {
        $this->sta = $this->pdo->prepare($this->sql);
        if ($options) {  //If have $options then system will be tranmission parameters
            for ($i = 0; $i < count($options); $i++) {
                $this->sta->bindParam($i + 1, $options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }

    //Funtion load datas on table
    // lấy nhiều dữ liệu ở trong bảng
    public function loadAllRows($options = array())
    {
        if (!$options) {
            if (!$result = $this->execute()) {
                return false;
            }
        } else {
            if (!$result = $this->execute($options)) {
                return false;
            }
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    //Funtion load 1 data on the table
    //lay 1 du lieu thoi
    public function loadRow($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute()) {
                return false;
            }
        } else {
            if (!$result = $this->execute($option)) {
                return false;
            }
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }

    //Function count the record on the table
    public function loadRecord($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute()) {
                return false;
            }
        } else {
            if (!$result = $this->execute($option)) {
                return false;
            }
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }

    function pdo_execute_return_lastInsertId($sql){
        $sql_args = array_slice(func_get_args(), 1);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($sql_args);
            return $this->pdo->lastInsertId();
    }

    //Lấy 1 giá trị sau khi thêm
    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }

    //load all
    public function loadAll($table, $limit1, $limit2)
    {
        $sql = "select * from $table order by id desc";
        if ($limit1 >= 0 && $limit2 > 0) {
            $sql .= " limit $limit1,$limit2";
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //load one
    public function loadOne($table, $variable, $input_variable)
    {
        $sql = "select * from $table where $variable = $input_variable";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    //delete
    public function delete($table, $variable, $input_variable)
    {
        $sql = "delete from $table where $variable = $input_variable";
        $this->setQuery($sql);
        return $this->execute();
    }

    //find
    public function find($find_variable, $table, $variable, $input_variable)
    {
        $sql = "select $find_variable from $table WHERE $variable = '$input_variable'";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    //Đếm
    public function dem($variable, $table)
    {
        $sql = "select count($variable) from $table";
        $this->setQuery($sql);
        return $this->getValue($this->sql);
    }

    //validate chỉ đc nhập số nguyên dương
    function nhap_so($nhap_so)
    {
        return (bool)preg_match("/^[0-9]+$/", $nhap_so);
    }

    public function disconnect()
    {
        $this->sta = null;
        $this->pdo = null;
    }
}