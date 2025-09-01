<?php
include "nav.inc.php";
$msg = "";

if (isset($_POST['submit_form'])) {
    if (isset($_SESSION['LOGIN_STATUS'])) {
        // Sanitize input
        $name = mysqli_real_escape_string($con, trim($_POST['name']));
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $message = mysqli_real_escape_string($con, trim($_POST['message']));
        $user_id = $_SESSION['U_ID'];

        // Insert query
        $submit_sql = "INSERT INTO contact_form(User_id, Name, Email, Message) 
                       VALUES('$user_id', '$name', '$email', '$message')";

        // Execute query
        if (mysqli_query($con, $submit_sql)) {
            $msg = "Form submitted! You will receive a response within 24 hours...";
            
        } else {
            $msg = "Error: " . mysqli_error($con);
        }
    } else {
        $msg = "You must be logged in to submit the form.";
    }
}

if (isset($_POST['confirmSubmit'])) {
    if (isset($_SESSION['LOGIN_STATUS'])) {
        // Sanitize input
        $name = mysqli_real_escape_string($con, trim($_POST['your-name']));
        $email = mysqli_real_escape_string($con, trim($_POST['your-email']));
        $phone = mysqli_real_escape_string($con, trim($_POST['your-phone']));
        $delivery_type = mysqli_real_escape_string($con, trim($_POST['delivery']));
        $pickup = mysqli_real_escape_string($con, trim($_POST['pickup']));
        $dropoff = mysqli_real_escape_string($con, trim($_POST['dropoff']));
        $reciver_name = mysqli_real_escape_string($con, trim($_POST['reciver_name']));
        $reciver_phone = mysqli_real_escape_string($con, trim($_POST['reciver_phone']));
        $quantity = mysqli_real_escape_string($con, trim($_POST['quantity']));
        $weight = mysqli_real_escape_string($con, trim($_POST['weight']));
        $width = mysqli_real_escape_string($con, trim($_POST['width']));
        $height = mysqli_real_escape_string($con, trim($_POST['height']));
        $totalPrice = mysqli_real_escape_string($con, trim($_POST['totalPrice']));

        // Generate unique trace ID
        do {
            $trace_id = random_int(1000000000, 9999999999);
            // Check if the trace ID already exists in the database
            $check_sql = "SELECT trace_id FROM logistics_form WHERE trace_id = '$trace_id'";
            $result = mysqli_query($con, $check_sql);
        } while (mysqli_num_rows($result) > 0);

        // Insert into database
        $insert = "INSERT INTO logistics_form (
            full_name, email, phone_number, pickup_address, drop_off_address, receiver_name, receiver_phone, 
            delivery_type, quantity, weight, width, height, Total_charges, trace_id
        ) VALUES (
            '$name', '$email', '$phone', '$pickup', '$dropoff', '$reciver_name', '$reciver_phone', 
            '$delivery_type', '$quantity', '$weight', '$width', '$height', '$totalPrice', '$trace_id'
        )";

        // Execute query and check for success
        if (mysqli_query($con, $insert)) {
            $_SESSION['notification'] = "A new courier has been added successfully! Your Trace ID: $trace_id";
            // Redirect to the page where the notification will be shown
            // Update this to the desired page
            echo `<script>alert("A new courier has been added successfully Check Your notification bar");</script>`;
            header("Location:index.php");
            
            exit();
        } else {
            echo "<script>alert('Error adding parcel: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('You must be logged in to submit the form.');</script>";
    }
}

if(isset($_POST['trace_data'])){
    $trace = $_POST['trace_id'];
    header('Location: trace_courier.php?trace_id='.urlencode($trace));
}
?>

<script>
    // Show the modal after the page loads
    function closeAlert() {
        document.getElementById('custom-alert').classList.add('hidden');
    }

    // Show alert automatically on page load
    window.onload = function() {
        const alertBox = document.getElementById('custom-alert');
        
        // Automatically hide the alert after 5 seconds
        setTimeout(closeAlert, 5000);
    }
    
