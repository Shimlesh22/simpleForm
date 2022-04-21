<?php

$postcode = $_REQUEST['postcode'];
$con = mysqli_connect("localhost", "root", "", "imocha");

if($postcode!=="") {

    $query= mysqli_query($con,"SELECT * FROM `api` WHERE postcode='$postcode'");
    
    $row = mysqli_fetch_array($query);
    $state_id= $row["state_id"];
}

$result = array("$state_id");
$myJSON = json_encode($result);

echo $myJSON;

?>