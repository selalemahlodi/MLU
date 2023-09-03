<?php include('connnect.php');

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $Surname = $_POST["Surname"];
    $idno = $_POST["idno"];
    $passwd = $_POST["passwd"];
    $address = $_POST["address"];
    $number = $_POST["number"];// Hash the password
    $email = $_POST["email"];
    $member = $_POST["member"];

    // Insert user data into the database (you should also handle error checking here)
    $sql = "INSERT INTO reg (name, Surname, idno,passwd,address,number,email,member) VALUES ('name', 'Surname', 'idno','passwd','address',num'ber,'email','member')";
    if ($conn->query($sql) === FALSE) {
        
        $errorInfo = $conn->errorInfo();
        echo "Error: " . $errorInfo[2]; // Display the error message
    } else {
        $registration_success = true;
        
        if ($registration_success) { 
           

            echo '<script type="text/javascript">';
            echo 'window.alert("Registration successful! You can now log in.");';
            echo 'window.location.href = "login.php";'; // Redirect to the login page
            echo '</script>';

        }
     
    }
}

$conn = null;
?>