<?php
session_start();
if (isset($_SESSION['tuvastamine'])) {
    header('Location: index.php');
    exit();
}

$error = '';
$success = '';

if (isset($_POST["submit"])) {
    $email = htmlspecialchars(trim($_POST["email"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $name = htmlspecialchars(trim($_POST["name"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $password2 = htmlspecialchars(trim($_POST["password2"]));
    
    if (empty($email) || empty($username) || empty($name) || empty($password) || empty($password2)) {
        $error = 'Kõik väljad on kohustuslikud';
    } elseif ($password !== $password2) {
        $error = 'Paroolid ei kattu';
    } elseif (strlen($password) < 4) {
        $error = 'Parool peab olema vähemalt 4 tähemärki';
    } else {
        require_once 'config.php';
        
        $kask = $yhendus->prepare("SELECT id FROM users WHERE email=? OR username=?");
        $kask->bind_param("ss", $email, $username);
        $kask->execute();
        $kask->store_result();
        
        if ($kask->num_rows > 0) {
            $error = 'Email või kasutajanimi on juba kasutusel';
        } else {
            $sool = 'taiestisuvalinetekst';
            $kryp = crypt($password, $sool);
            
            $kask = $yhendus->prepare("INSERT INTO users (email, username, name, password, role) VALUES (?, ?, ?, ?, 0)");
            $kask->bind_param("ssss", $email, $username, $name, $kryp);
            
            if ($kask->execute()) {
                $success = 'Registreerimine õnnestus! Saad nüüd sisse logida.';
            } else {
                $error = 'Registreerimine ebaõnnestus';
            }
        }
        $kask->close();
    }
}
$title = 'Registreerimine';
include 'header.php';
?>
<main>
    <div class="login-container">
        <h1>Registreerimine</h1>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p class="success-message"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>
        <form action="" method="post" class="login-form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="username">Kasutajanimi:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="name">Nimi:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="password">Parool:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password2">Korda parooli:</label>
                <input type="password" name="password2" id="password2" required>
            </div>
            <button type="submit" name="submit" class="login-btn">Registreeri</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">
            <a href="login.php">Juba registreeritud? Logi sisse</a>
        </p>
    </div>
</main>
<?php include 'footer.php'; ?>
