<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Database credentials for XAMPP
    $host = "localhost";
    $dbname = "powerbidatabase"; 
    $username = "root";
    $password = "";

    try {
        // Create a MySQLi connection
        $conn = new mysqli($host, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query to insert form data into a table
        $stmt = $conn->prepare("INSERT INTO powerbidata (name, email , subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo "<h2>Form Data Successfully Inserted into Database:</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Subject: $subject</p>";
            echo "<p>Message: $message</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>