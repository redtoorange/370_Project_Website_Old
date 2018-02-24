<?php
/**
 * Created by IntelliJ IDEA.
 * User: redto
 * Date: 2/24/2018
 * Time: 6:54 AM
 */
    require "info.php";


    echo var_dump($_POST);

    echo "<br/><br/>";

    $ID = InsertData( $_POST["inputSelect"], $_POST["ageSelect"], $_POST["skillSelect"]);

    echo "User ID: $ID ";
?>