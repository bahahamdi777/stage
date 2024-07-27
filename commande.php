<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = isset($_POST['code']) ? $_POST['code'] : null;
    $nom_complet = isset($_POST['ville']) ? $_POST['ville'] : null;
    $gouvernerat = isset($_POST['state']) ? $_POST['state'] : null;
    $delegation = isset($_POST['delegation']) ? $_POST['delegation'] : null;
    $localite = isset($_POST['local']) ? $_POST['local'] : null;
    $adresse_complementaire = isset($_POST['adresse']) ? $_POST['adresse'] : null;
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
    $telephone2 = isset($_POST['telephone2']) ? $_POST['telephone2'] : null;
    $designation = isset($_POST['designation']) ? $_POST['designation'] : null;
    $nombre_article = isset($_POST['nombre_article']) ? $_POST['nombre_article'] : null;
    $prix = isset($_POST['prix']) ? $_POST['prix'] : null;

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
    if ($code && $nom_complet && $gouvernerat && $delegation && $localite && $adresse_complementaire && $telephone && $designation && $nombre_article && $prix) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO commande (code, nom_complet, gouvernerat, delegation, localite, adresse_complementaire, telephone, telephone2, designation, nombre_article, prix) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssis", $code, $nom_complet, $gouvernerat, $delegation, $localite, $adresse_complementaire, $telephone, $telephone2, $designation, $nombre_article, $prix);

        if ($stmt->execute()) {
            echo "Commande ajoutée avec succès";
            header("Location: successComm.html");
            exit();
        } else {
            echo "Echec d'ajout: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }

    $conn->close();
}
?>
