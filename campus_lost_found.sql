-- Import once for a fresh setup; this script does not delete existing data.
CREATE DATABASE IF NOT EXISTS campus_lost_found
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE campus_lost_found;
CREATE TABLE found_items (
    item_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    description VARCHAR(500) NOT NULL,
    location_found VARCHAR(100) NOT NULL,
    claimed BOOLEAN NOT NULL DEFAULT 0
) ENGINE=InnoDB;
INSERT INTO found_items (item_name, description, location_found, claimed) VALUES
('Blue water bottle', 'Metal bottle with a mountain sticker.', 'Library study room', 0),
('Wireless earbuds', 'White charging case with both earbuds inside.', 'Student lounge', 0),
('Notebook', 'Green cover with handwritten biology notes.', 'Science building', 0),
('Car keys', 'Two keys on a red fabric keychain.', 'Parking lot B', 0),
('Gray hoodie', 'Size medium with no visible name.', 'Fitness center', 0),
('Phone charger', 'Black USB-C cable and wall adapter.', 'Computer lab', 0),
('Umbrella', 'Small black folding umbrella.', 'Main entrance', 1),
('Reading glasses', 'Brown frames in a soft case.', 'Cafeteria', 1);
