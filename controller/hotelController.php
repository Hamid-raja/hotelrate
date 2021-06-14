<?php
$truePath = realpath(dirname(__FILE__));
include_once($truePath . "/../config/dbUtil.php");
?>
<?php

class hotelController
{

    protected $dataObj;
    // = new dbUtile();

    public function __construct()
    {
        $this->dataObj = new dbUtile();
    }

    /**
     * add new hotel
     */

    public function addHotel($data)
    {

        $name = $data["hname"];
        $address = $data["address"];
        $star = $data["star"];
        $status = $data["status"];

        $check= "SELECT * from hotels where name= '$name' and address='$address'";
        $chsel = $this->dataObj->select($check); 
        if($chsel){
            return "<div class='alert alert-danger' role='alert'>Hotel Already exist</div>";
        }

        $inserQuery = "INSERT INTO hotels (hotelid,name,address,star,status,create_at) VALUES(NULL,'$name','$address','$star','$status',NOW())";
        $insertHotel = $this->dataObj->insert($inserQuery);
        if ($insertHotel) {
            return "<div class='alert alert-success' role='alert'>Hotel added successfully!</div>";
        } else {
            return "<div class='alert alert-danger' role='alert'>Hotel adding Error!</div>";
        }
    }

    /**
     * update Hotel
     */

    public function updateHotel($upData, $hotelid)
    {

        $name = $upData["name"];
        $address = $upData["address"];
        $star = $upData["star"];
        $status = $upData["status"];

        $updateQuery = "UPDATE hotels SET 
            name = '$name',
            address = '$address',
            star =  '$star',
            status = '$status',
            updated_at = NOW()
            Where hotelid = '$hotelid'
            ";

        $resHotel = $this->dataObj->update($updateQuery);
        if ($resHotel) {
            return "<div class='alert alert-success' role='alert'>Hotel Updated Successfully</div>";
        } else {
            return "<div class='alert alert-danger' role='alert'>Hotel Not Updated.</div>";
        }
    }

    /**
     * delete Hotel
     */

    public function deleteHotel($hotelid)
    {

        $delquery = "DELETE FROM hotels WHERE hotelid = '$hotelid'";
        $delhotel = $this->dataObj->delete($delquery);
        if ($delhotel) {
            return "<div class='alert alert-success' role='alert'>Hotel Deleted Successfully</div>";
        } else {
            return "<div class='alert alert-danger' role='alert'>Hotel Not Deleted!</div>";
        }
    }

    /**
     * Get All hotel data
     */
    public function getHotel()
    {
        $selectQuery = "SELECT * FROM hotels";
        $sel_result = $this->dataObj->select($selectQuery);
        if ($sel_result) {
            return $sel_result;
        } else {
            return false;
        }
    }

    /**
     * Get hotel detail by id
     */

    public function getHotelById($id)
    {
        $getQuery = "SELECT * FROM hotels WHERE hotelid = '$id'";
        $getres = $this->dataObj->select($getQuery);
        if ($getres) {
            return $getres;
        } else {
            return false;
        }
    }

    /**
     * 
     */
}
?>