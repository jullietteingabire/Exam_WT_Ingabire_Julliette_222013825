<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!DOCTYPE html>
<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Category</title>

  <style>
  .dropdown {
    position: relative;
    display: inline-block; /* Corrected display value */
    margin-right: 10px;
  }
  .dropdown-contents {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    left: 0; /* Aligning dropdown contents to the left */
  }
  .dropdown:hover .dropdown-contents {
    display: block;
  }
  .dropdown-contents a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  .dropdown-contents a:hover {
    background-color: #f1f1f1;
  }
  header{
    background-color:skyblue;
    padding:20px;
    margin-top: 0px;
    
  }
  section{
    padding:90px;
    border-bottom: 0px solid #ddd;
  }
  /* Extend margin left for search button */
  button.btn {
    margin-left: 15px; /* Adjust this value as needed */
    margin-top: 4px;
  }
  /* Extend margin left for search button */
  input.form-control {
    margin-left: 15px; /* Adjust this value as needed */
    padding: 8px;
  }
  footer {
  background-color: skyblue; /* Background color */
  padding: 20px; /* Padding around content */
  text-align: center; /* Center-align content */
  margin-bottom:0PX;
}

footer h2 {
  margin:0; /* Remove default margin */
  font-weight: bold; /* Make text bold */
}

footer b {
  color: #333; /* Text color */
}

footer a {
  color: #007bff; /* Link color */
}
  </style>
</head>
<body bgcolor="peach">
<header>
  <!-- <div class="col-3 offset"> -->
  <form class="d-flex" role="search" action="search.php" >
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>

  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;"><a href="./home.html" style="padding: 10px; color: black; background-color:canary; text-decoration: none; margin-right: 15px;">Home</a></li>
    
    <li style="display: inline; margin-right: 10px;"><a href="./employers.php" style="padding: 9.5px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">employers</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./skills.php" style="padding: 9.5px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">skills</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./salaryranges.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">salaryranges</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./resumes.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">resumes</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./jobs.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">jobs</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./experiences.php" style="padding: 10px; color:  black; background-color:canary; text-decoration: none; margin-right: 15px;">experiences</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./education.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">education</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./company.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">company</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./candidates.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">candidates</a></li>

    <li style="display: inline; margin-right: 10px;"><a href="./applications.php" style="padding: 10px; color:  black; background-color: canary; text-decoration: none; margin-right: 15px;">applications</a></li>

    
    
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color: canary; background-color:skyblue; text-decoration: none; margin-right: 15px;">Setting</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
  </header>
<center>
    <h2>EMPLOYERS INFORMATION</h2>
    <form method="POST" action="employers.php" style="background-color: white; width: 300px;">
      <br><br><br>
      <label>Enter employer_id:</label><br>
      <input type="number" name="employer_id" required><br>

      <label>Enter name:</label><br>
      <input type="text" name="name" required><br>

      <label>Enter email:</label><br>
      <input type="text" name="email" required><br>

      <label>Enter industry:</label><br>
      <input type="text" name="industry" required><br>

      <input type="submit" name="submit" value="INSERT">
      <input type="reset" value="Cancel"><br>
<a href="./home.html">Go Back to Home</a><br> 
    </form>
  </center>
</section>



</body>
</html>

<?php
include('database_connection.php');


// Insert data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $connection->prepare("INSERT INTO employers (employer_id, name, email, industry) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $employer_id, $name, $email, $industry);
    
    $employer_id = $_POST['employer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $industry = $_POST['industry'];

    if ($stmt->execute()) {
        echo "<script>alert('New record has been added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

// Select data from the table
$sql = "SELECT * FROM employers";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employers Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>EMPLOYERS DATA</h2>
    
    <table>
        <tr>
            <th>Employer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Industry</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employer_id = $row['employer_id'];
                echo "<tr><td>" . $row["employer_id"] .
                     "</td><td>" . $row["name"] .
                     "</td><td>" . $row["email"] .
                     "</td><td>" . $row["industry"] .
                     "<td><a style='padding:4px' href='employersupdate.php?employer_id=$employer_id'>update</a></td> 
                    <td><a style='padding:4px' href='employersdelete.php?employer_id=$employer_id'>delete</a></td> 
                </tr>";     
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        ?>
        <?php
// Close connection
$connection->close();
?>


    </table>
    <footer>
  <center> 
    <b><h2>UR CBE BIT &copy; 2024 &reg; Designer by: @JULLIETTE Ingabire</h2></b>
  </center>
</footer>
</body>
</html>

