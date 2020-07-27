<!DOCTYPE html>
<html lang="en">
 <!-- git test --> 
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
.block{

  display: inline-table;
  width: 150px;
  padding: 3px;
}
.drop_pos
{
  padding-top: 80px;
}
#department_drop{
  margin-top: 15px;
}
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">




    <!-- Sidebar -->
    
    <?php include("./includes/sidebar.html"); ?>

    <!-- End of Sidebar -->





    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">




        <!-- Topbar -->
        <?php include("./includes/topbar.html"); ?>
        <!-- End of Topbar -->




        <!-- Begin Page Content -->
        <div class="container-fluid">
        

        <?php

        ///$user ="admin";
        if($_GET['user']=="teacher")
        {
          echo ' <center>   <div class="col-lg-6">
          <div class="card position-relative">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Add New Teacher</h4>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <code id="PasswordError"></code>
              </div>    <div class="block">Name:<input id="teacherName" value="" maxlength="25" type="text" class="input-res"></div>
              <div class="block">Email:<input id="teacherEmail" value="" maxlength="25" type="text" class="input-res"></div>
              <div class="block">Password:<input id="teacherPassword" value="" maxlength="15" type="text" class="input-res"></div>
              <div class="block">Confirm:<input id="teacherPasswordConfirm" value="" maxlength="15" type="text" class="input-res"></div><br>
              <form id="department_drop">
                <label for="department">Department:</label>
                <select id="department" name="cars">
                  <option value="CSE">CSE</option>
                  <option value="CSE">CSE</option>
                
                </select>
            
              </form>
              <a href="#" class="btn btn-success btn-icon-split ">
                <span class="icon text-white-50 bg-gradient-warning ">
                 <!--Wile Loading Change  it to <i class="fa fa-circle-o-notch fa-spin"></i> --> <i id="LoadBtn" class="fas fa-check"></i>
                </span>
                <span class="text">Add</span>
              </a>
                  </li>
                </ul>
              </nav>
              
            </div>
          </div>
        </div></center>  ';
        
        }
        
      
 
        if($_GET['user']=="student")

        {
          echo ' <center>   <div class="col-lg-6">
          <div class="card position-relative">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Add New Student</h4>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <code id="PasswordError"></code>
              </div>    <div class="block">Name:<input id="teacherName" value="" maxlength="25" type="text" class="input-res"></div>
              <div class="block">Email:<input id="teacherEmail" value="" maxlength="25" type="text" class="input-res"></div>
              <div class="block">Password:<input id="teacherPassword" value="" maxlength="15" type="password" class="input-res"></div>
              <div class="block">Confirm:<input id="teacherPasswordConfirm" value="" maxlength="15" type="password" class="input-res"></div><br>
              <form id="department_drop">
                <label for="cars">Department:</label>
                <select id="cars" name="cars">
                  <option value="CSE">CSE</option>
                
                </select>
            
              </form>
              <a href="#" class="btn btn-success btn-icon-split ">
                <span class="icon text-white-50 bg-gradient-warning ">
                 <!--Wile Loading Change  it to <i class="fa fa-circle-o-notch fa-spin"></i> --> <i id="LoadBtn" class="fas fa-check"></i>
                </span>
                <span class="text">Add</span>
              </a>
                  </li>
                </ul>
              </nav>
              
            </div>
          </div>
        </div></center>  ';
        
        
        
        }
        
        ?>  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

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

</body>
<!--Ajax Query for Adding Teacher-->
<script>
  $('.text').click(function ()
  {
    $('#PasswordError').text("")
    var password=document.getElementById('teacherPassword').value;
    var confirmPass=document.getElementById('teacherPasswordConfirm').value;
    var teacherEmail=document.getElementById('teacherEmail').value
    var teacherName=document.getElementById('teacherName').value
    var department=document.getElementById('department').value
    if(password==confirmPass)

    {
      console.log()
      if(teacherEmail!="" && teacherName!="" )
      {
        $.ajax(
      {
        url:"./ajax/add_users.php",
        type:"POST",

        data:
        {
          teacherName:teacherName,
          teacherEmail:teacherEmail,
          teacherPassword:password,
          position:"teacher",
          teacher_department:department

          },
          success:function(result)
          {
           $('#PasswordError').text(result)
           
          }
      }

    ),
    $('#LoadBtn').removeClass('fas fa-check').addClass('fa fa-circle-o-notch fa-spin')
    setTimeout(function () {
      //If true
            $('#LoadBtn').removeClass('fa fa-circle-o-notch fa-spin').addClass('fas fa-check');
        }, 2000);
        //if error change button "bg-gradient-warning "
      }
      else
      {
        $('#PasswordError').text('All Fields are Required')
      }
     
      } else
      {
        $('#PasswordError').text('Passwords Must Match')
      }
      

  })
  </script>

</html>