<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Teenused</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <img src="png.png" alt="AI" id="headIMG">
    <h1>BlackPrinc AI Teenused</h1>
</header>
<nav>
    <ul>
        <li><a href="index.php">Avaleht</a></li>
        <?php if (isset($_SESSION['tuvastamine']) && $_SESSION['role'] == 1): ?>
        <li><a href="admin.php">Admin paneel</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['tuvastamine'])): ?>
        <li><a href="teenused.php">Meie teenused</a></li>
        <?php endif; ?>
        <li><a href="galerii.php">Galerii</a></li>
        <?php if (isset($_SESSION['tuvastamine'])): ?>
        <li class="user-greeting">Tere, <?php echo htmlspecialchars(isset($_SESSION['name']) ? $_SESSION['name'] : $_SESSION['email']); ?>!</li>
        <li>
            <form action="logout.php" method="post" style="display:inline;">
                <button type="submit" name="logout" class="logout-btn">Välja logi</button>
            </form>
        </li>
        <?php else: ?>
        <li><a href="login.php">Logi sisse</a></li>
        <?php endif; ?>
    </ul>
</nav>
