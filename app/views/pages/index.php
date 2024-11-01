<div class="w3-container">
    <h2 class="w3-text-teal">Add Notes</h2>
    <form method="POST" action="<?= Router::url('add') ?>" class="w3-row-padding">
        <div class="w3-col s10">
            <input class="w3-input w3-border" type="text" name="note" required placeholder="Enter some text">
        </div>
        <div class="w3-col s2">
            <button class="w3-button w3-green w3-block" type="submit">Add</button>
        </div>
    </form>

    <h2 class="w3-text-teal">Notes List</h2>
    <table class="w3-table w3-bordered w3-striped w3-margin-top">
        <tr class="w3-teal">
            <th>№</th>
            <th>Note's Text</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($notes as $index => $note): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($note['text']) ?></td>
                <td>
                    <form method="POST" action="<?= Router::url('delete') ?>">
                        <input type="hidden" name="index" value="<?= $index ?>">
                        <button class="w3-button w3-red w3-small" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>