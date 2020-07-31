<?php

include("../delta_config.php");
$conn = OpenCon();
include("includes/session.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>




    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Settings</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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








                    <div class="p-5 bg-white rounded shadow mb-5">
                        <!-- Rounded tabs -->
                        <ul id="myTab" role="tablist"
                            class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light border-0 rounded-nav">
                            <li class="nav-item flex-sm-fill">
                                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                    aria-selected="true"
                                    class="nav-link border-0 text-uppercase font-weight-bold active">Request a
                                    Feature</a>
                            </li>
                            <li class="nav-item flex-sm-fill">
                                <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                    aria-selected="false"
                                    class="nav-link border-0 text-uppercase font-weight-bold">FAQs</a>
                            </li>
                            <li class="nav-item flex-sm-fill">
                                <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                    aria-selected="false"
                                    class="nav-link border-0 text-uppercase font-weight-bold">Contact Developers</a>
                            </li>
                            <li class="nav-item flex-sm-fill">
                                <a id="whipe-tab" data-toggle="tab" href="#whipe" role="tab" aria-controls="contact"
                                    aria-selected="false" class="nav-link border-0 text-uppercase font-weight-bold">Wipe
                                    Account</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div id="home" role="tabpanel" aria-labelledby="home-tab"
                                class="tab-pane fade px-4 py-5 show active">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Feature title</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter feature title">
                                        <small id="emailHelp" class="form-text text-muted">Tell us what you want</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Feature details</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Enter details">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                            <div id="profile" role="tabpanel" aria-labelledby="profile-tab"
                                class="tab-pane fade px-4 py-5">
                                <div class="container py-5">

                                    <!-- For demo purpose -->
                                    <div class="row text-center text-muted mb-0">
                                        <div class="col-lg-8 mx-auto">
                                            <h1 class="display-4">FAQs</h1>
                                            <p class="lead mb-0">Answers to Frequently Asked Questions.</p>

                                        </div>
                                    </div><!-- End -->


                                    <div class="row">
                                        <div class="col-lg-7 mx-auto">

                                            <!-- Timeline -->
                                            <hr>

                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>
                                                            <a data-toggle="collapse" data-parent="#accordion"
                                                                href="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne">Intranet Qs <span
                                                                    class="fa fa-caret-down"></span></a>
                                                        </h3>
                                                    </div>

                                                    <div id="collapseOne" class="collapse">
                                                        <div class="card-block">

                                                            <div id="accordG1">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4><a data-toggle="collapse"
                                                                                data-parent="#accordG1"
                                                                                href="#collapse1">Question #1</a></h4>
                                                                    </div>
                                                                    <div id="collapse1" class="collapse">
                                                                        <div class="card-block">
                                                                            <p class="card-text">Answer #1</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4><a data-toggle="collapse"
                                                                                data-parent="#accordG1"
                                                                                href="#collapse2">Question #2</a></h4>
                                                                    </div>
                                                                    <div id="collapse2" class="collapse">
                                                                        <div class="card-block">
                                                                            <p class="card-text">Answer #2</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3><a data-toggle="collapse" data-parent="#accordion"
                                                                href="#collapseT">Support Teams <span
                                                                    class="fa fa-caret-down"></a></span></h3>
                                                    </div>
                                                    <div id="collapseT" class="collapse">
                                                        <div class="card-block">

                                                            <div id="accordion1">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4><a data-toggle="collapse"
                                                                                data-parent="#accordion1"
                                                                                href="#collapseTeam">Team #1</a></h4>
                                                                    </div>
                                                                    <div id="collapseTeam" class="collapse">
                                                                        <div class="card-block">

                                                                            <div id="accordion2">
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <h4><a data-toggle="collapse"
                                                                                                data-parent="#accordion2"
                                                                                                href="#collapseThreeOne">Question
                                                                                                #1</a></h4>
                                                                                    </div>
                                                                                    <div id="collapseThreeOne"
                                                                                        class="collapse in">
                                                                                        <div class="card-block">
                                                                                            <p class="card-text">Answer
                                                                                                #1</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <h4><a data-toggle="collapse"
                                                                                                data-parent="#accordion2"
                                                                                                href="#collapseThreeTwo">Question
                                                                                                #2</a></h4>
                                                                                    </div>
                                                                                    <div id="collapseThreeTwo"
                                                                                        class="collapse">
                                                                                        <div class="card-block">
                                                                                            <p class="card-text">Answer
                                                                                                #2</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4><a data-toggle="collapse"
                                                                                data-parent="#accordion1"
                                                                                href="#collapseT22">Team #2</a></h4>
                                                                    </div>

                                                                    <div id="collapseT22" class="collapse">
                                                                        <div class="card-block">

                                                                            <div id="accordionT22">
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <h4><a data-toggle="collapse"
                                                                                                data-parent="#accordionT22"
                                                                                                href="#collapseT221">Question
                                                                                                #1</a></h4>
                                                                                    </div>
                                                                                    <div id="collapseT221"
                                                                                        class="collapse in">
                                                                                        <div class="card-block">
                                                                                            <p class="card-text">Answer
                                                                                                #1</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        <h4><a data-toggle="collapse"
                                                                                                data-parent="#accordionT22"
                                                                                                href="#collapseT222">Question
                                                                                                #2</a></h4>
                                                                                    </div>
                                                                                    <div id="collapseT222"
                                                                                        class="collapse">
                                                                                        <div class="card-block">
                                                                                            <p class="card-text">Answer
                                                                                                #2</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contact" role="tabpanel" aria-labelledby="contact-tab"
                                class="tab-pane fade px-4 py-5">
                                <!--Section: Contact v.2-->
                                <section class="mb-4">

                                    <!--Section heading-->
                                    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                                    <!--Section description-->
                                    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please
                                        do not hesitate to contact us directly. Our team will come back to you within
                                        a matter of hours to help you.</p>

                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-9 mb-md-0 mb-5">
                                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                                <!--Grid row-->
                                                <div class="row">

                                                    <!--Grid column-->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="name" name="name"
                                                                class="form-control">
                                                            <label for="name" class="">Your name</label>
                                                        </div>
                                                    </div>
                                                    <!--Grid column-->

                                                    <!--Grid column-->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="email" name="email"
                                                                class="form-control">
                                                            <label for="email" class="">Your email</label>
                                                        </div>
                                                    </div>
                                                    <!--Grid column-->

                                                </div>
                                                <!--Grid row-->

                                                <!--Grid row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="subject" name="subject"
                                                                class="form-control">
                                                            <label for="subject" class="">Subject</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Grid row-->

                                                <!--Grid row-->
                                                <div class="row">

                                                    <!--Grid column-->
                                                    <div class="col-md-12">

                                                        <div class="md-form">
                                                            <textarea type="text" id="message" name="message" rows="2"
                                                                class="form-control md-textarea"></textarea>
                                                            <label for="message">Your message</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--Grid row-->

                                            </form>

                                            <div class="text-center text-md-left">
                                                <a class="btn btn-primary text-white"
                                                    onclick="document.getElementById('contact-form').submit();">Send</a>
                                            </div>
                                            <div class="status"></div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-3 text-center">
                                            <ul class="list-unstyled mb-0">
                                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                                    <p>San Francisco, CA 94126, USA</p>
                                                </li>

                                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                                    <p>+ 01 234 567 89</p>
                                                </li>

                                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                                    <p>contact@mdbootstrap.com</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--Grid column-->

                                    </div>

                                </section>
                                <!--Section: Contact v.2-->
                            </div>
                            <div id="whipe" role="tabpanel" aria-labelledby="whipe-tab" class="tab-pane fade px-4 py-5">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Department</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Delete</th>
                                                    <th>Save</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Department</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Delete</th>
                                                    <th>Save</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php 

                    
                    

                    $sql_query = "SELECT id, name, who, department, email, ban_status FROM users WHERE who = 'admin'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $user = mysqli_fetch_assoc($resultset) ) { ?>
                                                <tr id="table<?php echo $user ['id']; ?>">
                                                    <td id="<?php echo $user ['id']; ?>" contenteditable="true">
                                                        <?php echo $user ['id']; ?> </td>
                                                    <td id="<?php echo $user ['id']; ?>name" contenteditable="true">
                                                        <?php echo $user ['name']; ?> </td>
                                                    <td id="<?php echo $user ['id']; ?>who" contenteditable="true">
                                                        <?php echo $user ['who']; ?></td>
                                                    <td id="<?php echo $user ['id']; ?>department"
                                                        contenteditable="true">
                                                        <?php echo $user ['department']; ?></td>
                                                    <td id="<?php echo $user ['id']; ?>email" contenteditable="true">
                                                        <?php echo $user ['email']; ?></td>
                                                    <td id="<?php echo $user ['id']; ?>status" onclick=""><?php 
                      
                      if( $user ['ban_status'] == 1)
                      {
                        echo '<a id="banStatus'.$user['id'].'" value="banned" href="javascript:changeStatus('.$user['id'].','.$user['ban_status'].')" class="btn btn-warning btn-circle" >
                        <i id="banStatus_itag'.$user['id'].'" class="fas fa-exclamation-triangle"></i>
                      </a>';
                    
                    
                    }
                      if( $user ['ban_status'] == 0 ){
                        echo '<a id="banStatus'.$user['id'].'" value="not_banned" href="javascript:changeStatus('.$user['id'].','.$user['ban_status'].')" class="btn btn-success btn-circle">
                        <i id="banStatus_itag'.$user['id'].'" class="fas fa-check"></i>
                      </a>';} 
                      
                      
                      ?></td>
                                                    <td><a id="deleteRef" value="<?php echo $user ['id']; ?>"
                                                            href="javascript:deleteItem(<?php echo $user ['id']; ?>)"
                                                            class="fa fa-trash" aria-hidden="true"></a></td>
                                                    <td><a href="javascript:editItem(<?php echo $user ['id']; ?>)"
                                                            class="fas fa-check"></a></td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End rounded tabs -->
                    </div>










                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


                <?php include("includes/footer.html"); ?>


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script>
        $("#nav a").click(function(e) {
            e.preventDefault();
            $(".toggle").hide();
            var toShow = $(this).attr('href');
            $(toShow).show();
        });



        function deleteItem(del_id) {
            $('#table' + del_id).remove()

            $.ajax({
                url: 'ajax/manage_users.php',
                type: "POST",
                data: {
                    id: del_id
                },
                success: function(result) {
                    console.log(result)
                }
            })


        }

        function editItem(id) {
            var edit_name = document.getElementById(id + "name").textContent
            var edit_who = document.getElementById(id + "who").textContent
            var edit_department = document.getElementById(id + "department").textContent
            var edit_email = document.getElementById(id + "email").textContent

            $.ajax({
                url: 'ajax/manage_users_edit.php',
                type: "POST",
                data: {
                    id: id,
                    edit_name: edit_name,
                    edit_department: edit_department,
                    edit_who: edit_who,
                    edit_email: edit_email

                },
                success: function(result) {
                    console.log(result)
                }
            })

        }

        function changeStatus(id, banStatus) {
            if (banStatus == 1) {
                $('#banStatus' + id).removeClass('btn btn-warning btn-circle').addClass('btn btn-success btn-circle')
                $('#banStatus_itag' + id).removeClass('fas fa-exclamation-triangle').addClass('fas fa-check')
            } else {
                $('#banStatus' + id).removeClass('btn btn-success btn-circle').addClass('btn btn-warning btn-circle')
                $('#banStatus_itag' + id).removeClass('fas fa-check').addClass('fas fa-exclamation-triangle')

            }


            $.ajax({
                url: 'ajax/manage_users_edit.php',
                type: "POST",
                data: {
                    id: id,
                    banStatus: banStatus,
                    process: "change_id"

                },
                success: function(result) {
                    console.log(result)
                }

            })


        }
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>