<?php
include('includes/head_scripts.php');
?>
<style>
	.site_container{
		margin:50px auto;
		max-width:1200px;
	}
    h3{
        text-align:center;
        margin-bottom:20px;
    }
    button{
        margin-top:20px;
    }
    .text_center{
        text-align:center;
    }
    .form_field{
        margin-bottom: 10px;
    }
    .form_error{
        color:red;
    }
</style>
<body>
	<div class="site_container">
        <h3>Contact Form Example utilising VueJS and Google Invisible Recaptcha</h3>
    	<div id="app"></div>
    </div>
    <?php
        include('includes/js_scripts.php');
    ?>
  </body>
</html>