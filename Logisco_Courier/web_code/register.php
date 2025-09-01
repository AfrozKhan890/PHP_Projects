<?php 
include "nav.inc.php";

// Redirect if already logged in
if (isset($_SESSION['LOGIN_STATUS'])) {
    header("location:index.php");
    exit();
}

// Fetch existing users for email validation
$ajx_sel_user = "SELECT * FROM USERS";
$ajx_sel_user_res = mysqli_query($con, $ajx_sel_user);
$existing_emails = [];
while ($ajx_show_users = mysqli_fetch_assoc($ajx_sel_user_res)) {
    $existing_emails[] = $ajx_show_users['EMAIL'];
}

$msg = '';
$f_name = $l_name = $email = $phone = '';

if (isset($_POST['register'])) {
    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $name = $f_name . " " . $l_name;
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $city = trim($_POST['city']);

    // Check if email already exists
    if (in_array($email, $existing_emails)) {
        $msg = "Email already exists!";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $sql = "INSERT INTO users (f_name, l_name, name, email, password, phone, city, role, account) VALUES ('$f_name', '$l_name', '$name', '$email', '$password', '$phone', '$city', 'USERS', 'approve')";
        $res = mysqli_query($con, $sql);

        if ($res) {
            // Redirect to login page after successful registration
            header('Location: login.php');
            exit();
        } else {
            $msg = "Registration failed. Please try again.";
        }
    }
}
?>

<script>
$(document).ready(function(){
    // Display message from PHP if there is one
    <?php if (!empty($msg)): ?>
        // alert("<?php echo $msg; ?>");
    <?php endif; ?>
});
</script>

<div class="logisco-page-wrapper" id="logisco-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <div class="gdlr-core-pbf-wrapper" style="padding: 350px 0px 160px 0px;" id="gdlr-core-wrapper-1">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/bg-3.jpg); background-size: cover; background-position: center;" data-parallax-speed="0.3"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js" data-gdlr-animation="fadeInUp" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 75px; font-weight: 700; letter-spacing: 0px; text-transform: none; color: #ffffff;">Register New Account<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                            </div>
                            <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 25px; font-style: normal; color: #f2f2f2; margin-top: 25px;">Get In Touch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gdlr-core-pbf-wrapper" style="padding: 45px 0px 35px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #ffffff;"></div>
        </div>

        <div class="gdlr-core-pbf-wrapper" style="padding: 85px 0px 20px 0px;">
            <div class="gdlr-core-pbf-background-wrap" style="background-color: #f3f3f3;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js" style="max-width: 760px;">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 45px;">
                                        <div class="gdlr-core-title-item-title-wrap">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 39px; letter-spacing: 0px; text-transform: none;">Register New Account <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                        </div>
                                        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px; font-style: normal;">For Courier Notifications</span>
                                    </div>
                                </div>

                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb">
                                        <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                            <form method="post">
                                                <div class="quform-elements">
                                                    <div class="quform-element">
                                                        <div class="alert alert-success"><?php echo $msg; ?></div>
                                                        <span class="wpcf7-form-control-wrap your-email">First Name:
                                                            <input id="f_name" type="text" name="f_name" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="First Name*" value="<?php echo htmlspecialchars($f_name); ?>">
                                                        </span> 

                                                        <span class="wpcf7-form-control-wrap your-email">Last Name:
                                                            <input id="l_name" type="text" name="l_name" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Last Name*" value="<?php echo htmlspecialchars($l_name); ?>">
                                                        </span> 

                                                        <span class="wpcf7-form-control-wrap your-email">Phone:
                                                            <input id="phone" type="number" name="phone" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Phone*" value="<?php echo htmlspecialchars($phone); ?>">
                                                        </span> 

                                                        <span class="wpcf7-form-control-wrap your-email">Email:
                                                            <input id="email" type="text" name="email" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Email*" value="<?php echo htmlspecialchars($email); ?>">
                                                        </span> 
                                                    </div>

                                                    <div class="quform-element">
                                                        <span class="wpcf7-form-control-wrap your-message">Password:
                                                            <input type="password" name="password" id="password" class="input1" aria-invalid="false" placeholder="Password*">
                                                        </span>
                                                    </div>

                                                    <div class="quform-element">
                                                        <span class="wpcf7-form-control-wrap your-message">City:
                                                            <select  required style="width: 100%;  height:50px " name="city">
                                                                <option selected value="">Select City*</option>
                                                                <?php 
                                                                $cityies = "SELECT * FROM cities";
                                                                $res = mysqli_query($con , $cityies);
                                                                while($row = mysqli_fetch_assoc($res)){
                                                                ?>
                                                                <option name="city" value="<?php echo $row['City']?>">
                                                                <?php echo $row['City']?>
                                                            </option>
                                                            <?php }?>
                                                        </select>
                                                            </span>
                                                        </div>

                                                    <div class="quform-submit quform-submit-inner2">
                                                        <div class="quform-submit-inner">
                                                            <button name="register" type="submit" id="reg_btn" class="submit-button"><span>Register</span></button>
                                                        </div>
                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                        <a href="login.php">Already have an account</a><br>
                                                        <a style="color: purple;" href="agnet_signup.php">Signup as a agent</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.inc.php";
?>



