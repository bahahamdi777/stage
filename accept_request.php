<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noUtilisateur = isset($_POST['noUtilisateur']) ? $_POST['noUtilisateur'] : null;

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "deliver";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
    }

    // Fetch request details
    $stmt = $conn->prepare("SELECT * FROM user_request WHERE noUtilisateur = ?");
    $stmt->bind_param("i", $noUtilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $request = $result->fetch_assoc();

        // Insert into utilisateur table
        $stmt = $conn->prepare("INSERT INTO utilisateur (username, password, role, gsm, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $request['username'], $request['password'], $request['role'], $request['gsm'], $request['email']);

        if ($stmt->execute()) {
            // Delete from user_request table
            $stmt = $conn->prepare("DELETE FROM user_request WHERE noUtilisateur = ?");
            $stmt->bind_param("i", $noUtilisateur);
            $stmt->execute();

            echo json_encode(['success' => 'Request accepted successfully.']);
        } else {
            echo json_encode(['error' => 'Failed to accept request: ' . $stmt->error]);
        }
    } else {
        echo json_encode(['error' => 'Request not found.']);
    }

    $stmt->close();
    $conn->close();
}
?>
