<!DOCTYPE html>
<html lang="en">
<!-- git test -->

<head>
    <?php 
 include("includes/session.php");
 include("../delta_config.php");

 function profile_list($id)
{
  $conn = OpenCon();
  $sql = "SELECT * FROM users where id=? ";
   // SQL with parameters
  $stmt = $conn->prepare($sql); 
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  $data = $result->fetch_assoc(); // fetch data
  return $data;
  CloseCon($conn);
}

   
  $id = $_SESSION['admin'];
  $data = profile_list($id);
  
  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet" type="text/css">

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
                        <strong>Oops !</strong> Something Went Wrong !
                    </div>
                    <!--Hidden Warning-->

                    <!--Hidden Processing-->
                    <div class="alert bg-info alert-dismissible fade show" id="process_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Processing... </strong> Please Wait !
                    </div>
                    <!--Hidden Processing-->

                    <!--Hidden Delete Success-->
                    <div class="alert bg-success alert-dismissible fade show" id="success_alert" role="alert"
                        style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
                        <strong>Updated Successfully !<br> Reload the page to see changes.</strong>
                    </div>
                    <!--Hidden Delete Success-->

                    <!--/////////////////////////////////-->
                    <!--/////////////////////////////////-->


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="profile-card-4 z-depth-3">
                                    <div class="card">
                                        <div class="card-body text-center bg-primary rounded-top">
                                            <div class="user-box">
                                                <img src='./img/profile/<?php echo $data['profile_url'];?>'
                                                    alt="user avatar">
                                            </div>
                                            <h5 class="mb-1 text-white"><?php echo $data['name'];?></h5>
                                            <h6 class="text-light"><?php echo $data['who'];?></h6>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group shadow-none">
                                                <li class="list-group-item">
                                                    <div class="list-icon">
                                                        <i class="fa fa-phone-square"></i>
                                                    </div>
                                                    <div class="list-details">
                                                        <span><?php echo $data['phone'];?></span>
                                                        <small>Mobile Number</small>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="list-icon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <div class="list-details">
                                                        <span><?php echo $data['email'];?></span>
                                                        <small>Email Address</small>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="list-icon">
                                                        <i class="fa fa-book"></i>
                                                    </div>
                                                    <div class="list-details">
                                                        <span><?php echo $data['department'];?></span>
                                                        <small>Depatment</small>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="row text-center mt-4">
                                                <div class="col p-2">
                                                    <h4 class="mb-1 line-height-5">154</h4>
                                                    <small class="mb-0 font-weight-bold">Projects</small>
                                                </div>
                                                <div class="col p-2">
                                                    <h4 class="mb-1 line-height-5">2.2k</h4>
                                                    <small class="mb-0 font-weight-bold">Followers</small>
                                                </div>
                                                <div class="col p-2">
                                                    <h4 class="mb-1 line-height-5">9.1k</h4>
                                                    <small class="mb-0 font-weight-bold">Views</small>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="card-footer text-center">
                 <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
                 <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
                 <a href="javascript:void()" class="list-inline-item btn-social btn-behance waves-effect waves-light"><i class="fa fa-behance"></i></a>
                 <a href="javascript:void()" class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i class="fa fa-dribbble"></i></a>
               </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card z-depth-3">
                                    <div class="card-body">
                                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#profile" data-toggle="pill"
                                                    class="nav-link active show"><i class="icon-user"></i> <span
                                                        class="hidden-xs">Profile</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#messages" data-toggle="pill"
                                                    class="nav-link"><i class="icon-envelope-open"></i> <span
                                                        class="hidden-xs">Messages</span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void();" data-target="#edit" data-toggle="pill"
                                                    class="nav-link"><i class="icon-note"></i> <span
                                                        class="hidden-xs">Edit</span></a>
                                            </li>
                                        </ul>

                                        <div class="tab-content p-3">
                                            <div class="tab-pane active show" id="profile">
                                                <h5 class="mb-3">User Profile</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6><?php echo $data['name'];?></h6>
                                                        <p>
                                                            <?php echo $data['email'];?>
                                                        </p>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Todays Tasks</h6>

                                                        <span class="badge badge-primary"><i class="fa fa-book"></i> 900
                                                            Total </span>
                                                        <span class="badge badge-success"><i class="fa fa-cog"></i> 43
                                                            Completed </span>
                                                        <span class="badge badge-danger"><i class="fa fa-eye"></i> 245
                                                            Pending </span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h5 class="mt-2 mb-3"><span
                                                                class="fa fa-clock-o ion-clock float-right"></span>
                                                            Recent Activity</h5>
                                                        <table class="table table-hover table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Abby</strong> joined ACME Project Team
                                                                        in <strong>`Collaboration`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Gary</strong> deleted My Board1 in
                                                                        <strong>`Discussions`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Kensington</strong> deleted MyBoard3 in
                                                                        <strong>`Discussions`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>John</strong> deleted My Board1 in
                                                                        <strong>`Discussions`</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Skell</strong> deleted his post Look at
                                                                        Why this is.. in <strong>`Discussions`</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </div>
                                            <div class="tab-pane" id="messages">
                                                <div class="alert alert-info alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <div class="alert-icon">
                                                        <i class="icon-info"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Info!</strong> Lorem Ipsum is simply dummy
                                                            text.</span>
                                                    </div>
                                                </div>
                                                <table class="table table-hover table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <span class="float-right font-weight-bold">3 hrs
                                                                    ago</span> Here is your a link to the latest summary
                                                                report from the..
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span
                                                                    class="float-right font-weight-bold">Yesterday</span>
                                                                There has been a request on your account since that
                                                                was..
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="float-right font-weight-bold">9/10</span>
                                                                Porttitor vitae ultrices quis, dapibus id dolor. Morbi
                                                                venenatis lacinia rhoncus.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="float-right font-weight-bold">9/4</span>
                                                                Vestibulum tincidunt ullamcorper eros eget luctus.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span class="float-right font-weight-bold">9/4</span>
                                                                Maxamillion ais the fix for tibulum tincidunt
                                                                ullamcorper eros.
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="tab-pane" id="edit">
                                                <form id="data" action="../delta_process.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label">Name</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='name' type="text"
                                                                value="<?php echo $data['name'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label form-control-label">Change
                                                            Image</label>
                                                        <label for="fileUpload"
                                                            class="col-lg-5 file-upload btn btn-secondary btn-block btn-x"><i
                                                                class="fa fa-upload mr-2"></i>Upload Image
                                                            <input class="form-control" id="fileUpload"
                                                                name='fileToUpload' type="file">
                                                        </label> &nbsp; ( Optional )
                                                    </div>
                                                    <input name="process" value="profile_edit" hidden readonly>

                                                    <small><b>Department can be changed only from 'Manage Users'
                                                            page<br>&nbsp;</b></small>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label">Department</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='department' type="text"
                                                                value="<?php echo $data['department'];?>" readonly
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label">Phone</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='phone' type="text"
                                                                value="<?php echo $data['phone'];?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label">Email</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='email' type="email"
                                                                value="<?php echo $data['email'];?>" required>
                                                        </div>
                                                    </div>
                                                    <small><b>Leave the password field blank if you don't need to change
                                                            the password<br>&nbsp;</b></small>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label">Current
                                                            Password</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='password' type="password"
                                                                placeholder="Enter Current Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label form-control-label">New
                                                            Password</label>
                                                        <div class="col-lg-7">
                                                            <input class="form-control" name='new_password'
                                                                type="password" placeholder="Enter New Password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-lg-4 col-form-label form-control-label"></label>
                                                        <div class="col-lg-7">
                                                            <input type="submit" class="btn btn-primary"
                                                                value="Save Changes">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("includes/footer.html"); ?>
            <!-- Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



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

    <script>
    $("form#data").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $("#error_alert").html("<strong>Oops!</strong> Something Went Wrong !");

        $("#error_alert").css("display", "none"); // To hide error
        $("#success_alert").css("display", "none"); // To hide success
        $("#process_alert").css("display", "block"); // To display processing

        $.ajax({
            url: $("form#data").prop("action"),
            type: 'POST',
            data: formData,
            success: function(data) {
                console.log(data);

                if (data == 1) //to check it is deleted
                {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#success_alert").css("display", "block"); // To display success
                } else if (data.length > 250) {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#error_alert").css("display", "block"); // To display error
                } else //if not deleted (not returned 1)
                {
                    $("#process_alert").css("display", "none"); // To hide processing
                    $("#error_alert").html(data);
                    $("#error_alert").css("display", "block"); // To display error
                }
            },
            error: function(data) {
                console.log(data);
                $("#process_alert").css("display", "none"); // To hide processing
                $("#error_alert").css("display", "block"); // To display error
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    </script>

</body>

</html>