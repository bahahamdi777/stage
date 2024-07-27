<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "deliver";

    // Créer la connexion
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Utiliser les instructions préparées pour prévenir les injections SQL
    $query = "SELECT * FROM Utilisateur WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Si aucun user avec cet email n'est trouvé
        header("Location: login1.html");  // Retourner au formulaire de login
        exit();
    } else {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['password'])) {   // on compare le pass du form avec celle du base donne (hashed)
            // Check user role
            if ($user['role'] == '3') {
                header("Location: commande.html");  // Aller à la page commande pour les clients
            } else {
                header("Location: crew.html");  // Aller à une autre page pour les non-clients
            }
            exit();
        } else {
            // Mot de passe incorrect
            header("Location: login1.html");  // Retourner au formulaire de login
            exit();
        }
    }

    $conn->close();
}
?>
