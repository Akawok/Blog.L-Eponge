CREATE DATABASE blog;

USE blog;

CREATE TABLE articles(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `date` DATE NOT NULL
);