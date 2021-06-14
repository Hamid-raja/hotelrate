<?php
include("./include/header.php");

if (isset($_GET['delhotel'])) {
    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delhotel']);
    $delhotel = $hotelObj->deleteHotel($id);
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
            <li class="breadcrumb-item">Manage Hotel</li>
            <li class="breadcrumb-item active"><a href="#">View Hotels</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <?php
                        if (isset($delhotel)) {
                            echo $delhotel;
                        }
                        ?>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Star</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // Fetch all the product details
                                $getHotel = $hotelObj->getHotel();
                                if ($getHotel) {
                                    $i = 0;
                                    while ($result = $getHotel->fetch_assoc()) {
                                        $i++; ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $result['name']; ?></td>
                                            <td><?php echo $result['address']; ?></td>
                                            <td><?php echo $result['star']; ?></td>
                                            <td><?php echo $result['status']; ?></td>
                                            <td>
                                                <!-- <a href="productedit.php?proid=<?php //echo $result['id']; 
                                                                                    ?>">Edit</a> || -->
                                                <a onclick="return confirm('Are you sure to delete this?')" href="?delhotel=<?php echo $result['hotelid']; ?>">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "No Hotels Records";
                                } ?>

                                <!-- <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2013/08/11</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009/02/27</td>
                                    <td>$103,500</td>
                                </tr> -->
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