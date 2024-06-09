-- SQLBook: Code
USE `hallyuin-native`;

-- CREATE TABLE user_tokens (
--     `id` INT AUTO_INCREMENT PRIMARY KEY,
--     `user_id` INT NOT NULL,
--     `token` VARCHAR(255) NOT NULL,
--     `expires_at` DATETIME NOT NULL,
--     FOREIGN KEY (user_id) REFERENCES `accounts`(id) ON DELETE CASCADE
-- );

DROP TABLE IF EXISTS `merches`;
CREATE TABLE IF NOT EXISTS `merches` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL UNIQUE,
    `price` DECIMAL(15,2) UNSIGNED NOT NULL,
    `description` TEXT NULL,
    `stock` INT UNSIGNED NOT NULL DEFAULT 0,
    `image` VARCHAR(255) NULL,
    `category` VARCHAR(255) NULL
);

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `full_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE CHECK (`email` LIKE '%@%.%'),
    `password` VARCHAR(255) NOT NULL,
    `credit` DECIMAL(15, 2) UNSIGNED NOT NULL DEFAULT 0,
    `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
    `account_id` INT UNSIGNED,
    `merch_id` INT UNSIGNED,
    PRIMARY KEY (`account_id`, `merch_id`),
    FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`),
    FOREIGN KEY (`merch_id`) REFERENCES `merches`(`id`)
);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `account_id` INT UNSIGNED,
    `status` ENUM('ordered', 'shipped', 'received') NULL DEFAULT 'ordered',
    `ordered_date` DATE NULL DEFAULT (CURRENT_DATE),
    `shipped_date` DATE NULL,
    `received_date` DATE NULL, 
    FOREIGN KEY (`account_id`) REFERENCES `accounts`(`id`)
);

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
    `order_id` INT UNSIGNED,
    `merch_id` INT UNSIGNED,
    `quantity_ordered` INT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`),
    FOREIGN KEY (`merch_id`) REFERENCES `merches`(`id`)
);

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT UNSIGNED,
    `amount` DECIMAL(15,2) UNSIGNED NOT NULL DEFAULT 0,
    `paid_date` DATE NOT NULL DEFAULT (CURRENT_DATE),
FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`)
);

-- VIEW
    -- RANK
CREATE VIEW `sales_rank` AS
SELECT `m`.`name`,
    SUM(`od`.`quantity_ordered`) AS `quantity_sold`,
    RANK() OVER(ORDER BY `quantity_sold` DESC) AS `top_sales`
FROM `order_details` AS `od`
JOIN `merches` AS `m` ON `m`.`id` = `od`.`merch_id`
GROUP BY `m`.`id`;

-- CREATE VIEW `order_list` AS
-- SELECT `id`, `account`.`name`, `status`, `ordered_date`

DELIMITER //
-- FUNCTION
CREATE FUNCTION `calculate_subtotal`(`in_quantity_ordered` INT UNSIGNED, `in_price` DECIMAL(15, 2) UNSIGNED)
RETURNS DECIMAL(15, 2) UNSIGNED
BEGIN
    RETURN `in_quantity_ordered` * `in_price`;
END//

CREATE FUNCTION `calculate_total`(`in_order_id` INT UNSIGNED)
RETURNS DECIMAL(15, 2) UNSIGNED
BEGIN
    DECLARE `total` DECIMAL(15, 2) UNSIGNED DEFAULT 0;

    SELECT SUM(`calculate_subtotal`(`od`.`quantity_ordered`, `m`.`price`)) INTO `total`
    FROM `order_details` AS `od`
    JOIN `orders` AS `o` ON `o`.`id` = `od`.`order_id`
    JOIN `merches` AS `m` ON `m`.`id` = `od`.`merch_id`
    WHERE `o`.`id` = `in_order_id`;

    RETURN `total`;
END//

-- TRIGGER
CREATE TRIGGER `status_after_payment`
AFTER INSERT
ON `payments`
FOR EACH ROW
BEGIN
    UPDATE `orders`
    SET `status` = 'shipped'
    WHERE `id` = NEW.`order_id`;
END//

-- PROCEDURE
CREATE PROCEDURE `calculate_stock`(IN `in_order_id` INT UNSIGNED)
BEGIN
    DECLARE `order_detail_quantity_ordered` INT UNSIGNED;
    DECLARE `order_detail_merch_id` INT UNSIGNED;
    DECLARE `order_details_count` INT;
    DECLARE `offset` INT DEFAULT 0;

    SELECT COUNT(*) INTO `order_details_count`
    FROM `order_details`
    WHERE `order_id` = `in_order_id`;

    WHILE `offset` < `order_details_count` DO
        SELECT `quantity_ordered` INTO `order_detail_quantity_ordered`
        FROM `order_details`
        WHERE `order_id` = `in_order_id`
        LIMIT `offset`, 1;

        SELECT `merch_id` INTO `order_detail_merch_id`
        FROM `order_details`
        WHERE `order_id` = `in_order_id`
        LIMIT `offset`, 1;

        UPDATE `merches`
        SET `stock` = `stock` - `order_detail_quantity_ordered`
        WHERE `id` = `order_detail_merch_id`;

        SET `offset` = `offset` + 1;
    END WHILE;
END//

    -- TRANSACTION
CREATE PROCEDURE `pay`(IN `in_account_id` INT UNSIGNED, IN `in_order_id` INT UNSIGNED)
BEGIN
    DECLARE `amount_to_be_payed` DECIMAL(15, 2);
    DECLARE `account_credit` DECIMAL(15, 2);

    SELECT `calculate_total`(`in_order_id`) INTO `amount_to_be_payed`;
    SELECT `credit` INTO `account_credit`
    FROM `accounts`
    WHERE `id` = `in_account_id`;

    START TRANSACTION
    IF (`account_credit` < `amount_to_be_payed`) THEN
        ROLLBACK;
    ELSE
        UPDATE `account`
        SET `credit` = `credit` - `amount_to_be_payed`
        WHERE `id` = `in_account_id`;

        CALL `calculate_stock`(`in_order_id`);
    END IF;
    COMMIT;
END//

DELIMITER ;

