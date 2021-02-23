<?php

include_once dirname(__FILE__, 2) ."\\utils\\helper.php";

/*
* OMAR
* @param int $std_id : the ID of the student whose table we want 
* @return an associative array with the weekdays as keys and the information as an array of values
*/
function getStudentTimetable($std_id){
    global $conn;
    $semester = getCurrentSemester();
    $query = "SELECT
    c.name AS cname,
    v.name AS vname,
    cl.type,
    cl.start,
    cl.end,
    cl.freq,
    cl.students_group,
    cl.day,
    u.first_name,
    u.middle_name,
    u.last_name
    FROM
        classes cl
    INNER JOIN courses c ON
        c.course_id = cl.id_course
    INNER JOIN course_semester_students css ON
        css.id_course = cl.id_course
    INNER JOIN venues v ON
        v.venue_id = cl.id_venue
    INNER JOIN instructors i ON
        i.instructor_id = cl.id_instructor
    INNER JOIN users u ON
        u.id = i.id_user
    WHERE
        css.id_student = $std_id AND css.id_semester = $semester
    ORDER BY CASE
        cl.day WHEN 'saturday' THEN 1 WHEN 'sunday' THEN 2 WHEN 'monday' THEN 3 WHEN 'tuesday' THEN 4 WHEN 'wednesday' THEN 4 WHEN 'thursday' THEN 4
    END,
    cl.start ASC";
    // die($query);
    $query_result = mysqli_query($conn, $query);
    $result_array = array();
    if($query_result){
        while($row = mysqli_fetch_assoc($query_result)){
            $day = $row['day'];
            if(!array_key_exists($day, $result_array)){
                $result_array[$day] = array();
            }
            array_push($result_array[$day], $row);
        }
        return $result_array;
    }else{
        return false;
    }
}


function getStudentCourses($studentId)
{
    global $conn, $discussion_student_path;
    $semester = getCurrentSemester();
    $query = "SELECT c.course_id, c.name, u.first_name, u.last_name FROM course_semester_students css 
      INNER JOIN courses c ON css.id_course = c.course_id
      INNER JOIN open_courses_instructors oci ON oci.course_id = c.course_id
      INNER JOIN instructors i on oci.instructor_id = i.instructor_id
      INNER JOIN users u on i.id_user = u.id 
      WHERE css.id_student = $studentId AND (u.type = 'professor' or u.type='admin')";
    $query_result = mysqli_query($conn, $query);
    checkResultQuery($query_result, $conn, "getStudentCourses");
    return $query_result;
}





?>
