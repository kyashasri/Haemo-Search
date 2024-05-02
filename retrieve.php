<?php
    $conn= new mysqli('localhost','root','','bloodbanks');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    $blood = $_POST['blood'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $place = $_POST['place'];
    $stmt = $conn->prepare("select * from locations where d_loc=? AND d_grp=?");
    $stmt->bind_param("ss", $place,$blood);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="db.css">
    <title>View Records</title>
<style>
     .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    font-family: 'Times New Roman', Times, serif;
    background-color: #d11616; /* Change the background color as needed */
    color: #fff; /* Change text color as needed */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: add shadow for depth */
  }
  
  .navbar-title {
    font-size: 30px; /* Adjust font size as needed */
  }
  .logout-button {
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px;/* Change button color as needed */
    text-decoration: none;
    font-weight: bolder; /* Set font weight to bold */
    color:white;
    float:left;
    font-size:20px;
  }
  
  .back-button {
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px;/* Change button color as needed */
    text-decoration: none;
    font-weight: bold; /* Set font weight to bold */
    color:white;
    float:left;
    font-size:20px;
  }
  h3{
    float: left;
    margin-left: 70px;
    font-weight: bold;
  }
    

    </style>
</head>

<body>
<nav class="navbar">
  <div>
    <a class="back-button" href="db.html"> Back</a>
  </div>
  <div class="navbar-title">
    Haemo Search
  </div>
  <div>
    <a class="logout-button" href="frontp.html"> Logout</a>
  </div>
</nav>


    <section style="width:auto; height:auto;">
    <h2>Blood Availability</h2>
    <h3>Blood: <?php echo $blood ?></h3>

        <div class="container d-flex align-items-center">
            <div class="row">
            <table class="table table-striped table-hover">
                <tr>
                    <!-- <th> D_ID </th> -->
                    <th> Name </th>
                    <th> Address </th>
                    <th> Location </th>
                    <th>Stock(units) </th>
                    <th> Contact_No </th>
                    <th>Maps</th>
                </tr>

                <?php 
                                    
                    while($row=mysqli_fetch_assoc($result))
                        {
                            $D_ID = $row['d_id'];
                            $Name = $row['d_name'];
                            $Address = $row['d_adrs'];
                            $Location = $row['d_loc'];
                            $Stock=$row['d_units'];
                            $Contact_No=$row['d_phno'];
                ?>
                    <tr>
                        <!-- <td><?php echo $D_ID ?></td> -->
                        <td><?php echo $Name ?></td>
                        <td><?php echo $Address ?></td>
                        <td><?php echo $Location ?></td>
                        <td><?php echo $Stock?></td>
                        <td><?php echo $Contact_No?></td>
                        <!-- https://www.google.com/maps/search/?api=1&query=Bhanji+Kherji+Blood+Bank -->
                        <td>
                            <a target="_blank" href="https://www.google.com/maps/search/?api=1&query=<?php echo str_replace(' ','+', $Name) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg></a>
                        </td>
                    </tr>        
                <?php 
                    }  
                ?>                                                                    
                </table>
            </div>
        </div>
    </section>
</body>
</html>