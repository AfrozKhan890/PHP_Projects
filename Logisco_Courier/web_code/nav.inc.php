
<?php 
include 'connection.inc.php';




?>
<!DOCTYPE html>
<html lang=en-US class=no-js>



<!-- Mirrored from max-themes.net/demos/logisco/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Oct 2024 06:50:26 GMT -->
<head>
<script>

</script>

    <meta charset=UTF-8>
    <meta name=viewport content="width=device-width, initial-scale=1">

    <title>Logisco &#8211; Logistics &amp; Transportation HTML Template</title>


    <link rel=stylesheet href='https://fonts.googleapis.com/css?family=Assistant%3A200%2C300%2Cregular%2C600%2C700%2C800%7CKarla%3Aregular%2Citalic%2C700%2C700italic%7CPT+Sans%3Aregular%2Citalic%2C700%2C700italic&amp;subset=latin%2Chebrew%2Clatin-ext%2Ccyrillic-ext%2Ccyrillic&amp;ver=5.0.3' type=text/css media=all>


    <link rel=stylesheet href='plugins/goodlayers-core/plugins/combine/style.css' type=text/css media=all>
    <link rel=stylesheet href='plugins/goodlayers-core/include/css/page-builder.css' type=text/css media=all>
    <link rel=stylesheet href='plugins/revslider/public/assets/css/settings.css' type=text/css media=all>
    <link rel=stylesheet href='plugins/quform/css/base.css' type=text/css media=all>
    <link rel=stylesheet href='css/style-core.css' type=text/css media=all>
    <link rel=stylesheet href='css/logisco-style-custom.css' type=text/css media=all>

       <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<style>/* Notification Icon Styling */



.logisco-notification-dropdown {
    position: relative;
    display: inline-block;
    color: #333;
    cursor: pointer;
}

.logisco-notification-dropdown i.fa-bell {
    font-size: 20px;
    color: #333; /* Change this color to fit your theme */
    margin-right: 10px;
    position: relative;
}

.notification-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
}

/* Notification List Styling */
.notification-list {
    display: none; /* Hidden by default */
    position: absolute;
    right: 0;
    top: 30px;
    width: 250px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 10px;
}

.notification-list h4 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
}

.notification-list ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.notification-list ul li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.notification-list ul li a {
    color: #333;
    text-decoration: none;
}

.notification-list ul li a:hover {
    text-decoration: underline;
}

.view-all {
    display: block;
    text-align: center;
    margin-top: 10px;
    font-size: 14px;
    color: #007bff;
}

.view-all:hover {
    text-decoration: underline;
}
#notification-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #ff9800;
    color: white;
    text-align: center;
    padding: 10px;
    transform: translateY(100%);
    transition: transform 0.5s ease-in-out;
}

#notification-bar.open {
    transform: translateY(0);
}
/* Default notification bar style */
#notification-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #ff9800;
    color: white;
    text-align: center;
    padding: 10px;
    transform: translateY(100%); /* Initially hidden below the screen */
    transition: transform 0.5s ease-in-out; /* Smooth transition */
    z-index: 9999; /* Ensure it stays on top */
}

/* When notification bar is visible */
#notification-bar.open {
    transform: translateY(0); /* Moves the bar up into view */
}

