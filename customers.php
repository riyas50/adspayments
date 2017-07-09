<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        include('general.php');
        putLinks();
    ?>
   <title>CUSTOMERS - ADS IT CUSTOMER PAYMENT TRACKER</title>
  </head>
<body>
<header class="site__header island">
  <div class="wrap">
   <span id="animationSandbox" style="display: block;"  class="tada animated">
   <h1 class="site__title mega text-center">CUSTOMERS</h1>
   </span>
  </div>
  </header>

<form action="customers.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-right">
                <a class="glyphicon glyphicon-home" style="font-size:30px;color:orange" href="/adspayments/"></a> 
                <div class="input-group">
                    <div class="input-group-addon">Customer</div>
                    <input type="text" class="form-control" name="customers" id="inlineFormInputGroup" placeholder="type customer name..." required>
                </div>
                <br />  
                
                <button type="submit" class="btn btn-success" id="btnSave" name="Save">Save</button>
                <button type="submit" class="btn btn-warning" id="btnSearch" name="Search">Search</button>
                <button type="submit" class="btn btn-danger" id="btnRemove" name="Remove">Remove</button>
                <button type="submit" class="btn btn-info" id="btnRefresh" name="Refresh" formnovalidate>Reload</button>

            </div>
            
            <div class="col-lg-4"></div>
        </div>
    </div>
</form>
    <br />
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
    
            <?php
            
            include('customersquery.php');

            session_start();
            if( strcasecmp($_SERVER['REQUEST_METHOD'],"POST") === 0) {
                $_SESSION['postdata'] = $_POST;
                header("Location: ".$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
                exit;
            }
            if( isset($_SESSION['postdata'])) {
                $_POST = $_SESSION['postdata'];
                unset($_SESSION['postdata']);
            }            
            

            if (!isset($_POST))
            {
                refreshRecords();
            }

            if (isset($_POST['Search']))
                {
                    $searchText = $_POST['customers'];
                    searchRecords($searchText);
                    echo "<meta http-equiv='search' content='0'>";
                }

            if (isset($_POST['Refresh']))
                {
                    refreshRecords();
                    //echo "<meta http-equiv='Refresh' content='0'>";
                }

            if (isset($_POST['Remove']))
                {
                //echo '<div class="label label-warning">' . 'Remove pressed!' . '</div>';

                $conn =dbConn();
                $remcustomers = $_POST['customers'];

                $sql = "DELETE FROM customers WHERE NAME = '". $remcustomers ."'";
                //echo '<div class="label label-info">' . 'Query:=' . $sql . '</div>'; 
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo '<div class="label label-danger">' . '<b>Customer: ' . $remcustomers . '</b> (Record Removed!) </div>';
                        sleep(1);
                        refreshRecords();
                        //echo '<button type="submit" class="btn btn-info" id="btnRefresh" name="Refresh" formnovalidate>Reload</button>';
                        //echo "<meta http-equiv='Refresh' content='0'>";
                    }
                    else
                    {
                        echo '<div class="label label-danger">' . 'failed to Remove!' . '</div>';
                        echo $result;
                    }
                    mysqli_close($conn);
                    $conn=null;
                    $sql="";
                }

            
            if (isset($_POST['Save']))
                {
                    //echo '<div class="label label-warning">' . 'Save pressed!' . '</div>';
                    //--REPLACE INTO customers (ID,NAME) VALUES (CONVERT(UUID(),CHAR),'TEST03');
                    $conn = dbConn();

                    $customers = $_POST['customers'];

                    $sql = "REPLACE INTO customers (NAME) VALUES ('". $customers ."')";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        //echo '<div class="label label-success">' . 'Record updated!' . '</div>';
                        refreshRecords();
                        //echo "<meta http-equiv='Refresh' content='0'>";
                    }
                    else
                    {
                        echo '<div class="label label-danger">' . 'failed to save!' . '</div>';
                    }
                    mysqli_close($conn);
                    $conn=null;
                    $sql="";
                }

            
            
            ?>
        
        </div>

    <div class="col-lg-4"></div>
    </div>
</div>

<?php

?>

<?php
    //include('general.php');
    putScripts();
    stickfooter();
?>
<!--
-->  
</body>
</html>