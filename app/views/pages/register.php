<div class="w3-container w3-card-4 w3-light-grey w3-margin-top" style="max-width: 400px; margin: auto;">
    <h2 class="w3-center">Registration</h2>

    <?php if (isset($error)): ?>
        <p class="w3-text-red w3-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form class="w3-container" method="POST" action="<?= Router::url('register') ?>">
        <label class="w3-text-grey">Login:</label>
        <input class="w3-input w3-border" type="text" name="username" required>

        <label class="w3-text-grey">Password:</label>
        <input class="w3-input w3-border" type="password" name="password" required>

        <button class="w3-button w3-green w3-margin-top" type="submit">Register</button>
    </form>

    <div class="w3-margin-top w3-center">
        <a href="<?= Router::url('login') ?>" class="w3-text-blue">Login</a>
    </div>
</div>