<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        include('general.php');
        include('customerpaymentscode.php');

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


        putLinks();
    ?>
   <title>PAYMENTS - ADS IT CUSTOMER PAYMENT TRACKER</title>
  </head>
  <body>

<header class="site__header island">
  <div class="wrap">
   <span id="animationSandbox" style="display: block;"  class="tada animated">
   <h1 class="site__title mega text-center">CUSTOMER PAYMENTS</h1>
   </span>
  </div>
  </header>

<form action="customerpayment.php" method="post" enctype="multipart/form-data">

    <div class="row"> 
        <div cass="col-lg-2"></div>
        <div class="col-lg-8 text-right">
            <a class="glyphicon glyphicon-home" style="font-size:30px;color:orange" href="/adspayments/"></a> 
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-4"></div>

        <div class="form-group">
            <div class="col-lg-4 text-right">                    
                <!---->
                <!--<div class="form-group">-->
                    <!--<label for="dtp_input2" class="col-md-2 control-label">Date Picking</label>-->
                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                <!--</div>-->
                <!---->
                <!--<div class="form-group">-->
                    <!--<label for="dtp_input3" class="col-md-2 control-label">Time Picking</label>-->
                    <div class="input-group date form_time" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">
                        <input class="form-control" size="16" type="text" value="" readonly>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input3" value="" />
                <!--</div>-->
                <!---->
                <!---->
                    <!--<label class="col-xs-3 control-label">Size</label>-->
                    <div class="selectContainer input-group">
                        <select class="form-control" name="customers" >
                            <option value="">Choose a customer</option>
                            <!-- <option value="s">Small (S)</option> 
                            <?php //this lines shifted to db fetch in the below function ?> 
                            -->
                            <?php
                                populateCustomers();
                            ?>
                        </select>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    </div>
                    <div class="input-group text-capitalize">
                        <input type="text" class="form-control text-capitalize" placeholder="invoice number..." />
                        <span class="input-group-addon glyphicon glyphicon-file"></span>
                    </div>
                    <form>
                    <div class="checkbox">
                        <label class="radio-inline"><input type="radio" value="radioCash">Cash</label>
                        <label class="radio-inline"><input type="radio" value="radioCheque">Cheque</label>
                    </div>
                    </form>
                <!---->
                <br />  
                <!--<div class="form-group">    -->
                    <button type="submit" class="btn btn-success" id="btnSave" name="Save">Save</button>
                    <button type="submit" class="btn btn-warning" id="btnRemove" name="Remove">Remove</button>
                    <button type="submit" class="btn btn-info" id="btnRefresh" name="Refresh" >Refresh</button>
                <!--</div>-->
            </div>
        </div>
        
        <div class="col-lg-4"></div>
    </div>

    <br />

    <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    <div class="col-lg-4"></div>
    </div>
    </div>
 
</form>
<?php 
            //session start moved to absolute begning of the php script. top of the file

            if (isset($_POST['Save']))
            {
                //php code here
            }

            if (isset($_POST['Remove']))
            {
                //php code here
            }

?>

	<?php
    //include('general.php');
    putScripts();
    putDatePickerScript();
    stickfooter();
?>
<!-- put page scripts here-->

<!--put page scripts above-->

</body>
</html>