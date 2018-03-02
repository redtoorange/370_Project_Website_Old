<?php
/*
**	Iteration 0 Data Testing and Upload Script
** Andrew McGuiness and Ryan Kelley
*/
	// Import the DB connection script
    require "info.php";
	
	// Dump the POST data
    echo var_dump($_POST);
    echo "<br/><br/>";

	// Insert the data into the DB
    $ID = InsertData( $_POST["inputSelect"], $_POST["ageSelect"], $_POST["skillSelect"]);

	// Print the ID for the data we just uploaded
    echo "User ID: $ID ";
	echo "<br/><br/>";
	echo "<a href='TargetHunter.html'>Go to the Game</a>";

    makeTable();

?>