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
        <br>
        <br>
        E-address:&nbsp <input id="login-E" type="text">
        <br>
        <label class="warn-text" id="login-win-e-label"> </label>
        <br>
        Password:&nbsp&nbsp&nbsp<input class="login-pw" type="password">
        <br>
        <label class="warn-text" id="login-win-p-label"> </label>
        <br>
        <input id="login" class="login-submit" type="submit" value="login" onclick="subLogin()">
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

<div class="top">
    <div class="top-bar">
        <div class="home-holder">
            <a href="index.html" style="text-decoration: none">
            <span class = "logo-name">SkillSpot</span></a>
        </div>

        <div class = "account-setup" id="account-before-login">
            <input type="button" value="Log in" class = "log-icon" onclick="openLogin()"/>
            <input type="button" value="Sign up" class = "log-icon" onclick="openSignup()"/>
        </div>

        <div class = "account-setup" id = "account-after-login" style="display: none">
            <a id="id-after-login" href="javascript: "></a>
            <input type="button" value="log out" class = "logout-icon" onclick="logout()"/>
        </div>

    </div>



    <div class = "main-body" style = "background-image: url('<?php echo base_url();?>img/back1.jpg')">
        <div class="main-body-text" id="main-body-text">
            <a style="font-size: 30px">Get more done</a>
            <br>
            <a style="font-size: 20px">We can help you to do every thing today</a>
            <br><br>
            <input class="btn-get-start" type="button" value="Get start now" onclick="getStart()">
        </div>
        <div class= "search-line" id= "search-line">
            <input type="text" class = "textbox-search" placeholder="I'm looking for ...">
            <input type="text" class = "textbox-location" placeholder="Location">
            <input type="button" value="Go" class = "search-btn"/>
        </div>

    </div>




    <br>

    <div class="cate">
        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/Repair.jpg')">
            <div class="cate-text">
                <span style="color: #3A8DB0;">Handyman Services</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/deliver.jpg')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Pick & Delievery</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/law.png')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Legal Consulting</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/gardener.jpeg')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Garden Maintenance</span>
            </div>

        </div>
    </div>

    <br>

    <div class="cate">
        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/moving.png')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Moving</span>
            </div>

        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/it.png')">

            <div class="cate-text">
                <span style="color: #3A8DB0">IT</span>
            </div>
        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/tutor.jpg')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Study</span>
            </div>
        </div>

        <div class="sub-cate" style="background-image: url('<?php echo base_url();?>img/cleaner.jpg')">
            <div class="cate-text">
                <span style="color: #3A8DB0">Cleaner</span>
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