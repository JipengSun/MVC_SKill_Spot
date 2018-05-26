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
    <a href="javascript:closeSignup()"><img class="close-icon" src="<?php echo base_url()?>img/close-icon.png" ></a>

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
    $name = $_SESSION["username"];
    $url1 = site_url('backend/list')."/". $name;
    $url2 = site_url('profile/setup')."/".$name;
    $url3 = site_url('indice/logout');

    echo "<a \" href=\"$url1\">Backend</a>";
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



<div class="top" style="background-image: url('<?php echo base_url()?>img/back1.jpg')">


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


        Price: $

        <input type="number" id="filter-price-min" class="filter-box"> ~
        <input type="number" id="filter-price-max" class="filter-box">



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