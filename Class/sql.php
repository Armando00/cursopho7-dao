<?php 

class Sql extends PDO {

    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql: dbname=dbtest; host=localhost", "root", "");
    }

    private function setParams($statement, $parameters = array()){
      
        foreach ($parameters as $key => $value) {

            $this->setParam($key, $value);
        }
    }

    private function setParam($statement, $key, $value){

        $statement->bindparam($key, $value);

    }

    public function query($rowQuery, $params = array()){

            $stmt = $this->conn->prepare($rowQuery);

            $this->setParams($stmt, $params);

            $stmt->execute();

            $stmt->execute();

            return $stmt ;
    }

    public function select($rowQuery, $params = array()):array{

      $stmt = $this->query($rowQuery, $params);

     return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>