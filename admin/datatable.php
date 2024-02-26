  
  <?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

  <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['status'])) 
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION["status"]);
                    }
                    ?>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registered User</h3>
                            <a href="#" data-toggle="modal" data-target="#AddUserModal"
                                class="btn btn-primary float-sm-right"> Add
                                User </a>
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
                       // echo $row['firstname'];
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
                                            <a href="create-user-edit.php?user_id=<?php echo $row['id']; ?>"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <button type="button" value="<?php echo $row['id']; ?>"
                                                class="btn btn-danger btn-sm deletebtn ">Delete</button>
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

    <?php include('includes/script.php'); ?>
    <?php include('includes/footer.php'); ?>