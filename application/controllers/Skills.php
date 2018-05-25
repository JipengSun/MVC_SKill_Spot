<?php

/**
* 
*/
class Skills extends CI_Controller
{

    function __construct()
    {
        # code...
        parent::__construct();
    }

    public function show()
    {

        //$this->load->view('templates/header',$data);

        $this->load->view('skills/skillshow');
    }

    public function resultdisplay()
    {


        $z = array(
            ["addr" => "2 david cl, sunnybank hills, qld", "lat" => -27.498625, "lng" => 153.015951, "n" => "Mr Fuck", "s" => "I sale assi", "l" => "3"],//n=>name; s=>summary; l=>level
            ["addr" => "24 Gaskell Street, Eight Mile Plains QLD", "lat" => -27.498812, "lng" => 153.015690, "n" => "Lv", "s" => "I sale bike", "l" => "1"],
            ["addr" => "421 Ipswich Road, Annerley QLD", "lat" => -27.498892, "lng" => 153.015690, "n" => "jjk", "s" => "I sale game", "l" => "4"],
            ["addr" => "123 Eagle Street, Brisbane City QLD", "lat" => -27.492812, "lng" => 153.016690, "n" => "ss", "s" => "I sale sss", "l" => "5"],
            ["addr" => "3263 Logan Rd, Underwood QLD 4119", "lat" => -27.498112, "lng" => 153.015190, "n" => "he", "s" => "I sale dd", "l" => "3"],
            ["addr" => "601 Seventeen Mile Rocks Rd, Seventeen Mile Rocks QLD 4073", "lat" => -27.499812, "lng" => 153.019690, "n" => "pp", "s" => "I sale assignment", "l" => "2"],
            ["addr" => "1322 Gympie Rd, Aspley QLD 4034", "lat" => -27.408812, "lng" => 153.015690, "n" => "sk", "s" => "I sale ee", "l" => "5"],
        );
        //把上面这个换成SQL 的结果 参数全在$_GET里



        $keyword = $_GET["keyword"];
        $location = $_GET["location"];
        $category = $_GET["cate"];
    //    $distance = $_GET["distance"];
        $min = $_GET["min"];
        $max = $_GET["max"];
    //    $level = $_GET["level"];

        $constrain = "";
        $arr = array();

        //$userLocation = array(123, 123);

        switch (1) {
            case 1:
                if ($_GET["keyword"] != "") {
                    $constrain = $constrain . "`description` like \"%$keyword%\"";
                    $arr1=array('sname'=> $keyword);
                }

            case 2:
                if ($_GET["location"] != "") {
                    $constrain = $constrain . " && `location` = \"$location\"";
                    $arr['location'] = $location;
                }
            case 3:
                if ($_GET["cate"] != "") {
                    $constrain = $constrain . " && `cate` like \"%$category%\"";
                    $arr['stype'] = $category;
                }

            case 4:
      //          if ($_GET["distance"] != "") {
      //              $constrain = $constrain . " && （pow(lat - $userLocation[0], 2) + pow(lng - $userLocation[1], 2)）* 111 < $distance";
       //         }
            case 5:
                if ($_GET["min"] != "") {
                    $constrain = $constrain . " && `price` > $min";
                    $arr['price >'] = $min;
                }
            case 6:
                if ($_GET["max"] != "") {
                    $constrain = $constrain . " && `price` < $max";;
                    $arr['price <'] = $max;
                }
            case 7:
      //          if ($_GET["level"] != "") {
       //             $constrain = $constrain . " && `level` = $level";
        //        }
        }
        $this->load->model('Service_model');
        //$z = $this->Service_model->s_search($arr,$arr1);
        $a = $this->Service_model->listService();
        $z = $a[1];


        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

        echo '<response>';
        echo json_encode($z);
        echo '</response>';


    }
}