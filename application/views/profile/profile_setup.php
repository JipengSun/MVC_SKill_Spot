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

        <div class="personal-info">
            <pre>First Name: <input type="text" id="first-name"></pre>

            <pre>Last Name:  <input type="text" id="last-name"></pre>

            <pre>Phone:      <input type="number" id="number"></pre>

            <pre>Address:    <input type="text" id="address"></pre>

            <pre>Zip:        <input type="number" id="zip"></pre>

            <pre>Introduction:                 </pre>
            <textarea id="personal-intro" style="width: 300px; height: 200px;"></textarea>>

            <pre>Please what category of service you can provide:</pre>
            <pre> <input type="checkbox" id="handy"> Handyservice      <input type="checkbox" id="pick"> Pick&Delievery </pre>
            <pre> <input type="checkbox" id="law"> Legal Consulting  <input type="checkbox" id="moving"> Moving</pre>
            <pre> <input type="checkbox" id="it"> IT                <input type="checkbox" id="study"> Study</pre>


            </pre>
        </div>


        <div class="personal-img">
            <pre>Choose Profile:          <input type="file" onchange="preview(this)"></pre>

            <label class="warn-text" id="set-prof-label"> </label>
            <br>
            <pre>Choose Background Image: <input type="file" onchange="setbackimage(this)"></pre>
            <label class="warn-text" id="set-back-label"> </label>
            <br>
            <div id="preview">Profile preview</div>

        </div>

    </div>
</div>

</body>
</html>