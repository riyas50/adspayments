<?php
    include('dbconnect.php');

    function populateCustomers()
    {

        $conn = dbConn();

        $query = "SELECT ID,NAME
         FROM customers";


        if ($stmt = $conn->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($ID, $NAME);
        while ($stmt->fetch()) 
        {
            echo '<option value="' . $ID .'">' . $NAME . '</option>';    
        }
            $stmt->close();
        }

        mysqli_close($conn);
        $conn=null;
        $sql="";
    }

?>
