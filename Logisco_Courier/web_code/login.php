<?php 


include "nav.inc.php";

if (isset($_SESSION['LOGIN_STATUS'])) {
    header("location:index.php");
    exit();
}

if (isset($_SESSION['ADMIN_ROLE'])) {
    header("location:./index.php");
    exit();
}

$msg = "";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE EMAIL = '$email'";
    $res = mysqli_query($con, $query);

    if ($res) {
        $fetch_user = mysqli_fetch_assoc($res);

        if ($fetch_user) {
            // If password matches (using plain text comparison, but it’s better to hash passwords)
            if ($password === $fetch_user['PASSWORD']) {
                $_SESSION['U_ID'] = $fetch_user['ID'];
                $_SESSION['U_EMAIL'] = $fetch_user['EMAIL'];
                $_SESSION['LOGIN_STATUS'] = "TRUE";
                
                if ($fetch_user['ROLE'] == "ADMIN") {
                    $_SESSION['ADMIN_ROLE'] = true;
                    header("location:admin/index.php");
                    exit();
                } elseif ($fetch_user['ROLE'] == "AGENT" ){
                    if($fetch_user['account'] == 'approve'){
                    $_SESSION['AGENT_ROLE'] = true;
                    $_SESSION['AGENT_CITY'] = $fetch_user['City'];

                    header("location:agent/view-all-couriers.php");
                    exit();
                } else{
                    $msg = "Your Account is not approved yet kindly wait for the action";
                }
                } elseif ($fetch_user['ROLE'] == "USERS") {
                    header("location:index.php");
                    exit();
                }

            } else {
                $msg = "Invalid email or password.";
            }
        } else {
            $msg = "User not found in the main users table.";
        }
    } else {
        $msg = "Database query failed: " . mysqli_error($con);
    }
}
?>

<!-- HTML code for login form -->
<div class="logisco-page-wrapper" id="logisco-page-wrapper">
    <div class="gdlr-core-page-builder-body">
        <!-- Banner and Title Section -->
        <div class="gdlr-core-pbf-wrapper" style="padding: 350px 0px 160px 0px;" id="gdlr-core-wrapper-1">
            <div class="gdlr-core-pbf-background-wrap">
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/bg-3.jpg); background-size: cover; background-position: center;" data-parallax-speed="0.3"></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js" data-gdlr-animation="fadeInUp" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-element">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                            <div class="gdlr-core-title-item-title-wrap">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title" style="font-size: 75px; font-weight: 700; letter-spacing: 0px; color: #ffffff;">Login Now<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                            </div>
                            <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 25px; color: #f2f2f2; margin-top: 25px;">Get In Touch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login Form Section -->
        <div class="gdlr-core-pbf-wrapper" style="background-color: #ffffff;">
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js" style="max-width: 760px; margin: 0 auto;">
                                <h3 style="font-size: 39px; text-align: center;">Login <span>For Courier Notifications</span></h3>

                                <!-- Display Error Message -->
                                <?php if (!empty($msg)): ?>
                                    <div style="color: red; text-align: center;"><?php echo $msg; ?></div>
                                    
                                <?php endif; 

                                ?>

                                <!-- Login Form -->
                                <form method="post">
                                    <div class="quform-elements">
                                        <div class="quform-element" style="margin-bottom: 20px;">
                                            <label for="email">Email:</label>
                                            <input type="text" name="email" id="email" class="input1" placeholder="Email*" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                        </div>
                                        <div class="quform-element" style="margin-bottom: 20px;">
                                            <label for="password">Password:</label>
                                            <input type="password" name="password" id="password" class="input1" placeholder="Password*" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                        </div>
                                        <div class="quform-submit quform-submit-inner2">
                                            <div class="quform-submit-inner">
                                                <button name="login" type="submit" id="reg_btn" class="submit-button"><span>Login</span></button>
                                            </div>
                                            <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                            <a href="register.php">Don't have an account?</a>
                                        </div>
                                    </div>
                                </form>
                                <!-- End of Login Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.inc.php"; ?>
