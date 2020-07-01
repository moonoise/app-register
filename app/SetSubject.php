<?php

namespace App;

use App\SqlConn;
use \PDO;

class SetSubject extends SqlConn
{
    function set_subject_guide($stdLevel, $stdYear, $stdTerm)
    {
        try {
            $sql = "SELECT set_subject.*,
                            subject.subject_name_en,
                            subject.subject_credit
                    FROM  set_subject 
                    LEFT JOIN subject 
                        ON subject.subject_id = set_subject.subject_id 
                    WHERE set_subject.set_subject_level = :stdLevel 
                            AND set_subject.set_subject_year = :stdYear
                            AND set_subject.set_subject_term = :stdTerm ";

            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':stdLevel', $stdLevel);
            $stm->bindParam(':stdYear', $stdYear);
            $stm->bindParam(':stdTerm', $stdTerm);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function set_subject_not_register($stdLevel, $stdYear, $stdTerm, $arrSubjectId)
    {
        $strSubjectId = "'" . implode("','", $arrSubjectId) . "'";
        try {
            $sql =
                "SELECT set_subject.*,
                            subject.subject_name_en,
                            subject.subject_credit
                    FROM  set_subject 
                    LEFT JOIN subject 
                        ON subject.subject_id = set_subject.subject_id 
                    WHERE set_subject.set_subject_level = :stdLevel 
                            AND set_subject.set_subject_year = :stdYear
                            AND set_subject.set_subject_term = :stdTerm 
                            AND  set_subject.subject_id NOT IN (" . $strSubjectId . ")";

            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':stdLevel', $stdLevel);
            $stm->bindParam(':stdYear', $stdYear);
            $stm->bindParam(':stdTerm', $stdTerm);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
