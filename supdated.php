<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Bank Locations</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    background-image: url('https://media.istockphoto.com/id/1257429592/photo/blood-cells.webp?b=1&s=170667a&w=0&k=20&c=8m1xNzoiKoe9hhtd3iK0BK0_ZwJWEots8usPGiAT8zI='); /* Replace with your actual image URL */
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    overflow: hidden;
  }

  header {
    background-color: #cc0000;
    color: #fff;
    padding: 1em;
    text-align: center;
  }

  section {
    margin: auto;
    margin-top: 15px;
    width: 485px;
    height: 458px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8); /* Add transparency to the background */
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  label {
    display: block;
    margin-bottom: 0.5em;
    font-size:larger;
    font-weight: 700px;
    margin-left:15px;
  }

  input {
    width: 22em;
    padding: 0.5em;
    margin-bottom: 1em;
    box-sizing: border-box;
    margin-left:15px;

  }
  select {
    width:400px;
    padding: 8px;
    margin-bottom: 1em;
    box-sizing: border-box;
    margin-left:15px;

  }

  button {
    background-color: #cc0000;
    color: #fff;
    padding: 0.5em 1em;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-left: auto;
    margin-right: auto;
    margin-top: 13px;
      display:block;
    font-size: 18px;
  }

  button:hover {
    background-color: #990000;
  }
  h2{
      text-align: center;
      font-weight: bolder;
  }
  a{
      color: #990000;
      text-decoration: none;
  }
  
  

.back-button {
  padding: 5px 10px; /* Adjust padding as needed */
  border-radius: 5px;/* Change button color as needed */
  text-decoration: none;
  font-weight: bolder; /* Set font weight to bold */
  color:white;
  float:left;
  font-size:20px;
}
.navbar {
  display: flex;
  justify-content: space-between;
  font-family: 'Times New Roman', Times, serif;
  align-items: center;
  padding: 10px 20px;
  background-color: #d11616; /* Change the background color as needed */
  color: #fff; /* Change text color as needed */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: add shadow for depth */
}

.navbar-title {
  font-size: 30px; /* Adjust font size as needed */
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
    <h2>Stock Updation</h2>
      
<form action="stock.php" method="post">    
<label for="bloodBank">Select Blood Bank:</label>
<select id="bloodBank" onchange="getBloodBankLocations()" name="bloodBank">
  <option value="" disabled selected >Select Blood Bank</option>
</select>

<label for="locations">Locations:</label>
<select id="locations" name="locations" >
  <option value="" disabled selected>Select Location</option>
</select>
<div id="blood">
  <label for="Blood-select">Select Blood Group:</label>
  <select name="Blood-select" class="selection" id="Blood-select" required>
    <option value ="" disabled selected>--Please select an option--</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>
  </div>
  
  <label for="Stock">Stock</label>
  <input value="" id="stock" name="stock" ></input>

  <?php
    // Display error message if it exists
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo '<p style="color:green; text-align:center; font-weight:bold;">' . $_GET['error'] . '</p>';
    }
    ?>
  <button type="submit">Update </button>
</section>
</form>
<script>
window.onload = function() {
  // Fetch blood bank names and populate dropdown
  fetch(`get_bloodbanks.php`)
    .then(response => response.json())
    .then(data => {
      let bloodBankDropdown = document.getElementById("bloodBank");
      data.forEach(bloodBank => {
        let option = document.createElement("option");
        option.value = bloodBank;
        option.textContent = bloodBank;
        bloodBankDropdown.appendChild(option);
      });
    })
    .catch(error => console.error('Error fetching blood banks:', error));
};

function getBloodBankLocations() {
  let selectedBloodBank = document.getElementById("bloodBank").value;
  let locationsDropdown = document.getElementById("locations");
  // Clear existing options
  locationsDropdown.innerHTML = '<option value="">Select Location</option>';
  
  // Make an AJAX request to fetch locations for the selected blood bank
  fetch(`get_locations.php?bloodBank=${selectedBloodBank}`)
    .then(response => response.json())
    .then(data => {
      // Populate locations dropdown with fetched data
      data.forEach(location => {
        let option = document.createElement("option");
        option.value = location;
        option.textContent = location;
        locationsDropdown.appendChild(option);
      });
    })
    .catch(error => console.error('Error fetching locations:', error));
}
</script>
</body>
</html>

