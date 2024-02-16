<?php
session_start();
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">first name*</label>
                                <input type="text" name="firstname" class="form-control" placeholder="first Name" required>
                            </div>

                            <div class="form-group">
                                <label for="">last name*</label>
                                <input type="text" name="lastname" class="form-control" placeholder="last Name" required>
                            </div>

                            <!--   <div class="form-group">
                            <label for="">Address</label>
                            <textarea id="address" name="address" rows="4" cols="50">

                           </textarea>
                        </div> -->

                            <div class="form-group">
                                <label for="">city*</label>
                                <input type="text" name="city" class="form-control" placeholder="city" required>
                            </div>

                            <div class="form-group">
                                <label for="">state*</label>
                                <input type="text" name="state" class="form-control" placeholder="state" required>
                            </div>

                            <!--  <div class="form-group">
                            <label for="">Country*</label>
                           <select class="selectpicker countrypicker" data-flag="true" data-default="NO"></select> 

                        </div> -->

                            <div class="form-group">
                                <label for="">email*</label>
                                <input type="email" name="email" class="form-control" placeholder="email" required>
                            </div>

                            <!--   <div class="form-group">
                            <label for="">Gender*</label>
                            <input type="text" class="form-control" placeholder="gender">
                        </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">password*</label>
                                        <input type="password" name="password" class="form-control" placeholder="password" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">confirm password*</label>
                                        <input type="password" name="confirmpassword" class="form-control" placeholder="confirm password" required>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">user image*</label>
                                <input type="file" name="userimage" id="fileToUpload" required>
                                <!-- <input type="submit" value="Upload Image" name="submit"> -->
                            </div>



                            <!--  <div class="form-group">
                                    <label for="">Date of birth</label>
                                    <input type="date" class="form-control" placeholder="date of birth">
                                </div> -->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addUser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete User -->
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

    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

                <div class="col-sm-12">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Create users </li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>

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
                                        <td><?php echo $row['userimage']; ?></td>
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

</div>


<?php
include('includes/script.php'); ?>
<script>
$(document).ready(function() {
    $('.deletebtn').click(function(e) {
        e.preventDefault();

        var user_id = $(this).val();
        //console.log(user_id);
        $('.delete_user_id').val(user_id);
        $('#DeletModal').modal('show');
    });
});
</script>

<?php
include('includes/footer.php'); ?>