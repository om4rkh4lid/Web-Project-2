<?php
/**
 * @author Hassan
 */


include_once dirname(__FILE__, 2) . "\\paths.php";
include_once dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . "functions.php";
?>

<?php
if (isset($_POST['logout-btn'])) {
    logout();
}
?>



<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?php echo $logo_path ?>" alt="SIM-LOGO">
    </div>
    <p>Navigation</p>
    <ul class="list-unstyled components">
        <li>
            <a href="<?php echo $announcements_student_path ?>">Home</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Courses</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="<?php echo $my_courses_path_student ?>">My Courses</a>
                </li>
                <li>
                    <a href="<?php echo $all_courses_path_student ?>">All Courses</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $my_profile_path ?>">My Profile</a>
        </li>
        <li>
            <a href="<?php echo $timetable_student_path ?>">Timetable</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <form method="post">
                <button type="submit" class="btn btn-block cta-logout" style="background-color: #fafafa; color: red;" name="logout-btn" value="Logout">Logout</button>
            </form>

        </li>
    </ul>
</nav>