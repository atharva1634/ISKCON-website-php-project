<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("❌ Connection to the database failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die("❌ Error: All fields are required.");
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT password FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        die("❌ Error: No account found with this email.");
    }

    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_email'] = $email; // Store user email in session

    
        echo "<script>
                alert('✅ Successfully logged in!');
                window.location.href = 'index.php'; // Redirect after alert
              </script>";
        exit();
    } else {
        echo "<script>
                alert('❌ Error: Incorrect password.');
                window.location.href = 'login.php'; // Redirect to login page
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
