<!DOCTYPE html>
<html lang="en">
<?php $this->load->helper('url');?>
<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/profile_setup.css">
    <script src="<?php echo base_url();?>JS/profile_setup.js"></script>
</head>
<body>
<div id="whole">
    <div class="main">

        <div style="overflow: auto;">

            <div class="personal-info">

                <pre>Name:       <input type="text" id="first-name"></pre>

                <pre>Phone:      <input type="number" id="number"></pre>

                <pre>Introduction:                 </pre>
                <textarea id="personal-intro" style="width: 300px; height: 200px;"></textarea>>





            </div>


            <div class="personal-img">
                <pre>Choose Profile:          <input type="file" onchange="preview(this)"></pre>

                <label class="warn-text" id="set-prof-label"> </label>
                <br>

                <br>
                <div id="preview">Profile preview</div>

            </div>

        </div>

        <div class="service">
            <pre>Please what category of service you can provide:</pre>

            <?php

            for ($i = 0; $i < 3; $i++) {
                echo "Type:
            <select class=\"service-cate\">
                <option value=\"hand\">Handyman</option>
                <option value=\"delievery\">Delievery</option>
                <option value=\"law\">Legal Consulting</option>
                <option value=\"moving\">Moving</option>
                <option value=\"it\">IT</option>
                <option value=\"study\">Study</option>
            </select>

            Service: <input class=\"service-name\" type=\"text\">

            price: <input class=\"service-price\" type=\"text\">

            location: <input class=\"service-addr\" type=\"text\">"."<br>";
            }

            ?>


        </div>

    </div>
</div>

</body>
</html>