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
    <link rel="stylesheet" href="<?php echo base_url();?>CSS/dist/css/lightbox.min.css">
    <script src="<?php echo base_url();?>JS/salerInfo.js"></script>
    <script src="<?php echo base_url();?>JS/dist/js/lightbox-plus-jquery.min.js"></script>
</head>
<body>

<div class="top">
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