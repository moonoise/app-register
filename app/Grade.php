<?php

namespace App;

use App\SqlConn;
use \PDO;

class Grade extends SqlConn
{

    function callStudent($stdId)
    {
        $std = $this->std($stdId);
        $std = $this->std_current_year($std);
        $std = $this->std_level($std);
        $std = $this->std_grade($std);

        return $std;
    }

    function std($stdId)
    {
        $arr = array();
        $result = array();
        try {
            $sql = "SELECT * FROM student WHERE std_id = :stdId";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':stdId', $stdId);
            $stm->execute();
            $arr = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (count($arr) == 1) {
                return $arr[0];
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function std_grade($arrStudent)
    {
        $result = array();
        if (is_array($arrStudent)) {
            try {
                $sql = "SELECT student_subject.* , 
                                subject.subject_name_en,
                                subject.subject_name_th,
                                subject.subject_credit,
                                subject.category,
                                subject.subject_level_guide,
                                subject.subject_term_guide,
                                subject.required_subject1,
                                subject.required_subject2,
                                subject.required_subject3,
                                subject.condition1,
                                subject.subject_status
                            FROM student_subject 
                            LEFT JOIN subject 
                                ON subject.subject_id = student_subject.subject_id
                            WHERE student_subject.std_id = :std_id ";

                $stm = $this->conn->prepare($sql);
                $stm->bindParam(':std_id', $arrStudent['std_id']);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                $arrStudent['grade'] = $result;
                return $arrStudent;
            } catch (\Exception $e) {
                $arrStudent['grade'] = $e->getMessage();

                return $arrStudent;
            }
        } else {
            return false;
        }
    }

    function grade_result($arrGrade)
    {  //คำนวนเกรดของแต่ละภาค
        $creditAll = 0;
        $sumGrade = 0;
        $arrG = array("A", "B+", "B", "C+", "C", "D+", "D", "F");
        $result = array();
        if (count($arrGrade) > 0) {
            foreach ($arrGrade as $key => $value) {

                if (in_array($value['grade_text'], $arrG)) {
                    $creditAll += $value['subject_credit'];
                    // return 'test';
                }

                if ($value['grade_text'] == 'A') {
                    $sumGrade += ($value['subject_credit'] * 4);
                } elseif ($value['grade_text'] == 'B+') {
                    $sumGrade += ($value['subject_credit'] * 3.5);
                } elseif ($value['grade_text'] == 'B') {
                    $sumGrade += ($value['subject_credit'] * 3);
                } elseif ($value['grade_text'] == 'C+') {
                    $sumGrade += ($value['subject_credit'] * 2.5);
                } elseif ($value['grade_text'] == 'C') {
                    $sumGrade += ($value['subject_credit'] * 2);
                } elseif ($value['grade_text'] == 'D+') {
                    $sumGrade += ($value['subject_credit']) * 1.5;
                } elseif ($value['grade_text'] == 'D') {
                    $sumGrade += ($value['subject_credit'] * 1);
                } elseif ($value['grade_text'] == 'F') {
                    $sumGrade += ($value['subject_credit'] * 0);
                }
            }
            $result['gpa'] = number_format(($sumGrade / $creditAll), 2, '.', '');
            $result['sumGrade'] = $sumGrade;
            $result['sumCredit'] = $creditAll;
            return $result;
            // return $sumGrade . "-" . $creditAll;
        } else {
            return null;
        }

        // return $creditAll;
    }



    function std_grade_by_year_term($std_id, $yt_year, $yt_term)
    {
        $result = array();

        try {
            $sql = "SELECT student_subject.* , 
                                subject.subject_name_en,
                                subject.subject_name_th,
                                subject.subject_credit,
                                subject.category,
                                subject.subject_level_guide,
                                subject.subject_term_guide,
                                subject.required_subject1,
                                subject.required_subject2,
                                subject.required_subject3,
                                subject.condition1,
                                subject.subject_status
                            FROM student_subject 
                            LEFT JOIN subject 
                                ON subject.subject_id = student_subject.subject_id
                            WHERE student_subject.std_id = :std_id 
                                AND  student_subject.yt_year = :yt_year
                                AND student_subject.yt_term = :yt_term ";

            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':std_id', $std_id);
            $stm->bindParam(':yt_year', $yt_year);
            $stm->bindParam(':yt_term', $yt_term);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            $result = $e->getMessage();

            return $result;
        }
    }




    function std_level($arrStudent)
    {  // ($year - $arr_student) + 1 = มีการศึกษาปัจจุบัน  
        $result = array();
        $result['level'] = ($arrStudent['current_year'] - $arrStudent['std_year'] + 1);
        $arrStudent['level'] = $result['level'];

        return $arrStudent;
    }

    function std_current_year($arrStudent)
    {

        $conf = $this->config('current_year');
        $arrStudent['current_year'] = $conf;
        return $arrStudent;
    }

    function config($configName)
    {
        try {
            $sql = "SELECT * FROM config WHERE config_name = :config_name";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':config_name', $configName);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]['config_value'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function required_subject($subjectId)
    {  //   เช็ดว่ามีวิชาต่อเนื่องไหม return count , data
        $result = array();
        $arr = array();
        try {
            $sql = "SELECT * FROM subject WHERE subject_id = :subjectId AND (required_subject1 IS NOT NULL OR required_subject2 IS NOT NULL OR required_subject3 IS NOT NULL)";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':subjectId', $subjectId);
            $stm->execute();
            $r = $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if (count($r) == 1) {
            if ($r[0]['required_subject1'] != NULL) $arr[] = $r[0]['required_subject1'];
            if ($r[0]['required_subject2'] != NULL) $arr[] = $r[0]['required_subject2'];
            if ($r[0]['required_subject3'] != NULL) $arr[] = $r[0]['required_subject3'];
            $strSubjectId = "'" . implode("','", $arr) . "'";

            try {
                $sqlRequiredSubject = "SELECT * FROM subject WHERE subject_id IN (" . $strSubjectId . ")";
                $stmRequiredSubject = $this->conn->prepare($sqlRequiredSubject);

                $stmRequiredSubject->execute();
                $resultRequiredSubject = $stmRequiredSubject->fetchAll(PDO::FETCH_ASSOC);
                if (count($resultRequiredSubject) > 0) {
                    $result['count'] = count($resultRequiredSubject);
                    $result['data'] = $resultRequiredSubject;
                } else {
                    $result['count'] = count($resultRequiredSubject);
                    $result['data'] = null;
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            $result['count'] = count($r);
            $result['data'] = null;
        }

        return $result;
    }

    function std_grade_check($stdId, $subjectId, $arrGrade)
    {  //ค้นหาเกรด ที่ต้องการ - A,B+,B,C+,C,D+,D , F,W

        $strGrade = "'" . implode("','", $arrGrade) . "'";
        $result = array();
        try {
            $sql = "SELECT * FROM student_subject 
                    WHERE std_id = :std_id 
                    AND subject_id = :subject_id 
                    AND grade_text IN (" . $strGrade . ") ";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':std_id', $stdId);
            $stm->bindParam(':subject_id', $subjectId);
            $stm->execute();
            $r = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (count($r) > 0) {
                $result['count'] = count($r);
                $result['data'] = $r;
            } else {
                $result['count'] = count($r);
                $result['data'] = null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $result;
    }

    function set_subject_by_id($subjectId)
    {
        try {
            $sql = "SELECT * FROM set_subject WHERE  subject_id = :subjectId ";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':subjectId', $subjectId);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result[0];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function required_subject_check($stdId, $subjectId, $year)
    {  // ตรวจสอบ ว่ารายวิชาที่จะลงทะเบียน แบบลงได้หรือได้ 

        $conditionFalse = array(
            'false1' => 'ไม่พบการลงทะเบียนเรียน',
            'false2' => 'เป็นรายวิชาของชั้นปีที่สูงกว่า',
            'f' => 'ติด F รายวิชา ',
            'w' => 'เคย DROP ราย '
        );
        $conditionTrue = array(
            'true1' => 'ไม่ใช่รายวิชาต่อเนื่อง',
            'true2' => 'ผ่านวิชาต่อเนื่องแล้ว',
            'nl' => 'รายวิชาต่อเนื่อง ลงทะเบียนแล้วในเทอมนี้แล้ว '
        );

        $result = array(
            'success' => null,
            'comment' => null
        );
        $arrGrade = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
        $arrYear = array();
        $setSubject = $this->set_subject_by_id($subjectId);
        $std = $this->callStudent($stdId);

        if (($setSubject['set_subject_level'] - $std['level']) > 0) {
            $result['success'] = false;
            $result['comment'] =  $conditionFalse['false2'];
            return $result;
        }

        $requiredSubject = $this->required_subject($subjectId);
        if ($requiredSubject['count'] > 0) {
            $ok = 0;

            $arrStdGrade = array();
            foreach ($requiredSubject as $key => $value) {
                $arrStdGrade[$key] = $this->std_grade_check($stdId, $value['subject_id'], $arrGrade);
            }

            // if (count($arrGrade) > 0) {
            //     if (array_search("A",$arrGrade)) {

            //     }elseif(array_search("F",$arrGrade)){
            //         $result['success'] = false;
            //         $result['comment'] =  $conditionFalse['false2'];
            //         return $result;
            //     }elseif (array_search("W",$arrGrade)) {
            //         $result['success'] = false;
            //         $result['comment'] =  $conditionFalse['false1'];
            //         return $result;
            //     }
            // }else {
            //     $result['success'] = false;
            //     $result['comment'] =  $conditionFalse['false1'];
            //     return $result;
            // }


        } else {
            $result['success'] = true;
            $result['comment'] =  $conditionTrue['true1'];
            return $result;
        }
    }

    function check_registered($stdId, $subjectId, $year, $term)
    {

        try {
            $sql = "SELECT *  FROM student_subject 
                        WHERE  yt_year = :yt_year 
                            AND yt_term = :yt_term 
                            AND std_Id = :stdId 
                            AND subject_Id = :subjectId ";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':yt_year', $year);
            $stm->bindParam(':yt_term', $term);
            $stm->bindParam(':stdId', $stdId);
            $stm->bindParam(':subjectId', $subjectId);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function check_level_subject($stdId, $subject_id)
    { //เช็คว่าเป็นรายวิชาของชั้นปีที่สูงกว่า ที่ตัวเองเรียนหรือไม่ true = ไม่สูง false = สูงกว่า 
        $std = $this->callStudent($stdId);

        try {
            $sql = "SELECT set_subject_level FROM set_subject WHERE subject_id = :subject_id";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':subject_id', $subject_id);
            $stm->execute();

            $r = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (count($r) > 0) {

                if (($r[0]['set_subject_level'] -  $std['level']) > 0) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return 'not found record.';
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    function check_grade($stdId, $subjectId, $arrGrade)
    {  //  ค้นหาเกรดที่ต้องการ 
        $strGrade = "'" . implode("','", $arrGrade) . "'";
        $result = array();
        try {
            $sql = "SELECT student_subject.*,
                            subject.subject_name_en
                             FROM student_subject
                        LEFT JOIN subject 
                        ON subject.subject_id =  student_subject.subject_id
                        WHERE student_subject.std_id = :std_id
                        AND student_subject.subject_id = :subject_id 
                        AND student_subject.grade_text IN (" . $strGrade . ")
                    ";
            $stm = $this->conn->prepare($sql);
            $stm->bindParam(':std_id', $stdId);
            $stm->bindParam(':subject_id', $subjectId);
            $stm->execute();

            $r = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (count($r) > 0) {
                $result['count'] = count($r);
                $result['data'] = $r;
            } else {
                $result['count'] = count($r);
                $result['data'] = null;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $result;
    }
}
