<!DOCTYPE html>
<html lang="en">
<?php $this->load->helper('url');?>
<link rel="stylesheet" href="<?php echo base_url();?>CSS/index.css">
<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>

    <script src="<?php echo base_url();?>JS/index.js"></script>

</head>
<body>

<div id="login-window">
    <a href="javascript:closeLogin()"><img class="close-icon" src="<?php echo base_url();?>img/close-icon.png" ></a>

    <div class="login-subwin">
        <form action="login" method="post">
            <br>
            <br>
            E-address:&nbsp
            <input id="login-E" type="text" name="email">
            <br>
            <label class="warn-text" id="login-win-e-label" > </label>
            <br>
            Password:&nbsp&nbsp&nbsp
            <input class="login-pw" type="password" name="password">
            <br>
            <label class="warn-text" id="login-win-p-label"> </label>
            <br>
            <input class="login-submit" type="submit" value="login" onclick="subLogin()">
        </form>


    </div>

</div>

<div id="signup-window">
    <a href="javascript:closeSignup()"><img class="close-icon" src="<?php echo base_url();?>img/close-icon.png" ></a>

    <div class="signup-subwin">
        <h5><?php echo validation_errors();?></h5>
        <form action="register" method="post">
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

<div class="top" style = "background-image: url('<?php echo base_url();?>img/back.jpg')">
    <div class="top-bar">
        <div class="home-holder">
            <a href="index.html"> <img src="<?php echo base_url();?>img/home.png" class="home-icon"></a>
        </div>

        <div class = "account-setup" id="account-before-login">
            <input type="button" value="Log in" class = "login-icon" onclick="openLogin()"/>
            <input type="button" value="Sign up" class = "signup-icon" onclick="openSignup()"/>
        </div>

        <div class = "account-setup" id = "account-after-login" style="display: none">
            <a id="id-after-login" href="javascript: "></a>
            <input type="button" value="log out" class = "logout-icon" onclick="logout()"/>
        </div>

    </div>

    <br>

    <div class = "logo">
        <span class = "logo-name">SkillSpot</span>
    </div>

    <br><br>

    <div class= "search-line">
        <input type="text" class = "textbox-search" placeholder="I'm looking for ...">
        <input type="text" class = "textbox-location" placeholder="Location">
        <input type="button" value="Search" class = "search-btn"/>
    </div>

    <br>

    <div class="cate">
        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/Repair.jpg')">
            <div class="cate-text">
                <span >Handyman Services</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/deliver.jpg')">
            <div class="cate-text">
                <span >Pick & Delievery</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/law.png')">
            <div class="cate-text">
                <span >Legal Consulting</span>
            </div>

        </div>
    </div>

    <br>

    <div class="cate">
        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/moving.png')">

            <div class="cate-text">
                <span >Moving</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/it.png')">

            <div class="cate-text">
                <span >IT</span>
            </div>
        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/tutor.jpg')">
            <div class="cate-text">
                <span >Study</span>
            </div>
        </div>

    </div>

    <br><br>
</div>

<div class="copyright">
    <br>
    SKILLSPOT Pty. Ltd 2011-2018©, All rights reserved
</div>

</body>
</html>