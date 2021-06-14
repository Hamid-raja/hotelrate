<?php
include("./include/header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addhotel'])) {
    $insertHotel = $hotelObj->addHotel($_POST);
    //"<div class='alert alert-success' role='alert'>Hotel Inserted Successfully</div>";
}

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Add New Hotel Details</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Manage Hotel</li>
            <li class="breadcrumb-item"><a href="addHotel.php">Add Hotel</a></li>
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
                                    if(isset($insertHotel)){
                                            echo "$insertHotel";
                                    }
                                ?>
                                <label for="exampleInputEmail1">Hotel Name</label>
                                <input class="form-control" id="name" type="text" name="hname" aria-describedby="nameHelp" placeholder="Enter Hotel name">
                                <span id="errname"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                <span id="erraddress"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Rating</label>
                                <select class="form-control" id="star" name="star">
                                    <option value="-1">Select</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="7">7</option>
                                </select>
                                <span id="errstar"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="-1">Select</option>
                                    <option value="0">Disabled</option>
                                    <option value="1">Enabled</option>
                                </select>
                                <span id="errstatus"></span>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit" name="addhotel">Submit</button>
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
        hname = document.getElementById("name").value;
        address = document.getElementById("address").value;
        star = document.getElementById("star").value
        status = document.getElementById("status").value

        document.getElementById("errname").innerHTML = "";
        document.getElementById("erraddress").innerHTML = "";
        document.getElementById("errstar").innerHTML = "";
        document.getElementById("errstatus").innerHTML = "";

        if (!isNull(hname)) {
            document.getElementById("errname").innerHTML = "<font color='red'> Name Required</font>";
            return false;
        }
        if (!isNull(address)) {
            document.getElementById("erraddress").innerHTML = "<font color='red'>Address Required</font>";
            return false;
        }
        if (!isNull(star)) {
            document.getElementById("errstar").innerHTML = "<font color='red'>Select star /Rating</font>";
            return false;
        }
        if (!isNull(status)) {
            document.getElementById("errstatus").innerHTML = "<font color='red'>Select Current staus of hotel</font>";
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