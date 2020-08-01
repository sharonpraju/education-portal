<!DOCTYPE html>
<html lang="en">
 <!-- git test --> 
<head>



<?php 
 include("includes/session.php");?>



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
#roundSelection{
    height:200px;
    width:280px;
}
#fileToUpload
{
    margin-left:90px;
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
        <?php include("includes/topbar.php"); ?>
        <!-- End of Topbar -->




        <!-- Begin Page Content -->
        <div class="container-fluid">
        

        
        
      
 
      <center>   <div class="col-lg-6">
          <div class="card position-relative">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Send Notification</h4>
            </div>
            <div class="card-body">  
              <div class="mb-3">
                <code id="PasswordError"><center> <input type="file" name="fileToUpload" id="fileToUpload"></center></code>
              </div> <div id="message" class="block">Name:<textarea id="roundSelection"  ></textarea>
                <form id="type_people">
                    <input type="radio" id="All" name="gender" value="all">
                    <label for="other">All</label>
                    <input type="radio" id="Admin" name="gender" value="admin">
                    <label for="male">Admin</label>
                    <input type="radio" id="Teacher" name="gender" value="teachers">
                    <label for="female">Teachers</label>
                    <input type="radio" id="Students" name="gender" value="students">
                    <label for="other">Students</label>
                </form>
           <!--   <form id="department_drop">
                <label for="cars">Department:</label>
                <select id="Department" name="cars">
                  <option value="CSE">CSE</option>
                  <option value="EEE">EEE</option>
                </form>
                </select>-->
            
              </form> <br> 
              <a href="#" class="btn btn-success btn-icon-split ">
                <span class="icon text-white-50 bg-gradient-warning ">
                 <!--Wile Loading Change  it to <i class="fa fa-circle-o-notch fa-spin"></i> --> <i id="LoadBtn" class="fas fa-check"></i>
                </span>
               
                <span id="cleanChecker" class="text" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal1">Add</span> <!---->
              </a>
                  </li>
                </ul>
              </nav>
              
            </div>
          </div>
        </div></center>  
        
        
        <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">asd?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are You Sure you Want to send Notification?<br>
                  <input type="checkbox" id="noticeCheck" name="vehicle1" value="Bike">
                  <label for="vehicle1"> Check this Box if this is a Notice</label><br>


                </div>
                <center><code id="finalResult"><h4></h4></code></center>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" id="sendSubmit" ><font color="white">Send Notification</font></a>
                </div>
            </div>
        </div>
    </div>
      
        
    
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
<script>
  $('#cleanChecker').click(function(){
    $('#finalResult').text(" ")
  })
var importantNotice=0
    $('#department_drop').hide()
    $('#Students').click(function()
    {
        $('#department_drop').show() 
    })
    $('#Admin').click(function()
    {
        $('#department_drop').hide() 
    })
    $('#Teacher').click(function()
    {
        $('#department_drop').show() 
    })

    $('#sendSubmit').click(function(){
     
      var remember = document.getElementById('noticeCheck');
     
var message=document.getElementById('roundSelection').value
var towhom = $("input[type='radio']:checked").val();

if(remember.checked)
{
  importantNotice=1
}
$.ajax({
  url:'./ajax/add_notification.php',
  type:'POST',
  data:{
    message:message,towhom:towhom,importantNotice:importantNotice
  },
  success:function(result)
  {
$('#finalResult').text(result)
  }
})
    


    })
    </script>
<!--Ajax Query for Adding Teacher-->


</html>
