<?php
namespace tuana8tmt\Curd;
class Query
{   
    public $conn;
    public $table_name;
    public $data = array();
    public $where;
    public $sql;
    public $isWhere = 0;
    public $result;

    public function __construct($server, $username, $password, $database)
    {   
        $conn = mysqli_connect($server, $username, $password, $database);
        $this->conn = $conn;
    }
    
    public function select(string $select_options = "*") {
        $this->sql = "SELECT ".$select_options." FROM $this->table WHERE $this->where";
        $query_part = $this->conn->prepare($this->sql);
        $query_part->execute();
        $this->result = $query_part->get_result()->fetch_array();
        return $this->result;
    }
    public function insert($data)  
    {   
        foreach($data as $key => $value)  
        {  
            $query_part .= $key . ", ";
            $this->data[] = $value;
            $param = $param."?,";
                 
        }
        $query_part = substr($query_part, 0, -2);  
        $param = substr($param, 0, -1);  
        $this->sql = "INSERT INTO $this->table ($query_part) VALUES ($param)";
        $query_part = $this->conn->prepare($this->sql);
        for($x = 0; $x < count($this->data); $x++)
        $type = $type.'s';
        $query_part->bind_param($type,...$this->data);
        $query_part->execute();
        
        
    }
    public function delete() {

        $this->sql = "DELETE FROM $this->table WHERE $this->where";
        $query_part = $this->conn->prepare($this->sql);
        $query_part->execute();        
    }
    public function update($data) {
        $query_part = '';
        foreach($data as $key => $value)  
        {  
                $query_part .= $key . "=?, ";
                $this->data[] = $value;
                 
        }
        $query_part = substr($query_part, 0, -2);  
        $this->sql = "UPDATE $this->table SET $query_part WHERE $this->where";
        $query_part = $this->conn->prepare($this->sql);
        for($x = 0; $x < count($this->data); $x++)
        $type = $type.'s';
        $query_part->bind_param($type,...$this->data);
        $query_part->execute();
    }
    public function from($table_name){
        $this->table = $table_name;
        return $this;
    }
    public function where($key, $value){
        if($this->isWhere != 0 ){
            $this->where = $this->where." AND `".$key."` = '".$value."'";
        }else {
            $this->where = "`".$key."` = "."'".$value."'";
            $this->isWhere = 1;
        }
        return $this;
    }
    

}