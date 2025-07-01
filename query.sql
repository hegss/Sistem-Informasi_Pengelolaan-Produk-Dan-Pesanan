CREATE DATABASE IF NOT EXISTS `db_penjualan`;

USE `db_penjualan`;

CREATE TABLE IF NOT EXISTS `user` (
    `username` VARCHAR(255) PRIMARY KEY NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(15) NOT NULL,
    `email` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `admin` (
    `username` VARCHAR(255) PRIMARY KEY NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(15) NOT NULL
);

CREATE TABLE IF NOT EXISTS `product` (
    `id_product` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL 
);

ALTER TABLE `product` ADD (
    `description` TEXT,
    `stock` INT NOT NULL DEFAULT 0,
    `image_url` VARCHAR(255),
    `is_active` BOOLEAN DEFAULT TRUE,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE `product` ADD (
    `id_category` INT,
    Foreign Key(id_category) REFERENCES category(id_category)
);

CREATE TABLE IF NOT EXISTS `category` (
    `id_category` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `category_name` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `pesanan` (
    `id_pesanan` INT PRIMARY KEY AUTO_INCREMENT,
    `customer_name` VARCHAR(255) NOT NULL,
    `customer_phone` VARCHAR(50),
    `customer_address` TEXT NOT NULL,
    `total_amount` DECIMAL(10, 2) NOT NULL,
    `order_status` ENUM('pending_payment', 'processing', 'shipped', 'completed', 'cancelled') NOT NULL DEFAULT 'pending_payment',
    `payment_method` VARCHAR(100),
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `item_pesanan` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_pesanan` INT NOT NULL,
    `id_product` INT NOT NULL,
    `quantity` INT NOT NULL,
    `price_at_order` DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES product(id_product) ON DELETE CASCADE
);

INSERT INTO `category`(`category_name`) VALUES
('makanan ringan'),
('makanan utama');

INSERT INTO `pesanan`(`customer_name`, `customer_phone`, `customer_address`, `total_amount`, `order_status`, `payment_method`, `notes`)
VALUES
('Alvin', '085721982346', 'Jl. Damai No.10', 24000, 'processing', 'Transfer', 'Segera dikirim'),
('Yunus', '082193780400', 'Jl. Nusantara No.5', 13000, 'shipped', 'COD', 'Sausnya banyakin'),
('Rina', '085821349021', 'Jl. Swadaya No.1', 20000, 'shipped', 'COD', 'Sausnya banyakin');


INSERT INTO `item_pesanan`(`id_pesanan`, `id_product`, `quantity`, `price_at_order`)
VALUES
(1, 5, 3, 8000);
