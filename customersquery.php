<?php
include('dbconnect.php');

function refreshRecords()
{
    echo '<div class="panel panel-default">';
    //<!-- Table -->
    echo '<table class="table table-striped">';
    echo '<thead>';

     echo '<tr>';
        echo '<th class="label visible-lg-inline-block label-info text-center" width="100%">LIST OF CUSTOMERS</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $conn = dbConn();

        $sql = "SELECT ID,NAME FROM customers";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //echo "<tr><td>". $row["ID"] ."</td>" . "<td>". $row["NAME"] ."</td></tr>";
                echo "<tr><td>". $row["NAME"] ."</td></tr>";
            }
        } else {
            //echo "0 results";
            echo "<tr><td>". "No records found!" ."</td></tr>";
    
        }

         echo '</tbody>';
         echo '</table>';
         echo '</div> ';

        mysqli_close($conn);
        $conn=null;
        $sql="";


}

function searchRecords($searchText)
{
     echo '<div class="panel panel-default">';
    //<!-- Table -->
    echo '<table class="table table-striped">';
    echo '<thead>';

        echo '<tr>';
        echo '<th class="label visible-lg-inline-block label-info text-center" width="100%">LIST OF CUSTOMERS</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $conn = dbConn();

        $sql = "SELECT ID,NAME FROM customers " .
        "WHERE NAME LIKE '%" . $searchText . "%'" .
        "ORDER BY NAME";
        //echo $sql;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //echo "<tr><td>". $row["ID"] ."</td>" . "<td>". $row["NAME"] ."</td></tr>";
                echo "<tr><td>". $row["NAME"] ."</td></tr>";
            }
        } else {
            //echo "0 results";
            echo "<tr><td>". "No records found!" ."</td></tr>";
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div> ';
        
        mysqli_close($conn);
        $conn=null;
        $sql="";





}

    function putEmptyRow()
    {
        echo '<div class="panel panel-default">';  
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Customer</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo "<tr><td class='bg-info text-center' colspan='8'></td></tr>";
        echo '</tbody';
        echo '</table>';
        echo '</div>';  
    }
    
?>