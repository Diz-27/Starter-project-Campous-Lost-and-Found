<?php
// To back out of a directory use /../ first.
// require_once is so it won't cause an error when the file is being used elsewhere.
require_once __DIR__ . '/../classes/FoundItem.php';

function getUnclaimedItems(PDO $db): array
{
    $sql = 'SELECT item_id, item_name, location_found FROM found_items
            WHERE claimed = 0 ORDER BY item_name, item_id';
    $statement = $db->query($sql);
    return $statement->fetchAll();
}

// Task 1: Retrieve one item using a prepared SELECT and the supplied ID.
function getItem(PDO $db, int $id): FoundItem
{
    // Prepare the statement, supply the ID, and return the fetched row.
    $sql = 'SELECT * FROM found_items
            WHERE item_id = :id';
            //:id is the placeholder for the supplied ID

    $statement = $db->prepare($sql);
    $statement->execute([':id' => $id]);

    //make an item for this result
    $row = $statement->fetch((PDO::FETCH_ASSOC)); // Replace this temporary return with your fetched result.
    return new FoundItem(
        $row['item_name'],
        $row['description'],
        $row['location_found'],
        $row['claimed']
    );
    }

// Task 2: Mark only the selected item claimed using a prepared UPDATE.
function markClaimed(PDO $db, int $id, FoundItem $item): void
{
    // Set claimed to 1. Use the ID to target the correct row.
    $sql = 'UPDATE found_items
            SET claimed = 1
            WHERE item_id = :id';

    $statement = $db->prepare($sql);

    // ******************** THIS IS NOT WHAT WE DID IN CLASS, FIND A BETTER SOLUTION.************
    // $statement->bindValue(':id', $id, PDO::PARAM_INT);
    // $statement->execute();

    // see if i'm doing the execute right
    $statement->execute([
        ':id' => $id,
    ]);


}

// Task 3: Add the supplied object using a prepared INSERT.
function addItem(PDO $db, FoundItem $item): void
{
    // Insert its three properties. Every new item starts unclaimed.
    $sql = 'INSERT INTO found_items (item_name, description, location_found, claimed)
            VALUES (:item_name, :description, :location_found, :claimed)';
            $statement = $db->prepare($sql);
            $statement->execute([
                ':item_name' => $item->itemName,
                ':description' => $item->description,
                ':location_found' => $item->locationFound,
                ':claimed' => $item->claimed ? 1 : 0,
            ]);
}

// do a function for unclaimed function for fun