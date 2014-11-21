<?php
/**
 * Created by PhpStorm.
 * User: danielj
 * Date: 11/21/14
 * Time: 5:31 PM
 */
if(valDateTime(2000, 9, 22, 23, 5)==0)
    echo "pass";
else
    echo "fail";

function valDateTime($year, $month, $day, $minute, $hour){
    // Cannot be empty
    if($year == "" || $month || $day || $minute == "" || $hour == "")
        return 1;


    $month = "" + (intval($month) + 1);

    $newDate = new DateTime($year . "-" . $month . "-" . $day);
    $currentDate = new DateTime('Y-m-d H:i:s');

    // Returns false if fail
    if(!$newDate.setTime($hour, $minute, 0))
        return 1;

    // New date cannot be greater then current date
    if($newDate > $currentDate)
        return 1;

    // Success
    return 0;
}
?>