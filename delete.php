<?php
// Paramètres de connexion à la base de données
$host = 'localhost';
$db = 'deliver';
$user = 'root';
$pass = '';

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'ID de l'utilisateur a été passé
    if (isset($_POST['noUtilisateur'])) {
        // Requête SQL pour supprimer l'utilisateur
        $sql = "DELETE FROM utilisateur WHERE noUtilisateur = :noUtilisateur";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':noUtilisateur', $_POST['noUtilisateur'], PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Erreur lors de la suppression de l\'utilisateur.']);
        }
    } else {
        echo json_encode(['error' => 'ID de l\'utilisateur manquant.']);
    }
} catch (PDOException $e) {
    // Gérer les erreurs de connexion
    echo json_encode(['error' => $e->getMessage()]);
}
?>
