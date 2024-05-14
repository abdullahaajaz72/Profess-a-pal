<?php
$page_title = "Password Change Update";
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
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="password-reset-code.php" method="POST">



                            <div class="form-group mb-3">
                                <label for="">Email Address:</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password:</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password:</label>
                                <div class="input-group">
                                    <input type="password" name="confirm_passwords" id="confirmPassword" class="form-control" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="showPassword" class="form-check-input">
                                    <label for="showPassword" class="form-check-label">Show Password</label>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" name="password_update" class="btn btn-success w-100">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const showPasswordCheckbox = document.querySelector('#showPassword');
    const password = document.querySelector('#password');
    const confirmPassword = document.querySelector('#confirmPassword');

    showPasswordCheckbox.addEventListener('change', function(e) {
        const type = this.checked ? 'text' : 'password';
        password.setAttribute('type', type);
        confirmPassword.setAttribute('type', type);
    });
</script>

<?php include('../includes/footer.php'); ?>