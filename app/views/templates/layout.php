<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-container">
<header class="w3-bar w3-light-grey">
    <span class="w3-bar-item">Welcome, <?= $username ?? 'Guest' ?></span>
    <a href="index.php?action=<?= empty($username) ? 'login' : 'logout' ?>" class="w3-bar-item w3-button"><?= empty($username) ? 'Login' : 'Logout' ?></a>
</header>
<main>
    <?php require_once PAGES_PATH . $page . '.php'; ?>
</main>
</body>
</html>
