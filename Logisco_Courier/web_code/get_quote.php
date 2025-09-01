<?php 
include "nav.inc.php";


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
        $city = mysqli_real_escape_string($con, trim($_POST['city']));
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
            full_name, email, phone_number, pickup_address, pickup_city, drop_off_address, receiver_name, receiver_phone, 
            delivery_type, quantity, weight, width, height, Total_charges, trace_id
        ) VALUES (
            '$name', '$email', '$phone', '$pickup','$city', '$dropoff', '$reciver_name', '$reciver_phone', 
            '$delivery_type', '$quantity', '$weight', '$width', '$height', '$totalPrice', '$trace_id'
        )";

        // Execute query and check for success
        if (mysqli_query($con, $insert)) {
            $_SESSION['notification'] = "A new courier has been added successfully! Your Trace ID: $trace_id";
            // Redirect to the page where the notification will be shown
            header("Location: index.php"); // Update this to the desired page
            echo `<script>alert('A new courier has been added successfully')</script>`;
            
            exit();
        } else {
            echo "<script>alert('Error adding parcel: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script>alert('You must be logged in to submit the form.');</script>";
    }
}
?>


        <div class="logisco-page-title-wrap  logisco-style-custom logisco-center-align">
            <div class=logisco-header-transparent-substitute></div>
            <div class=logisco-page-title-overlay></div>
            <div class="logisco-page-title-container logisco-container">
                <div class="logisco-page-title-content logisco-item-pdlr">
                    <h1 class="logisco-page-title">Get A Quote</h1></div>
            </div>
        </div>
        <div class=logisco-page-wrapper id=logisco-page-wrapper>
            <div class=gdlr-core-page-builder-body>
                <div class="gdlr-core-pbf-wrapper " style="padding: 90px 0px 20px 0px;">
                    <div class=gdlr-core-pbf-background-wrap></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 22px ;" id=gdlr-core-title-item-1>
                                                <div class="gdlr-core-title-item-title-wrap ">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 31px ;letter-spacing: 0px ;text-transform: none ;color: #171717 ;">Request a Free Quote<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 17px ;font-style: normal ;color: #777777 ;margin-top: 25px ;">We will get back to you within 24 hours in Monday - Friday / 09:00 - 18:00</span></div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space" style="padding-bottom: 17px ;">
                                                <div class=gdlr-core-text-box-item-content style="font-size: 17px ;font-weight: 700 ;text-transform: none ;color: #252525 ;">
                                                    <p>Phone : +1-2452-355-32</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space" style="padding-bottom: 17px ;">
                                                <div class=gdlr-core-text-box-item-content style="font-size: 17px ;font-weight: 700 ;text-transform: none ;color: #252525 ;">
                                                    <p>Email : quote@logiscocorp.co</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space" style="padding-bottom: 17px ;">
                                                <div class=gdlr-core-text-box-item-content style="font-size: 17px ;font-weight: 700 ;text-transform: none ;color: #252525 ;">
                                                    <p>Address</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align gdlr-core-no-p-space">
                                                <div class=gdlr-core-text-box-item-content style="font-size: 17px ;font-weight: 400 ;text-transform: none ;color: #9d9d9d ;">
                                                    <p>Box 3233</p>
                                                    <p>1810 Kings Way</p>
                                                    <p>King Street, 5th Avenue, New York</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-column gdlr-core-column-30" data-skin="Re Button 2">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 0px 20px 0px;">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                                <div role=form class=wpcf7 id=wpcf7-f6499-p6368-o1 lang=en-US dir=ltr>
                                                    <div class=screen-reader-response></div>
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
                                        <select  required style="width: 100%;  height:55px "  name="city">
                                            <option selected value="">Select Pickup City*</option>
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
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="number" name="reciver_phone" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Reciver Phone" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="text" name="reciver_name" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Reciver Name" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-destination">
                                            <input type="text" name="dropoff" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Drop Off Address" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-quantity">
                                            <input type="number" name="quantity" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Quantity" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-weight">
                                            <input type="number" name="weight" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Weight in kg" required>
                                        </span>
                                    </div>
                                    <div class="gdlr-core-column-30">
                                        <span class="wpcf7-form-control-wrap your-width">
                                            <input type="number" name="width" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Width in cm" required>
                                        </span>
                                    </div>
                                    <div class="clear"></div>

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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 20px 0px 30px 0px;">
                    <div class=gdlr-core-pbf-background-wrap></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first" data-skin="Homepage Column Service">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 10px 0px 10px;">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                                <div class="gdlr-core-column-service-media gdlr-core-media-image"><img src=upload/icon1.png alt width=61 height=72 title=icon1></div>
                                                <div class=gdlr-core-column-service-content-wrapper>
                                                    <div class=gdlr-core-column-service-title-wrap>
                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">Fast Service</h3></div>
                                                    <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Homepage Column Service">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="padding: 0px 10px 0px 10px;">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                                <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-top: 10px;margin-bottom: 29px;"><img src=upload/icon2.png alt width=76 height=61 title=icon2></div>
                                                <div class=gdlr-core-column-service-content-wrapper>
                                                    <div class=gdlr-core-column-service-title-wrap>
                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">Safe Delivery</h3></div>
                                                    <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-column gdlr-core-column-20" data-skin="Homepage Column Service">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin-bottom: 20px;padding: 0px 10px 0px 10px;">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-column-service-item gdlr-core-item-pdb  gdlr-core-center-align gdlr-core-no-caption gdlr-core-item-pdlr" style="padding-bottom: 30px;">
                                                <div class="gdlr-core-column-service-media gdlr-core-media-image" style="margin-top: 3px;margin-bottom: 30px;"><img src=upload/icon3.png alt width=64 height=67 title=icon3></div>
                                                <div class=gdlr-core-column-service-content-wrapper>
                                                    <div class=gdlr-core-column-service-title-wrap>
                                                        <h3 class="gdlr-core-column-service-title gdlr-core-skin-title" style="font-size: 23px ;font-weight: 700 ;text-transform: none ;">24/7 Support</h3></div>
                                                    <div class=gdlr-core-column-service-content style="font-size: 16px ;text-transform: none ;">
                                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=gdlr-core-pbf-element>
                                <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align" style="margin-bottom: 10px ;">
                                    <div class="gdlr-core-divider-line gdlr-core-skin-divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 60px 0px 50px 0px;" id=gdlr-core-wrapper-1>
                    <div class=gdlr-core-pbf-background-wrap></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-column gdlr-core-column-30 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-background-title-icon gdlr-core-left-align gdlr-core-icon-pos-left">
                                                <div class="gdlr-core-accordion-item-tab clearfix  gdlr-core-active">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                    <div class=gdlr-core-accordion-item-content-wrapper>
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Solutions</h4>
                                                        <div class=gdlr-core-accordion-item-content>
                                                            <p>At Logisco, we know experience matters. That’s why customers trust us — we have more than 60 years of experience in the logistics and transportation industry. For your services, this translates to competence around the globe. Using Logisco is easy. We deliver packages up to 50kg, anywhere in USA &#038; Europe. All you must do is place a single order with your local Logisco office. With just one booking, we will collect your shipment​​​​​​​ in a single vehicle at your location. Far far away, behind the word mountains, far from the countries Vokalia and Consonanti.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-accordion-item-tab clearfix ">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                    <div class=gdlr-core-accordion-item-content-wrapper>
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Cost Saving With Us</h4>
                                                        <div class=gdlr-core-accordion-item-content>
                                                            <p>At Logisco, we know experience matters. That’s why customers trust us — we have more than 60 years of experience in the logistics and transportation industry. For your services, this translates to competence around the globe. Using Logisco is easy. We deliver packages up to 50kg, anywhere in USA &#038; Europe. All you must do is place a single order with your local Logisco office. With just one booking, we will collect your shipment​​​​​​​ in a single vehicle at your location.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-accordion-item-tab clearfix ">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                    <div class=gdlr-core-accordion-item-content-wrapper>
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">High Quality Services</h4>
                                                        <div class=gdlr-core-accordion-item-content>
                                                            <p>At Logisco, we know experience matters. That’s why customers trust us — we have more than 60 years of experience in the logistics and transportation industry. For your services, this translates to competence around the globe. Using Logisco is easy. We deliver packages up to 50kg, anywhere in USA &#038; Europe. All you must do is place a single order with your local Logisco office. With just one booking, we will collect your shipment​​​​​​​ in a single vehicle at your location.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gdlr-core-accordion-item-tab clearfix ">
                                                    <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                    <div class=gdlr-core-accordion-item-content-wrapper>
                                                        <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">No Hassle Pricing</h4>
                                                        <div class=gdlr-core-accordion-item-content>
                                                            <p>At Logisco, we know experience matters. That’s why customers trust us — we have more than 60 years of experience in the logistics and transportation industry. For your services, this translates to competence around the globe. Using Logisco is easy. We deliver packages up to 50kg, anywhere in USA &#038; Europe. All you must do is place a single order with your local Logisco office. With just one booking, we will collect your shipment​​​​​​​ in a single vehicle at your location.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gdlr-core-pbf-column gdlr-core-column-30">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 17px ;">
                                                <div class="gdlr-core-title-item-title-wrap ">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Info For Asian Clients<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 10px ;">
                                                <div class=gdlr-core-text-box-item-content style="text-transform: none ;">
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 45px ;"><a class="gdlr-core-button  gdlr-core-button-gradient gdlr-core-button-no-border" href=# style="font-size: 12px ;font-weight: 700 ;letter-spacing: 1px ;padding: 9px 18px 11px 20px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: #e53c35 ;"><span class=gdlr-core-content >Learn More</span></a></div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 17px ;">
                                                <div class="gdlr-core-title-item-title-wrap ">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 700 ;letter-spacing: 0px ;text-transform: none ;">Info For EU Clients<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 10px ;">
                                                <div class=gdlr-core-text-box-item-content style="text-transform: none ;">
                                                    <p>Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=gdlr-core-pbf-element>
                                            <div class="gdlr-core-button-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align"><a class="gdlr-core-button  gdlr-core-button-gradient gdlr-core-button-no-border" href=# style="font-size: 12px ;font-weight: 700 ;letter-spacing: 1px ;padding: 9px 18px 11px 20px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;background: #e53c35 ;"><span class=gdlr-core-content >Learn More</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gdlr-core-pbf-wrapper " style="padding: 650px 0px 30px 0px;" id=gdlr-core-wrapper-2>
                    <div class=gdlr-core-pbf-background-wrap>
                        <div class="gdlr-core-pbf-background gdlr-core-parallax gdlr-core-js" style="background-image: url(upload/quote-truck-bg.jpg) ;background-size: cover ;background-position: center ;" data-parallax-speed=0.2></div>
                    </div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container"></div>
                    </div>
                </div>
            </div>
        </div>
<?php 
include "footer.inc.php";
?>
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
