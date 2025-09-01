<footer>
            <div class="logisco-footer-wrapper ">
                <div class="logisco-footer-container logisco-container clearfix">
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-15">
                        <div id=text-1 class="widget widget_text logisco-widget">
                            <div class=textwidget>
                                <p><img class="alignnone size-full wp-image-5803" src=upload/logo.png alt width=138>
                                    <br/> <span class=gdlr-core-space-shortcode style="margin-top: -27px ;"></span>
                                    <br/> Logistco is one of the world’s leading logistics companies. Its strong market position lies in the seafreight, airfreight, contract logistics and overland businesses.</p>
                                <div class="gdlr-core-social-network-item gdlr-core-item-pdb  gdlr-core-none-align" style="padding-bottom: 0px ;"><a href=#url target=_blank class=gdlr-core-social-network-icon title=facebook style="font-size: 16px ;color: #fff ;"><i class="fa fa-facebook" ></i></a><a href=# target=_blank class=gdlr-core-social-network-icon title=linkedin style="font-size: 16px ;color: #fff ;"><i class="fa fa-linkedin" ></i></a><a href=# target=_blank class=gdlr-core-social-network-icon title=skype style="font-size: 16px ;color: #fff ;"><i class="fa fa-skype" ></i></a><a href=#url target=_blank class=gdlr-core-social-network-icon title=twitter style="font-size: 16px ;color: #fff ;"><i class="fa fa-twitter" ></i></a><a href=# target=_blank class=gdlr-core-social-network-icon title=vimeo style="font-size: 16px ;color: #fff ;"><i class="fa fa-vimeo" ></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-15">
                        <div id=text-5 class="widget widget_text logisco-widget">
                            <h3 class="logisco-widget-title">Contact Info</h3><span class=clear></span>
                            <div class=textwidget>
                                <p>Box 3233
                                    <br/> 1810 Kings Way
                                    <br/> King Street, 5th Avenue, New York</p>
                                <p><span style="color: #fff;">+1-2355-3345-5</span>
                                    <br/> <span style="color: #e53d34;">contact@logiscocorp.com</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="logisco-footer-column logisco-item-pdlr logisco-column-30">
                        <div id=gdlr-core-custom-menu-widget-2 class="widget widget_gdlr-core-custom-menu-widget logisco-widget">
                            <h3 class="logisco-widget-title">Useful Links</h3><span class=clear></span>
                            <div class=menu-useful-links-container>
                                <ul id=menu-useful-links class="gdlr-core-custom-menu-widget gdlr-core-menu-style-half">
                                    <li class="menu-item"><a href=our-services.html>Our Services</a></li>
                                    <li class="menu-item"><a href=portfolio-modern-3-columns.html>Case Study</a></li>
                                    <li class="menu-item"><a href=industry-solutions.html>Industry Solutions</a></li>
                                    <li class="menu-item"><a href=career.html>Seeking For Career</a></li>
                                    <li class="menu-item"><a href=#>Investor Relation</a></li>
                                    <li class="menu-item"><a href=#>Our Clients</a></li>
                                    <li class="menu-item"><a href=get-a-quote.html>Get A Quote</a></li>
                                    <li class="menu-item"><a href=#>FAQ</a></li>
                                    <li class="menu-item"><a href=contact.html>Contact</a></li>
                                    <li class="menu-item"><a href=#>Media Relation</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=logisco-copyright-wrapper>
                <div class="logisco-copyright-container logisco-container clearfix">
                    <div class="logisco-copyright-left logisco-item-pdlr">Copyright 2019 Logisco, All Right Reserved</div>
                    <div class="logisco-copyright-right logisco-item-pdlr"><a href=# style=margin-left:21px;>Home</a><a href=# style=margin-left:21px;>About       </a><a href=# style=margin-left:21px;>Updates</a><a href=# style=margin-left:21px;>Services</a><a href=# style=margin-left:21px;>Contact</a></div>
                </div>
            </div>
        </footer>
    </div>
</div>

	<script src='js/jquery/jquery.js'></script>
	<script src='js/jquery/jquery-migrate.min.js'></script>
	<script src='plugins/goodlayers-core/plugins/combine/script.js'></script>
	<script>
	    var gdlr_core_pbf = {
	        "admin": "",
	        "video": {
	            "width": "640",
	            "height": "360"
	        },
	        "ajax_url": ""
	    };
        
	</script>
	<script src='plugins/goodlayers-core/include/js/page-builder.js'></script>
	<script src='js/jquery/jquery.blockUI.min.js'></script>
	<script src='js/jquery/ui/effect.min.js'></script>
	<script src='js/jquery.mmenu.js'></script>
	<script src='js/jquery.superfish.js'></script>
	<script src='js/plugins.js'></script>
    <script type="text/javascript" src="plugins/quform/js/plugins.js"></script>
    <script type="text/javascript" src="plugins/quform/js/scripts.js"></script> 
</body>
<script>
    // Prevent default form submission and show modal with calculated total
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent actual form submission

        // Get the input values
        let quantity = parseFloat(document.querySelector('input[name="your-quantity"]').value) || 0;
        let weight = parseFloat(document.querySelector('input[name="your-weight"]').value) || 0;
        let width = parseFloat(document.querySelector('input[name="your-width"]').value) || 0;
        let height = parseFloat(document.querySelector('input[name="your-height"]').value) || 0;

        // Calculate total amount (modify the formula as needed)
        let totalAmount = quantity * (weight + width + height);

        // Display the calculated total amount in the modal
        document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);

        // Show the modal by setting display to 'flex'
        document.getElementById('confirmationModal').style.display = 'flex';
    });

    // Function to close modal
    function closeModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    // Function to confirm submission
    function confirmSubmission() {
        // Hide modal
        closeModal();
        
        // Now actually submit the form
        document.querySelector('form').submit();
    }
</script>

<!-- Mirrored from max-themes.net/demos/logisco/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Oct 2024 06:51:26 GMT -->
</html>
