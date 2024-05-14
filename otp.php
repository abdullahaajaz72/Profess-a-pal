<?php
session_start();
if (isset($_SESSION['pass_reset'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store form data in session
        $_SESSION['mama_data'] = $_POST;
        header("Location: password-reset-otp.php");
        exit;
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store form data in session
        $_SESSION['mama_data'] = $_POST;
        header("Location: register-verify-email.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP-Verification</title>
    <link rel="shortcut icon" type="image/png" href="../images/a31.png" sizes="16x16 32x32 64x64" />

    <style>
        .insta {
            text-align: center;
            margin: 0 auto;
            font-size: 1.5em;
        }

        .my-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .otp-Form {
            width: 290px;
            height: 400px;
            background-color: rgb(255, 255, 255);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 30px;
            gap: 20px;
            position: relative;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.082);
            border-radius: 15px;
        }

        .mainHeading {
            font-size: 1.5em;
            /* Adjusted font size */
            color: rgb(15, 15, 15);
            font-weight: 700;
        }

        .otpSubheading {
            font-size: 1em;
            /* Adjusted font size */
            color: black;
            text-align: center;
        }

        .inputContainer {
            width: 100%;
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
        }

        .otp-input {
            background-color: rgb(228, 228, 228);
            width: 30px;
            height: 30px;
            text-align: center;
            border: none;
            border-radius: 7px;
            caret-color: rgb(127, 129, 255);
            color: rgb(44, 44, 44);
            outline: none;
            font-weight: 600;
            font-size: 1.2em;
            /* Adjusted font size */
        }

        .otp-input:focus,
        .otp-input:valid {
            background-color: rgba(127, 129, 255, 0.199);
            transition-duration: 0.3s;
        }

        .verifyButton {
            width: 100%;
            height: 30px;
            border: none;
            background-color: rgb(127, 129, 255);
            color: white;
            font-weight: 600;
            cursor: pointer;
            border-radius: 10px;
            transition-duration: 0.2s;
            font-size: 1.2em;
            /* Adjusted font size */
        }

        .verifyButton:hover {
            background-color: rgb(144, 145, 255);
            transition-duration: 0.2s;
        }

        .resendNote {
            font-size: 1em;
            /* Adjusted font size */
            color: black;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .resendBtn {
            background-color: transparent;
            border: none;
            color: #0d6efd;
            cursor: pointer;
            font-size: 16px;
            /* Adjusted font size */
            font-weight: 100;
        }

        /* Style to hide the spinner arrows */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="my-box">
        <?php
        if (isset($_SESSION['status'])) {
        ?>
            <div class="insta">
                <h5><?= $_SESSION['status']; ?></h5>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>
        <form action="" method="POST" class="otp-Form">
            <span class="mainHeading">Enter OTP</span>
            <p class="otpSubheading">
                We have sent a verification code to your Email Address
            </p>
            <div class="inputContainer">
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input1" name="otp-input1" autofocus />
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input2" name="otp-input2" />
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input3" name="otp-input3" />
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input4" name="otp-input4" />
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input5" name="otp-input5" />
                <input required="required" maxlength="1" type="number" class="otp-input" id="otp-input6" name="otp-input6" />
            </div>
            <button class="verifyButton" type="submit">Verify</button>
            <p class="resendNote">
                Didn't receive the code?<a href="otp-resend.php" name="resendcode" class="resendBtn">Resend Code</a>
            </p>
        </form>
    </div>
    <script>
        // JavaScript to restrict input to one integer for all OTP inputs
        document.querySelectorAll('.otp-input').forEach(function(input, index, inputs) {
            input.addEventListener('input', function() {
                // If the length of input is greater than 1, keep only the first character
                if (this.value.length > 1) {
                    this.value = this.value.slice(0, 1);
                }

                // Move focus to the next input if available
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            // Handle backspace to move to the previous input
            input.addEventListener('keydown', function(event) {
                if (event.key === 'Backspace' && index > 0 && this.value.length === 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>

</html>