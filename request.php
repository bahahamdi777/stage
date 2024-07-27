<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : null;

    $code = isset($_POST['code']) ? $_POST['code'] : null;

    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $gsm = isset($_POST['gsm']) ? $_POST['gsm'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "deliver";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the request into the user_request table
    $stmt = $conn->prepare("INSERT INTO user_request (username, code, password, gsm, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $code ,$hashed_password, $gsm, $email);

    if ($stmt->execute()) {
        echo "Request submitted successfully.";
        header("Location: crew.html");
        exit();
    } else {
        echo "Failed to submit request: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
