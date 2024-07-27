<?php
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

$noUtilisateur = isset($_GET['noUtilisateur']) ? $_GET['noUtilisateur'] : null;
$user = null;

if ($noUtilisateur) {
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE noUtilisateur = ?");
    $stmt->bind_param("i", $noUtilisateur);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if (!$user) {
    echo "User not found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Edit User</title>
  <style>
    body { 
        background-color: darkslategrey;
    }
</style>
</head>
<body>
  <div class="container" id="ajout1">
    <div class="row">
      <div class="offset-4  mt-5 mb-5">
        <div class="card" style="width: 350px">
          <div class="card-header">
            <h2>Edit User</h2>
          </div>
          <div class="card-body">
            <div>
              <img class=" mx-auto d-block rounded-circle card-img-top" src="admin-user-icon.webp" style="width: 150px; height: 150px;">
            </div>
            <form class="needs-validation" action="update.php" method="post">
              <input type="hidden" name="noUtilisateur" value="<?php echo $user['noUtilisateur']; ?>">
              <div class="mb-3">
                <label for="name" class="form-label">USERNAME</label>
                <input type="text" class="form-control form-control-sm" id="name" name="nom" aria-describedby="name" value="<?php echo $user['username']; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Veuillez taper son username
                </div>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">PASSWORD</label>
                <input type="password" class="form-control form-control-sm" id="password" name="pass" aria-describedby="price" value="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Veuillez taper son mot de passe
                </div>
              </div>

              <div class="mb-3">
                <label for="codeid" class="form-label">CODE A BARRE</label>
                <input type="code" class="form-control form-control-sm" id="codeid" name="code" aria-describedby="codee" value="<?php echo $user['code']; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Veuillez taper son code a barre
                </div>
              </div>

              <div class="mb-3">
                <label for="Categorie" class="form-label">ROLE</label>
                <select class="form-select" id="Categorie" name="ROLE" aria-describedby="Categorie" required>
                    <option value="" selected disabled hidden>veuillez mentionner son role</option>
                    <option value="1" <?php echo $user['role'] == '1' ? 'selected' : ''; ?>>admin</option>
                    <option value="2" <?php echo $user['role'] == '2' ? 'selected' : ''; ?>>employee</option>
                    <option value="3" <?php echo $user['role'] == '3' ? 'selected' : ''; ?>>client</option>
                </select>
                <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="invalid-feedback">
                    Veuillez sélectionner une catégorie.
                </div>
              </div>

              <div class="mb-3">
                <label for="numero" class="form-label">GSM</label>
                <input type="text" class="form-control form-control-sm" id="numero" name="gsm" aria-describedby="numero" value="<?php echo $user['gsm']; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Veuillez taper son numero mobile.
                </div>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="mail" value="<?php echo $user['email']; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Veuillez taper son adresse email
                </div>
              </div>

              <button id="Annul" type="reset" class="btn btn-danger text-center">ANNULER</button>
              <button id="Ajout" type="submit" class="btn btn-success text-center">VALIDER</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
