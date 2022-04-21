<?php

$hostname="localhost";
$dbname="imocha";
$username="root";
$password="";

$name= $_POST['name'];
$dob= $_POST['dob']; 
$address= $_POST['address'];
$postcode= $_POST['postcode'];
if(isset($_POST['state_id']))
{$state_id = $_POST['state_id']; 

}


  $conn= mysqli_connect ($hostname,$username,$password,$dbname) ;


  if (!$conn)

  {
      die("Connection Failed : ".mysqli_connect_error());
  }

  $sqlquery= "insert into form (name,dob,address,postcode,state_id) values ('$name', '$dob', '$address', '$postcode', '$state_id')";

  if(mysqli_query($conn,$sqlquery))

  {
        echo 'Record Inserted Successfully';
  }

  else

  {
        echo 'Failed to Insert Data';
  }
  
  mysqli_close($conn);

  ?>