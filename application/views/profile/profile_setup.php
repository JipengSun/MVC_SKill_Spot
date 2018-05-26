<?php
$this->load->helper('url');
?>
<!DOCTYPE html>
<html>
<head>

    <title>SKILLSPOT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/profile_setup.css">

    <script src="<?php echo base_url();?>JS/index.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/index.css">


    <link href="<?php echo base_url();?>CSS/croppic.css" rel="stylesheet">
    <link href="<?php echo base_url();?>CSS/index.css" rel="stylesheet">
    <script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>JS/croppic/croppic.min.js"></script>
    <script src="<?php echo base_url();?>JS/profile_setup.js"></script>


    <link href="<?php echo base_url();?>CSS/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>JS/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>JS/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>JS/umeditor.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>JS/lang/en/en.js"></script>
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


<div id="whole">
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

    <br>
<br>


    <div class="main">

        <div style="overflow: auto;">

            <div class="personal-info">


                <pre>Real Name: <input type="text" name = 'username' id="first-name"></pre>

                <pre>Phone Number:<input type="number" name = 'phone' id="number"></pre>

                <pre>Talk about yourself:                 </pre>

                <textarea id="myEditor" style="width:500px;height:240px;">

                </textarea>




            </div>


            <div class="personal-img">
                <div id="croppic" style="width: 150px; height: 180px"></div>
                <span id="cropContainerHeaderButton">click here to upload a photo</span>
                <br>
                <br>
                <input class="btn-get-start" type="button" value="Save your Profile" onclick="upload()">
            </div>


        </div>

        <div class="service">
            <pre>Please tell us what kind of service you want to provide:</pre>

            <?php

            for ($i = 0; $i < 1; $i++) {
                echo "Type:
            <select class=\"service-cate\" name='stype'>
                <option value=\"hand\">Handyman</option>
                <option value=\"delievery\">Delievery</option>
                <option value=\"law\">Legal Consulting</option>
                <option value=\"moving\">Moving</option>
                <option value=\"it\">IT</option>
                <option value=\"study\">Study</option>
            </select>

            Name: <input class=\"service-name\" type=\"text\" name='sname'>

            Price: <input class=\"service-price\" type=\"number\" name='price'>

            Location: <input class=\"service-addr\" type=\"text\" name='slocation'>"."
            
            <br>";

            }
            ?>


        </div>

    </div>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyrXBYup5k3STj8LnB5OtPLfwBpDMvbiU&callback=initMap">
</script>
</body>



<script type="text/javascript">
//实例化编辑器
var um = UM.getEditor('myEditor');
function getContent() {
    var arr = UM.getEditor('myEditor').getContent();
}

var croppicHeaderOptions = {
    cropUrl:'crop',
    customUploadButtonId:'cropContainerHeaderButton',
    modal:false,
    processInline:true,
    onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
    onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
    onImgDrag: function(){ console.log('onImgDrag') },
    onImgZoom: function(){ console.log('onImgZoom') },
    onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
    onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
    onReset:function(){ console.log('onReset') },
    onError:function(errormessage){ console.log('onError:'+errormessage) }

}
var croppic = new Croppic('croppic', croppicHeaderOptions);
function get_content() {
    return UM.getEditor('myEditor').getContent();
}



</script>
</html>