<?php

//databse connection
$conn= new mysqli('localhost','root','','bloodbanks');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$conn->prepare("insert into signin(fullname,email,username,password) values(?,?,?,?)");
    $stmt->bind_param("ssss",$fullname,$email,$username,$password);
    $stmt->execute();
    header('location: logpage.html');
    $stmt->close();
    $conn->close();
}
?>