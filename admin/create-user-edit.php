<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

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

                        <li class="breadcrumb-item active">Edit - Registered User</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit - Registered User</h3>
                            <a href="create-user.php" class="btn btn-danger float-sm-right"> BACK </a>
                        </div>
                        <!-- /.card-header-->
                        <div class="card-body">
                         <div class="row">
                            <div class="col-md-6">
                            <form action="code.php" method="POST">
                    <div class="modal-body">
                        <?php
                        if(isset($_GET['user_id']))
                        {
                            $user_id = $_GET['user_id'];
                            $query = "SELECT * FROM user WHERE id='$user_id' LIMIT 1";
                        
                            $query_run = mysqli_query($conn, $query);
                            
    
                            if(mysqli_num_rows($query_run) > 0)
                            {
                              foreach($query_run as $row)
                              {
                                ?>
                                <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                  <div class="form-group">
                                <label for="">first name*</label>
                                <input type="text" name="firstname" value="<?php echo $row['firstname'] ?>" class="form-control" placeholder="first Name">
                            </div>

                            <div class="form-group">
                                <label for="">last name*</label>
                                <input type="text" name="lastname" value="<?php echo $row['lastname'] ?>"  class="form-control" placeholder="last Name">
                            </div>

                            <!--   <div class="form-group">
                            <label for="">Address</label>
                            <textarea id="address" name="address" rows="4" cols="50">

                           </textarea>
                        </div> -->

                            <div class="form-group">
                                <label for="">city*</label>
                                <input type="text" name="city" value="<?php echo $row['city'] ?>"  class="form-control" placeholder="city">
                            </div>

                            <div class="form-group">
                                <label for="">state*</label>
                                <input type="text" name="state" value="<?php echo $row['state'] ?>"  class="form-control" placeholder="state">
                            </div>

                            <!--  <div class="form-group">
                            <label for="">Country*</label>
                           <select class="selectpicker countrypicker" data-flag="true" data-default="NO"></select> 

                        </div> -->

                            <div class="form-group">
                                <label for="">email*</label>
                                <input type="email" name="email" value="<?php echo $row['email'] ?>"  class="form-control" placeholder="email">
                            </div>

                            <!--   <div class="form-group">
                            <label for="">Gender*</label>
                            <input type="text" class="form-control" placeholder="gender">
                        </div> -->

                           <div class="form-group">
                            <label for="">Password*</label>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                            <div class="form-group">
                                <label for="">user image*</label>
                                <input type="file" name="userimage" value="<?php echo $row['userimage'] ?>"  id="fileToUpload">
                                <!-- <input type="submit" value="Upload Image" name="submit"> -->
                            </div>

                          

                       <!-- <div class="form-group">
                            <label for="">Confirm Password*</label>
                            <input type="password" class="form-control" placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <label for="">Date of birth</label>
                            <input type="date" class="form-control" placeholder="date of birth">
                        </div> -->
                        
                              </div>
                               <?php
                              }  
                            }
                            else
                            {
                                echo "<h4>No Record Found.!</h4>";
                            }
                        }
                       
                       
                        ?>
                           
                    <div class="modal-footer">
                        <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                    </div>
                </form>
                            </div>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
 include('includes/script.php');
?>
<?php
include('includes/footer.php'); ?>
