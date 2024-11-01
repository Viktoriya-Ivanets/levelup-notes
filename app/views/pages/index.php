<div class="w3-container">
    <h2>Add notes</h2>
    <form method="POST" action="<?= Router::url('add') ?>">
        <input class="w3-input" type="text" name="note" required placeholder="Текст нотатки">
        <button class="w3-button w3-green w3-margin-top" type="submit">Add</button>
    </form>

    <h2>Notes list</h2>
    <table class="w3-table w3-bordered">
        <tr>
            <th>№</th>
            <th>Note's text</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($notes as $index => $note): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($note['text']) ?></td>
                <td>
                    <form method="POST" action="<?= Router::url('delete') ?>">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button class="w3-button w3-red" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>