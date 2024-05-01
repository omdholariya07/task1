<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php echo '<img class="profile-user-img img-fluid img-circle"
                                            src="' . $row['userimage'] . '"
                                            alt="User profile picture">'; ?>

                            </div>
                            <h3 class="profile-username text-center">
                                <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h3>
                            <p class="text-muted text-center"><?php echo $row['email']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item"><i class="fas fa-birthday-cake"></i>
                                    <b>Date Of Birth</b> <a class="float-right"><?php echo $row['Dob']; ?></a>
                                </li>
                                <li class="list-group-item"><i class="fas fa-globe"></i>
                                    <b>Country</b> <a class="float-right"><?php echo $row['country']; ?></a>
                                </li>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Personal Info</h3>
                                </div>
                                <div class="card-body">

                                    <p><strong><i class="fas fa-id-badge"></i> User ID:</strong>
                                        <?php echo $row['id']; ?></p>
                                    <p><strong><i class="fas fa-user"></i> Name:</strong>
                                        <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
                                    <p><strong><i class="fas fa-map-marker-alt"></i> Address:</strong>
                                        <?php echo $row['address']; ?></p>
                                    <p><strong><i class="fas fa-city"></i> City:</strong> <?php echo $row['city']; ?>
                                    </p>
                                    <p><strong><i class="fas fa-flag"></i> State:</strong> <?php echo $row['state'];?>
                                    </p>
                                    <p><strong><i class="fas fa-venus-mars"></i> Gender:</strong>
                                        <?php echo $row['gender']; ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>
<?php
    } else {
        echo "User details not found.";
    }
} else {
    echo "User ID not provided.";
}

include('includes/footer.php');
?>