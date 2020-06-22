<?php
namespace App;
use App\SqlConn;
use \PDO;

class StudentSubject extends SqlConn
{
    function StudentSubject($std_id,$ts_id) {
        try {
            $sql = "SELECT count(*) as c
                    FROM  student_subject 
                    WHERE std_id = :std_id 
                            AND ts_id = :ts_id ";

            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':std_id',$std_id);
            $stm->bindParam(':ts_id',$ts_id);
           
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
