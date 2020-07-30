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

  <title>Add Subject</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
        <?php include("includes/topbar.html"); ?>
        <!-- End of Topbar -->
        
        <!-- Begin Page Content -->
        <div class="container-fluid">



        <!--/////////////////////////////////-->
        <!--/////////////////////////////////-->

        <!--Hidden Warning-->
        <div class="alert bg-danger alert-dismissible fade show" id="error_alert" role="alert" style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
        <strong>Oops !</strong> Something Went Wrong !
        </div>
        <!--Hidden Warning-->

        <!--Hidden Processing-->
        <div class="alert bg-info alert-dismissible fade show" id="process_alert" role="alert" style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
        <strong>Processing... </strong> Please Wait !
        </div>
        <!--Hidden Processing-->

        <!--Hidden Delete Success-->
        <div class="alert bg-success alert-dismissible fade show" id="success_alert" role="alert" style="display:none; position:fixed; top:5; right:2vw; z-index:999; color:#ffffff; float:right">
        <strong>Added Successfully !</strong>
        </div>
        <!--Hidden Delete Success-->
        
        <!--/////////////////////////////////-->
        <!--/////////////////////////////////-->



          <div class="d-flex justify-content-center">

            <!--add teacher-->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Subject</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id="subject" placeholder="Subject Name" required>
                      </div>
                      <div class="col">
                      <input type="text" class="form-control" id="description" placeholder="Description ( Eg: 2nd Standard )">
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="form-group col-md-4 col">
                        <label for="teacher">Assign a Teacher</label>
                        <select id="teacher" class="form-control"  required>
                          <option selected value="">Choose a Teacher</option>
                          <?php 
                            $sql_query = "SELECT id, name, department FROM users WHERE who='teacher' OR who='admin' AND ban_status='0'";
                            $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                            while( $row = mysqli_fetch_assoc($resultset) ) { ?>
                            <option value="<?php echo$row['id'];?>"><?php echo$row['name']; echo" ( ".$row['department']." )"; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col">
                        <br>
                      If the teacher is not listed. Please make sure you have added the particular teacher as a user.
                      If you haven't done this, <a href="add_users.php?user=teacher"> Add a teacher now</a>.
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <br>
                        <a href="#" class="btn btn-success btn-icon-split ">
                          <span class="icon text-white-50 bg-gradient-warning ">
                            <i id="LoadBtn" class="fas fa-check"></i>
                          </span> <span class="text">Add</span>
                        </a>
                        &nbsp; &nbsp;<code id="txt"></code>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!--add teacher-->

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
  $('.text').click(function ()
  {
    var subject=document.getElementById('subject').value;
    var description=document.getElementById('description').value;
    var teacher=$('#teacher option:selected').text();
    var teacher_id=document.getElementById('teacher').value;

      if(subject!="" && teacher!="" )
      {
        $("#error_alert").css("display", "none");// To hide error
        $("#success_alert").css("display", "none");// To hide success
        $("#process_alert").css("display", "block");// To display processing
          $.ajax
          ({ 
              url: 'ajax/add-subject.php',
              data: {"subject": subject, "description": description, "teacher": teacher, "teacher_id": teacher_id},
              type: 'post',
              success:function(result){
                console.log(result);
                if(result==1) //to check it is deleted
                {
                  $("#process_alert").css("display", "none");// To hide processing
                  $("#success_alert").css("display", "block");// To display success
                }
                else//if not deleted (not returned 1)
                {
                  $("#process_alert").css("display", "none");// To hide processing
                  $("#error_alert").css("display", "block");// To display error
                }
              },
              error:function(result){
                  console.log(result);
                  $("#process_alert").css("display", "none");// To hide processing
                  $("#error_alert").css("display", "block");// To display error
              }
          });
      }
      else
      {
        $('#txt').text('All Fields are Required');
      }
      

  });
  </script>

</body>

</html>

