<?php

$z = array(
["lat"=>-27.498625, "lng"=>153.015951, "n"=>"Mr Fuck", "s"=>"I sale assi", "l"=> "3"],//n=>name; s=>summary; l=>level
        ["lat"=>-27.498812, "lng"=>153.015690, "n"=>"Lv", "s"=>"I sale bike", "l"=> "1"],
        ["lat"=>-27.499003, "lng"=>153.015576, "n"=>"jjk", "s"=>"I sale game", "l"=> "4"],
        ["lat"=>-27.499349, "lng"=>153.015544, "n"=>"ss", "s"=>"I sale sss", "l"=> "5"],
        ["lat"=>-27.497831, "lng"=>153.017952, "n"=>"he", "s"=>"I sale dd", "l"=> "3"],
        ["lat"=>-27.493115, "lng"=>153.010433, "n"=>"pp", "s"=>"I sale assignment", "l"=> "2"],
        ["lat"=>-27.493372, "lng"=>153.012874, "n"=>"sk", "s"=>"I sale ee", "l"=> "5"],
        ["lat"=>-27.493449, "lng"=>153.014144, "n"=>"gfg", "s"=>"I sale hhh", "l"=> "6"],
        ["lat"=>-27.494145, "lng"=>153.013574, "n"=>"fghf", "s"=>"I sale bbv", "l"=> "1"],
        ["lat"=>-27.493750, "lng"=>153.015088, "n"=>"trhbh", "s"=>"I sale ewwe", "l"=> "0"]
);
//把上面这个换成SQL 的结果 参数全在$_GET里




header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
echo json_encode($z);
echo '</response>';
?>