<?php 
    include "db_conn.php";

    //get registered students in a course
    function getRegisteredStudents($courseId, $semester){
        global $conn;
        $query = "SELECT id_student, arabic_name, level, student_group FROM course_semester_students css INNER JOIN students s ON css.id_student = s.student_id WHERE id_course = $courseId AND id_semester = $semester";
        $query_result = mysqli_query($conn, $query);
        $i = 1;
        while($row = mysqli_fetch_assoc($query_result)){
            $name = $row["arabic_name"];
            $id = $row['id_student'];
            $level = $row['level'];
            $group = $row['student_group'];
            echo "
            <tr>
                <th scope='row'>$i</th>
                <th scope='row'>$id</th>
                <td>$name</td>
                <td>$level</td>
                <td>$group</td>
            </tr>";
            $i++;
        }
    }


    //get the mark breakdown of all registered students in a course
    function getRegisteredStudentsMarks($courseId, $semester){
        global $conn;
        $query = "SELECT id_student, arabic_name, grade, gpa, oral, midterm, course_work, practical, final FROM course_semester_students css INNER JOIN students s ON css.id_student = s.student_id WHERE id_course = $courseId AND id_semester = $semester";
        $query_result = mysqli_query($conn, $query);

        // echo mysqli_error($conn);

        while($row = mysqli_fetch_assoc($query_result)){
            $name = $row["arabic_name"];
            $id = $row['id_student'];
            $grade = $row['grade'] ? $row['grade'] : "F";
            $gpa = $row['gpa'];
            $oral = $row['oral'];
            $mid = $row['midterm'];
            $cw = $row['course_work'];
            $practical = $row['practical'];
            $final = $row['final'];
            $total = $mid+$oral+$cw+$practical+$final;
            echo "
            <tr>
                <th scope='row'>$id</th>
                <td>$name</td>
                <td>$mid</td>
                <td>$oral</td>
                <td>$practical</td>
                <td>$cw</td>
                <td>$final</td>
                <td>$total</td>
                <td>$grade</td>
                <td>$gpa</td>
            </tr>";  
        }
    }


    function getRegisteredStudentsMarksForEdit($courseId, $semester){
        global $conn;
        $query = "SELECT id_student, arabic_name, grade, gpa, oral, midterm, course_work, practical, final FROM course_semester_students css INNER JOIN students s ON css.id_student = s.student_id WHERE id_course = $courseId AND id_semester = $semester";
        $query_result = mysqli_query($conn, $query);

        // echo mysqli_error($conn);

        while($row = mysqli_fetch_assoc($query_result)){
            $name = $row["arabic_name"];
            $id = $row['id_student'];
            $grade = $row['grade'] ? $row['grade'] : "F";
            $gpa = $row['gpa'];
            $oral = $row['oral'];
            $mid = $row['midterm'];
            $cw = $row['course_work'];
            $practical = $row['practical'];
            $final = $row['final'];
            echo "
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td><input type='number' name='midterm' value='$mid'></td>
                <td><input type='number' name='oral' value='$oral'></td>
                <td><input type='number' name='practical' value='$practical'></td>
                <td><input type='number' name='cw' value='$cw'></td>
                <td><input type='number' name='final' value='$final'></td>
            </tr>"; 
        }
    }


    function getInstructorCourses($instructorId, $semester){
        global $conn;
        $query = "SELECT oc.course_id, level, student_count, name FROM open_courses oc INNER JOIN open_courses_instructors oci ON oc.course_id = oci.course_id
        INNER JOIN courses c ON oc.course_id = c.course_id WHERE instructor_id = $instructorId ";
        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){
            $name = $row['name'];
            $id = $row['course_id'];
            $level = $row['level'];
            $count = $row['student_count'];
            echo"
              <div class='col-sm-12 col-md-6 col-lg-4 col-xl-3 course-item'>
              <a href='discussion.php?course_id=$id&sem_id=$semester' class='cbox'>
                <div class='course-title'>
                  $name
                </div>
                <div class='course-info'>
                  Level: $level
                </div>
                <div class='course-info'>
                  Students: $count
                </div>
              </a>
              </div>              
            "; 
        }
    }


    function getStudentCourses($studentId, $semester){
        global $conn;
        $query = "SELECT c.course_id, c.name, u.first_name, u.last_name FROM course_semester_students css 
        INNER JOIN courses c ON css.id_course = c.course_id
        INNER JOIN open_courses_instructors oci ON oci.course_id = c.course_id
        INNER JOIN instructors i on oci.instructor_id = i.instructor_id
        INNER JOIN users u on i.id_user = u.id 
        WHERE css.id_student = $studentId AND (u.type = 'professor' or u.type='admin')";
        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $cname = $row['name'];
            $id = $row['course_id'];
            echo"
              <div class='col-sm-12 col-md-6 col-lg-4 col-xl-3 course-item'>
              <a href='discussion.php?std_id=$studentId&course_id=$id&sem_id=$semester' class='cbox'>
                <div class='course-title'>
                  $cname
                </div>
                <div class='course-info'>
                  Prof. $fname $lname
                </div>
              </a>
              </div>              
            "; 
        }
    }

    function getStudentMarksForCourse($courseId, $std_id, $semester){
      global $conn;
        $query = "SELECT * FROM course_semester_students WHERE id_student = $std_id AND id_course = $courseId AND id_semester = $semester";
        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){
            $mid = $row['midterm'];
            $oral = $row['oral'];
            $cw = $row['course_work'];
            $practical = $row['practical'];
            $final = $row['final'];
            $total = $mid + $oral + $cw + $practical + $final;
            echo"
            <tr>
              <td>$mid</td>
              <td>$oral</td>
              <td>$cw</td>
              <td>$practical</td>
              <td>$final</td>
              <td>$total</td>
            </tr>              
            "; 
        }
    }

    function getCourseMaterial($courseId, $semester){
      global $conn;
        $query = "SELECT m.title, u.first_name, u.last_name, material_ref FROM materials m
        INNER JOIN users u ON u.id = m.id_user
        WHERE id_course = $courseId AND semester_id = $semester";
        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){
          $title = $row['title'];
          $fname = $row['first_name'];
          $lname = $row['last_name'];
          $material = $row['material_ref'];
          echo "<div class='container-fluid'>
          <div class='row conbody  text-center text-lg-left'>
            <div class='col-lg-5'>
              <a href='$material' target='_blank' class='a'>$title</a>
            </div>
            <div class='col-lg-4'>
              <p>$fname $lname</p>
            </div>
            <div class='col-lg-3'>
              <a href='../files/$material' download='$title' type='button' class='btn btn-primary btn-block'>Download</a>
            </div>
          </div>
        </div>";
             
        }      
    }



    function getCourseMaterialEditable($courseId, $semester){
      global $conn;
        $query = "SELECT m.title, u.first_name, u.last_name, material_ref, material_id FROM materials m
        INNER JOIN users u ON u.id = m.id_user
        WHERE id_course = $courseId AND semester_id = $semester";
        $query_result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($query_result)){
          $title = $row['title'];
          $fname = $row['first_name'];
          $lname = $row['last_name'];
          $material = $row['material_ref'];
          $material_id = $row['material_id'];
          echo "<div class='container-fluid'>
          <div class='row conbody  text-center text-lg-left' >
            <div class='col-lg-5'>
              <a href='$material' target='_blank' class='a'>$title</a>
            </div>
            <div class='col-lg-4'>
              <p>$fname $lname</p>
            </div>
            <div class='col-lg-3'>
            <a  data-id='$material_id' data-title='$title' data-file='../files/$material' class='btn btn-primary btn-block launch-modal' data-toggle='modal' data-target='#modalContactForm'>Options</a>
            </div>
          </div>
        </div>";
        // <a href='../files/$material' download='$title' type='button' class='btn btn-primary btn-block'>Download</a>
             
        }      
    }


    


    function uploadMaterial ($file){
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];
        $file_type = $file['type'];
    
        if($file_error === 0){
            $fname=explode('.' , $file_name);
            $new_file_name = uniqid('', true) . "." . strtolower(end($fname));
            $destination = "../files/". $new_file_name ;
            move_uploaded_file($file_tmp_name, $destination);
            return $destination;
        }

        return false;

    }


    function putMaterialInDB($courseId, $semester, $title, $location, $user_id){
      global $conn;
      $title = mysqli_real_escape_string($conn, $title);
      $query = "INSERT INTO materials(id_course, id_user, title, material_ref, semester_id)
      VALUES('$courseId', '$user_id', '$title', '$location', '$semester')";
      $query_result = mysqli_query($conn, $query);
      if(!$query_result){
        die(mysqli_error($conn));
      }
    }

    function updateMaterial($title, $location, $material_id){
      global $conn;
      $title = mysqli_real_escape_string($conn, $title);
      $query = "UPDATE materials SET
      title='$title',
      material_ref='$location'
      WHERE
      material_id=$material_id";
      $query_result = mysqli_query($conn, $query);
      if(!$query_result){
        die(mysqli_error($conn));
      }
    }

    function deleteMaterial($material_id){
      global $conn;
      $query = "DELETE FROM materials WHERE material_id=$material_id";
      $query_result = mysqli_query($conn, $query);
      if(!$query_result){
        die(mysqli_error($conn));
      }
    }


    




?>