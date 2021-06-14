<?php
include("./include/header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addRate'])) {
    echo "action";
    $insertRate = $rateObj->addRatesToHotel($_POST);
    //"<div class='alert alert-success' role='alert'>Hotel Inserted Successfully</div>";
}

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Add New Hotel Rates Details</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Manage Hotel Rates</li>
            <li class="breadcrumb-item"><a href="addRates.php">Add Hotel Rates</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="tile p-5">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" onsubmit="return validateHotel()">
                            <div class="form-group">
                                <?php
                                    if(isset($insertRate)){
                                            echo "$insertRate";
                                    }
                                ?>
                                <label for="Hotel Name"> Select Hotel Name</label>
                                <select class="form-control" id="hotelid" name="hotelid">
                                    <option value="-1">Select</option>
                                    <?php
                                        $getHotel = $hotelObj->getHotel();
                                        if ($getHotel) {
                                            while ($result = $getHotel->fetch_assoc()) {
                                             ?>
                                                <option value="<?php echo $result['hotelid'] ?>"> <?php echo $result['name'] ?> </option>         
                                        <?php
                                            }
                                        }
                                    ?>                                    
                                </select>
                                <span id="errhotelid"></span>
                            </div>
                            <div class="form-group">
                                <label for="Start date">From Date</label>
                                <input class="form-control" type="date" id="fromdate" name="start_date"/>
                                <span id="errfrom"></span>
                            </div>
                            <div class="form-group">
                                <label for="End date">To Date</label>
                                <input class="form-control" type="date" id="todate" name="end_date"/>
                                <span id="errto"></span>
                            </div>
                            <div class="form-group">
                                <label for="For Adult">Rate for Adult per Day</label>
                                <input class="form-control" type="text" id="adultrate" name="adult_rate"/>
                                <span id="erradult"></span>
                            </div>
                            <div class="form-group">
                                <label for="For Adult">Rate for Child per Day</label>
                                <input class="form-control" type="text" id="childrate" name="child_rate"/>
                                <span id="errchild"></span>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" name="addRate">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function validateHotel() {

        // Get the value of the input field with id
        hotelid = document.getElementById("hotelid").value;
        from = document.getElementById("fromdate").value;
        To = document.getElementById("todate").value
        Adult = document.getElementById("adultrate").value
        child = document.getElementById("childrate").value

        document.getElementById("errhotelid").innerHTML = "";
        document.getElementById("errfrom").innerHTML = "";
        document.getElementById("errto").innerHTML = "";
        document.getElementById("erradult").innerHTML = "";
        document.getElementById("errchild").innerHTML = "";

        if (!isNull(hotelid)) {
            document.getElementById("errhotelid").innerHTML = "<font color='red'> Selection Required</font>";
            return false;
        }
        if (!isNull(from)) {
            document.getElementById("errfrom").innerHTML = "<font color='red'>Please select date Required</font>";
            return false;
        }
        if (!isNull(To)) {
            document.getElementById("errto").innerHTML = "<font color='red'>Please Select date</font>";
            return false;
        }
        if (!isNull(Adult)) {
            document.getElementById("erradult").innerHTML = "<font color='red'>Rates for adult are required</font>";
            return false;
        }

        if (!isNull(child)) {
            document.getElementById("erradult").innerHTML = "<font color='red'>Rates for child are required</font>";
            return false;
        }
    }

    function isNull(field) {
        if (field == null || field == "" || field == "-1") {
            return false;
        } else {
            return true;
        }
    }
</script>
<?php
include("./include/footer.php");
?>