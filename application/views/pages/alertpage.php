<?php
$this->load->helper('url');
?>
<script>
    alert("<?echo $alertinfo?>");
    function myrefresh(){
        window.location.href="<?php echo site_url('indice/index') ?>";
    }
    setTimeout('myrefresh()',2000);

</script>

