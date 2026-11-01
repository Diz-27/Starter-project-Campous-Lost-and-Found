<?php
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/classes/FoundItem.php';
require_once __DIR__ . '/includes/item-functions.php';

$itemName = '';
$description = '';
$locationFound = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = trim($_POST['item_name']);
    $description = trim($_POST['description']);
    $locationFound = trim($_POST['location_found']);

    if ($itemName === '') {
        $errors[] = 'Enter an item name.';
    }
    if ($description === '') {
        $errors[] = 'Enter a description.';
    }
    if ($locationFound === '') {
        $errors[] = 'Enter the location found.';
    }
    if (!$errors) {
        $item = new FoundItem($itemName, $description, $locationFound);
        addItem($db, $item);
        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Campus Lost &amp; Found</title><link rel="stylesheet" href="styles.css"></head>
<body>
<h1>Report a found item</h1>
<p><a href="index.php">Back to unclaimed items</a></p>
<?php if ($errors): ?>
<ul>
<?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?>
</ul>
<?php endif; ?>
<form action="add-item.php" method="post">
    <label for="item_name">Item name</label>
    <input type="text" id="item_name" name="item_name" maxlength="100" required value="<?= htmlspecialchars($itemName) ?>">
    <label for="description">Description</label>
    <textarea id="description" name="description" maxlength="500" required><?= htmlspecialchars($description) ?></textarea>
    <label for="location_found">Location found</label>
    <input type="text" id="location_found" name="location_found" maxlength="100" required value="<?= htmlspecialchars($locationFound) ?>">
    <p><button type="submit">Add item</button></p>
</form>
</body>
</html>
