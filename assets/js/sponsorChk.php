<?php
/**
 * Created by Angel Leonardo Bianco on 06/05/2017
 * for Traftecno
 * angel.leonardo.bianco@gmail.com
 */



include ("../../cbr/funcs.php");
$link = conectDDBB2();


if (isset($_POST["username"])) {
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $username = $_POST["username"];

    $sql = "SELECT * FROM  mlm_users_test WHERE   userName = '" . $username . "'";
    $result = mysqli_query($link, $sql);
    $extraido1 = mysqli_fetch_array($result);

    if ($extraido1 != 0) {
        echo "<div class=\"alert alert-warning alert-bold-border fade in alert-dismissable\" id=\"disp\" name=\"disp\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
					<span style='color:green;'>Sponsor existente</span>
					<input type='hidden' value='Y' id='sponsor2' name='sponsor2'/> 
				</div>";
    } else {
        $sql = "SELECT * FROM  mlm_users_test WHERE   email = '" . $username . "'";
        $result = mysqli_query($link, $sql);
        $extraido1 = mysqli_fetch_array($result);
        if ($extraido1 != 0) {
            echo "<div class=\"alert alert-warning alert-bold-border fade in alert-dismissable\" id=\"disp\" name=\"disp\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
					<span style='color:green;'>Sponsor existente</span>
					<input type='hidden' value='Y' id='sponsor2' name='sponsor2'/> 
				</div>";
        } else {
            echo "<div class=\"alert alert-warning alert-bold-border fade in alert-dismissable\" id=\"disp\" name=\"disp\">
					<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
					<span style='color:red;'>El sponsor no existe</span>
					<input type='hidden' value='N' id='sponsor2' name='sponsor2'/> 
				</div>";

        }
    }

}
mysqli_close($link);

?>