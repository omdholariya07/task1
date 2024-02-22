<?php
include('authentication.php');
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
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">first name*</label>
                                <input type="text" name="firstname" class="form-control" placeholder="first Name"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="">last name*</label>
                                <input type="text" name="lastname" class="form-control" placeholder="last Name"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" rows="4" cols="50">

                           </textarea>
                            </div>

                            <div class="form-group">
                                <label for="">city*</label>
                                <input type="text" name="city" class="form-control" placeholder="city" required>
                            </div>

                         

                            <div class="form-group">
                                <label for="">state*</label>
                                <select id="stateSelect" name="state" class="state-select" style="width: 100%">
                                    <?php        
                                                $states = ["New York", "California", "Texas", "Florida", "Illinois"];
                                                foreach ($states as $state) {
                                                $value = str_replace(' ', '', $state);
                                                echo '<option value="' . $value . '">' . $state . '</option>';
                                                }
                                                ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select id="country" name="country" class="form-control" required>
                                    <?php
                                
                                $countries = array("USA", "India", "UK", "Australia", "Germany");

                                  foreach ($countries as $country) {
                                 echo '<option value="' . $country . '">' . $country . '</option>';
                               }
                                ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="">email*</label>
                                <span class="email_error text-danger ml-2"></span>
                                <input type="email" name="email" class="form-control email_id" placeholder="email"
                                    required>
                            </div>

                            <div class="form-group">
                                <label> gender* </label> <br>
                                <input type="radio" name="gender" value="male" required> Male
                                <input type="radio" name="gender" value="female" required> Female
                            </div>

                            <!--   <div class="form-group">
                            <label for="">Gender*</label>
                            <input type="text" class="form-control" placeholder="gender">
                        </div> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">password*</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="password" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">confirm password*</label>
                                        <input type="password" name="confirmpassword" class="form-control"
                                            placeholder="confirm password" required>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">user image*</label>
                                <input type="file" name="userimage" >
                               
                            </div>



                            <div class="form-group">
                                <label for="Dob">Date of birth</label>
                                <input type="text" name="Dob" id="my_date_picker">
                            </div>

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

</div>


<?php
include('includes/script.php'); ?>



<script>
$(document).ready(function() {

    $('.email_id').keyup(function(e) {
        var email = $('.email_id').val();
        //console.log(email);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'check_Emailbtn': 1,
                'email': email,
            },
            success: function(response) {
                //console.log(response);
                $('.email_error').text(response);
            }
        });
    });
});
</script>

<script>
    $(document).ready(function() {
    });
    $('.deletebtn').click(function(e) {
                e.preventDefault();

        var user_id = $(this).val();
        //console.log(user_id);
        $('.delete_user_id').val(user_id);
        $('#DeletModal').modal('show');
    });
</script>

<script>
$(function() {
    $("#my_date_picker").datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: "2019-09-24"
    });
});
</script>

<script>
$(document).ready(function() {
});
    // Initialize Select2
    $('#stateSelect').select2({
        placeholder: "Select a state",
        allowClear: true
    });

</script>

<?php include('includes/footer.php'); ?>