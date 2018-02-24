<?php
	#can only insert
	#INSERT INTO `test_data` (`ID`, `input`, `age`, `skill`, `score`) VALUES (NULL, 'mouse', '18-25', 'beginner', '0');



    function ConnectToDB()
    {
        $db_host = "localhost";
        $db_name = "target_game_data";
        $user = "local_script";
        $pass = "IxPvqITsTzH2mkVk";

        $connection = new mysqli( $db_host, $user, $pass, $db_name) or die($connection->connect_error);

        return $connection;
    }

    function InsertData( $mouse, $age_group, $level )
    {
        $conn = ConnectToDB();

        $query = "INSERT INTO `test_data` (`ID`, `input`, `age`, `skill`, `score`) VALUES (NULL, '" . $mouse . "', '" . $age_group . "', '" . $level . "', 0);";
        $valid = $conn->query( $query );
        $ID = -1;
        if( !$valid ){
            die("Failed to insert into database");
        }
        else{
            $ID = $conn->insert_id;

        }

        $conn->close();

        return $ID;
    }

?>