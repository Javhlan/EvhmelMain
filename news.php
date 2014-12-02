<?php
session_start();
?>
<?php
if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['confpass'])) {
    if ($_POST['newpass'] == $_POST['confpass']) {
        include_once 'connection.php';
        if (isset($_SESSION['username'])) {
            $result = $db->query('SELECT ner,pass FROM user WHERE username = "' . $_SESSION['username'] . '" AND pass = "' . $_POST['oldpass'] . '" ');
            if ($result) {
                $db->query('UPDATE user SET pass = "' . ($_POST['newpass']) . '" WHERE username = "' . $_SESSION['username'] . '"');

                $message = "Амжилттай хадгалагдлаа.";
            } else {
                $message = "Алдаа гарлаа.";
            }
        }
    } else {
        $message = "Таны шинэ нууц үгийн баталгаажуулалт буруу байна.";
    }
} else {
    $message = "Та талбаруудыг бүрэн бөглөнө үү!";
}
?>
<?php
if (isset($_POST["nevtrehner"], $_POST["nevtrehpass"])) {
    $name = $_POST['nevtrehner'];
    include_once 'connection.php';
    $result = $db->query('SELECT * FROM user WHERE username = "' . $_POST['nevtrehner'] . '" AND pass = "' . $_POST['nevtrehpass'] . '"');
    if ($result->num_rows == 1) {
        $row = mysql_fetch_assoc($result);
        session_start();
        $_SESSION['username'] = $name;
        header('Location: index.php');
    } else {
        $message = "Таны нэр эсвэл нууц үг буруу байна!";
    }
}
?>

<?php
if (isset($_POST['ovog']) && isset($_POST['ner']) && isset($_POST['pass']) && isset($_POST['confpass']) && isset($_POST['email'])) {
    if ($_POST['pass'] == $_POST['confpass']) {
        $ovog = $_POST['ovog'];
        $ner = $_POST['ner'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        include_once 'connection.php';
        $result = $db->query('INSERT INTO user (ovog, ner,username, pass, email) VALUES("' . $_POST['ovog'] . '", '
                . ' "' . $_POST['ner'] . '","' . $_POST['username'] . '", "' . $_POST['pass'] . '", "' . $_POST['email'] . '")');
        if ($result) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            $message = "Та амжилттай бүртгэгдлээ.";
        } else {
            $message = "Бүртгэл хийхэд алдаа гарлаа.";
        }
    } else {
        $message = "Таны нууц үг зөрж байна.";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Зургийн сан</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="main">
            <div class="page">
                
                <div class="content">
                    <div class="left">
                        <h1 class="title">Зураг нэмэх</h1>
                        </p>
                        <form action="news.php" method ="POST" name="medeenemeh" enctype="multipart/form-data">
                            <div><label>Гарчиг:</label>
                                <input type="text" name="title"/></div>
                            <div><label>Зураг</label>
                                <input type="file" name="image"></div>
                            <div><label>Товч тайлбар:</label>
                                <textarea name="tovch"></textarea></div>
                            <div><label>Дэлгэрэнгүй тайлбар:</label>
                                <textarea name="tailbar"></textarea></div>
                            <input type="submit" name="upload" value="Нэмэх"/>
                        </form>
                        <?php
                        
                        if (isset($_POST['upload'])) {
                            include_once 'connection.php';
                            $title = $_POST['title'];
                            $tovch = $_POST['tovch'];
                            $tailbar = $_POST['tailbar'];
                            //$postUser = $_SESSION['username'];
                            
                            $image_name = $_FILES['image']['name'];
                            $image_type = $_FILES['image']['type'];
                            $image_size = $_FILES['image']['size'];
                            $image_tmp_name = $_FILES['image']['tmp_name'];
                            if(isset($_SESSION['username'])){
                            if ($image_name == '') {
                                echo "<script>alert('Ta zurgaa songono uu')</script>";
                                exit();
                            } else {
                                move_uploaded_file($image_tmp_name, "photos/$image_name");
                                $result = $db->query('INSERT INTO news (title, tovch, tailbar, postUser, postDate,imageName) VALUES("' . $_POST['title'] . '", '
                                        . ' "' . $_POST['tovch'] . '", "' . $_POST['tailbar'] . '", "' . $_SESSION['username'] . '", NOW(), "' . $image_name. '")');
                                if ($result) {
                                    $newsmessage = "Мэдээлэл амжилттай нэмэгдлээ.";
                                } else {
                                    $newsmessage = "Мэдээлэл нэмэхэд алдаа гарлаа.";
                                }
                                //echo "Image uploaded<br>";
                                //echo "<img src='photos/$image_name'>";
                            }
                        }else{
                            $newsmessage = "Та бүртгэлгүй байна.";
                        }
                        }
                        ?>
                        <?php
                        if (isset($newsmessage)) {
                            echo $newsmessage;
                        }
                        ?>

                    </div>
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <div class="right">
                            <h2>Нэвтрэх</h2>
                            <form method = "POST">

                                <input type="text" name="nevtrehner" placeholder="Нэр">
                                <input type="password" name="nevtrehpass" 
                                       placeholder="Нууц үг">
                                <input type="submit" name ="login" value ="Нэвтрэх"/><br>
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </form>
                            <h2>Бүртгүүлэх</h2>
                            <form method="POST">
                                <input type="text" class = "burtgel" id="ovog" 
                                       name="ovog" placeholder="Овог" ></p>
                                <input type="text" class = "burtgel" id="ner" 
                                       name="ner" placeholder="Нэр"></p>
                                <input type="text" class = "burtgel" id="ner" 
                                       name="username" placeholder="Нэвтрэх нэр"></p>
                                <input type="password" id="pass" name="pass" 
                                       placeholder="Нууц үг"></p>
                                <input type="password" id="confpass" name="confpass" 
                                       placeholder="Нууц үгээ давтах"></p>
                                <input type="text" id="email" name="email" 
                                       placeholder="Цахим шуудан"></p>
                                <p><input type="submit" value="Бүртгүүлэх"></p>
                            </form>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <div class="right">
                            <h2>Тавтай морил</h2>
                            <form method = "POST">
                                Hello
                                <?php
                                //session_start();
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                }
                                ?>
                                !<br>
                                <a href="logout.php">Log Out</a>

                            </form>
                            <h2>Нууц үг солих</h2>
                            <form method="POST">
                                <input type="text" id="oldpass" name="oldpass" placeholder="Хуучин нууц үг"></p>
                                <input type="password" id="pass" name="newpass" placeholder="Нууц үг"></p>
                                <input type="password" id="confpass" name="confpass" placeholder="Нууц үгээ давтах"></p>
                                <p><input type="submit" value="Солих"></p>
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </form>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
