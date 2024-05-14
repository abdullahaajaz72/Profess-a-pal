<?php
$page_title = "Login";
include('../includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card shadow ">
                    <div class="card-header text-center ">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="login_code.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">Email Address:</label>
                                <input type="text" name="email_id" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="showPassword" class="form-check-input">
                                    <label for="showPassword" class="form-check-label">Show Password</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <button type="submit" name="login_now_btn" class="btn btn-primary" style="padding-left: 30px; padding-right:30px; margin-left:15px">Login</button> <!--  change -->

                                <a href="password-reset.php" class="float-end">Forgot Your Password?</a>
                            </div>

                        </form>

                        <!-- <hr>
                        <h6>
                            Did not recieve Verification Email ?
                            <a href="resend-email-verification.php">Resend</a>

                        </h6> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const showPasswordCheckbox = document.querySelector('#showPassword');
    const password = document.querySelector('#password');

    showPasswordCheckbox.addEventListener('change', function (e) {
        const type = this.checked ? 'text' : 'password';
        password.setAttribute('type', type);
        confirmPassword.setAttribute('type', type);
    });
</script>

<?php include('../includes/footer.php'); ?>