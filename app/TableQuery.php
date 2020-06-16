<?php
namespace App;
use App\SqlConn;

class TableQuery extends SqlConn
{
    function checkID($table,$field,$val) {
        try {
            // $sql = "SELECT count(*) FROM $table WHERE $field = $val "; 
            $sql = "SELECT EXISTS(SELECT 1 FROM $table  WHERE $field = :id )";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':id',$val);
            $stm->execute();
            $r = $stm->fetchAll(\PDO::FETCH_NUM);
            //ถ้ามี record อยู่ return 1
            return $r[0][0];
        } catch (\Exception $e) {
            return $e->getMessage();
        }   
    }

    /**
 * A custom function that automatically constructs a multi insert statement.
 * 
 * @param string $tableName Name of the table we are inserting into.
 * @param array $data An "array of arrays" containing our row data.
 * @param PDO $pdoObject Our PDO object.
 * @return boolean TRUE on success. FALSE on failure.
 */
function pdoMultiInsert($tableName, $data){
        try {
                $err = "";
                $success = array('msg' => null ,
                                    'success' => null);
                //Will contain SQL snippets.
                $rowsSQL = array();

                //Will contain the values that we need to bind.
                $toBind = array();
                
                //Get a list of column names to use in the SQL statement.
                $columnNames = array_keys($data[0]);

                //Loop through our $data array.
                foreach($data as $arrayIndex => $row){
                    $params = array();
                    foreach($row as $columnName => $columnValue){
                        $param = ":" . $columnName . $arrayIndex;
                        $params[] = $param;
                        $toBind[$param] = $columnValue; 
                    }
                    $rowsSQL[] = "(" . implode(", ", $params) . ")";
                }

                //Construct our SQL statement
                $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);

                //Prepare our PDO statement.
                $pdoStatement = $this->conn->prepare($sql);

                //Bind our values.
                foreach($toBind as $param => $val){
                    $pdoStatement->bindValue($param, $val);
                }
                
                //Execute our statement (i.e. insert the data).
                    $pdoStatement->execute();

        } catch (\Exception $e) {
            $err = $e->getMessage();
        }
        if ($err != "") {
            $success['msg'] = $err;
            $success['success'] = false;
        }else {
            $success['success'] = true;
        }
        return $success;
    }


    function pdoUpdateByID($tableName,$data,$idName,$idValue) {
        try {
                $err = "";
                $success = array('msg' => null ,
                                'success' => null);
                

               
                $toBind = array();
                
                //Get a list of column names to use in the SQL statement.
                unset($data[$idName]);
                // $columnNames = array_keys($data);
               

                //Loop through our $data array.
               
                    $params = array();
                    foreach($data as $columnName => $columnValue){
                        if ($columnName != $idName) {
                            $param =  ":" . $columnName;
                            $params[] = $columnName." = ".$param;
                            $toBind[$param] = $columnValue; 
                        }
                      
                    }
                    $rowsSQL =  implode(", ", $params) ;
                  
                //Construct our SQL statement
                $sql = "UPDATE `$tableName` SET " . $rowsSQL . " WHERE ". $idName . " = :id ;";
                    // echo $sql;
                //Prepare our PDO statement.
                $pdoStatement = $this->conn->prepare($sql);

                //Bind our values.
                foreach($toBind as $param => $val){
                    $pdoStatement->bindValue($param, $val);
                    // printf("%s = %s \n",$param,$val);
                }
                $pdoStatement->bindParam(":id",$idValue);
                
                //Execute our statement (i.e. insert the data).
                    $pdoStatement->execute();

        } catch (\Exception $e) {
            $err = $e->getMessage();
        }
        if ($err != "") {
            $success['msg'] = $err;
            $success['success'] = false;
        }else {
            $success['success'] = true;
        }
        return $success;
    }


}