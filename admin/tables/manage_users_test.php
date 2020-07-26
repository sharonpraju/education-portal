<?php
$connect = mysqli_connect('164.68.110.46:3306', 'delta_x', 'x3v$ANKgwm52gbjz', 'delta_db');
$query = "SELECT id, name, who, department, email, ban_status FROM users";
$result = mysqli_query($connect, $query);
?>
<html>  
<head>  
          <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  

    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">table test</h3><br />  
    <table id="dataTable" class="table table-bordered table-striped">
     <thead>
     <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Department</th>
                      <th>Email</th>
                      <th>Ban</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Department</th>
                      <th>Email</th>
                      <th>Ban</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php 

                    $sql_query = "SELECT id, name, who, department, email, ban_status FROM users";
                    $resultset = mysqli_query($connect, $sql_query) or die("database error:". mysqli_error($conn));
                    while( $user = mysqli_fetch_assoc($resultset) ) { ?>
                    <tr>
                      <td><?php echo $user ['id']; ?> </td>  
                      <td><?php echo $user ['name']; ?> </td>
                      <td><?php echo $user ['who']; ?></td>
                      <td><?php echo $user ['department']; ?></td>
                      <td><?php echo $user ['email']; ?></td>
                      <td><?php echo $user ['ban_status']; ?></td>
                    </tr>
                    <?php } ?>
                    
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#dataTable').Tabledit({
      url:'table_action.php',
      columns:{
       identifier:[0, 'id'],
       editable: [[1, 'name'], [2, 'position'], [3, 'department'], [4, 'email'], [5, 'ban']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>