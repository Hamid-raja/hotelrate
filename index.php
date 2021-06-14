<?php

include("./controller/rateController.php");
include("./controller/hotelController.php");
$objrate = new rateController();
$hotelObj = new hotelController();

$flag = true;
if (isset($_POST['search'])) {

    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adult = $_POST['adults'];
    $child = $_POST['child'];

    $err = "";

    if ($checkin > $checkout) {
        $flag = false;
        echo "<script>alert('Please Select dates')</script>";
        $err = "<div class='alert alert-danger' role='alert'>Please select valid dates</div>";
    }
    if (date("Y-m-d") > $checkin || date("Y-m-d") > $checkin || date("Y-m-d") == $checkout) {
        $flag = false;
        echo "<script>alert('Please Select dates')</script>";
        $err = "<div class='alert alert-danger' role='alert'>Please select valid dates</div>";
    }
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>The Paradise-Hotel Website Template | Hotel :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js"></script>
    <!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/fwslider.js"></script>
    <!--end slider -->
    <!---strat-date-piker---->
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script>
        $(function() {
            $("#datepicker,#datepicker1").datepicker();
        });
    </script>
    <!---/End-date-piker---->
    <link type="text/css" rel="stylesheet" href="css/JFGrid.css" />
    <link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
    <script type="text/javascript" src="js/JFCore.js"></script>
    <script type="text/javascript" src="js/JFForms.js"></script>
    <!-- Set here the key for your domain in order to hide the watermark on the web server -->
    <script type="text/javascript">
        (function() {
            JC.init({
                domainKey: ''
            });
        })();
    </script>
    <!--nav-->
    <script>
        $(function() {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });

            $(window).resize(function() {
                var w = $(window).width();
                if (w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>
    <style>
        .btn-search {
            text-transform: capitalize;
            width: 100% !important;
            background: #32A2E3;
            font-family: 'Open Sans', sans-serif;
            color: #FFF;
            padding: 8px;
            border: none;
            font-size: 1em;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
            outline: none;
            cursor: pointer;
        }

        .date_get {
            width: 88%;
            color: #858585;
            font-size: 0.8725em;
            padding: 8px;
            outline: none;
            margin: 5px 0;
            font-family: 'Open Sans', sans-serif;
            border: 1px solid #DFDFDF;
            box-shadow: inset 0 0 2px rgb(236 236 236);
            -webkit-box-shadow: inset 0 0 2px rgb(236 236 236);
            -moz-box-shadow: inset 0 0 2px rgb(236, 236, 236);
            -o-box-shadow: inset 0 0 2px rgb(236, 236, 236);
            -webkit-appearance: none;
        }
    </style>
    <style type="text/css">
        .division {
            width: 50%;
            /* float: left; */
        }

        .content {
            padding: 20px 0;
            background: #FFF;
        }

        table.tblone tr:nth-child(2n+1) {
            background: #fff;
            height: 30px;
        }

        .tblone {
            width: 95%;
            margin-right: 15px;
            border: 2px solid #ddd;
        }

        .tblone tr td {
            text-align: justify;
        }

        .tbltwo {
            float: right;
            text-align: left;
            width: 40%;
            border: 2px solid #ddd;
            margin-right: 14px;
            margin-top: -4px;
            margin-right: 38px;
        }

        .tbltwo tr td {
            text-align: justify;
            padding: 5px 10px;
        }

        /* .ordernow {} */

        .ordernow a {
            width: 200px;
            margin: 20px auto 0;
            text-align: center;
            padding: 5px;
            font-size: 30px;
            display: block;
            background: #3C3B40;
            color: white;
            border-radius: 3px;
        }

        .head {
            background-color: antiquewhite !important;
            font-weight: 700;
        }

        td,
        th {
            width: 800px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <!-- start header -->
    <div class="header_bg">
        <div class="wrap">
            <div class="header">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="h_right">
                    <!--start menu -->
                    <ul class="menu">
                        <li class="active"><a href="index.html">hotel</a></li> |
                        <li><a href="rooms.html">rooms & suits</a></li> |
                        <li><a href="reservation.html">reservation</a></li> |
                        <li><a href="activities.html">activities</a></li> |
                        <li><a href="contact.html">contact</a></li>
                        <div class="clear"></div>
                    </ul>
                    <!-- start profile_details -->
                    <form class="style-1 drp_dwn">
                        <div class="row">
                            <div class="grid_3 columns">
                                <select class="custom-select" id="select-1">
                                    <option selected="selected">EN</option>
                                    <option>USA</option>
                                    <option>AUS</option>
                                    <option>UK</option>
                                    <option>IND</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
                <div class="top-nav">
                    <nav class="clearfix">
                        <ul>
                            <li class="active"><a href="index.php">hotel</a></li>
                            <li><a href="">rooms & suits</a></li>
                            <li><a href="">reservation</a></li>
                            <li><a href="">activities</a></li>
                            <li><a href="">contact</a></li>
                        </ul>
                        <a href="#" id="pull">Menu</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!----start-images-slider---->
    <div class="images-slider">
        <!-- start slider -->
        <div id="fwslider">
            <div class="slider_container">
                <div class="slide">
                    <!-- Slide image -->
                    <img src="images/slider-bg.jpg" alt="" />
                    <!-- /Slide image -->
                    <!-- Texts container -->
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h4 class="title"><i class="bg"></i>Lorem Ipsum is simply <span class="hide">dummy text</span></h4>
                            <h5 class="title1"><i class="bg"></i>Morbi justo <span class="hide">condimentum accumsan</span></h5>
                            <!-- /Text title -->
                        </div>
                    </div>
                    <!-- /Texts container -->
                </div>
                <!-- /Duplicate to create more slides -->
                <div class="slide">
                    <img src="images/slider-bg.jpg" alt="" />
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h4 class="title"><i class="bg"></i>Morbi justo <span class="hide"> condimentum </span>text</h4>
                            <h5 class="title1"><i class="bg"></i>Lorem Ipsum is <span class="hide">simply dummy text</span> </h5>
                            <!-- /Text title -->
                        </div>
                    </div>
                </div>
                <!--/slide -->
            </div>
            <div class="timers"> </div>
            <div class="slidePrev"><span> </span></div>
            <div class="slideNext"><span> </span></div>
        </div>
        <!--/slider -->
    </div>
    <!--start main -->
    <div class="main_bg">
        <div class="wrap">
            <div class="online_reservation">
                <div class="b_room">
                    <div class="booking_room">
                        <h4>check a room online</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                    <div class="reservation">
                        <form method="POST">
                            <ul>
                                <li class="span1_of_1 left">
                                    <h5>check-in-date:</h5>
                                    <div class="book_date">
                                        <input class=" date_get" name="checkin" id="checkin" type="date" value="<?php if (isset($checkin)) {
                                                                                                                    echo $checkin;
                                                                                                                } ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
                                    </div>
                                </li>
                                <li class="span1_of_1 left">
                                    <h5>check-out-date:</h5>
                                    <div class="book_date">
                                        <input class=" date_get" name="checkout" id="checkout" type="date" value="<?php if (isset($checkout)) {
                                                                                                                        echo $checkout;
                                                                                                                    } ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
                                    </div>
                                </li>
                                <li class="span1_of_2 left">
                                    <h5>Adults:</h5>
                                    <div class="section_room">
                                        <select id="adults" name="adults" onchange="change_country(this.value)" class="frm-field required">
                                            <option value="1">1</option>
                                            <option value="2" <?php if (isset($adult) && $adult == 2) echo "selected"; ?>>2</option>
                                            <option value="3" <?php if (isset($adult) && $adult == 3) echo "selected"; ?>>3</option>
                                            <option value="4" <?php if (isset($adult) && $adult == 4) echo "selected" ?>>4</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="span1_of_2 left">
                                    <h5>Child:</h5>
                                    <div class="section_room">
                                        <select id="childs" name="child" onchange="change_country(this.value)" class="frm-field required">
                                            <option value="0">0</option>
                                            <option value="1" <?php if (isset($child) && $child == 1) echo "selected" ?>>1</option>
                                            <option value="2" <?php if (isset($child) && $child == 2) echo "selected" ?>>2</option>
                                            <option value="3" <?php if (isset($child) && $child == 3) echo "selected" ?>>3</option>
                                            <option value="4" <?php if (isset($child) && $child == 4) echo "selected" ?>>4</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="span1_of_3">
                                    <div class="date_btn">
                                        <input type="submit" class="btn-search " name="search" value="Search now" />
                                    </div>
                                </li>
                                <div class="clear"></div>
                            </ul>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <!--start grids_of_3 -->
        </div>
    </div>

    <div class="main p-5" style="display: flex !important;">
        <div class="">
            <div class="section group d-flex">
                <div class="">
                    <?php
                    if (isset($err)) {
                        echo $err;
                    }
                    if (isset($_POST['search']) & $flag == true) {
                    ?>
                        <table class="" style="border: 2px; border-color: black;">
                            <tr class="head">
                                <th>No</th>
                                <th>Hoteld Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Rate for Adults per night</th>
                                <th>Rate for Child per night</th>
                                <th>Calculation</th>
                                <th colspan="">Total</th>
                            </tr>
                            <?php

                            // get all rates
                            $getrate = $objrate->getRates($checkin, $checkout);
                            if ($getrate) {
                                $i = 0;
                                $sum = 0;
                                $qty = 0;
                                while ($result = $getrate->fetch_assoc()) {
                                    $i++; ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php $hid = $result['hotelid'];
                                            $hname = $hotelObj->getHotelById($hid);
                                            $res = $hname->fetch_assoc();
                                            echo $res['name'];
                                            // $total =  $result['price'] * $result['quantity'];
                                            // echo number_format($total) . ".00"; 
                                            ?></td>
                                        <td><?php echo date("d F" ,strtotime($result['start_date'])); ?></td>
                                        <td><?php echo date("d F" ,strtotime($result['end_date'])); ?></td>
                                        <td><?php echo $result['rate_for_adults']; ?></td>
                                        <td><?php echo $result['rate_for_child']; ?></td>
                                        <td style="font-size: 15px;">
                                            <?php
                                            $datein = date_create($checkin);
                                            $dateout = date_create($checkout);
                                            $start = date_create($result['start_date']);
                                            $end = date_create($result['end_date']);

                                            $day = date_diff($datein, $dateout); //$checkin - $result['start_date'];
                                            $no = $day->format("%a");

                                            $rate_adult = $result['rate_for_adults'];
                                            $rate_child = $result['rate_for_child'];
                                            // check date is two different group og not
                                            if(date_format($start,"Y") < date_format($datein,"Y") && (date_format($end,"Y") < date_format($dateout,"Y"))){
                                                $dif = date_format($datein,"Y") - date_format($start,"Y");
                                                date_add($start,date_interval_create_from_date_string("$dif year"));
                                                date_add($end,date_interval_create_from_date_string("$dif year"));
                                                // echo $dif."}}";

                                            }
                                            if (($datein > $start) & ($dateout < $end)) {
                                                echo "Adults:" . $adult . " X " . $rate_adult . " X " . $no . "<br>";
                                                if ($child > 0) {
                                                    echo "child:" . $child . " X " . $rate_child . " X " . $no;
                                                }
                                            } else {
                                                // 2 groupd than
                                                if (($dateout > $end)) {
                                                    $fday = date_diff($datein, $end);
                                                    $fno = $fday->format("%a") + 1;
                                                    // if($fno> $no) {$fno=$no;}
                                                    echo "Adults:" . $adult . " X " . $rate_adult . " X " . $fno . "<br>";
                                                    if ($child > 0) {
                                                        echo "child:" . $child . " X " . $rate_child . " X " . $fno;
                                                    }
                                                    // echo $fno;
                                                } else {
                                                    $sday = date_diff($dateout, $start);
                                                    $sno = $sday->format("%a");
                                                    echo "Adults:" . $adult . " X " . $rate_adult . " X " . $sno . "<br>";
                                                    if ($child > 0) {
                                                        echo "child:" . $child . " X " . $rate_child . " X " . $sno;
                                                    }
                                                }
                                                //$checkin - $result['start_date'];

                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (($datein > $start) & ($dateout < $end)) {
                                                $total = ($no * $rate_adult); //($rate_adult * $adult);
                                                if ($child > 0) {
                                                    $total = $total + ($no * $rate_child);
                                                    echo  $no * $rate_adult . "+" . $no * $rate_child . '=' . $total;
                                                } else {
                                                    echo $total;
                                                }
                                            } else {
                                                if (($dateout > $end)) {
                                                    $total = ($fno * $rate_adult); //($rate_adult * $adult);
                                                    if ($child > 0) {
                                                        $total = $total + ($fno * $rate_child);
                                                        echo  $fno * $rate_adult . "+" . $fno * $rate_child . '=' . $total;
                                                    } else {
                                                        echo $total;
                                                    }
                                                } else {
                                                    $total = ($sno * $rate_adult); //($rate_adult * $adult);
                                                    if ($child > 0) {
                                                        $total = $total + ($sno * $rate_child);
                                                        echo  $sno * $rate_adult . "+" . $sno * $rate_child . '=' . $total;
                                                    } else {
                                                        echo $total;
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?php

                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    // $qty = $qty + $result['quantity'];
                                    // $sum = $sum + $total; 
                                    ?>
                        <?php
                                }
                            } else {
                                echo "No rate in system";
                            }
                        }
                        ?>
                        </table>
                </div>
            </div>

        </div>
    </div>
    <!--start main -->
    <div class="footer_bg">
        <div class="wrap">
            <div class="footer">
                <div class="copy">
                    <p class="link"><span>© All rights reserved</span></p>
                </div>
                <div class="f_nav">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="">rooms & suits</a></li>
                        <li><a href="">reservation</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
                <div class="soc_icons">
                    <ul>
                        <li><a class="icon1" href="#"></a></li>
                        <li><a class="icon2" href="#"></a></li>
                        <li><a class="icon3" href="#"></a></li>
                        <li><a class="icon4" href="#"></a></li>
                        <li><a class="icon5" href="#"></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>

</html>