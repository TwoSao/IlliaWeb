<?php
session_start();
if (isset($_SESSION['tuvastamine'])) {
    header('Location: admin.php');
    exit();
}

$error = '';

if (isset($_POST["submit"])) {
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if (empty($email) || empty($password)) {
        $error = 'Kõik väljad on kohustuslikud';
    } else {
        require_once 'config.php';
        
        $sool = 'taiestisuvalinetekst';
        $kryp = crypt($password, $sool);

        $kask = $yhendus->prepare("SELECT id, email, role, name FROM users WHERE (email=? OR username=?) AND password=?");
        $kask->bind_param("sss", $email, $email, $kryp);
        $kask->execute();
        $kask->bind_result($id, $db_email, $role, $name);
        
        if ($kask->fetch()) {
            $_SESSION['tuvastamine'] = $id;
            $_SESSION['email'] = $db_email;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name;
            
            if ($role == 1) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error = 'Vale email/kasutajanimi või parool';
        }
        $kask->close();
    }
}
$title = 'Login';
include 'header.php';
?>
<main>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="" method="post" class="login-form">
            <div class="form-group">
                <label for="email">Email or username:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" name="submit" class="login-btn">Logi sisse</button>
        </form>
        <p style="text-align: center; margin-top: 20px;">
            <a href="register.php">Pole kontot? Registreeri</a>
        </p>
    </div>
</main>
<?php include 'footer.php'; ?>
