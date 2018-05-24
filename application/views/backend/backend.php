<!DOCTYPE html>
<?php
$this->load->helper('url');
?>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url();?>CSS/backend.css">

<head>
    <meta charset="UTF-8">
    <title>SKILLSPOT</title>
    <script src="<?php echo base_url();?>JS/backend.js"></script>

</head>
<body onload="load_mail()">

<div class="backend-top">
    <div class="page-select">
        <input type="button" class="tab-btn" id="buy-tab" value="Buy" onclick="change_to_buyer()"/>
        <input type="button" class="tab-btn" id="sell-tab" value="Sell" onclick="change_to_sell()"/>
        <input type="button" class="tab-btn" id="mail-tab" value="Mail" onclick="change_to_mail()"/>
    </div>



    <div class="page" id="buy-page">
        <table class="table-size" >
            <tr>
                <th width="100px">Seller</th>
                <th width="100px">Price</th>
                <th width="200px">task</th>
                <th width="200px">Date</th>
                <th width="100px">Status</th>
                <th width="100px">Comfirm</th>
            </tr>

            <?php
            $Ibuy = array(
                ["seller"=>"001", "price"=>"100", "task"=>"help me finish assignments", "date"=>"2018-01-02 12:12:01", "status"=>"done"],
                ["seller"=>"101", "price"=>"100.2", "task"=>"help me", "date"=>"2018-01-02 12:12:01", "status"=>"done"],
                ["seller"=>"201", "price"=>"100.8", "task"=>"plant tree", "date"=>"2017-01-02 12:12:01", "status"=>"done"],
                ["seller"=>"301", "price"=>"1400", "task"=>"tree", "date"=>"2018-01-12 12:12:01", "status"=>"paid"],
                ["seller"=>"401", "price"=>"100", "task"=>"clean room", "date"=>"2018-03-02 12:12:01", "status"=>"done"],
                ["seller"=>"501", "price"=>"1050", "task"=>"candy", "date"=>"2018-01-02 15:12:01", "status"=>"unpaid"],
                ["seller"=>"12301", "price"=>"1300", "task"=>"drink delivery", "date"=>"2018-11-02 12:12:01", "status"=>"paid"],
                ["seller"=>"0mfdjf", "price"=>"100", "task"=>"cooking checken", "date"=>"2018-01-02 12:32:01", "status"=>"done"],
                ["seller"=>"00fjgj", "price"=>"1020", "task"=>"look after babies", "date"=>"2018-01-02 12:12:01", "status"=>"unpaid"],
                ["seller"=>"00fhee1", "price"=>"190", "task"=>"assignments", "date"=>"2018-01-02 12:12:11", "status"=>"done"]
            );

            foreach ($Ibuy as $transaction) {
                $seller = $transaction["seller"];
                $price = $transaction["price"];
                $task = $transaction["task"];
                $date = $transaction["date"];
                $status = $transaction["status"];

                echo "<tr>";
                echo "<td>$seller</td>";
                echo "<td>$price</td>";
                echo "<td>$task</td>";
                echo "<td>$date</td>";
                echo "<td>$status</td>";
                if($status != "done") {
                    echo "<td onclick='confirm()'>Confirm</td>";
                }else {
                    echo "<td></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>


    </div>


    <div class="page" id="sell-page" style="display: none">
        <table class="table-size">
            <tr>
                <th width="100px">Buyer</th>
                <th width="100px">Price</th>
                <th width="200px">Item</th>
                <th width="200px">Date</th>
                <th width="100px">Status</th>
                <th width="100px"></th>
            </tr>

            <?php
            $Isell = array(
                ["buyer"=>"0sd01", "price"=>"14838", "task"=>"help me finish assignments", "date"=>"2018-01-02 12:12:01", "status"=>"done"],
                ["buyer"=>"1sds01", "price"=>"100.2", "task"=>"help me", "date"=>"2018-01-02 12:12:01", "status"=>"done"],
                ["buyer"=>"2fggf01", "price"=>"100.8", "task"=>"plant tree", "date"=>"2017-01-02 12:12:01", "status"=>"done"],
                ["buyer"=>"301", "price"=>"1450", "task"=>"tree", "date"=>"2018-01-12 12:12:01", "status"=>"paid"],
                ["buyer"=>"40dvw1", "price"=>"13300", "task"=>"clean room", "date"=>"2018-03-02 12:12:01", "status"=>"done"],
                ["buyer"=>"50kku1", "price"=>"10r50", "task"=>"candy", "date"=>"2018-01-02 15:12:01", "status"=>"unpaid"],
                ["buyer"=>"12d301", "price"=>"130420", "task"=>"drink delivery", "date"=>"2018-11-02 12:12:01", "status"=>"paid"],
                ["buyer"=>"0mdfdfdjf", "price"=>"1600", "task"=>"cooking checken", "date"=>"2018-01-02 12:32:01", "status"=>"done"],
                ["buyer"=>"00dd2fjgj", "price"=>"102340", "task"=>"look after babies", "date"=>"2018-01-02 12:12:01", "status"=>"unpaid"],
                ["buyer"=>"00fhdfwee1", "price"=>"190.9", "task"=>"assignments", "date"=>"2018-01-02 12:12:11", "status"=>"done"]
            );

            foreach ($Isell as $transaction) {
                $buyer = $transaction["buyer"];
                $price = $transaction["price"];
                $task = $transaction["task"];
                $date = $transaction["date"];
                $status = $transaction["status"];

                echo "<tr>";
                echo "<td>$buyer</td>";
                echo "<td>$price</td>";
                echo "<td>$task</td>";
                echo "<td>$date</td>";
                echo "<td>$status</td>";
                echo "<td></td>";
                echo "</tr>";
            }
            ?>


        </table>

    </div>

    <div class="page" id="mail-page" style="display: none">
        <div id="mail-out-box">
            <div class="mail-content" id="mail-content">
                <span id="close" onclick="close_mail_content()">&times;</span>
                11111111111111111111111
            </div>
        </div>


        <table class="table-size" id="mail-table">
            <tr>
                <th width="100px">From</th>
                <th width="400px">Subject</th>
                <th width="200px">received</th>
                <th width="100px"></th>
            </tr>

            <tr>
                <td>$99</td>
                <td class="mail-subject" id = "0" onclick="show_content()">car</td>
                <td>2018-03-09 11:20:01</td>
            </tr>

            <tr>
                <td>bbQ</td>
                <td class="mail-subject" id = "1" onclick="show_content()">$99</td>
                <td>2018-03-09 11:20:01</td>
            </tr>
        </table>

        <br>
        <br>
        <br><br>
        <br>



    </div>




</div>


</body>
</html>






























