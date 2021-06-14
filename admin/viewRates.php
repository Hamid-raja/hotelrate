<?php
include("./include/header.php");

if (isset($_GET['delRate'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delRate']);
    $delRate = $rateObj->delRateById($id);
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>&nbsp View Hotels</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Manage Hotel Rates</li>
            <li class="breadcrumb-item active"><a href="#">View Rates</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($delRate)) {
                            echo $delRate;
                        }
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Hotel id</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Rates For Adults</th>
                                    <th>Rates For Childs</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // Fetch all the product details
                                $getRates = $rateObj->selRate();
                                if ($getRates) {
                                    $i = 0;
                                    while ($result = $getRates->fetch_assoc()) {
                                        $i++; ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['hotelid']; ?></td>
                                            <td><?php echo $result['start_date']; ?></td>
                                            <td><?php echo $result['end_date']; ?></td>
                                            <td><?php echo $result['rate_for_adults']; ?></td>
                                            <td><?php echo $result['rate_for_child']; ?></td>
                                            <td>
                                                <!-- <a href="productedit.php?proid=<?php //echo $result['id']; 
                                                                                    ?>">Edit</a> || -->
                                                <a onclick="return confirm('Are you sure to delete this?')" href="?delRate=<?php echo $result['id']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "No Hotels Rates Records";
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include("./include/footer.php");
?>