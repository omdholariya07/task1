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
                                                <input type="text" name="firstname"
                                                    value="<?php echo $row['firstname'] ?>" class="form-control"
                                                    placeholder="first Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="">last name*</label>
                                                <input type="text" name="lastname"
                                                    value="<?php echo $row['lastname'] ?>" class="form-control"
                                                    placeholder="last Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea id="address" name="address" rows="4"
                                                    cols="50"><?php echo htmlspecialchars($row['address']); ?></textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="">city*</label>
                                                <input type="text" name="city" value="<?php echo $row['city'] ?>"
                                                    class="form-control" placeholder="city">
                                            </div>

                                           
                                            <div class="form-group">
                                                <label for="">state*</label>
                                                <select id="stateSelect" name="state" class="state-select"
                                                    style="width: 100%">
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
                                                <label for="country">Country</label>
                                                <select id="country" name="country" class="form-control" required>
                                                    <?php
                                                $countries = array("USA", "India", "UK", "Australia", "Germany");
                                                 foreach ($countries as $country) {
                                                 $selected = ($row['country'] == $country) ? 'selected' : '';
                                                 echo '<option value="' . $country . '" ' . $selected . '>' . $country . '</option>';
                                              }
                                                ?>
                                                </select>
                                            </div>




                                            <div class="form-group">
                                                <label for="">email*</label>
                                                <input type="email" name="email" value="<?php echo $row['email'] ?>"
                                                    class="form-control" placeholder="email">
                                            </div>

                                            <div class="form-group">
                                                <label> gender* </label> <br>
                                                <input type="radio" name="gender" value="male"
                                                    <?php echo $row['gender'] == "male" ? "checked" : ""; ?>> Male
                                                <input type="radio" name="gender" value="female"
                                                    <?php echo $row['gender'] == "female" ? "checked" : ""; ?>> Female
                                            </div>



                                            <div class="form-group">
                                                <label for="">Password*</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">user image*</label>
                                                <input type="file" name="userimage"
                                                    value="<?php echo $row['userimage'] ?>" id="userimage">
                                                <!-- <input type="submit" value="Upload Image" name="submit"> -->
                                            </div>





                                            <div class="form-group">
                                                <label for="Dob">Date of birth</label>
                                                <input type="text" name="Dob" id="my_date_picker"
                                                    value="<?php echo $row['Dob'] ?>">
                                            </div>


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
    // Initialize Select2
    $('#stateSelect').select2({
        placeholder: "Select a state",
        allowClear: true
    });
});
</script>

<?php
include('includes/footer.php'); ?>