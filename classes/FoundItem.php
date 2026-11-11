<?php
class FoundItem
{
    public string $itemName;
    public string $description;
    public string $locationFound;
    public int    $claimed;

    public function __construct(string $itemName, string $description, string $locationFound, int $claimed)
    {
        $this->itemName = $itemName;
        $this->description = $description;
        $this->locationFound = $locationFound;
        $this->claimed = $claimed;
    }
}
