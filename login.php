<?php
// Include your database connection code here
include('connnect.php');

// Initialize variables
$Surname = $_POST["Surname"];
$idno = $_POST["idno"]; // Hash the password

// Use placeholders in the SQL query to prevent SQL injection
$sql = "SELECT * FROM reg WHERE Surname = :Surname AND idno = :idno";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':Surname', $Surname);
$stmt->bindParam(':idno', $idno);

if ($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // Login success
        echo '<script type="text/javascript">';
        echo 'window.alert("Login successful! You can now log in.");';
        echo 'window.location.href = "landpage.html";'; // Redirect to the login page
        echo '</script>';
    } else {
        echo "Login failed. Invalid email or password.";
    }
} else {
    $errorInfo = $stmt->errorInfo();
    echo "Error: " . $errorInfo[2]; // Display the error message
}

$conn = null;
?>
