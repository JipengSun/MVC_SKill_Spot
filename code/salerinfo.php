<?php

$_sample = array(["id" => "lvzheng", "review"=>"good staff", "date"=>"2018-04-19 18:56:21"], ["id" => "lvzheng3", "review"=>"really bad", "date"=>"2018-04-19 15:16:21"]);

foreach($_sample as $info) {
    $html_code =
        "<div style=\"width: 760px; height: 50px; background-color: rgb(170, 223, 253); margin: 5px auto; font-size: 13px;\">
        <div style=\"overflow: auto; width: 760px;\">
            <div style=\"width: 200px; height: 15px; float: left;\">ID: ".$info["id"]."</div>
            <div style=\"width: 150px; height: 15px; float: right;\">".$info["date"]."</div>
        </div>
        <div style=\"width: 760px; height: 35px; overflow: hidden; text-overflow: ellipsis;\">".$info["review"]."</div>
    </div>";

    echo $html_code;
}

?>