</style>
<body class="home page-template-default page page-id-2039 gdlr-core-body logisco-body logisco-body-front logisco-full  logisco-with-sticky-navigation  logisco-blockquote-style-2 gdlr-core-link-to-lightbox" data-home-url=index.html>
<div class=logisco-mobile-header-wrap>
    <div class="logisco-mobile-header logisco-header-background logisco-style-slide logisco-sticky-mobile-navigation " id=logisco-mobile-header>
        <div class="logisco-mobile-header-container logisco-container clearfix">
            <div class="logisco-logo  logisco-item-pdlr">
                <div class=logisco-logo-inner>
                    <a class href=index.html><img src=upload/logo-big.png alt width=320 height=84 title=logo-big></a>
                </div>
            </div>
            
            <div class=logisco-mobile-menu-right>
                <div class=logisco-main-menu-search id=logisco-mobile-top-search> 
                    <div class="logisco-main-menu-right-wrap clearfix">
                <div class=logisco-top-search-wrap>
                    <div class=logisco-top-search-close></div>
                    <div class=logisco-top-search-row>
                        <div class=logisco-top-search-cell>
                            <form role=search method=get class=search-form action=#>
                            <input type=text class="search-field logisco-title-font" placeholder=Search... value name=s>
                            <div class=logisco-top-search-submit><i class="fa fa-search"></i></div>
                            <input type=submit class=search-submit value=Search>
                            <div class=logisco-top-search-close><i class=icon_close></i></div>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="logisco-notification-dropdown" onclick="toggleNotification()">
                            <i style="color: white;" class="fa fa-bell" id="notification-icon"></i>
                            <?php if (isset($_SESSION['notification'])): ?>
                                <span class="notification-count">1</span>
                            <?php endif; ?>
                            
                            <!-- Notification List -->
                            <div class="notification-list" id="notification-list">
                                <h4>Notifications</h4>
                                <ul>
                                    <li>
                                        <?php if (isset($_SESSION['notification'])): ?>
                                            <?php echo $_SESSION['notification']; ?>
                                            <br><a style="color: blue;" href="trace_courier.php">Trace Courier Here</a>
                                        <?php else: ?>
                                            Notification Bar is Empty
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
</div>
</div>
</div>
              
                                      
                            
 
                                    
                                  

                <div class=logisco-mobile-menu><a class="logisco-mm-menu-button logisco-mobile-menu-button logisco-mobile-button-hamburger" href=#logisco-mobile-menu><span></span></a>
                    <div class="logisco-mm-menu-wrap logisco-navigation-font" id=logisco-mobile-menu data-slide=right>
                        <ul id=menu-main-navigation class=m-menu>
                            <li class="menu-item menu-item-home current-menu-item"><a href=index.php>Home</a></li>
                            <li class="menu-item menu-item-home current-menu-item"><a href=trace_courier.php>Trace Courier</a></li>
                            <li class="menu-item menu-item-home current-menu-item"><a href=about.php>About Us</a></li>
                            <li class="menu-item menu-item-home current-menu-item"><a href=career.php>Career</a></li>
                            <li class="menu-item menu-item-home current-menu-item"><a href=contact.php>Contact Us</a></li>
                                     <?php if(isset($_SESSION['ADMIN_ROLE'])){?>
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=admin/index.php>Admin Dashboard</a></li>
                                        <?php  } ?>

                                    <?php if(isset($_SESSION['AGENT_ROLE'])){?>
                                     <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=admin/index.php>Admin Dashboard</a></li>
                                     <?php } ?>

                                    <?php 
                                    if(isset($_SESSION['LOGIN_STATUS'])){
                                        ?>
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu "><a style="color:red;" href=logout.php>LogOut</a></li>

                                       
                                        
                                        <?php
                                    }else{
                                        ?>
                                        
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu "><a style="color:red;" href=login.php>Login Now</a></li>
                                        
                                        <?php
                                    }
                                    ?>
                                    

                          
                               
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="logisco-body-outer-wrapper ">
    <div class="logisco-body-wrapper clearfix  logisco-with-transparent-header logisco-with-frame">
        <div class=logisco-header-background-transparent>
            <div class=logisco-top-bar>
                <div class=logisco-top-bar-background></div>
                <div class="logisco-top-bar-container logisco-top-bar-full ">
                    <div class="logisco-top-bar-container-inner clearfix">
                        <div class="logisco-top-bar-left logisco-item-pdlr">
                            <div class="gdlr-core-dropdown-tab gdlr-core-js clearfix">
                                <div class=gdlr-core-dropdown-tab-title><span class=gdlr-core-head>Pakistan</span>
                                  
                                </div>
                                <div class=gdlr-core-dropdown-tab-content-wrap>
                                    <div class="gdlr-core-dropdown-tab-content gdlr-core-active" data-index=0> <i class=icon_clock id="i_fdfd_0"></i>Mon - Fri / 08:00 - 18:00
                                        <div id="div_fdfd_0">|</div><i class="fa fa-envelope-open" id="i_fdfd_1"></i><a href=mailto:admin@logiscotheme.co>admin@logiscotheme.co</a>
                                        <div id="div_fdfd_1">|</div><i class="fa fa-phone" id="i_fdfd_2"></i>+92 3249210632</div>
                                    <div class="gdlr-core-dropdown-tab-content " data-index=1> <i class=icon_clock id="i_fdfd_3"></i>Mon - Fri / 09:00 - 19:00
                                        <div id="div_fdfd_2">|</div><i class="fa fa-envelope-open" id="i_fdfd_4"></i><a href=mailto:admin:@logiscotheme.co.uk>admin@logiscotheme.co</a>
                                        <div id="div_fdfd_3">|</div><i class="fa fa-phone" id="i_fdfd_5"></i>+92 3249210632</div>
                                </div>
                            </div>
                        </div><a class=logisco-top-bar-right-button href=get_quote.php target=_self>Get A Quote</a>
                        <div class="logisco-top-bar-right logisco-item-pdlr">
                            <div class=logisco-top-bar-right-social><a href=# target=_blank class=logisco-top-bar-social-icon title=facebook><i class="fa fa-facebook" ></i></a><a href=# target=_blank class=logisco-top-bar-social-icon title=linkedin><i class="fa fa-linkedin" ></i></a><a href=# target=_blank class=logisco-top-bar-social-icon title=twitter><i class="fa fa-twitter" ></i></a><a href=# target=_blank class=logisco-top-bar-social-icon title=instagram><i class="fa fa-instagram" ></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="logisco-header-wrap logisco-header-style-plain  logisco-style-menu-right logisco-sticky-navigation logisco-style-slide" data-navigation-offset=75>
                <div class=logisco-header-background></div>
                <div class="logisco-header-container  logisco-header-full">
                    <div class="logisco-header-container-inner clearfix">
                        <div class="logisco-logo  logisco-item-pdlr">
                            <div class=logisco-logo-inner>
                                <a class href=index.php><img src=upload/logo-big.png alt width=320 height=84 title=logo-big></a>
                            </div>
                        </div>
                        <div class="logisco-navigation logisco-item-pdlr clearfix ">
                            
                            <div class=logisco-main-menu id=logisco-main-menu>
                                <ul id=menu-main-navigation-1 class=sf-menu>
                                    
                                    <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=index.php>Home</a></li>
                                    <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=trace_courier.php>Trace Courier</a></li>
                                    <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=about.php>About Us</a></li>
                                    <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=career.php> Career</a></li>

                                    <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=contact.php>Contact Us</a></li>
                                    <?php 
                                    if(isset($_SESSION['ADMIN_ROLE'])){
                                        ?>
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=admin/index.php>Admin Dashboard</a></li>
                                        
                                        <?php
                                    }
                                        ?>
                                     <?php if(isset($_SESSION['AGENT_ROLE'])){?>
                                     <li class="menu-item menu-item-home current-menu-item logisco-normal-menu"><a href=agent/view-all-couriers.php>Agent Dashboard</a></li>
                                     <?php } ?>
                                    <?php 
                                    if(isset($_SESSION['LOGIN_STATUS'])){
                                        ?>
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu "><a style="color:red;" href=logout.php>LogOut</a></li>
                                               <!-- Notification Dropdown -->
                             <div class="logisco-main-menu-right-wrap clearfix">
                             <div class="logisco-notification-dropdown" onclick="toggleNotification()">
                            <i style="color: white;" class="fa fa-bell" id="notification-icon"></i>
                            <?php if (isset($_SESSION['notification'])): ?>
                                <span class="notification-count">1</span>
                            <?php endif; ?>
                            
                            <!-- Notification List -->
                            <div class="notification-list" id="notification-list">
                                <h4>Notifications</h4>
                                <ul>
                                    <li>
                                        <?php if (isset($_SESSION['notification'])): ?>
                                            <?php echo $_SESSION['notification']; ?>
                                            <br><a style="color: blue;" href="trace_courier.php">Trace Courier Here</a>
                                        <?php else: ?>
                                            Notification Bar is Empty
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
</div>
 
                                    </div>
                                        <?php
                                    }else{
                                        ?>
                                        
                                        <li class="menu-item menu-item-home current-menu-item logisco-normal-menu "><a style="color:red;" href=login.php>Login Now</a></li>
                                        <?php
                                    }
                                    ?>
                                    
                              
                                </ul>
                                <div class=logisco-navigation-slide-bar id=logisco-navigation-slide-bar></div>
                            </div>
                 

                    </div>
                </div>
            </header>
        </div>

        <script>
    function toggleNotification() {
        const notificationList = document.getElementById('notification-list');
        notificationList.style.display = 
            notificationList.style.display === 'none' || notificationList.style.display === '' ? 'block' : 'none';
    }

    // Optional: Close the notification list when clicking outside
    window.onclick = function(event) {
        const notificationDropdown = document.querySelector('.logisco-notification-dropdown');
        const notificationList = document.getElementById('notification-list');
        if (!notificationDropdown.contains(event.target)) {
            notificationList.style.display = 'none';
        }
    };
    $(window).scroll(function() {
    var scrollPos = $(window).scrollTop();
    
    // If the user scrolls down 100px, open the notification bar
    if (scrollPos > 100) {
        $('#notification-bar').addClass('open');
    } else {
        $('#notification-bar').removeClass('open');
    }
});
// Prevent the notification bar from closing when copying text
$('#notification-bar').on('mousedown', function(e) {
    e.preventDefault(); // Prevent default behavior
});
$('#notification-bar input').on('focus', function() {
    // Prevent closing when focusing on input field
    $('#notification-bar').addClass('open');
});
setTimeout(function() {
    $('#notification-bar').removeClass('open');
}, 5000); // 5 seconds

</script>


