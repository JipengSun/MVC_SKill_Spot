<!DOCTYPE html>
<?php
$this->load->helper('url');
?>
<html lang="en">
<!--google API: AIzaSyCpHVoDMFQ1oTP-0_6_lOlE479fVQpHjN0-->
<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>
    <script src="<?php echo base_url()?>JS/index.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyrXBYup5k3STj8LnB5OtPLfwBpDMvbiU&signed_in=true&libraries=visualization&callback=initMap">
    </script>
    <link rel="stylesheet" href="<?php echo base_url()?>CSS/resultDisplay.css">
    <script src="<?php echo base_url()?>JS/resultDisplay.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>CSS/index.css">
</head>
<body>

<div id="login-window">
    <a href="javascript:closeLogin()"><img class="close-icon" src="<?php echo base_url()?>img/close-icon.png" ></a>

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
        <input class="login-submit" type="submit" value="login" onclick="subLogin()">

    </div>

</div>

<div id="signup-window">
    <a href="javascript:closeSignup()"><img class="close-icon" src="<?php echo base_url()?>img/close-icon.png" ></a>

    <div class="signup-subwin">
        <br>
        <br>
        E-address:&nbsp <input id="signup-E" placeholder="E-mail" type="text">
        <br>
        <label class="warn-text" id="signup-win-e-label"> </label>
        <br>
        Password:&nbsp&nbsp&nbsp<input id="signup-pw" placeholder="password" type="password">
        <br>
        <label class="warn-text" id="signup-win-p-label"> </label>
        <br>
        Password:&nbsp&nbsp&nbsp<input id="signup-repw" placeholder="password" type="password">
        <br>
        <br>
        <input class="signup-submit" type="button" value="signup" onclick="subSignup()">

    </div>
</div>

<div id="black"></div>

<div class="top" style="background-image: url('<?php echo base_url()?>img/back1.jpg')">
    <div class="top-bar">
        <div class="home-holder">
            <!--            <a href="index.html"> <img src="img/home.png" class="home-icon"></a>-->
            <span class = "logo-name">SkillSpot</span>
        </div>
        <!--        <div class = "logo">-->
        <!--            <span class = "logo-name">SkillSpot</span>-->
        <!--        </div>-->

        <div class = "account-setup" id="account-before-login">
            <input type="button" value="Log in" class = "login-icon" onclick="openLogin()"/>
            <input type="button" value="Sign up" class = "signup-icon" onclick="openSignup()"/>
        </div>

        <div class = "account-setup" id = "account-after-login" style="display: none">
            <a id="id-after-login" href="javascript: ">></a>
            <input type="button" value="log out" class = "logout-icon" onclick="logout()"/>
        </div>

    </div>



    <div class= "search-line">
        <input type="text" class = "textbox-search" id="keywords" placeholder="I'm looking for ...">
        <input type="text" class = "textbox-location" id="location" placeholder="Location">
        <input type="button" value="Search" class = "search-btn" onclick="process()"/>
    </div>

    <br>

    <div class="filter">
        Category:&nbsp;
        <select id="filter-cate">
            <option value="hand">Handyman</option>
            <option value="delievery">Delievery</option>
            <option value="law">Legal Consulting</option>
            <option value="moving">Moving</option>
            <option value="it">IT</option>
            <option value="study">Study</option>
        </select>

        &nbsp;&nbsp;&nbsp;&nbsp;Location: &nbsp;leave me in &nbsp;

        <input type="number" id="filter-location" class="filter-box"> &nbsp;km

        &nbsp;&nbsp;&nbsp;&nbsp;

        Price: $

        <input type="number" id="filter-price-min" class="filter-box"> ~
        <input type="number" id="filter-price-max" class="filter-box">

        &nbsp;&nbsp;&nbsp;&nbsp;Shop Level:&nbsp;
        <select class="filter-box" id="filter-start">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        start

    </div>

    <br><br>

    <div class="displayer">
        <div id="displayer-shop-list">

        </div>

        <div id="displayer-map">

        </div>


    </div>
</div>

<div class="copyright">
    <br>
    SKILLSPOT Pty. Ltd 2011-2018©, All rights reserved
</div>

</body>
</html>