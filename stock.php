<?php

//databse connection
$conn= new mysqli('localhost','root','','bloodbanks');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $bloodBank=$_POST['bloodBank'];
    $locations=$_POST['locations'];
    $Blood=$_POST['Blood-select'];
    $stock=$_POST['stock'];

    $stmt=$conn->prepare("update locations set d_units=? where d_name=? and d_grp=?");
    $stmt->bind_param("iss",$stock,$bloodBank,$Blood);
    $stmt->execute();
    header("Location: supdated.php?error=Update Successful !!.");
    $stmt->close();
    $conn->close();

}
?>