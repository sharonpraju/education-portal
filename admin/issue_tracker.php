<?php

include("../delta_config.php");
$conn = OpenCon();

?>

<!DOCTYPE html>
<html lang="en">

<head>


<?php 
  include("includes/session.php"); ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Manage Users</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="jquery.tabledit.min.js"></script>
  

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        <div class="container-fluid">

   

                <!-- Donut Chart -->
           
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ratio</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                
                </div>
              </div>
            </div>
          </div>

        <!-- /.container-fluid -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"   >Track Issues</h1>
          <p class="mb-4">Issues Raised by the students and the teachers appears here</p>

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
                      <th>id</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Details</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Mark Fixed</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Details</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Mark Fixed</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 
                    $fixedcount=0;
                    $notfixedcount=0;
                    
                    

        $sql_query = "SELECT * FROM issue_tracker ";;
        $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
        while( $issue = mysqli_fetch_assoc($resultset) ) { ?>           
         <tr id="table15" role="row" class="odd">
          <td id="15"  class="sorting_1"><?php echo $issue ['id']; ?></td>  
          <td id="15name" ><?php echo $issue ['issue_username']; ?></td>
          <td id="15who" ><?php echo $issue ['issue_type']; ?></td>
          <td id="15department" ><?php echo $issue ['issue_title']; ?></td>
          <td id="15email" ><?php echo $issue ['issue_statement']; ?></td>
          <td   id="15email" ><?php echo $issue ['issue_date']; ?></td><?php 

                      ?></td>
                     <td   id="fixstatus<?php echo $issue ['id']; ?>" ><?php 
                     if($issue ['issue_status']==1)
                     {
                        echo "<i id='notfixedicon".$issue['id']."' class='fa fa-exclamation-triangle' aria-hidden='true'></i>"; 
                        $notfixedcount=$notfixedcount+1;
                     }
                     else
                     {
                         
                         echo "<font color='green'><i id='fixedicon".$issue['id']."' class='fa fa-check' aria-hidden='true'></i></font>";
                         $fixedcount= $fixedcount+1;
                     }
                      ?></td>
                      <?php
                       if($issue ['issue_status']!=1)
                       { ?>
                        <td>Fixed Already</td>
                       <?php } else {?>
                 <td><a  href="javascript:fixIssue(<?php echo $issue ['id']; ?>)" class="fas fa-check"></a></td>
                       <?php } ?>
                </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
                <input type="hidden" id="fixedcount" value="<?php echo $fixedcount; ?>">
                <input type="hidden" id="notfixedcount" value="<?php echo $notfixedcount; ?>">
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>



  <script>
      var fix=document.getElementById('fixedcount').value
      var open=document.getElementById('notfixedcount').value
     Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Open", "Fixed"],
    datasets: [{
      data: [open, fix],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

      function fixIssue(id)
      {
      $.ajax({
          url:'./ajax/issue_tracker.php',
          type:"post",
          data:{id},
          success:function(result){
            $('#notfixedicon'+id).removeClass('fa fa-exclamation-triangle').addClass('fa fa-check').css("color", "green");

          }
      })
      }
      </script>

</body>

</html>

