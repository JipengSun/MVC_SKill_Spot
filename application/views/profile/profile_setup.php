<?php
$this->load->helper('url');
?>
<!DOCTYPE html>
<html>
<head>

    <title>SKILLSPOT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/profile_setup.css">



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

<div id="whole">
    <div class="main">

        <div style="overflow: auto;">

            <div class="personal-info">


                <pre>Name: <input type="text" name = 'username' id="first-name"></pre>

                <pre>Phone:<input type="number" name = 'phone' id="number"></pre>

                <pre>Introduction:                 </pre>

                <textarea id="myEditor" style="width:500px;height:240px;">

                </textarea>




            </div>


            <div class="personal-img">
                <div id="croppic" style="width: 150px; height: 180px"></div>
                <span id="cropContainerHeaderButton">click here to upload a photo</span>
                <br>
                <br>
                <input class="btn-get-start" type="button" value="Get start now" onclick="upload()">
            </div>


        </div>

        <div class="service">
            <form action="collectinfo" method="post">
            <pre>Please what category of service you can provide:</pre>

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

            Service: <input class=\"service-name\" type=\"text\" name='sname'>

            price: <input class=\"service-price\" type=\"number\" name='price'>

            location: <input class=\"service-addr\" type=\"text\" name='slocation'>"."
            
            <br>";

            }
            ?>
            </form>


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