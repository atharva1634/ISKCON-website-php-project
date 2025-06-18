<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "login";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die(" Connection to the database failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_pass = $_POST['confirm_pass'] ?? '';

    if (empty($email) || empty($password) || empty($confirm_pass)) {
        die("Error: All fields are required.");
    }

    if ($password !== $confirm_pass) {
        die("Error: Passwords do not match.");
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die(" Error: This email is already registered.");
    }
    $stmt->close();

    // Hash the password
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user into database
    $stmt = $conn->prepare("INSERT INTO signup (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password_hashed);

    if ($stmt->execute()) {
        $_SESSION['user_email'] = $email; // Store user email in session
        echo "<script>
    alert('✅ Successfully Signed in!');
    window.location.href = 'index.php'; // Redirect to home page
</script>";

        
        exit();
    } else {
        echo "ERROR: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
