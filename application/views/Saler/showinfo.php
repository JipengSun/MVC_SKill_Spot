<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/23
 * Time: 14:44
 */
$this->load->helper('url');
//echo var_dump($info);
?>
<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="<?php echo base_url();?>CSS/index.css">
<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/salerInfo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/dist/css/lightbox.min.css">
    <script src="<?php echo base_url();?>JS/dist/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
<div id="login-window">
    <a href="javascript:closeLogin()"><img class="close-icon" src="<?php echo base_url();?>img/close-icon.png" ></a>

    <div class="login-subwin">

        <form action="<?php echo site_url('indice/login')?>" method="post">
            <br>
            <br>
            E-address:&nbsp <input id="login-E" name = 'email' type="text">
            <br>
            <label class="warn-text" id="login-win-e-label"> </label>
            <br>
            Password:&nbsp&nbsp&nbsp<input class="login-pw" name = 'login-pw' type="password">
            <br>
            <label class="warn-text" id="login-win-p-label"> </label>
            <br>
            <input id="login" class="login-submit" type="submit" value="login" onclick="subLogin()">
        </form>
    </div>
</div>

<div id="signup-window">
    <a href="javascript:closeSignup()"><img class="close-icon" src="<?php echo base_url();?>img/close-icon.png" ></a>

    <div class="signup-subwin">
        <form action="<?php echo site_url('indice/register')?>" method="post">
            <br>
            <br>
            Username:&nbsp
            <input id="username" name="username" placeholder="username" type="text">
            <br>
            E-address:&nbsp
            <input id="signup-E" name="signup-E" placeholder="E-mail" type="text">
            <br>
            <label class="warn-text" id="signup-win-e-label"> </label>
            <br>
            Password:&nbsp&nbsp
            <input id="signup-pw" name="signup-pw" placeholder="password" type="password">
            <br>
            <label class="warn-text" id="signup-win-p-label"> </label>
            <br>
            Please Reinput your Password:&nbsp&nbsp&nbsp
            <input id="signup-repw" name="signup-repw" placeholder="password" type="password">
            <br>
            <br>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <br>
            <br>
            <input class="signup-submit" type="submit" value="signup" onclick="subSignup()">
        </form>

    </div>
</div>

<div id="black"></div>
<div class="top">


    <div class="top-bar">
        <div class="home-holder">
            <a href="<?php echo site_url('indice/index')?>" style="text-decoration: none">
                <span class = "logo-name">SkillSpot</span></a>
        </div>

        <?php
        @session_start();
        if (isset($_SESSION["username"])) {
            echo "<div class = \"account-setup\" id=\"account-before-login\" style='display: none'>";
        } else {
            echo "<div class = \"account-setup\" id=\"account-before-login\">";
        }
        ?>
        <input type="button" value="Log in" class = "log-icon" onclick="openLogin()"/>
        <input type="button" value="Sign up" class = "log-icon" onclick="openSignup()"/>
    </div>

    <?php
    @session_start();
    if (isset($_SESSION["username"])) {
        //echo $_SESSION['username'];
        echo "<div class = \"account-setup\" id = \"account-after-login\">";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>';
        //echo '<script src=';
        //echo base_url();
        //echo 'JS/mynotif.js ></script>';
        $name = $_SESSION["username"];
        $url1 = site_url('backend/list')."/". $name;
        $url2 = site_url('profile/setup')."/".$name;
        $url3 = site_url('indice/logout');

//        echo "<a \" href=\"$url1\">Backend</a>";
        echo "&nbsp;";
        echo "<a \" href=\"$url2\">$name</a>";
        echo "&nbsp;";
        echo "<a id=\"id-after-login\" href=\"$url3\">Logout</a>";
    } else {
        echo "<div class = \"account-setup\" id = \"account-after-login\" style=\"display: none\">";
        //<input type="submit"  href="<?php echo site_url('indice/logout')" value="log out" class = "logout-icon" onclick="logout()" />
    }
    ?>
</div>

</div>

    <div class="personInfo-container">
        <div id="personInfo">
            <pre>Name:   <?php echo $info[0]['username']?></pre>
            <pre>Email:  <?php echo $info[0]['mail']?></pre>
            <pre>Number: <?php echo $info[0]['phonenumber']?></pre>
            <pre>Services: </pre>
            <form method="post"  action="<?php echo site_url("Salerinfo/order/").$info[0]['uid']?>">
                <select style="width: 350px" name = 'service'>
                    <?php
                    for ($i=0; $i< sizeof($info) ; $i++) {
                        ?>
                        <option value="<?php echo $info[$i]['sid'] ?>"><?php echo 'Service Name: '.$info[$i]['sname'].', Price: '.$info[$i]['price'].'$' ?></option>
                        <?php
                    }
                    ?>
                </select>
                <br/>
               <pre>Leave an order message: </pre>
                <textarea name="msg" cols="50" rows="4"></textarea>

                <input type="submit" value="ORDER">
            </form>

        </div>

        <div id="profile-container">
            <?php
            //use php echo to output
            echo "<a class=\"example-image-link\" href=\"".$info[0]['profile']."\"data-lightbox=\"example-1\"><img src=\"".$info[0]['profile']."\" alt=\"image-1\" style=\"width: 150px; height: 180px\"/></a>";

            ?>

        </div>
    </div>

    <div id="summary-container">
        <?php echo $info[0]['pdescription']?>
    </div>

<div style="height: 200px">

</div>



</div>

</body>
</html>