<?php
if(isset($_GET['filterSearch'])){
    $filter = array();
    $filter[] = " status_id = 2 ";
    if ($_GET['location_id']){
        $locatin_id = $_GET['location_id'];
        $filter[] = " location_id = '$location'";
    }
    if ($_GET['guest_num']){
        $guest_num = $_GET['guest_num'];
        $filter[] = " guest_num = '$guest_num'";
    }
    if ($_GET['pet']){
        $pet = $_GET['pet'];
        $filter[] = " pet = '$pet'";
    }
 

    if ($_GET['price']){
        $price = $_GET['price'];
        $filter[] = "price < $price"; 
    }

    //if check_in and check_out date selected, query from booking
    if ($_GET['check_in'] && $_GET['check_out']) {
        $check_in = $_GET['check_in'];
        $check_out = $_GET['check_out'];
        $queryB = "SELECT * FROM booking WHERE check_out >= '$check_in' && check_in <= '$check_out' ";
        $resultB = mysqli_query($link,$queryB);
        $rowB = mysqli_fetch_array($resultB);
        $house_id = $rowB['house_id'];
        $filter[] = "NOT house_id = '$house_id'";

    }
    $queryH = "SELECT * FROM house WHERE ";
    $queryH .= implode(" && ", $filter);
    $resultH = mysqli_query($link, $queryH);





} else {
    $queryH = "SELECT * FROM house WHERE status_id = 2 ";
    $resultH = mysqli_query($link, $queryH);
}
?>






