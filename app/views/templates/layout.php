<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">

<header class="w3-bar w3-teal w3-padding-large w3-margin-bottom">
    <div class="w3-bar-item">
        <h3>Welcome, <?= $username ?? 'Guest' ?></h3>
    </div>
    <a href="index.php?action=<?= empty($username) ? 'login' : 'logout' ?>"
       class="w3-bar-item w3-button w3-right w3-hover-light-blue">
        <h3><?= empty($username) ? 'Login' : 'Logout' ?></h3>
    </a>
</header>

<main class="w3-container w3-margin-bottom">
    <div class="w3-card w3-white w3-padding-large w3-margin-bottom">
        <?php require_once PAGES_PATH . $page . '.php'; ?>
    </div>
</main>

</body>
</html>
