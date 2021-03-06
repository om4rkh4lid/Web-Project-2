<?php
include_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "paths.php";
include_once "../includes/functions.php";

$courseId = $_GET['course_id'];


if (isset($_POST['editChanges'])) {
  $newName = $_POST['materialTitle'];

  if ($newName && $newName != '') {
    if (isset($_FILES['material_file'])) {
      $location = uploadMaterial($_FILES['material_file']);
      updateMaterial($newName, $location, $_POST['materialId']);
      header("Location: material.php?course_id=$courseId");
    } else {
      die("something went wrong");
    }
  }
}

if (isset($_POST['remove'])) {
  deleteMaterial($_POST['materialId']);
  header("Location: material.php?course_id=$courseId");
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Course Material</title>

  <?php include "../includes/bootstrap_styles_start.php"; ?>
  <link rel="stylesheet" href="css/material.css">



</head>

<body>

  <div class="wrapper">
    <!-- Sidebar  -->
    <?php
   include_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "includes\\Admin\\all_types\\functions.php";

   session_start();
   $user_id = $_SESSION['id'];

   if (isHeProfessorAndAdmin($user_id))
       include $admin_sidebar_path;
   else
       include $professor_sidebar_path;

    ?>
    <!-- Page Content  -->
    <div id="content">

      <?php
      include_once $professor_navbar_path;
      ?>

      <div class="page-body">
        <!-- START HERE -->


        <div class="container-fluid">
          <div class="row justify-content-end">
            <a href="upload_material.php?<?php echo "course_id=$courseId&sem_id=$semester"; ?>" class=" btn btn-primary btn-block w-25">Upload New</a>
          </div>
        </div>
        <hr class="mb-4">

        <?php
        getCourseMaterialEditable($courseId);
        ?>

        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Edit Material</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <label class="label" for="materialTitle">Venue Name</label>
                  <input type="text" class="form-control" id="materialTitle" name="materialTitle">
                  <br />
                  <label for="custom-file">Upload file</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="material_file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <input type="text" class="form-control" name="materialId" id="materialId" style="display:none;">
                </div>
                <div class="modal-footer">
                  <button type="submit" name="editChanges" class="btn btn-primary">Save changes</button>
                  <button type="submit" name="remove" class="btn btn-outline-danger">Remove</button>
                </div>
              </div>
            </div>
          </form>
        </div>













        <!-- STOP HERE -->
      </div>
    </div>

  </div>
  </div>

  <?php include "../includes/bootstrap_styles_end.php"; ?>

  <script type="text/javascript" src="../js/rootJS.js"></script>
  <script type="text/javascript" src="js/modal_material.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>

</body>

</html>