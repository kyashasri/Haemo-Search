<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Bank - Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('https://media.istockphoto.com/id/1257429592/photo/blood-cells.webp?b=1&s=170667a&w=0&k=20&c=8m1xNzoiKoe9hhtd3iK0BK0_ZwJWEots8usPGiAT8zI='); /* Replace with your actual image URL */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      overflow: hidden;
    
    }

    section {
      margin: 6em auto;
      width: 310px;
      padding: 2em;
      background-color: rgba(255, 255, 255, 0.8); /* Add transparency to the background */
      border-radius: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
    }

    label {
      display: block;
      margin-bottom: 1em 1em 1em 1em;
      font-size: large;
    }

    input {
      width: 100%;
      padding: 0.5em;
      margin-bottom: 1em;
      box-sizing: border-box;
    }

    button {
      background-color: #cc0000;
      color: #fff;
      padding: 0.5em 1em;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      margin-left: auto;
      margin-right: auto;
        display:block;
      font-size: 18px;
      margin-top: 20px;
    
    }

    button:hover {
      background-color: #990000;
    ;
    }
    a{
        text-decoration: none;
    }
    .fp{
        text-align: left;
        display:block;
         margin-bottom: 1em;
    }
    h1{
        text-align: center;
        font-weight :bolder;
    }
    a{
        color: #990000;
    }
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
  
  .back-button {
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px;/* Change button color as needed */
    text-decoration: none;
    font-weight: bold; /* Set font weight to bold */
    color:white;
    float:left;
    font-size:20px;
  }
    
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="back-button">
      <a class="back-button" href="frontp.html"> Back</a>
    </div>
    <div class="navbar-title">
      Haemo Search
    </div>
    <div></div> <!-- Empty div for alignment, can be removed if not needed -->
  </nav>
   
  
  

  <section>
    <h1>Login</h1>
    <?php
    // Display error message if it exists
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo '<p style="color: red;">' . $_GET['error'] . '</p>';
    }
    ?>
    <form action="admin_log.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login </button> 
      <br>

      
      
      
      

    </form>
  </section>

</body>
</html>


