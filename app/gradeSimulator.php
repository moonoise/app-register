<?php

namespace App;

use App\SqlConn;
use \PDO;

class GradeSimulator extends SqlConn
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
            $sql = "SELECT student.std_id_auto,
                            student.std_id,
                            student.std_id_card,
                            student.std_title_name,
                            student.std_fname,
                            student.std_lname,
                            student.std_title_name_th,
                            student.std_fname_th,
                            student.std_lname_th,
                            student.admission_type,
                            student.class_of,
                            student.room_id,
                            student.faculty,
                            student.field_of_study,
                            student.degree_conferred,
                            student.date_of_admission,
                            student.std_year,
                            student.teacher_id,
                            student.teacher_id2,
                            student.std_status,
                            student.username,
                            student.email,
                            student.phone,
                            student.picture_profile,
                            student.verified,
                            admission_type.admission_type_detail 
                            FROM student 
                            LEFT JOIN 
                            admission_type 
                            ON admission_type.admission_type_code  = admission_type
                            WHERE std_id = :stdId";
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
                $sql = "SELECT student_simulator.* , 
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
                            FROM student_simulator 
                            LEFT JOIN subject 
                                ON subject.subject_id = student_simulator.subject_id
                            WHERE student_simulator.std_id = :std_id ";

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
        $arrNotG = array('W', 'P');
        $result = array();
        if (count($arrGrade) > 0) {
            foreach ($arrGrade as $key => $value) {

                if (!in_array($value['grade_text'], $arrNotG)) {
                    $creditAll += $value['subject_credit'];
                    // return 'test';
                }
                // $creditAll += $value['subject_credit'];

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
            $sql = "SELECT student_simulator.* , 
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
                            FROM student_simulator 
                            LEFT JOIN subject 
                                ON subject.subject_id = student_simulator.subject_id
                            WHERE student_simulator.std_id = :std_id 
                                AND  student_simulator.yt_year = :yt_year
                                AND student_simulator.yt_term = :yt_term ";

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
            $sql = "SELECT * FROM student_simulator 
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

    function check_registered($stdId, $subjectId)
    {

        try {
            $sql = "SELECT *  FROM student_simulator 
                        WHERE  std_Id = :stdId 
                            AND subject_Id = :subjectId ";
            $stm = $this->conn->prepare($sql);
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
            $sql = "SELECT student_simulator.*,
                            subject.subject_name_en
                             FROM student_simulator
                        LEFT JOIN subject 
                        ON subject.subject_id =  student_simulator.subject_id
                        WHERE student_simulator.std_id = :std_id
                        AND student_simulator.subject_id = :subject_id 
                        AND student_simulator.grade_text IN (" . $strGrade . ")
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

    function check_permission_register($stdId, $subjectId, $currentYear, $currentTerm)  // เช็คว่าสามารถ ลงทะเบียนได้ไหม
    {
        $grade1 = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
        $grade2 = array('F');
        $grade3 = array('W');
        $arrTerm = [1, 2, 3];

        $condition = array();
        $sr = array();

        $check['registered'] = $this->check_registered($stdId, $subjectId);
        $required_subject = $this->required_subject($subjectId);
        if ($required_subject['count'] > 0) {
            foreach ($required_subject['data'] as $keyRequired => $valueRequired) {
                $chPer = 0;
                $c = array();
                $c = $this->check_grade($stdId, $valueRequired['subject_id'], $grade1); // หา 'A','B+','B','C+','C','D+','D'
                if ($c['count'] > 0) {
                    $chPer = 1;
                    $sr['permissible_comment'] = "เกรดรายวิชาต่อเนื่องครบ";
                } else {
                    $c = $this->check_grade($stdId, $valueRequired['subject_id'], $grade2);  // หา F
                    if ($c['count'] > 0) {
                        $chPer = 0;
                        $sr['permissible_comment'] = "ติด F รายวิชาต่อเนื่อง";
                        $checkRegister = $this->check_registered($stdId, $valueRequired['subject_id'], $currentYear, $currentTerm);
                        if ($checkRegister) {
                            $chPer = 1;
                            $sr['permissible_comment'] = "ติด F รายวิชาต่อเนื่อง แต่ได้ลงทะเบียนเรียนในภาคเรียนปัจจุบันแล้ว";
                        }
                    } else {
                        $c = $this->check_grade($stdId, $valueRequired['subject_id'], $grade3);  // หา W
                        if ($c['count'] > 0) {
                            $chPer = 0;
                            $sr['permissible_comment'] = "DROP รายวิชาต่อเนื่อง ไม่สามารถลงทะเบียนได้";
                        } else {
                            $chPer = 0;
                            $sr['permissible_comment'] = "ไม่พบการลงทะเบียน รายวิชาต่อเนื่อง";
                        }
                    }
                }
                $arrGrade['subject_required']['data'] = $c['data'];

                if ($chPer == 1) {
                    $sr['permissible'] = true;  //
                } else {
                    $sr['permissible'] = false;  //
                }
            }
        } else {
            $arrGrade['subject_required']['data'] = null;
            $sr['permissible'] = true;
            $sr['permissible_comment'] = "ไม่ใช่รายวิชาต่อเนื่อง";
        }
        $check['subject_required']['count'] = $required_subject['count'];
        $arrResult = array_merge_recursive($check, $sr, $arrGrade);

        return $arrResult;
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

//ทำไหมเปลี่ยนชื่อไฟล์ตัวเล็กใหญ่แล้ว git มันไม่ เปลี่ยนให้