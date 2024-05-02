 <?php

$conn= new mysqli('localhost','root','','bloodbanks');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $username=$_POST['username'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
  
    $update_sql="UPDATE admin1 set password='$new_password' where username='$username' and password='$old_password'";
    
    if($conn->query($update_sql) == TRUE) {
        if($data['password'] == $old_password) {
            header("Location: passupdated.php?error=Invalid !!.");        }
        else{
            header("Location: passupdated.php?error= Changed Successfully  !!.");
                        exit();
        }
    }
   
    
    $stmt->close();
    $conn->close();
    
} 

?> 