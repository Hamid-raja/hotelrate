<?php
$truePath = realpath(dirname(__FILE__));

include_once($truePath."/../config/dbUtil.php");

    class rateController{

        private $DBobj;

        public function __construct()
        {
            $this->DBobj = new dbUtile();
        }

        /**
         * add Rates for hotel
         */

         public function  addRatesToHotel($data){

            $hotelid= $data["hotelid"];
            $start_Date = $data["start_date"];
            $end_Date = $data["end_date"];
            $adult_rate = $data["adult_rate"];
            $child_rate = $data["child_rate"];

            $check= "SELECT * from hotel_rates where hotelid = '$hotelid' And ('$start_Date' between start_date and end_date) or ('$end_Date' between start_date and end_date)";
           echo "abcd";
            $chsel = $this->DBobj->select($check); 
            if($chsel){
                return "<div class='alert alert-danger' role='alert'>Rate Already exist</div>";
            }

            if($start_Date == "" || $end_Date == "" || $adult_rate == "" || $child_rate== "" || $hotelid == "" ){
                return "<div class='alert alert-danger' role='alert'>Any Fields must not be empty!</div>";
            }
            else{

                $insertRate = "INSERT INTO hotel_rates VALUES(NULL,'$hotelid','$start_Date','$end_Date','$adult_rate','$child_rate',NOW(),NULL)";
                $insert_row = $this->DBobj->insert($insertRate);

                if($insert_row){
                    return "<div class='alert alert-success' role='alert'>Rate Inserted Successfully</div>";
                } else {
                   return "<div class='alert alert-danger' role='alert'>Rate Not Inserted.</div>";
                 }
                
            }
         }

         /**
          * update Rates
          */

          public function  updateRatesToHotel($data,$hotelid,$rateid){

            $start_Date = $data["start_date"];
            $end_Date = $data["end_date"];
            $adult_rate = $data["adult_rate"];
            $child_rate = $data["child_rate"];

            if($start_Date == "" || $end_Date == "" || $adult_rate == "" || $child_rate== ""){
                return "<div class='alert alert-danger' role='alert'>Any Fields must not be empty!</div>";
            }
            else{

                $updateRate = "UPDATE hotel_rates SET
                    hotelid = '$hotelid',
                    start_date = '$start_Date',
                    end_date = '$end_Date',
                    rate_for_adults = '$adult_rate',
                    rate_for_child = '$child_rate',
                    update_at = NOW()
                    WHERE id = '$rateid'
                ";
                $update_row = $this->DBobj->update($updateRate);

                if($update_row){
                    return "<div class='alert alert-success' role='alert'>Rate Updated Successfully</div>";
                } else {
                   return "<div class='alert alert-danger' role='alert'>Rate Not Updated.</div>";
                 }
            }
         }

         /**
          * delete rates
          */

          public function delRateById($rateid){
              $delRate = "DELETE FROM hotel_rates WHERE id= '$rateid'";

              $del_row = $this->DBobj->delete($delRate);
            if ($del_row) {
                return "<div class='alert alert-success' role='alert'>Rate Deleted Successfully</div>";
            } else {
                return "<div class='alert alert-danger' role='alert'>Rate Not Deleted!</div>";
            }
          }



        /**
        * select all rates
        */
        public function selRate(){
            $selectQuery = "SELECT * FROM hotel_rates";
            $sel_result = $this->DBobj->select($selectQuery);
            if ($sel_result) {
                return $sel_result;
            } else {
                return false;
            }
        }

        /*
        * get rates by id
        */
        public function selRateById($rateid){
            $selectQuery = "SELECT * FROM hotel_rates WHERE id = '$rateid' ";
            $sel_rate = $this->DBobj->select($selectQuery);
            if ($sel_rate) {
                return $sel_rate;
            } else {
                return false;
            }
        }


        /**
         * get / search rate fro users 
         */

        public function getRates($checkin, $checkout){

            // $date= date_create($checkin);
            // $checkin = date_format($date,"m d");
    
            $selRate = "SELECT * FROM hotelrate.hotel_rates where (DATE_FORMAT('$checkin','%m-%d') between DATE_FORMAT(start_date,'%m-%d') and DATE_FORMAT(end_date,'%m-%d')) or (DATE_FORMAT('$checkout','%m-%d') between DATE_FORMAT(start_date,'%m-%d') and DATE_FORMAT(end_date,'%m-%d'));";
             //"SELECT * FROM hotel_rates  WHERE ('$checkin' between date_format(start_date,'m d') and date_format(end_date,'m d')"; //or ('$checkout' between start_date and end_date)";
            // $selRate ="SELECT * FROM hotel_rates  WHERE ('$checkin' between start_date and end_date) or ('$checkout' between start_date and end_date)";
            $resRate = $this->DBobj->select($selRate);
            if ($resRate) {
                return $resRate;
            } else {
                return false;
            }

        }

    }
?>