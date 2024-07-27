<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['nom']) ? $_POST['nom'] : null;
    $code = isset($_POST['code']) ? $_POST['code'] : null;
    $password = isset($_POST['pass']) ? $_POST['pass'] : null;
    $role = isset($_POST['ROLE']) ? $_POST['ROLE'] : null;
    $gsm = isset($_POST['gsm']) ? $_POST['gsm'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Hash du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $servername = "localhost";
    $dbusername = "root"; 
    $dbpassword = ""; 
    $dbname = "deliver"; // Make sure this is the correct database name

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ensure the form fields are not empty
    if ($username && $password && $role) {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM utilisateur WHERE username=? OR email=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // No matching user found, insert new one
            $stmt = $conn->prepare("INSERT INTO utilisateur (username, code, password, role, gsm, email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $username, $code, $hashed_password, $role, $gsm, $email);

            if ($stmt->execute()) {
                echo "Ajout avec succès d'un user ou employee";
                header("Location: crew.html");
                exit();
            } else {
                echo "Echec d'ajout: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "user déjà existant.";
            header("Location: error.html");
            exit();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }

    $conn->close();
}
?>