</script>



<style>
    .modal {
        display: none;
        /* By default, modal hidden */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
        justify-content: center;
        /* Center the modal content */
        align-items: center;
        /* Center vertically */
    }
</style>


<div class=logisco-page-wrapper id=logisco-page-wrapper>
    <div class=gdlr-core-page-builder-body>
        <div class="gdlr-core-pbf-wrapper " style="padding: 260px 0px 110px 0px;" id=gdlr-core-wrapper-1>
            <div class=gdlr-core-pbf-background-wrap>
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/slider-1-bg.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first" id=gdlr-core-column-1>
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 190px 0px 30px 80px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 35px ;">
                                        <div class="gdlr-core-title-item-title-wrap ">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 40px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">We Provide One Stop Logistic & Warehousing Services .<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 20px ;font-style: normal ;color: #c5c5c5 ;margin-top: 20px ;">Guaranteed by more than a hundred awards</span>
                                    </div>
                                </div>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"><a class="gdlr-core-button  gdlr-core-button-gradient gdlr-core-button-no-border" href=about.php style="font-weight: 800 ;letter-spacing: 1px ;padding: 15px 34px 18px 34px;border-radius: 27px;-moz-border-radius: 27px;-webkit-border-radius: 27px;background: #e53d34 ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Homepage Enquiry Form" id=gdlr-core-column-2>
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 20px 35px 125px;padding: 45px 25px 5px 25px;">
                            <div class=gdlr-core-pbf-background-wrap style="background-color: #212121 ;opacity: 0.77 ;border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-radius: 3px 3px 3px 3px;"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                                        <div class="gdlr-core-title-item-title-wrap ">
                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">Enquire Now<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                        </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-style: normal ;color: white ; background-color:none"><?php echo $msg; ?></span>
                                    </div>
                                </div>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">
                                        <div role=form class=wpcf7 id=wpcf7-f6725-p2039-o1 lang=en-US dir=ltr>
                                            <div class=screen-reader-response></div>
                                            <form method="post">

                                                <div class="quform-elements">
                                                    <div class="quform-element">

                                                        <span class="wpcf7-form-control-wrap your-name">
                                                            <input id="name" type="text" name="name" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Name*">
                                                        </span>

                                                    </div>
                                                    <div class="quform-element">

                                                        <span class="wpcf7-form-control-wrap your-email">
                                                            <input id="email" type="text" name="email" size="40" class="input1" aria-required="true" aria-invalid="false" placeholder="Email*">
                                                        </span>

                                                    </div>
                                                    <div class="quform-element">

                                                        <span class="wpcf7-form-control-wrap your-message">
                                                            <textarea id="message" name="message" cols="40" rows="10" class="input1" aria-invalid="false" placeholder="Message*"></textarea>
                                                        </span>

                                                    </div>
                                                    <!-- Begin Submit button -->
                                                    <div class="quform-submit">
                                                        <div class="quform-submit-inner">
                                                            <button name="submit_form" type="submit" class="submit-button"><span>Send</span></button>
                                                        </div>
                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
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
        <div class="gdlr-core-pbf-wrapper " style="margin: -60px 0px 0px 0px;padding: 0px 0px 0px 0px;" id=gdlr-core-wrapper-2>
            <div class=gdlr-core-pbf-background-wrap></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class=" gdlr-core-pbf-wrapper-container-inner gdlr-core-item-mglr clearfix" style="box-shadow: 0 0 35px rgba(10, 10, 10,0.12); -moz-box-shadow: 0 0 35px rgba(10, 10, 10,0.12); -webkit-box-shadow: 0 0 35px rgba(10, 10, 10,0.12); background-color: #ffffff ;border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-radius: 3px 3px 3px 3px;z-index: 999 ;">
                        <div class="gdlr-core-pbf-column gdlr-core-column-24 gdlr-core-column-first">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 50px 0px 20px 0px;" data-sync-height=map-height>
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content">
                                    <div class=gdlr-core-pbf-element>
                                        <div class="gdlr-core-image-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-center-align">
                                            <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;"><img src=upload/hp-1-map-1.jpg alt width=444 height=221 title=hp-1-map></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gdlr-core-pbf-column gdlr-core-column-36" id=gdlr-core-column-3>
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 90px 40px 0px 0px;" data-sync-height=map-height>
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content">
                                    <div class=gdlr-core-pbf-element>
                                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                            <div class="gdlr-core-title-item-title-wrap ">
                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 31px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #e53d34 ;">We Provide Service Across The Globe<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=gdlr-core-pbf-element>
                                        <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space">
                                            <div class=gdlr-core-text-box-item-content style="font-size: 17px ;text-transform: none ;color: #4f5d77 ;">
                                                <p>We offer a Global Logistics Network with our worldwide offices and also high quality distribution facilities which are staffed by dedicated teams of the top of experts. We have more than 30 years of experiences in this field.</p>
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
        <div class="gdlr-core-pbf-wrapper " style="margin: 0px 0px 0px 0px;padding: 115px 0px 120px 0px;" id=gdlr-core-wrapper-3>
            <div class=gdlr-core-pbf-background-wrap>
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/hp-map-bg-2.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0.2></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" data-skin="Homepage Column Service">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 10px 0px 10px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation=fadeInUp data-gdlr-animation-duration=600ms data-gdlr-animation-offset=0.8>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                        <div class="gdlr-core-column-service-media gdlr-core-media-image" style="max-width: 61px ;margin-left: auto ;margin-right: auto ;"><img src=upload/icon-clock-n.png alt width=100 height=118 title=icon-clock-n></div>
                                        <div class=gdlr-core-column-service-content-wrapper>
                                            <div class=gdlr-core-column-service-title-wrap>
                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">Fast Service</h3>
                                            </div>
                                            <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p> <a class="gdlr-core-column-service-read-more gdlr-core-info-font" href=about.php target=_self style="font-style: normal ;">Learn More<i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Homepage Column Service">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 10px 0px 10px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation=fadeInUp data-gdlr-animation-duration=600ms data-gdlr-animation-offset=0.8>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                        <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-top: 10px;margin-bottom: 29px;max-width: 76px ;margin-left: auto ;margin-right: auto ;"><img src=upload/icon-box-n.png alt width=130 height=104 title=icon-box-n></div>
                                        <div class=gdlr-core-column-service-content-wrapper>
                                            <div class=gdlr-core-column-service-title-wrap>
                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">Safe Delivery</h3>
                                            </div>
                                            <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p> <a class="gdlr-core-column-service-read-more gdlr-core-info-font" href=about.php target=_self style="font-style: normal ;">Learn More<i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Homepage Column Service">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 10px 0px 10px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation=fadeInUp data-gdlr-animation-duration=600ms data-gdlr-animation-offset=0.8>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                        <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-top: 3px;margin-bottom: 30px;max-width: 64px ;margin-left: auto ;margin-right: auto ;"><img src=upload/icon-support-n.png alt width=120 height=126 title=icon-support-n></div>
                                        <div class=gdlr-core-column-service-content-wrapper>
                                            <div class=gdlr-core-column-service-title-wrap>
                                                <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">24/7 Support</h3>
                                            </div>
                                            <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p> <a class="gdlr-core-column-service-read-more gdlr-core-info-font" href=# target=_self style="font-style: normal ;">Learn More<i class="fa fa-long-arrow-right"></i></a>
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
        <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
            <div class=gdlr-core-pbf-background-wrap>
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/bg-tracking.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0.2></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js "></div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Re Button 2" id=gdlr-core-column-4>
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js  gdlr-core-column-extend-right" style="margin: -40px 0px 0px 0px;padding: 90px 25px 65px 60px;">
                            <div class=gdlr-core-pbf-background-wrap style="background-color: #143369 ;border-radius: 3px 0px 0px 0px;-moz-border-radius: 3px 0px 0px 0px;-webkit-border-radius: 3px 0px 0px 0px;background: linear-gradient(rgba(20, 51, 105, 1), rgba(20, 51, 105, 0.9));-moz-background: linear-gradient(rgba(20, 51, 105, 1), rgba(20, 51, 105, 0.9));-o-background: linear-gradient(rgba(20, 51, 105, 1), rgba(20, 51, 105, 0.9));-webkit-background: linear-gradient(rgba(20, 51, 105, 1), rgba(20, 51, 105, 0.9));"></div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation=fadeInRight data-gdlr-animation-duration=600ms data-gdlr-animation-offset=0.8>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                        <div class="gdlr-core-title-item-left-image gdlr-core-media-image" style="margin: -2px 25px 0px 0px;"><img src=upload/icon-box.png alt width=34 height=45 title=icon-box></div>
                                        <div class=gdlr-core-title-item-left-image-wrap>
                                            <div class="gdlr-core-title-item-title-wrap ">
                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 30px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">Quick Tracking Service<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 10px ;">
                                        <div class=gdlr-core-text-box-item-content style="font-size: 17px ;text-transform: none ;color: #9bb4e0 ;">
                                            <p>This is just an example of the custom HTML form. You may need to link it to your third party app or use third party html snippet . This theme doesn’t offer the tracking system.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                        <div class=gdlr-core-text-box-item-content style="font-size: 15px ;text-transform: none ;color: #c0cada ;">
                                            <p>*Please enter (House) Air Waybill No., B/L No., or Container No. For OPTIONAL SEARCH using your Customer Account No.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                        <div class=gdlr-core-text-box-item-content style="text-transform: none ;">
                                            <form method="post" class=logisco-custom-tracking-form>
                                                <div class=logisco-custom-tracking-form-input>
                                                    <input name="trace_id" type=text placeholder=XXX-XXX-XX style="background: #fff;">
                                                </div>
                                                <div class=logisco-custom-tracking-form-submit>
                                                    <input name="trace_data" type=submit value="Track Now!">
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
        <div class="gdlr-core-pbf-wrapper " style="padding: 0px 0px 0px 0px;">
            <div class=gdlr-core-pbf-background-wrap style="background-color: #0a0a0a ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">

            </div>
        </div>

        <div class="gdlr-core-pbf-wrapper " style="padding: 200px 0px 170px 0px;" id=gdlr-core-wrapper-4>
            <div class=gdlr-core-pbf-background-wrap>
                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/hp-video-bg.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0.2></div>
            </div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom" style="max-width: 815px ;">
                    <div class=gdlr-core-pbf-element>
                        <div class="gdlr-core-image-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-center-align">
                            <div class="gdlr-core-image-item-wrap gdlr-core-media-image  gdlr-core-image-item-style-rectangle" style="border-width: 0px;">
                                <a class="gdlr-core-lightgallery gdlr-core-js " href="https://www.youtube.com/watch?v=wtPB-VNNK2Q"><img src=upload/play1-icon.png alt width=82 height=82 title=play1-icon></a>
                            </div>
                        </div>
                    </div>
                    <div class=gdlr-core-pbf-element>
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
                            <div class="gdlr-core-title-item-title-wrap ">
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 34px ;letter-spacing: 0px ;text-transform: none ;color: #ffffff ;">See Video Introduction <span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                            </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 21px ;font-style: normal ;color: #e53d34 ;margin-top: 23px ;">Take a tour and see how the greatest logistic company in USA works</span>
                        </div>
                    </div>
                    <div class=gdlr-core-pbf-element>
                        <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align" style="padding-bottom: 0px ;">
                            <div class=gdlr-core-text-box-item-content style="font-size: 17px ;font-weight: 400 ;text-transform: none ;color: #9db1df ;">
                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite. like these sweet mornings of spring</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gdlr-core-pbf-wrapper " style="margin: 0px 0px 0px 0px;padding: 0px 0px 30px 0px;" id=gdlr-core-wrapper-5>
            <div class=gdlr-core-pbf-background-wrap style="background-color: #f7f7f7 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom" style="max-width: 1280px ;">

                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: -77px -20px 80px -20px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-flipbox-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-flipbox gdlr-core-js">
                                            <div class="gdlr-core-flipbox-front gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-1.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;color: #ffffff ;">Open Innovation</h3>
                                                    <div class=gdlr-core-flipbox-item-content style="color: #eaa29e ;"><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-flipbox-back gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-1-2.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;">Open Innovation</h3>
                                                    <div class=gdlr-core-flipbox-item-content><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                    <a class=gdlr-core-flipbox-link href=# target=_self></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: -77px -20px 80px -20px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-flipbox-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-flipbox gdlr-core-js">
                                            <div class="gdlr-core-flipbox-front gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-2.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;color: #ffffff ;">AI Port Management</h3>
                                                    <div class=gdlr-core-flipbox-item-content style="color: #eaa29e ;"><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-flipbox-back gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-2-2.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;">AI Port Management</h3>
                                                    <div class=gdlr-core-flipbox-item-content><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                    <a class=gdlr-core-flipbox-link href=# target=_self></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gdlr-core-pbf-column gdlr-core-column-20">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: -77px -20px 0px -20px;">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class=gdlr-core-pbf-element>
                                    <div class="gdlr-core-flipbox-item gdlr-core-item-pdlr gdlr-core-item-pdb " style="padding-bottom: 0px ;">
                                        <div class="gdlr-core-flipbox gdlr-core-js">
                                            <div class="gdlr-core-flipbox-front gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-3.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;color: #ffffff ;">Digitalization insights</h3>
                                                    <div class=gdlr-core-flipbox-item-content style="color: #eaa29e ;"><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-flipbox-back gdlr-core-js  gdlr-core-center-align gdlr-core-flipbox-type-outer" style="padding: 90px 40px 80px 40px;border-width: 0px 0px 0px 0px;" data-sync-height=gdlr-core-flipbox-id-6907>
                                                <div class=gdlr-core-flipbox-background style="background-image: url(upload/flip-3-2.jpg) ;"></div>
                                                <div class="gdlr-core-flipbox-content gdlr-core-sync-height-content">
                                                    <h3 class="gdlr-core-flipbox-item-title" style="font-size: 17px ;">Digitalization insights</h3>
                                                    <div class=gdlr-core-flipbox-item-content><a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-transparent gdlr-core-button-with-border" href=# target=_parent style="font-size: 13px ;color: #eaa29e ;padding: 0px 0px 3px 0px;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;border-width: 0px 0px 2px 0px;border-color: #eaa29e ;"><span class=gdlr-core-content>Learn More</span></a></div>
                                                    <a class=gdlr-core-flipbox-link href=# target=_self></a>
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


        <div class="gdlr-core-pbf-wrapper " style="padding: 40px 0px 50px 0px;">
            <div class=gdlr-core-pbf-background-wrap style="background-color: #f7f7f7 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom" style="max-width: 1280px ;">
                    <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " data-sync-height=half-height data-sync-height-center>
                            <div class=gdlr-core-pbf-background-wrap>
                                <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/erik-odiin-568459-unsplash.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0></div>
                            </div>
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js  gdlr-core-sync-height-content"></div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="gdlr-core-pbf-wrapper " style="padding: 30px 0px 30px 0px;">
            <div class=gdlr-core-pbf-background-wrap style="background-color: #f7f7f7 ;"></div>
            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom" style="max-width: 1280px ;">






                </div>
                <div class=gdlr-core-pbf-element>
                    <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                        <div class=gdlr-core-text-box-item-content style="text-transform: none ;color: #929bab ;">
                            <p>Our global logistics network, cutting-edge IT systems, in-house expertise and excellent customer service. <a style="color: #143369;" href=#>Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gdlr-core-pbf-wrapper " style="padding: 100px 0px 25px 0px;" id=gdlr-core-wrapper-7>
        <div class=gdlr-core-pbf-background-wrap>
            <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/hp-quote-bg.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0></div>
        </div>
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js "></div>
                    </div>
                </div>
                <div id="get_a_quote" class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Quote Form">
                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 0px 20px 0px;">
                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " data-gdlr-animation=fadeInRight data-gdlr-animation-duration=600ms data-gdlr-animation-offset=0.8>
                            <div class=gdlr-core-pbf-element>
                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 25px ;">
                                    <div class="gdlr-core-title-item-title-wrap ">
                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 34px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Request a Free Quote<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider"></span></h3>
                                    </div>
                                </div>
                            </div>
                            <div class=gdlr-core-pbf-element>
                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space" style="padding-bottom: 2px ;">
                                    <div class=gdlr-core-text-box-item-content style="font-size: 17px ;text-transform: none ;color: #777777 ;">
                                        <p>We will get back to you within 24 hours in Monday &#8211; Friday / 09:00 &#8211; 18:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class=gdlr-core-pbf-element>
                                <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space" style="padding-bottom: 35px ;">
                                    <div class=gdlr-core-text-box-item-content style="text-transform: none ;">
                                        <p><span style="font-size: 21px; font-weight: bold; color: #252525;">Or call us   </span><span style="font-size: 21px; color: #e53c35;">+1-345-645-4563</span></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Your existing form -->
                            <form  method="post">
                                <div class="gdlr-core-input-wrap gdlr-core-large gdlr-core-full-width gdlr-core-with-column">
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-name">
                                            <input type="text" name="your-name" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="Full Name*">
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-email">
                                            <input type="email" name="your-email" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" placeholder="Email*">
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-phone">
                                            <input type="text" name="your-phone" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="Phone Number*">
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-cargo">Delivery Type<br>
                                            <label for="Standard">Standard</label>
                                            <input type="radio" id="Standard" name="delivery" value="Standard" required>
                                            <label for="Express">Express</label>
                                            <input type="radio" id="Express" name="delivery" value="Express">
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-origin">
                                            <input type="text" name="pickup" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Pickup Address" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="text" name="reciver_name" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Reciver Name" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="number" name="reciver_phone" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Reciver Phone" required>
                                        </span>
                                    </div>

                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="text" name="dropoff" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Drop Off Address" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-quantity">
                                            <input type="number" name="quantity" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Quantity" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-weight">
                                            <input type="number" name="weight" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Weight in kg" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-width">
                                            <input type="number" name="width" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Width in cm" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-height">
                                            <input type="number" name="height" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Height in cm" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-60">
                                        <input type="button" id="calculateBtn" class="wpcf7-form-control wpcf7-submit gdlr-core-full" value="Calulate">
                                    </div>
                                </div>
                                <input type="hidden" name="totalPrice" id="totalPriceInput">


                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                <!-- Modal for displaying the total price -->
                                <div id="priceModal" style="display:none;">
                                    <div style="padding: 20px; border: 1px solid #ccc; background-color: #fff;">
                                        <h2>Total Charges</h2>
                                        <p id="totalPrice"></p>
                                        <button style="padding:10px; color:white; background-color:black; border-radius:20px; cursor:pointer; border:none;"name="confirmSubmit">Confirm Submission</button>
                                        <button style="padding:10px; color:white; background-color:red; border-radius:20px; cursor:pointer; border:none;" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </form>


                            <!-- Include jQuery -->
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                             $(document).ready(function() {
                        $('#calculateBtn').click(function() {
                            var quantity = parseFloat($('input[name="quantity"]').val());
                            var weight = parseFloat($('input[name="weight"]').val());
                            var width = parseFloat($('input[name="width"]').val());
                            var height = parseFloat($('input[name="height"]').val());

                            // Assuming a simple price calculation for demonstration
                            var pricePerUnit = 100; // Adjust according to your pricing model
                            var totalPrice = quantity * pricePerUnit * (weight + (width * height / 1000)); // Example calculation

                            $('#totalPrice').text('Total Charges: PKR ' + totalPrice.toFixed(2));
                            $('#totalPriceInput').val(totalPrice.toFixed(2)); // Update hidden input
                            $('#priceModal').show(); // Show the modal
                        });

                        $('#cancel').click(function() {
                            $('#priceModal').hide(); // Close the modal
                        });
                    });

                            </script>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="gdlr-core-pbf-wrapper " style="padding: 170px 0px 90px 0px;" id=gdlr-core-wrapper-8>
    <div class=gdlr-core-pbf-background-wrap>
        <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/hp-banner-bg.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0.1></div>
    </div>
    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container-custom" style="max-width: 1380px ;">
            <div class=gdlr-core-pbf-element>
                <div class="gdlr-core-gallery-item gdlr-core-item-pdb clearfix  gdlr-core-gallery-item-style-grid">
                    <div class="gdlr-core-gallery-item-holder gdlr-core-js-2 clearfix" data-layout=fitrows>
                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-column-first gdlr-core-item-pdlr gdlr-core-item-mgb">
                            <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src=https://upload.wikimedia.org/wikipedia/en/e/e1/Al_Baraka_Bank_logo.png alt width=240 height=74 title=banner-1-n></div>
                        </div>
                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-item-pdlr gdlr-core-item-mgb">
                            <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src=https://upload.wikimedia.org/wikipedia/en/9/94/NBP_logo.png alt width=240 height=74 title=banner-2-n></div>
                        </div>
                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-item-pdlr gdlr-core-item-mgb">
                            <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src=https://www.bankmakramah.com/wp-content/uploads/2023/12/BML-Logo.png alt width=240 height=74 title=banner-3-n></div>
                        </div>
                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-item-pdlr gdlr-core-item-mgb">
                            <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src=https://seeklogo.com/images/J/jazz-cash-logo-829841352F-seeklogo.com.png alt width=240 height=75 title=banner-4-n></div>
                        </div>
                        <div class="gdlr-core-item-list gdlr-core-gallery-column  gdlr-core-column-12 gdlr-core-item-pdlr gdlr-core-item-mgb">
                            <div class="gdlr-core-gallery-list gdlr-core-media-image"><img src=https://bankislami.com.pk/wp-content/uploads/2024/10/Bankislami-Logo-1-640x199.png alt width=240 height=74 title=banner-5-n></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="gdlr-core-pbf-wrapper " style="padding: 80px 0px 30px 0px;">
    <div class=gdlr-core-pbf-background-wrap></div>
    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">

            <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Re Button 2" id=gdlr-core-column-17>
                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 40px 0px 0px 0px;">
                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                        <div class=gdlr-core-pbf-element>
                            <div class="gdlr-core-newsletter-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-style-rectangle">
                                <script>
                                    /*<![CDATA[*/
                                    if (typeof newsletter_check !== "function") {
                                        window.newsletter_check = function(f) {
                                            var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                            if (!re.test(f.elements["ne"].value)) {
                                                alert("Email address is not correct");
                                                return false;
                                            }
                                            for (var i = 1; i < 20; i++) {
                                                if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
                                                    alert("");
                                                    return false;
                                                }
                                            }
                                            if (f.elements["ny"] && !f.elements["ny"].checked) {
                                                alert("You must accept the privacy policy");
                                                return false;
                                            }
                                            return true;
                                        }
                                    } /*]]>*/
                                </script>

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

