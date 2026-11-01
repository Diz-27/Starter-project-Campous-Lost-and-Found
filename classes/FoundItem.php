<?php
class FoundItem
{
    public string $itemName;
    public string $description;
    public string $locationFound;

    public function __construct(string $itemName, string $description, string $locationFound)
    {
        $this->itemName = $itemName;
        $this->description = $description;
        $this->locationFound = $locationFound;
    }
}
