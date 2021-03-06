
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Registered Students</title>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/rootStyles.css">
    <link rel="stylesheet" href="css/students_in_course.css">
    <?php include "../includes/bootstrap_styles_start.php"; ?>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php
        include_once dirname(__FILE__, 2) .DIRECTORY_SEPARATOR. "paths.php";

        include_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "includes\\Admin\\all_types\\functions.php";

        session_start();
        $user_id = $_SESSION['id'];

        if (isHeProfessorAndAdmin($user_id))
            include $admin_sidebar_path;
        else
            include $professor_sidebar_path;
        $courseId = $_GET['course_id'];
    ?>
    <!-- Page Content  -->
    <div id="content">
        <?php
        include_once $professor_navbar_path;
        ?>
        <div class="page-body">
            <!-- START HERE -->
            <h3 class="font-weight-bold" style=" color:rgb(31,108,236);">
                Registered Students
            </h3>
            <hr class="mb-4">
            <div class="container-fluid">
                <div class="row table-container">
                    <table class="table">
                        <thead>
                            <tr style="color:rgb(31,108,236);">
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Group</th>

                            </tr>
                        </thead>
                        <tbody style="color: rgba(0,0,0,0.5);">
                            <?php 
                                getRegisteredStudents($courseId);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- STOP HERE -->
        </div>
    </div>
</div>

<?php include "../includes/bootstrap_styles_end.php"; ?>
<!-- Navbar -->
<script type="text/javascript" src="../js/rootJS.js"></script>

</body>

</html>