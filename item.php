<?php
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/item-functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
} else {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
}
if ($id === false || $id === null || $id < 1) {
    exit('Choose an item from the list.');
}
$item = getItem($db, $id);
if ($item === false) {
    exit('No item has that ID.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    markClaimed($db, $id, $item);
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Campus Lost &amp; Found</title><link rel="stylesheet" href="styles.css"></head>
<body>
<h1>Found item</h1>
<p><a href="index.php">Back to unclaimed items</a></p>
<!-- We had to change things around since we did things differently in item-functions.php -->
<h2><?= htmlspecialchars($item->itemName) ?></h2>
<p><?= htmlspecialchars($item->description) ?></p>
<p>Found at: <?= htmlspecialchars($item->locationFound) ?></p>
<?php if ( $item->claimed === 0): ?>
<form action="item.php" method="post">
    <input type="hidden" name="item_id" value="<?= $id ?>">
    <button type="submit">Mark claimed</button>
</form>
<?php else: ?>
<p>This item has already been claimed.</p>
<?php endif; ?>
</body>
</html>
