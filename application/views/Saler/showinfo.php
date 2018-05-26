<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/23
 * Time: 14:44
 */
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/salerInfo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/index.css">
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/dist/css/lightbox.min.css">
    <script src="<?php echo base_url();?>JS/index.js"></script>

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
        echo '<script src=';
        echo base_url();
        echo 'JS/mynotif.js ></script>';
    } else {
        echo "<div class = \"account-setup\" id = \"account-after-login\" style=\"display: none\">";
        //<input type="submit"  href="<?php echo site_url('indice/logout')" value="log out" class = "logout-icon" onclick="logout()" />
    }
    ?>
    <a id="id-after-login" href="<?php echo site_url('profile/setup')?> "><?php echo $_SESSION["username"]?></a>
    <a id="id-after-login" href="<?php echo site_url('indice/logout')?> "><?php echo 'Log Out'?></a>
</div>

</div>

<br/>
<br/>
    <div class="personInfo-container">
        <div id="personInfo">
            <pre>Name:   Frank Lu</pre>
            <pre>Email:  527668971@qq.com</pre>
            <pre>Number: 0422148864</pre>
            <pre>Services: </pre>
            <select style="width: 250px">
                <option value="hand">Handyman, $20/h, 2 David Cl, Sunnybank Hills</option>
                <option value="delievery">Handyman, $20/h, 2 David Cl, Sunnybank Hills</option>
                <option value="law">Handyman, $20/h, 2 David Cl, Sunnybank Hills</option>
                <option value="moving">Handyman, $20/h,ffffffffffffff 2 David Cl, Sunnybank Hills</option>
                <option value="it">Handyman, $20/h, 2 David Cl, Sunnybank Hills</option>
                <option value="study">Handyman, $20/h, 2 David Cl, Sunnybank Hills</option>
            </select>

            <input type="submit" value="ORDER">
        </div>

        <div id="profile-container">
            <?php
            //use php echo to output
            echo "<a class=\"example-image-link\" href=\"".base_url()."/img/SRZK.png\"data-lightbox=\"example-1\"><img src=\"".base_url()."/img/SRZK.png\" alt=\"image-1\" style=\"width: 150px; height: 180px\"/></a>";

            ?>

        </div>
    </div>

    <div id="summary-container">

        From Wikipedia, the free encyclopedia
        ISSR may refer to:

        International Society for Science and Religion
        inter-simple sequence repeat, a general term for a genome region between microsatellite loci.
        Institute of Statistical Studies and Research

    </div>

    <div id="review-container">

        <?php

        $_sample = array(["id" => "lvzheng", "review"=>"good staff", "date"=>"2018-04-19 18:56:21"],
            ["id" => "lvzheng3", "review"=>"really bad", "date"=>"2018-04-19 15:16:21"],
            ["id" => "lvzheng3", "review"=>"really bad", "date"=>"2018-04-19 15:16:21"],
            ["id" => "lvzheng3", "review"=>"really bad", "date"=>"2018-04-19 15:16:21"]);

        foreach($_sample as $info) {
            $html_code =
                "<div style=\"width: 760px; height: 80px; background-color: rgb(170, 223, 253); margin: 5px auto; font-size: 13px;\">
                    <div style=\"overflow: auto; width: 760px;\">
                        <div style=\"width: 200px; height: 15px; float: left;\">ID: ".$info["id"]."</div>
                        <div style=\"width: 150px; height: 15px; float: right;\">".$info["date"]."</div>
                    </div>
                    <div style=\"width: 760px; height: 65px; overflow: hidden; text-overflow: ellipsis;\">".$info["review"]."</div>
                </div>";

            echo $html_code;
        }

        ?>


    </div>



</div>

</body>
</html>