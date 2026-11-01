<?php
require __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/item-functions.php';
$items = getUnclaimedItems($db);
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Campus Lost &amp; Found</title><link rel="stylesheet" href="styles.css"></head>
<body>
<h1>Campus Lost &amp; Found</h1>
<p>Items still waiting to be claimed.</p>
<p><a href="add-item.php">Report a found item</a></p>
<?php if (!$items): ?>
<p>No unclaimed items right now.</p>
<?php else: ?>
<ul>
<?php foreach ($items as $item): ?>
    <li><a href="item.php?id=<?= (int) $item['item_id'] ?>"><?= htmlspecialchars($item['item_name']) ?></a>
        — <?= htmlspecialchars($item['location_found']) ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</body>
</html>
