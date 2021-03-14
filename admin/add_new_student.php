<?php
include dirname(__FILE__, 2) . "\\includes\\Admin\\callable_functions.php";
addNewStudent();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Add Student</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/rootStyles.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script type="text/javascript" src="forms.js"> </script>
</head>

<body>

    <div class="wrapper">
    <?php
            include dirname(__FILE__, 2) . "\\includes\\admin_sidebar.php";
        ?>
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light shadow-sm">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                        <!-- <span id="nav-toggle-text">Navigation</span> -->
                    </button>
                    <a class="navbar-brand" id="page-title" href="#">Add New User</a>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto secondary-navigation">
                            <li class="nav-item ">
                                <a class="nav-link" href="Students.php">Student</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="Professors.php">Professor</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="ta_list.php">Teaching Assistant</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="sa_list.php">Student Affairs</a>
                            </li>
                        </ul>
                    </div>
            </nav>


            <div class="page-body">
                <!-- START HERE -->

                <div class="row">
                    <div class="col-md-12 order-md-1 col-lg-12">
                        <h4 class="mb-3">Add New Student</h4>
                        <hr class="mb-4">
                        <form novalidate action="" method="POST" onsubmit="return !!(empty_field() & validate_names() & validate_NationalId() & validate_GurdianNumber() & validate_MobileNumber() & validate_StudentId() &  validate_HomeNumber() & validate_email()  & validate_gender() & validate_math() )">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <label for="firstName">First name (English)</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" value="">
                                    <h6 id="warn1" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <label for="middleName">Middle name (English)</label>
                                    <input type="text" class="form-control" id="middleName" name="middle_name" placeholder="" value="">
                                    <h6 id="warn" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <label for="lastName">Last name (English)</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" value="">
                                    <h6 id="warn3" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 col-md-12 mb-3">
                                    <label for="firstName">Full Name (Arabic)</label>
                                    <input type="text" class="form-control" id="firstName" name="arabic_name" placeholder="" value="">
                                    <h6 id="warn" style="font-style: italic;color: red;"></h6>
                                    <div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-3">
                                    <label for="lastName">National ID Number</label>
                                    <input type="text" class="form-control" id="zip" name="national_id" placeholder="" value="">
                                    <h6 id="warn5" style="font-style: italic;color: red;"></h6>
                                    <div>

                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-3">
                                    <label for="email">University E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@alexu.edu.eg">
                                    <h6 id="warn4" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                                    <h6 id="warn" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="gender">Gender</label>
                                    <select class="custom-select d-block w-100" id="gender" name="gender">
                                        <option value="" disabled selected>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <p id="warn_gender" style="font-style: italic;color: red;"></p>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="math">Starting Math</label>
                                    <select class="custom-select d-block w-100" id="math" name="student_type" required>
                                        <option value="" disabled selected hidden>Choose...</option>
                                        <option value="">Math 0</option>
                                        <option value="">Math 1</option>
                                    </select>
                                    <p id="warn_math" style="font-style: italic;color: red;"></p>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label for="zip">Student ID</label>
                                    <input type="text" class="form-control" id="studentid" name="student_id" placeholder="">
                                    <h6 id="warn10" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <label for="gender">Student Mobile Number</label>
                                    <input type="text" class="form-control" id="phone" name="mobile_number" placeholder="01234567890">
                                    <h6 id="warn6" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">Please enter your shipping address.</div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <label for="gender">Guardian Mobile Number</label>
                                    <input type="text" class="form-control" id="phone2" name="guardian_mobile_number" placeholder="01234567890">
                                    <h6 id="warn7" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">Please enter your shipping address.</div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <label for="gender">Home Phone Number</label>
                                    <input type="text" class="form-control" id="HomeNumber" name="home_number" placeholder="(optional)">
                                    <h6 id="warn8" style="font-style: italic;color: red;"></h6>
                                    <div class="invalid-feedback">Please enter your shipping address.</div>
                                </div>

                            </div>



                            <hr class="mb-4">

                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Add Student</button>
                        </form>
                        <br>
                    </div>



                    <!-- STOP HERE -->
                </div>


            </div>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Navbar -->
        <script type="text/javascript" src="../js/rootJS.js"></script>

</body>

</html>