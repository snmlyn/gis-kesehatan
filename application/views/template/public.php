<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>public/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url();?>public/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login -> Sistem Informasi Geografis Distribusi Pelayanan Kesehatan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <?php $this->load->view('template/header');?>
    <style type="text/css">
        body {
            height: 100%;
            background-repeat: no-repeat;
            background: rgb(185,210,224); /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover,  rgba(185,210,224,1) 0%, rgba(187,214,228,1) 0%, rgba(186,211,225,1) 15%, rgba(186,211,225,1) 38%, rgba(169,199,215,1) 68%, rgba(169,199,215,1) 68%, rgba(169,199,215,1) 82%, rgba(158,191,208,1) 100%); /* FF3.6-15 */
            background: -webkit-radial-gradient(center, ellipse cover,  rgba(185,210,224,1) 0%,rgba(187,214,228,1) 0%,rgba(186,211,225,1) 15%,rgba(186,211,225,1) 38%,rgba(169,199,215,1) 68%,rgba(169,199,215,1) 68%,rgba(169,199,215,1) 82%,rgba(158,191,208,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: radial-gradient(ellipse at center,  rgba(185,210,224,1) 0%,rgba(187,214,228,1) 0%,rgba(186,211,225,1) 15%,rgba(186,211,225,1) 38%,rgba(169,199,215,1) 68%,rgba(169,199,215,1) 68%,rgba(169,199,215,1) 82%,rgba(158,191,208,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b9d2e0', endColorstr='#9ebfd0',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

        }
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 5px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 100px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        .need-help
        {
            margin-top: 10px;
        }
        .new-account
        {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<?php echo isset($content)?$content:'';?>
</body>

<script src="<?php echo base_url();?>public/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url();?>public/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url();?>public/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<?php /*<script src="<?php echo base_url();?>public/assets/js/chartist.min.js"></script>*/?>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url();?>public/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url();?>public/assets/js/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url();?>public/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<?php /*<script src="<?php echo base_url();?>public/assets/js/jquery-jvectormap.js"></script>*/?>
<!-- Sliders Plugin -->
<script src="<?php echo base_url();?>public/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<?php /*<script src="https://maps.googleapis.com/maps/api/js"></script>*/?>
<!-- Select Plugin -->
<script src="<?php echo base_url();?>public/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<?php /*<script src="<?php echo base_url();?>public/assets/js/jquery.datatables.js"></script>*/?>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url();?>public/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url();?>public/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url();?>public/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url();?>public/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url();?>public/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<?php /*<script src="<?php echo base_url();?>public/assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>*/?>

</html>