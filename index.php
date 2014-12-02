<?php
if (isset($_GET['signup'])) {
    /* if (empty($_GET['username'])) {
      $message = "Хэрэглэгчийн нэрээ оруулна уу.";
      } else {
      $username = $_GET['username'];
      }
      if (empty($_GET['email'])) {
      $message = "Цахим хаягаа оруулна уу.";
      }else {
      $email = $_GET['email'];
      }
      if (empty($_GET['password'])) {
      $message = "Нууц үгээ оруулна уу.";
      } else {
      $password = $_GET['password'];
      }
      if (empty($_GET['password1'])) {
      $message = "Нууц үгээ оруулна уу.";
      } else {
      $password1 = $_GET['password1'];
      } */
    if (!empty($_GET['username']) && !empty($_GET['email']) && !empty($_GET['password']) && !empty($_GET['password1'])) {
        $username = $_GET['username'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $password1 = $_GET['password1'];
            include_once './connection.php';
            $result = $db->query('SELECT user_name FROM user WHERE user_name = "' . $username . '"');
            $row = $result->fetch_object();
            if($row){
                $message = "Хэрэглэгчийн нэр давхцсан байна";
            }else{
                if ($password == $password1) {
            $result = $db->query('INSERT INTO user (user_name, user_email, user_pass) VALUES("' . $username . '", '
                    . ' "' . $email . '","' . $password . '")');
            if ($result) {
                session_start();
                $_SESSION['username'] = $username;
                header('Location: index.php');
                $message = "Та амжилттай бүртгэгдлээ.";
            } else {
                $message = "Бүртгэл хийхэд алдаа гарлаа.";
            }
            }else {
            $message = "Таны баталгаажуулах нууц үг буруу байна.";
        }
            }
    } else {
        $message = "Та мэдээллийг бүрэн бөглөнө үү.";
    }
}

if (isset($_GET['login'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    if (!empty($_GET['username']) && !empty($_GET['password'])) {
        include_once './connection.php';
        $result = $db->query('SELECT * FROM user WHERE user_name = "' . $username . '" AND user_pass = "' . $password . '"');
        if ($result->num_rows == 1) {
            $row = mysql_fetch_assoc($result);
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            $message = "Таны нэр эсвэл нууц үг буруу байна!";
        }
    }
}
?>
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
                    </ul>
                </div>
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    $sesUser = $_SESSION['username'];
                    ?>
                    <div class="sign-ligin-btns">
                        <ul>
                            <li id="signupContainer"><a class="signup" id="signupButton" href="#"><span><i><?php echo $sesUser; ?></i></span></a>

                                <div id="signupBox">                
                                    <form method="GET" id="signupForm">
                                        <fieldset id="signupbody">
                                            <fieldset>
                                                <label><a href="#">Хувийн мэдээлэл</a></label>
                                            </fieldset>
                                            <fieldset>
                                                <label><a href="#">Хадгалсан үгс</a></label>
                                            </fieldset>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- Login Ends Here -->
                            </li>
                            <li id="loginContainer"><a class="login" id="loginButton" href="#"><span><i>Тохиргоо</i></span></i></a>
                                <div class="clear"> </div>
                                <div id="loginBox">                
                                    <form method="GET" id="loginForm">
                                        <fieldset id="body">
                                            <span><input type="submit" name="logout" id="logout" value="Гарах" /></span>
                                            <fieldset>
                                                <label style="float:center">Нууц үгээ солих</label>
                                            </fieldset> 
                                            <fieldset>
                                                <label for="oldpassword">Хуучин нууц үг</label>
                                                <input type="text" name="oldpassword" id="username" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Нууц үг</label>
                                                <input type="password" name="password" id="password" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password1">Нууц үгээ давтана уу</label>
                                                <input type="password" name="password1" id="password" />
                                            </fieldset>
                                            <input type="submit" id="changepass" name="changepass" value="Солих" />
                                        </fieldset>
                                    </form>
                                </div>
                                <?php
                                if (isset($_GET['logout'])) {
                                    session_destroy();
                                    header('Location: index.php');
                                }

                                if (isset($_GET['changepass'])) {
                                    if (!empty($_GET['oldpassword']) && !empty($_GET['password']) && !empty($_GET['password1'])) {
                                            include_once './connection.php';
                                            $result = $db->query('SELECT user_pass FROM user WHERE user_name = "' . $_SESSION['username'] . '"');
                                            $row = $result->fetch_object();
                                            $pawo = $row->user_pass;
                                            if($_GET['oldpassword'] == $pawo){
                                                if ($_GET['password'] == $_GET['password1']) {
                                                    $db->query('UPDATE user SET user_pass = "' . ($_GET['password']) . '" WHERE user_name = "' . $_SESSION['username'] . '"');
                                                    $message = "Амжилттай хадгалагдлаа.";
                                                    header('Location: index.php');
                                                }else{
                                                    $message = "Таны баталгаажуулах нууц үг буруу байна.";
                                            }
                                        } else {
                                            $message = "Хуучин нууц үг буруу байна";
                                        }
                                    }
                                }
                                ?>
                                <!-- Login Ends Here -->
                            </li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="message"> <?php
                            if (isset($message)) {
                                echo $message;
                            } else {
                                $message = "";
                            }
                            ?></div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="sign-ligin-btns">
                        <ul>
                            <li id="signupContainer"><a class="signup" id="signupButton" href="#"><span><i>Бүртгүүлэх</i></span></a>

                                <div id="signupBox">                
                                    <form method="GET" id="signupForm">
                                        <fieldset id="signupbody">
                                            <fieldset>
                                                <label for="username">Хэрэглэгчийн нэр <span>*</span></label>
                                                <input type="text" name="username" id="signupusername" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="email">Цахим хаяг <span>*</span></label>
                                                <input type="text" name="email" id="signupemail" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Нууц үг <span>*</span></label>
                                                <input type="password" name="password" id="signuppassword" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password1">Нууц үгээ давтана уу <span>*</span></label>
                                                <input type="password" name="password1" id="signuppassword1" />
                                            </fieldset>
                                            <input type="submit" id="signup" name="signup" value="Бүртгүүлэх" />
                                        </fieldset>
                                    </form>
                                </div>

                            </li>
                            <li id="loginContainer"><a class="login" id="loginButton" href="#"><span><i>Нэвтрэх</i></span></i></a>
                                <div class="clear"> </div>
                                <div id="loginBox">                
                                    <form method="GET" id="loginForm">
                                        <fieldset id="body">
                                            <fieldset>
                                                <label for="username">Хэрэглэгчийн нэр</label>
                                                <input type="text" name="username" id="username" />
                                            </fieldset>
                                            <fieldset>
                                                <label for="password">Нууц үг</label>
                                                <input type="password" name="password" id="password" />
                                            </fieldset>
                                            <input type="submit" name="login" id="login" value="НЭВТРЭХ" />
                                        </fieldset>
                                        <span><a href="#">Forgot your password?</a></span>
                                    </form>
                                </div>
                                <!-- Login Ends Here -->
                            </li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="message"> <?php
                            if (isset($message)) {
                                echo $message;
                            } else {
                                $message = "";
                            }
                            ?></div>
                    </div>
                    <?php
                }
                ?>
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
                            <textarea name="myText" onkeydown="if (event.keyCode == 13)
                                        document.getElementById('horvuul').click()" rows="5" cols="29" id="myText" value=""></textarea>

                        </div>
                    </div>
                    <div class="top-grid-mid">
                        <div class="horvuuleh"></div>

                        <input type="submit" id="horvuul" class="Horvuulehbutton" name="horvuul" value="Хөрвүүлэх"/>

                    </div>
                </form>
                <div class="top-grid"><a href="#">Эвхмэл хэлбэр</a>
                    <div class="evhmel-pic">
                        <?php
                        if (isset($_GET['horvuul'])) {
                            $str = $_GET['myText'];
                            
                            //$val = mb_convert_encoding($str, "ASCII", "auto");
                            $array = str_split($str);
                            
                            foreach ($array as $b) {
                               
                                ?><div style="margin-bottom:-4.4px; padding: 0px;"><img  src="test.php?b=<?php echo $b; ?>"></div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tools">
                    <form method="GET" name="ImageTools">
                    <input type="image" id="saveImage" name="saveImage" src="images/save.png"><br>
                    <input type="image" id="addImage" name="addImage" src="images/add.png">
                    </form>
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
                        <li><a class="youtube" href="https://mail.google.com/mail/u/0/#inbox?compose=14a05efa1d40050a" target="_blank"> </a></li>
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

