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

    
  </style>
</head>
<body>

  <section>
    <h1>Login</h1>
    <?php
    // Display error message if it exists
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo '<p style="color: red;">' . $_GET['error'] . '</p>';
    }
    ?>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login </button> 
      <br>

      
      <a href="signup.html">Create new account?</a> </p>
      <span class="fp">
        <a href="forpass.html">Forgot password?</a>
        </span>
      

    </form>
  </section>

</body>
</html>

