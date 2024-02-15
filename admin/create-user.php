<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
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
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">First Name*</label>
                            <input type="text" class="form-control" placeholder="first Name">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name*</label>
                            <input type="text" class="form-control" placeholder="last Name">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea id="address" name="address" rows="4" cols="50">

                           </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">City*</label>
                            <input type="text" class="form-control" placeholder="city">
                        </div>

                        <div class="form-group">
                            <label for="">State*</label>
                            <input type="text" class="form-control" placeholder="state">
                        </div>

                        <div class="form-group">
                            <label for="">Country*</label>
                           <select class="selectpicker countrypicker" data-flag="true" data-default="NO"></select> 
                        </div> 

                        <div class="form-group">
                            <label for="">Email*</label>
                            <input type="text" class="form-control" placeholder="email">
                        </div>

                        <div class="form-group">
                            <label for="">Gender*</label>
                            <input type="text" class="form-control" placeholder="gender">
                        </div>

                        <div class="form-group">
                            <label for="">User Image*</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </div>

                        <div class="form-group">
                            <label for="">Password*</label>
                            <input type="text" class="form-control" placeholder="password">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password*</label>
                            <input type="text" class="form-control" placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <label for="">Date of birth</label>
                            <input type="date" class="form-control" placeholder="date of birth">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Create users </li>
                    </ol>
                </div><!-- /.col -->
                <!--<a href="#" data-toggle="modal" data-target="#AddUserModal"
                    class="btn btn-primary float-sm-right"> Add User </a> -->

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUserModal">
                    Add User
                </button>

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with user data</h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User Image</th>
                        <th>Name of User</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0
                        </td>
                        <td>Win 95+</td>
                        <td> 4</td>
                        <td>X</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>



<?php
include('includes/footer.php');
?>