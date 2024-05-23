<?php
include('database_connection.php');

// Check if a search term is provided
if(isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'employers' => "SELECT name FROM employers WHERE name LIKE '%$searchTerm%'",
        'skills' => "SELECT skills_name FROM skills WHERE skills_name LIKE '%$searchTerm%'",
        'salaryranges' => "SELECT minimum_salary FROM salaryranges WHERE minimum_salary LIKE '%$searchTerm%'",
        'resumes' => "SELECT skills FROM resumes WHERE skills LIKE '%$searchTerm%'",
        'jobs' => "SELECT title FROM jobs WHERE title LIKE '%$searchTerm%'",
        'experiences' => "SELECT company FROM experiences WHERE company LIKE '%$searchTerm%'",
        'education' => "SELECT degree FROM education WHERE degree LIKE '%$searchTerm%'",
        'company' => "SELECT name FROM company WHERE name LIKE '%$searchTerm%'",
        'candidates' => "SELECT first_name FROM candidates WHERE first_name LIKE '%$searchTerm%'",
        'applications' => "SELECT application_date FROM applications WHERE application_date LIKE '%$searchTerm%'"
    ];

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
         } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    $connection->close();
} else {
    echo "No search term was provided.";
}
?>
