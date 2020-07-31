<?php
include("../delta_config.php");
include("includes/session.php");
$conn = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Show Subjects</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("includes/sidebar.html"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("includes/topbar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!--/////////////////////////////////-->
                    <!--/////////////////////////////////-->

                    <!--Hidden Warning-->
                    <div class="alert bg-danger alert-dismissible fade show" id="error_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Oops!</strong> Something Went Wrong !
                    </div>
                    <!--Hidden Warning-->

                    <!--Hidden Processing-->
                    <div class="alert bg-info alert-dismissible fade show" id="process_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Processing... </strong> Please Wait !
                    </div>
                    <!--Hidden Processing-->

                    <!--Hidden Delete Success-->
                    <div class="alert bg-success alert-dismissible fade show" id="success_delete_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Deleted Successfully !</strong>
                    </div>
                    <!--Hidden Delete Success-->

                    <!--Hidden Upadate Success-->
                    <div class="alert bg-success alert-dismissible fade show" id="success_update_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Upadated Successfully !</strong>
                    </div>
                    <!--Hidden Upadate Success-->

                    <!--/////////////////////////////////-->
                    <!--/////////////////////////////////-->


                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Subject / Courses</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Teacher</th>
                                            <th>Change Teacher</th>
                                            <th>Delete</th>
                                            <th>Save</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Teacher</th>
                                            <th>Change Teacher</th>
                                            <th>Delete</th>
                                            <th>Save</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                    $sql_query = "SELECT id, name, description, teacher, teacher_id FROM subjects WHERE status='1'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $row = mysqli_fetch_assoc($resultset) ) { ?>
                                        <tr id="tr_<?php echo $row ['id']; ?>">
                                            <td id="name_<?php echo $row ['id']; ?>" contenteditable="true">
                                                <?php echo $row ['name']; ?> </td>
                                            <td id="description_<?php echo $row ['id']; ?>" contenteditable="true">
                                                <?php echo $row ['description']; ?></td>
                                            <td id="teacher_<?php echo $row ['id']; ?>"
                                                class="<?php echo $row ['teacher_id']; ?>">
                                                <?php echo $row ['teacher']; ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm text-white"
                                                    onclick="changeTeacher(<?php echo $row ['id']; ?>)"
                                                    data-toggle="modal" data-target="#teacherModal">
                                                    Change Teacher
                                                </a>
                                            </td>
                                            <td><a id="deleteRef"
                                                    href="javascript:deleteItem(<?php echo $row ['id']; ?>)"
                                                    class="fa fa-trash" aria-hidden="true"></a></td>
                                            <td><a href="javascript:editItem(<?php echo $row ['id']; ?>)"
                                                    class="fas fa-check"></a></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/footer.html"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->

    <!-- Teacher Modal-->
    <div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Teacher</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control" id="teacher_select">
                        <?php 
                    $sql_query = "SELECT id, name, department FROM users WHERE who='teacher' OR who='admin' AND ban_status='0'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $row = mysqli_fetch_assoc($resultset) ) { ?>
                        <option value="<?php echo$row['id'];?>">
                            <?php echo$row['name']; echo" ( ".$row['department']." )"; ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    Select a teacher from the list. If the teacher is not listed. Make sure you have added the
                    particular teacher as a user. If you haven't done this, Add a teacher now.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary text-white" data-dismiss="modal" onclick="changeApply()">Apply</a>
                </div>
            </div>
        </div>
    </div>

    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->
    <!--////////////////////////////////////-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    function deleteItem(del_id) {


        $("#error_alert").css("display", "none"); // To hide error
        $("#success_delete_alert").css("display", "none"); // To hide success
        $("#process_alert").css("display", "block"); // To display processing

        $.ajax({
            url: 'ajax/delete_subject.php',
            type: "POST",
            data: {
                id: del_id
            },
            success: function(result) {
                console.log(result);
                if (result == 1) //to check it is deleted
                {
                    var x = document.getElementById("tr_" + del_id);
                    x.remove(); // removes tr from DOM
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#success_delete_alert").css("display", "block"); // To display success
                } else //if not deleted (not returned 1)
                {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#error_alert").css("display", "block"); // To display error
                }
            },
            error: function(result) {
                $("#process_alert").css("display", "none"); // To hide processing
                $("#error_alert").css("display", "block"); // To display error
            }
        });


    }

    function editItem(id) {
        var subject = document.getElementById("name_" + id).textContent;
        var description = document.getElementById("description_" + id).textContent;
        var teacher = document.getElementById("teacher_" + id).textContent;
        var teacher_id = $("#teacher_" + id).attr("class");
        console.log(subject);
        console.log(description);
        console.log(teacher);
        console.log(teacher_id);

        $("#error_alert").css("display", "none"); // To hide error
        $("#success_update_alert").css("display", "none"); // To hide success
        $("#process_alert").css("display", "block"); // To display processing

        $.ajax({
            url: 'ajax/edit_subject.php',
            type: "POST",
            data: {
                id: id,
                subject: subject,
                description: description,
                teacher: teacher,
                teacher_id: teacher_id
            },
            success: function(result) {
                console.log(result);
                if (result == 1) //to check it is deleted
                {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#success_update_alert").css("display", "block"); // To display success
                } else //if not deleted (not returned 1)
                {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#error_alert").css("display", "block"); // To display error
                }
            },
            error: function(result) {
                console.log(result);
                $("#process_alert").css("display", "none"); // To hide processing
                $("#error_alert").css("display", "block"); // To display error
            }
        })

    }

    var teacher_element;

    function changeTeacher(id) {
        teacher_element = "teacher_" + id;
        console.log(teacher_element);
    }

    function changeApply() {
        var id = $("#teacher_select").val();
        var changed_teacher = $('#teacher_select option:selected').text();
        console.log(id);
        console.log(changed_teacher);
        $('#' + teacher_element).text(changed_teacher);
        $('#' + teacher_element).removeClass();
        $('#' + teacher_element).addClass(id);
    }
    </script>

</body>

</html>