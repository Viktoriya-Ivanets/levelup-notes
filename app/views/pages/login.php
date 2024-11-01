<div class="w3-container w3-card-4 w3-light-grey w3-margin-top w3-padding" style="max-width: 400px; margin: auto;">
    <h2 class="w3-center w3-text-teal">Login</h2>

    <?php if (isset($error)): ?>
        <p class="w3-text-red w3-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form class="w3-container" method="POST" action="<?= Router::url('login') ?>">
        <label class="w3-text-grey">Username:</label>
        <input class="w3-input w3-border" type="text" name="username" required>

        <label class="w3-text-grey">Password:</label>
        <input class="w3-input w3-border" type="password" name="password" required>

        <button class="w3-button w3-blue w3-block w3-margin-top" type="submit">Login</button>
    </form>

    <div class="w3-margin-top w3-center">
        <a href="<?= Router::url('register') ?>" class="w3-text-blue">Register</a>
    </div>
</div>
