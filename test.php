<?php

$date =date_create("12-06-2021");
$date2 =date_create("12-07-2025");

$time  = strtotime("12-06-2021");
$day   = date('d',$time);
$month = date('F',$time);
$year  = date('Y',$time);

if(date_format($date,"Y") < date_format($date2,"Y")){
    $dif = date_format($date2,"Y") - date_format($date,"Y");
    echo $dif;
    // $date = strtotime('+5 years',$time); 
    date_add($date,date_interval_create_from_date_string("5 year"));  
}
$dat1 = date_format($date,"Y");

echo " $dat1";//"$day $month  $year";
?>