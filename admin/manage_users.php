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
        <?php include("./includes/topbar.html"); ?>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Manage users</h1>
          <p class="mb-4">Any change here is directly reflected in the DataBase so be ware when you use this. Not sure what to do <a target="" href="../admin">go back</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="dropdown mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </button>
                    <div id="nav" class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#content1">Student</a>
                      <a class="dropdown-item" href="#content2">Teachers</a>
                      <a class="dropdown-item" href="#content3">admin</a>
                    </div>
                  </div>
            </div>

           
          <div id="content1" class="toggle" style="display:none">

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

                    
                    

                    $sql_query = "SELECT id, name, who, department, email, ban_status FROM users WHERE who='student'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $user = mysqli_fetch_assoc($resultset) ) { ?>
                    <tr id="table<?php echo $user ['id']; ?>" >
                      <td id="<?php echo $user ['id']; ?>" contenteditable="true"><?php echo $user ['id']; ?> </td>  
                      <td id="<?php echo $user ['id']; ?>name" contenteditable="true"><?php echo $user ['name']; ?> </td>
                      <td id="<?php echo $user ['id']; ?>who" contenteditable="true"><?php echo $user ['who']; ?></td>
                      <td id="<?php echo $user ['id']; ?>department" contenteditable="true"><?php echo $user ['department']; ?></td>
                      <td id="<?php echo $user ['id']; ?>email" contenteditable="true"><?php echo $user ['email']; ?></td>
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
                      <td><a id="deleteRef" value="<?php echo $user ['id']; ?>" href="javascript:deleteItem(<?php echo $user ['id']; ?>)" class="fa fa-trash" aria-hidden="true"></a></td>
                      <td><a  href="javascript:editItem(<?php echo $user ['id']; ?>)" class="fas fa-check"></a></td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
         </div>



         <div id="content2" class="toggle" style="display:none">

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

                    
                    

                    $sql_query = "SELECT id, name, who, department, email, ban_status FROM users WHERE who='teacher'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $user = mysqli_fetch_assoc($resultset) ) { ?>
                    <tr id="table<?php echo $user ['id']; ?>" >
                      <td id="<?php echo $user ['id']; ?>" contenteditable="true"><?php echo $user ['id']; ?> </td>  
                      <td id="<?php echo $user ['id']; ?>name" contenteditable="true"><?php echo $user ['name']; ?> </td>
                      <td id="<?php echo $user ['id']; ?>who" contenteditable="true"><?php echo $user ['who']; ?></td>
                      <td id="<?php echo $user ['id']; ?>department" contenteditable="true"><?php echo $user ['department']; ?></td>
                      <td id="<?php echo $user ['id']; ?>email" contenteditable="true"><?php echo $user ['email']; ?></td>
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
                      <td><a id="deleteRef" value="<?php echo $user ['id']; ?>" href="javascript:deleteItem(<?php echo $user ['id']; ?>)" class="fa fa-trash" aria-hidden="true"></a></td>
                      <td><a  href="javascript:editItem(<?php echo $user ['id']; ?>)" class="fas fa-check"></a></td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
         </div>




         <div id="content3" class="toggle" style="display:none">

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

                    
                    

                    $sql_query = "SELECT id, name, who, department, email, ban_status FROM users WHERE who='admin'";
                    $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $user = mysqli_fetch_assoc($resultset) ) { ?>
                    <tr id="table<?php echo $user ['id']; ?>" >
                      <td id="<?php echo $user ['id']; ?>" contenteditable="true"><?php echo $user ['id']; ?> </td>  
                      <td id="<?php echo $user ['id']; ?>name" contenteditable="true"><?php echo $user ['name']; ?> </td>
                      <td id="<?php echo $user ['id']; ?>who" contenteditable="true"><?php echo $user ['who']; ?></td>
                      <td id="<?php echo $user ['id']; ?>department" contenteditable="true"><?php echo $user ['department']; ?></td>
                      <td id="<?php echo $user ['id']; ?>email" contenteditable="true"><?php echo $user ['email']; ?></td>
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
                      <td><a id="deleteRef" value="<?php echo $user ['id']; ?>" href="javascript:deleteItem(<?php echo $user ['id']; ?>)" class="fa fa-trash" aria-hidden="true"></a></td>
                      <td><a  href="javascript:editItem(<?php echo $user ['id']; ?>)" class="fas fa-check"></a></td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


  <script>









$("#nav a").click(function(e){
    e.preventDefault();
    $(".toggle").hide();
    var toShow = $(this).attr('href');
    $(toShow).show();
});



function deleteItem(del_id){
  $('#table'+del_id).remove()

  $.ajax({
    url:'ajax/manage_users.php',
    type:"POST",
    data:{id:del_id},
    success:function(result){
   console.log(result)
    }
  })


}
function editItem(id){
var edit_name=document.getElementById(id+"name").textContent
var edit_who=document.getElementById(id+"who").textContent
var edit_department=document.getElementById(id+"department").textContent
var edit_email=document.getElementById(id+"email").textContent

  $.ajax({
    url:'ajax/manage_users_edit.php',
    type:"POST",
    data:{
      id:id,
      edit_name:edit_name,
      edit_department:edit_department,
      edit_who:edit_who,
      edit_email:edit_email
      
      },
    success:function(result){
   console.log(result)
    }
  })

}

function changeStatus(id,banStatus)
{ 
  if(banStatus==1)
  {
    $('#banStatus'+id).removeClass('btn btn-warning btn-circle').addClass('btn btn-success btn-circle')
$('#banStatus_itag'+id).removeClass('fas fa-exclamation-triangle').addClass('fas fa-check')
  }
  else
  {
    $('#banStatus'+id).removeClass('btn btn-success btn-circle').addClass('btn btn-warning btn-circle')
$('#banStatus_itag'+id).removeClass('fas fa-check').addClass('fas fa-exclamation-triangle')

  }

  
 $.ajax({
    url:'ajax/manage_users_edit.php',
    type:"POST",
    data:{
      id:id,
      banStatus:banStatus,
      process:"change_id"
      
      },
    success:function(result){
   console.log(result)
    }
    
  })


}



  </script>

</body>

</html>

