<?php
/**
 * Created by Angel Leonardo Bianco on 07/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login | MLMGESTION</title>

    <!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- PLUGINS CSS -->
    <link href="assets/plugins/weather-icon/css/weather-icons.min.css" rel="stylesheet">
    <link href="assets/plugins/prettify/prettify.min.css" rel="stylesheet">
    <link href="assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.theme.min.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.transitions.min.css" rel="stylesheet">
    <link href="assets/plugins/chosen/chosen.min.css" rel="stylesheet">
    <link href="assets/plugins/icheck/skins/all.css" rel="stylesheet">
    <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/plugins/validator/bootstrapValidator.min.css" rel="stylesheet">
    <link href="assets/plugins/summernote/summernote.min.css" rel="stylesheet">
    <link href="assets/plugins/markdown/bootstrap-markdown.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/bootstrap.datatable.min.css" rel="stylesheet">
    <link href="assets/plugins/morris-chart/morris.min.css" rel="stylesheet">
    <link href="assets/plugins/c3-chart/c3.min.css" rel="stylesheet">
    <link href="assets/plugins/slider/slider.min.css" rel="stylesheet">
    <link href="assets/plugins/salvattore/salvattore.css" rel="stylesheet">
    <link href="assets/plugins/toastr/toastr.css" rel="stylesheet">
    <link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- MAIN CSS (REQUIRED ALL PAGE)-->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login tooltips">




<!--
===========================================================
BEGIN PAGE
===========================================================
-->
<div class="login-header text-center">
    <img src="assets/img/logo-login.png" class="logo" alt="Logo">
</div>

<div class="login-wrapper">
<?php
include ("cbr/funcs.php");
$link = conectDDBB3();

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable

    $sql = "SELECT email, hash, level FROM  mlm_users_test WHERE   email='".$email."' AND hash='".$hash."' AND level='0'";
    $result = mysqli_query($link, $sql);
    $extraido1 = mysqli_fetch_array($result);

    if($extraido1 > 0){
        // We have a match, activate the account
        $sql = "UPDATE mlm_users_test SET level='1' WHERE   email='".$email."' AND hash='".$hash."' AND level='0'";
        mysqli_query($link, $sql);
        echo '<div class="statusmsg">Se ha activado su cuenta, puede ahora ingresar</div>';
        header( "refresh:5;url=login.php" );
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">La url es inválida o ya ha activado su cuenta.</div>';
        header( "refresh:5;url=login.php" );
    }
}else{
    // Invalid approach
    echo '<div class="statusmsg">Datos incorrectos, acceso denegado.</div>';
    header( "refresh:5;url=login.php" );
}
?>
</div><!-- /.login-wrapper -->
<!--
===========================================================
END PAGE
===========================================================
-->

<!--
===========================================================
Placed at the end of the document so the pages load faster
===========================================================
-->
<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/retina/retina.min.js"></script>
<script src="assets/plugins/nicescroll/jquery.nicescroll.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>

<!-- PLUGINS -->
<script src="assets/plugins/skycons/skycons.js"></script>
<script src="assets/plugins/prettify/prettify.js"></script>
<script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/icheck/icheck.min.js"></script>
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="assets/plugins/mask/jquery.mask.min.js"></script>
<script src="assets/plugins/validator/bootstrapValidator.min.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/bootstrap.datatable.js"></script>
<script src="assets/plugins/summernote/summernote.min.js"></script>
<script src="assets/plugins/markdown/markdown.js"></script>
<script src="assets/plugins/markdown/to-markdown.js"></script>
<script src="assets/plugins/markdown/bootstrap-markdown.js"></script>
<script src="assets/plugins/slider/bootstrap-slider.js"></script>

<script src="assets/plugins/toastr/toastr.js"></script>

<!-- FULL CALENDAR JS -->
<script src="assets/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/full-calendar.js"></script>

<!-- EASY PIE CHART JS -->
<script src="assets/plugins/easypie-chart/easypiechart.min.js"></script>
<script src="assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
<script src="assets/plugins/jquery-knob/knob.js"></script>

<!-- FLOT CHART JS -->
<script src="assets/plugins/flot-chart/jquery.flot.js"></script>
<script src="assets/plugins/flot-chart/jquery.flot.tooltip.js"></script>
<script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
<script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
<script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>

<!-- MORRIS JS -->
<script src="assets/plugins/morris-chart/raphael.min.js"></script>
<script src="assets/plugins/morris-chart/morris.min.js"></script>

<!-- C3 JS -->
<script src="assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8"></script>
<script src="assets/plugins/c3-chart/c3.min.js"></script>

<!-- MAIN APPS JS -->
<script src="assets/js/apps.js"></script>

</body>
</html>
