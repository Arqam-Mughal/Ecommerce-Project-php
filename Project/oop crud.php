<?php

class Database{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    // private $db_name = "testing";
    private $db_name = "pwd533";

    private $result = array();
    private $mysqli = "";
    private $conn = false;

    public function __construct(){
        if(!$this->conn){
        $this->mysqli =  new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        $this->conn = true;
        if($this->mysqli->connect_error){
            array_push($this->result , $this->mysqli->connect_error);
            return false;
        }
        }else{
            return false;
        }
    }

    public function insert($table,$param=array()){
        if($this->tableExist($table)){
            // print_r($param);
        $table_column = implode(', ' , array_keys($param));
        $table_values = implode("', '" , $param);
          $ins = "INSERT INTO $table ($table_column) VALUES ('$table_values')";
          if($this->mysqli->query($ins)){
            array_push($this->result , $this->mysqli->insert_id);
            return true;
          }else{
            array_push($this->result , $this->mysqli->error);
            return false;
          }
        }
    }

    private function tableExist($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $run = $this->mysqli->query($sql);
        if($run){
            if($run->num_rows==1){
                return true;
            }else{
                return false;
                array_push($this->result , $table ." does not Exist in the database");
            }
        }else{
            return false;
        }
    }

    public function update($table,$param=array(),$where = null){
        if($this->tableExist($table)){
            // print_r($param);
            $args = array();
            foreach ($param as $key => $value) {
                $args[] = "$key = '$value'";
            }
            // print_r($args);
            // implode function is used to convert array int string
            // echo $sql = "UPDATE $table SET " . implode(', ' , $args);
            $sql = "UPDATE $table SET " . implode(', ' , $args);

            if($where != null){
                $sql .= " WHERE $where";
            }
            // echo $sql;
            if($this->mysqli->query($sql)){
                array_push($this->result , $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result , $this->mysqli->error);
             return false;
            }
        }else{
            return false;
        }
    }
    // all data deleted if we not write null in $where
    // public function delete($table,$where){
        public function delete($table,$where = null){
        if($this->tableExist($table)){
            $sql = "DELETE FROM $table ";
            if($where != null){
                $sql .= " WHERE $where";
            }
            // echo $sql;

            if($this->mysqli->query($sql)){
                array_push($this->result , $this->mysqli->affected_rows);
                return true;
            }else{
                array_push($this->result , $this->mysqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    public function select($table,$row="*",$join=null,$where=null,$order=null,$limit=null){
        if($this->tableExist($table)){
            $sql = "SELECT $row FROM $table ";
            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= " WHERE $where";
            }
            if($order != null){
                $sql .= " ORDER BY $order";
            }
            if($limit != null){
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $start = ($page-1) * $limit;
                $sql .= " LIMIT $start,$limit";
            }
            echo $sql;

            $query = $this->mysqli->query($sql);
            if($query){
                array_push($this->result , $query->fetch_all(MYSQLI_ASSOC));
                return true;
            }else{
                array_push($this->result , $this->mysqli->error);
                return false;
            }
        }
    }

    public function pagination($table,$join=null,$where=null,$limit=null){
        if($this->tableExist($table)){
            if($limit != null){
            $sql = "SELECT COUNT(*) FROM $table";
            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= " WHERE $where";
            }

            $query = $this->mysqli->query($sql);

            $total_record = $query->fetch_array();
            // print_r($total_record);
            // echo $total_record = $total_record[0];
            $total_record = $total_record[0];

            // ceil avoid decimal places
            // echo $total_page = ceil($total_record / $limit);
            $total_page = ceil($total_record / $limit);

            // echo $url = basename($_SERVER['PHP_SELF']);
            $url = basename($_SERVER['PHP_SELF']);

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }

            $output = "<ul class 'pagination'>";

            if($page>1){
                $output .= "<li><a href='$url?page=".($page-1)."'>Prev</a></li>";
            }

            if($total_record>$limit){
                for($i = 1;$i <= $total_page;$i++){
                    if($i == $page){
                        $cls ="class='active'";
                    }else{
                        $cls ="";
                    }
                    $output .= "<li><a $cls href='$url?page=$i'>$i</a></li>";
                
                }
            }

            if($page<$total_page){
                $output .= "<li><a href='$url?page=".($page+1)."'>Next</a></li>";
            }

            $output .= "</ul>";

            echo $output;
            
        }else{
            return false;
        }
        }else{
            return false;
        }
    }

    public function sql($sql){
        $query = $this->mysqli->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result , $this->mysqli->error);
            return false;
        }
    }

    
    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }else{
                return false;
            }
        }
    }

}
?>