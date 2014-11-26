<?php ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Монгол бичгийг эвхмэл хэлбэрлүү хөрвүүлэгч онлайн програм</title>
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="images/hu.jpg" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <!---strat-slider---->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/slider-style.css" />
    <script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
    <!---//strat-slider---->
    <!---start-login-script--->
    <script src="js/login.js"></script>
    <!---//End-login-script--->
    <!-----768px-menu----->
    <link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="js/jquery.mmenu.js"></script>
    <script type="text/javascript">
        //	The menu on the left
        $(function () {
            $('nav#menu-left').mmenu();
        });
    </script>
    <!-----//768px-menu----->
</head>
<body>
    <!---start-wrap---->
    <!------start-768px-menu---->
    <div id="page">
        <div id="header">
            <a class="navicon" href="#menu-left"> </a>
        </div>
        <nav id="menu-left">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="features.html">Features</a></li>
                <div class="clear"> </div>
            </ul>
        </nav>
    </div>
    <!------start-768px-menu---->
    <!---start-header---->
    <div class="header">
        <div class="wrap">
            <div class="header-left">
                <div class="logo">
                    <a href="index.php">Эвхмэл</a>
                </div>
            </div>
            <div class="header-right">
                <div class="top-nav">
                    <ul>
                        <li><a href="index.php">Нүүр хуудас</a></li>
                        <li><a href="about.html">Тухай</a></li>
                    </ul>
                </div>
                <div class="sign-ligin-btns">
                    <ul>
                        <li id="signupContainer"><a class="signup" id="signupButton" href="#"><span><i>Бүртгүүлэх</i></span></a>
                            <div class="clear"> </div>
                            <div id="signupBox">                
                                <form id="signupForm">
                                    <fieldset id="signupbody">
                                        <fieldset>
                                            <label for="email">Email Address <span>*</span></label>
                                            <input type="text" name="email" id="signupemail" />
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Choose Password <span>*</span></label>
                                            <input type="password" name="password" id="signuppassword" />
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Confirm Password <span>*</span></label>
                                            <input type="password" name="password" id="signuppassword1" />
                                        </fieldset>
                                        <input type="submit" id="signup" value="Register Now!" />
                                    </fieldset>
                                </form>
                            </div>
                            <!-- Login Ends Here -->
                        </li>
                        <li id="loginContainer"><a class="login" id="loginButton" href="#"><span><i>Нэвтрэх</i></span></i></a>
                            <div class="clear"> </div>
                            <div id="loginBox">                
                                <form id="loginForm">
                                    <fieldset id="body">
                                        <fieldset>
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" id="email" />
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" />
                                        </fieldset>
                                        <label class="remeber" for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                                        <input type="submit" id="login" value="login" />
                                    </fieldset>
                                    <span><a href="#">Forgot your password?</a></span>
                                </form>
                            </div>
                            <!-- Login Ends Here -->
                        </li>
                        <div class="clear"> </div>
                    </ul>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
    <!---//End-header---->

    <!----start-content--->
    <div class="content">
        <div class="wrap">
            <!--- start-top-grids---->
            <div class="top-grids">
                <form method="GET" name="textZ">
                    <div class="top-grid">

                        <a href="#">Бичвэр оруулна уу</a>
                        <div class="textarea1">
                            <textarea name="myText" rows="27" cols="55" id="myText" value=""></textarea>

                        </div>
                    </div>
                    <div class="top-grid-mid">
                        <div class="horvuuleh"></div>

                        <input type="submit" class="Horvuulehbutton" name="horvuul" value="Хөрвүүлэх"/>

                    </div>
                </form>
                <div class="top-grid"><a href="#">Эвхмэл хэлбэр</a>
                    <div class="evhmel-pic">
                        <?php
                        if (isset($_GET['horvuul'])) {
                            session_start();
                            $val = $_GET['myText'];
                            $array = str_split($val);
                            foreach ($array as $b) {
                                ?><img src="test.php?b=<?php echo $b; ?>">
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <div class="clear"> </div>
            </div>
        </div>

        <!---start-bottom-footer-grids---->
        <div class="footer-grids">
            <div class="wrap">
                <div class="footer-grid">
                    <h3>Холбоосууд</h3>
                    <ul>
                        <li><a href="http://www.munkho.de/wp/%D1%8D%D0%B2%D1%85%D0%BC%D1%8D%D0%BB-%D0%B1%D0%B8%D1%87%D0%B8%D0%B3-folded-script/" target="blank">Эвхмэл бичиг</a></li>
                        <li><a href="http://www.mongolisch-deutsch-dolmetscher.de/huuchin-mongol-durem.pdf" target="blank">Зөв бичих толь бичиг</a></li>
                        <li><a href="http://monscript.blogspot.com/" target="blank">Монгол бичиг</a></li>
                        <li><a href="#">Sign Up</a></li>
                    </ul>
                </div>
                <div class="footer-grid">
                    <h3>More</h3>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-grid">
                    <h3>Бидэнтэй холбогдох</h3>
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/humuun" target="_blank"> </a></li>
                        <li><a class="twitter" href="#"> </a></li>
                        <li><a class="youtube" href="https://mail.google.com/mail/u/0/#inbox?compose=149b9d976d034a1c" target="_blank"> </a></li>
                    </ul>
                    <p class="copy-right">Хөгжүүлсэн <a href="https://www.facebook.com/JavhlanE" target="_blank">Жавхлан</a></p>
                </div>
                <div class="footer-grid">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter to keep up-to-date with all the latest news.</p>
                    <form>
                        <input type="text" class="text" value="Your Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Your Name';
                                }">
                        <input type="text" class="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Your Email';
                                }">

                    </form>
                </div>

            </div>
        </div>
        <!---//End-bottom-footer-grids---->
    </div>
    <!----//End-content--->
    <!---//End-wrap---->
</body>
</html>

