  <?php

include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
  <div class="modal fade" id="DeletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <form action="code.php" method="POST">
                  <div class="modal-body">
                      <input type="hidden" name="delete_id" class="delete_user_id">
                      <p>
                          Are you sure, you want to delete this data ?
                      </p>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes, Delete.!</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class="content-wrapper">

      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <?php
                    if (isset($_SESSION['status'])) 
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";    
                        unset($_SESSION["status"]);
                    }
                    ?>

                      <div class="card card-info">
                          <div class="card-header">
                              <h3 class="card-title">Register User</h3>
                          </div>
                      </div>
                      <!-- /.card-header-->
                      <div class="card-body">

                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>User Image</th>
                                      <th>Name of User</th>
                                      <th>City</th>
                                      <th>State</th>
                                      <th>Email Address</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                    $query = "SELECT * FROM user";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 2)
                    {
                     foreach($query_run as $row)
                     {
                      
                       ?>
                                  <tr>
                                      <td><?php echo $row['id']; ?></td>
                                      <?php  echo '<td><img src="' . $row['userimage'] . '" alt="User Image" style="width:50px;height:50px;"></td>';?>

                                      <td><?php echo $row['firstname']; ?>
                                          <?php echo $row['lastname']; ?> </td>
                                      <td><?php echo $row['city']; ?></td>
                                      <td><?php echo $row['state']; ?></td>
                                      <td><?php echo $row['email']; ?></td>
                                      <td>
                                
                                          <a href="user-profile.php?user_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i> View
                                                </a>

                                          <a href="create-user-edit.php?user_id=<?php echo $row['id']; ?>"
                                              class="btn btn-info btn-sm">
                                              <i class="fas fa-pencil-alt"></i> Edit
                                          </a>

                                          <button type="button" value="<?php echo $row['id']; ?>"
                                              class="btn btn-danger btn-sm deletebtn ">
                                              <i class="fas fa-trash"></i> Delete
                                          </button>

                                      </td>
                                  </tr>
                                  <?php

                     }
                    }
                    else
                    {
                     ?>
                                  <tr>
                                      <td>No record found</td>
                                  </tr>
                                  <?php
                    }
                    ?>

                              </tbody>  
                          </table>
                      </div>
                  </div>
              </div>
          </div>
        </div>
     </section>
  </div>

  <?php include('includes/script.php'); ?>


  <script>
$(document).ready(function() {});
$('.deletebtn').click(function(e) {
    e.preventDefault();

    var user_id = $(this).val();
    $('.delete_user_id').val(user_id);
    $('#DeletModal').modal('show');
});
  </script>

  <?php include('includes/footer.php'); ?>