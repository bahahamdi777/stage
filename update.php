<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noUtilisateur = isset($_POST['noUtilisateur']) ? $_POST['noUtilisateur'] : null;
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
    $dbname = "deliver";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Ensure the form fields are not empty
    if ($username && $password && $role) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE utilisateur SET username=?, code=?, password=?, role=?, gsm=?, email=? WHERE noUtilisateur=?");
        $stmt->bind_param("sisissi", $username, $code, $hashed_password, $role, $gsm, $email, $noUtilisateur);

        if ($stmt->execute()) {
            echo "Mise à jour réussie.";
            header("Location: crew.html");
            exit();
        } else {
            echo "Echec de la mise à jour: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }

    $conn->close();
}
?>
