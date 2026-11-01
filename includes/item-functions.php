<?php
function getUnclaimedItems(PDO $db): array
{
    $sql = 'SELECT item_id, item_name, location_found FROM found_items
            WHERE claimed = 0 ORDER BY item_name, item_id';
    $statement = $db->query($sql);
    return $statement->fetchAll();
}

// Task 1: Retrieve one item using a prepared SELECT and the supplied ID.
function getItem(PDO $db, int $id)
{
    // Prepare the statement, supply the ID, and return the fetched row.
    return false; // Replace this temporary return with your fetched result.
}

// Task 2: Mark only the selected item claimed using a prepared UPDATE.
function markClaimed(PDO $db, int $id): void
{
    // Set claimed to 1. Use the ID to target the correct row.
}

// Task 3: Add the supplied object using a prepared INSERT.
function addItem(PDO $db, FoundItem $item): void
{
    // Insert its three properties. Every new item starts unclaimed.
}
