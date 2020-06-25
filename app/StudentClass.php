<?php
namespace App;
use App\SqlConn;
use \PDO;

class StudentClass extends SqlConn
{
    function check_student($std_id) {
        try {
            $sql = "SELECT count(*) as c
                    FROM  student 
                    WHERE std_id = :std_id ";

            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':std_id',$std_id);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]['c'] > 0) {
                return true;
            }else {
                return false;
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }

    
    
}
