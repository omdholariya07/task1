<?php
session_start();
include('includes/header.php');
if(isset($_SESSION['auth']))
{
   $_SESSION['status'] = "You are already logged In";
    header('Location: index.php');
    exit();
}
?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">

                    <?php
                      if(isset($_SESSION['auth_status']))
                     {
                     ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['auth_status']; ?>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden ="true">&times;</span> -->
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['auth_status']);
                    }
                    ?>

                    <?php
                    include('message.php');
                    ?>
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your email and password!</p>

                            <form action="logincode.php" method="POST">
                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" id="typeEmailX"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX">Email</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="typePasswordX"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a>
                                </p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit"
                                    name="login">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign
                                    Up</a>
                            </p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/script.php');?>
<?php include('includes/footer.php');?>