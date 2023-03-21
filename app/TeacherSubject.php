<?php
namespace App;
use App\SqlConn;
use \PDO;

class TeacherSubject extends SqlConn
{
    function check_techer_subject($teacherId,$SubjectId,$ytYear,$ytTerm) {
        try {
            $sql = "SELECT count(*) AS c FROM teacher_subject 
                    WHERE teacher_id = :teacher_id 
                        AND subject_id = :subject_id 
                        AND yt_year = :yt_year 
                        AND yt_term = :yt_term ";
            $stm = $this->conn->prepare($sql); 
            $stm->bindParam(':teacher_id',$teacherId);
            $stm->bindParam(':subject_id',$SubjectId);
            $stm->bindParam(':yt_year',$ytYear);
            $stm->bindParam(':teacheyt_termr_id',$ytTerm);
            $stm->execute();
            $count =  $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $count;
    }


    function check_update_techer_subject($teacherId,$SubjectId,$ytYear,$ytTerm,$tsId) {
        try {
            $sql = "SELECT count(*) AS c FROM teacher_subject 
                    WHERE teacher_id = :teacher_id 
                        AND subject_id = :subject_id 
                        AND yt_year = :yt_year 
                        AND yt_term = :yt_term 
                        AND ts_id != :ts_id";
            $stm = $this->conn->prepare($sql); 
            $stm->bindParam(':teacher_id',$teacherId);
            $stm->bindParam(':subject_id',$SubjectId);
            $stm->bindParam(':yt_year',$ytYear);
            $stm->bindParam(':teacheyt_termr_id',$ytTerm);
            $stm->bindParam(':ts_id',$tsId);
            $stm->execute();
            $count =  $stm->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        return $count;
    }
}
