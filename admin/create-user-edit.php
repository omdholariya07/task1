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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit - Registered User</h3>
                            <a href="datatable.php" class="btn btn-danger float-sm-right"> BACK </a>
                        </div>
                        <!-- /.card-header-->
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-md-12">


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
                                        <input type="hidden" name="old_userimage" value="<?php echo $row['userimage']; ?>">

                                        <div class="form-group">
                                            <label for="">first name*</label>
                                            <input type="text" name="firstname" value="<?php echo $row['firstname'] ?>"
                                                class="form-control" placeholder="first Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="">last name*</label>
                                            <input type="text" name="lastname" value="<?php echo $row['lastname'] ?>"
                                                class="form-control" placeholder="last Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea id="address" name="address" rows="4" class="form-control"
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
                                            <label for="country">Country*</label>
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
                                            <label for="">User Image*</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userimage"
                                                        id="userImageInput">
                                                    <label class="custom-file-label"
                                                        for=""
                                                        data-current-file="<?php echo $row['userimage']; ?>">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            <img src="<?php echo $row['userimage']; ?>" alt="Current User Image"
                                                style="width: 100px; height: 100px; padding: 10px;">
                                        </div>

                                        <div class="form-group">
                                            <label>Date of birth*</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" name="Dob" value="<?php echo $row['Dob'] ?>"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" required />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
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

                                </div>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
</div>
</div>
</section>
</div>


<?php include('includes/script.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Function to update the label of the file input
    function updateFileInputLabel(fileName) {
        document.querySelector('.custom-file-label').textContent = fileName;
    }

    // Get the current file name when the page loads
    var currentFilePath = document.querySelector('.custom-file-label').getAttribute('data-current-file');
    var currentFileName = currentFilePath.split('/').pop(); // Extracting only the file name

    // Update the label with the current file name
    updateFileInputLabel(currentFileName);

    // Update the label when a new file is selected
    document.getElementById('userImageInput').addEventListener('change', function() {
        var fileName = this.value.split('\\').pop();
        updateFileInputLabel(fileName);
    });
});
</script>


<script>
$(function() {
    $("#reservationdate").datetimepicker({
        format: 'YYYY-MM-DD'
    });
});
</script>

<script>
$(document).ready(function() {
    $('#stateSelect').select2({
        placeholder: "Select a state",
        allowClear: true
    });
});
</script>


<?php
include('includes/footer.php'); ?>
