<?php
/*
**	Iteration 0 Data Testing and Upload Script
** Andrew McGuiness and Ryan Kelley
*/

//	!!!!This file should be kept inside of a folder on 
//	!!!!	the server that is secured.

	// Establish the initial DB connection
    function ConnectToDB()
    {
		// Define some data to log in to the database
		
        $db_host = "localhost";
        $db_name = "target_game_data";
        $user = "local_script";
        $pass = "IxPvqITsTzH2mkVk";

		// Connect to the DB
        $connection = new mysqli( $db_host, $user, $pass, $db_name) or die($connection->connect_error);

		// Return the connection object
        return $connection;
    }

	// Upload some data into the DB
    function InsertData( $mouse, $age_group, $level )
    {
		// Get the connection
        $conn = ConnectToDB();

		// Create the query
        $query = "INSERT INTO `test_data` (`ID`, `input`, `age`, `skill`, `score`) VALUES (NULL, '" . $mouse . "', '" . $age_group . "', '" . $level . "', 0);";
		
		// Validate it
        $valid = $conn->query( $query );
        $ID = -1;
        if( !$valid ){
            die("Failed to insert into database");
        }
        else{
            $ID = $conn->insert_id;
        }

        $conn->close();

		// Return the ID for the data we uploaded
        return $ID;
    }

    //function to create a table
    function makeTable(){
        $conn = ConnectToDB();

        $query = 'SELECT * FROM  `test_data` ';
        $result = $conn->query($query);
        //$arrayResult = $result->fetch_array();

        $numFields = $result->field_count;

        $columns = array("ID", "input", "age", "skill", "score");

        echo "<table cellpadding=\"10\">";
        echo '<tr>';
        for($i = 0; $i < sizeof($columns); $i++){


                echo '<th>'.$columns[$i].'</th>';


        }
        echo '</tr>';
        while($row = $result->fetch_array()){

            echo '<tr>';
            for ($i = 0; $i < $numFields; $i++){
                echo '<td>'.$row[$columns[$i]].'</td>';
            }
            echo '</tr>';

        }
        echo "</tabl>";
    }
?>