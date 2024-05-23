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
    display: inline;
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
}* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1100px; /* Adjust this value as needed */

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
<header>
<body bgcolor="peach" >

<!-- <div class="col-3 offset">-->
	
  <form class="d-flex" role="search" action="search.php" >
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  >
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
<h5> EDUCATION INFORMATION</h5>
<form  method="POST" style="background-color: WHITE; align-items: center; width: 300px; height: 350px;"> <br><br><br>
	    <label>Enter education_id:</label><br>
        <input type="number" name="education_id" required><br>

        <label>Enter start_date:</label><br>
        <input type="date" name="start_date" required><br>

        <label>Enter end_date:</label><br>
        <input type="date" name="end_date" required><br>

        <label>Enter graduation_date:</label><br>
        <input type="date" name="graduation_date" required><br>

        <label>Enter degree:</label><br>
        <input type="text" name="degree" required><br>
        
        <label>Enter field_of_study:</label><br>
        <input type="text" name="field_of_study" required><br>

        <label>Enter candidate_id:</label><br>
        <input type="number" name="candidate_id" required><br>

<input type="submit" name="submit" Value="INSERT" > 
<input type="reset" name="" Value="cancel" ><br>
<a href="./home.html">Go Back to Home</a><br>
</form>
</footer>
</body>
</html>
</body>
</html>



<?php
include('database_connection.php');


// Insert data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO education (education_id, start_date,end_date,graduation_date,degree,field_of_study,candidate_id) VALUES (?,?, ?,?,?,?,?)");
    $stmt->bind_param("sssssss", $education_id, $start_date, $end_date, $graduation_date,$degree, $field_of_study, $candidate_id);
    
    // Set parameters and execute
    $education_id = $_POST['education_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $graduation_date = $_POST['graduation_date'];
    $degree = $_POST['degree'];
    $field_of_study = $_POST['field_of_study'];
     $candidate_id = $_POST['candidate_id'];


   if ($stmt->execute()) {
        echo "<script>alert('New record has been added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}


// Select data from the table
$sql = "SELECT * FROM education";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of education</title>
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
    <h2>TABLE OF EDUCATION DATA</h2>
    
    <table id="dataTable">
        <tr>
            <th>education_id</th>
            <th>start_date</th>
            <th>end_date</th>
            <th>graduation_date</th>
            <th>degree</th>
            <th>field_of_study</th>
            <th>candidate_id</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $education_id = $row['education_id'];
                echo "<tr><td>" . $row["education_id"] .
                     "</td><td>" . $row["start_date"] .
                      "</td><td>" . $row["end_date"] .
                       "</td><td>" . $row["graduation_date"] .
                        "</td><td>" . $row["degree"] .
                         "</td><td>" . $row["field_of_study"] .
                         "</td><td>" . $row["candidate_id"] .
                         "<td><a style='padding:4px' href='educationupdate.php?education_id=$education_id'>update</a></td> 
                    <td><a style='padding:4px' href='educationdelete.php?education_id=$education_id'>delete</a></td> 
                </tr>";     
            }

        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        ?>
        <?php
// Close connection
$connection->close();
?>


    </table>
    
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy; 2024 &reg; Designer by:@JULLIETTE Ingabire</h2></b>
  </center>
</footer>
</body>
</html>


