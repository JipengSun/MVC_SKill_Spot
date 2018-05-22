<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/7
 * Time: 21:32
 */?>
<html>
<?php $this->load->helper('url')?>
<?php $this->load->helper('form')?>
<head>

    <title>CodeIgniter ajax post</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>CSS/style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".submit").click(function (event) {
                event.preventDefault();
                var user_name = $("input#name").val();
                var password = $("input#pwd").val();
                jQuery.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>"+"index.php/ajax_post_controller/user_data_submit",
                    dataType:'json',
                    data:{
                        name:user_name,pwd:password
                    },
                    success:function (res) {
                        if(res){
                            jQuery("div#result").show();
                            jQuery("div#value").html(res.username);
                            jQuery("div#value_pwd").html(res.pwd);
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="main">
    <div id="content">
        <h2 id = "form_head">CodeIgniter Ajax Post</h2><br/>
        <hr>
        <div id="form_input">
            <?php
            echo form_open();
            echo form_label('User Name');
            $data_name = array(
                'name'=>'name',
                'class'=>'input_box',
                'placeholder'=>'Please Enter Name',
                'id' =>'name'
            );
            echo form_input($data_name);
            echo "<br>";
            echo "<br>";

            echo form_label('Password');
            $data_name = array(
                'type'=>'password',
                'name'=>'pwd',
                'class'=>'input_box',
                'placeholder'=>'',
                'id'=>'pwd'
            );
            echo form_input($data_name);
            ?>
        </div>
        <div id="form_button">
            <?php echo form_submit('submit',"Submit","class='submit'");?>
        </div>
        <?php echo form_close(); ?>

        echo "<div id='result' style='display: none'>";
            echo "<div id='content_result'>";
                echo "<h3 id='result_id'>You have submitted these values</h3><br/><hr>";
                echo "<div id='result_show'>";
                    echo "<label class='label_output'>Entered Name :<div id='value'> </div></label>";
                    echo "<br>";
                    echo "<br>";
                    echo "<label class='label_output'>Entered Password :<div id='value_pwd'> </div></label>";
                    echo "<div>";
                        echo "</div>";
                    echo "</div>";
                ?>
            </div>
        </div>

</body>
</html>