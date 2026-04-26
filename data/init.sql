/*THIS FILE IS RESPONSIBLE FOR INITIALIZING THE DATABASE*/

/*Create and use database*/
CREATE DATABASE emerald_records_db;
USE emerald_records_db;

/*create users table*/
CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    username VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    address VARCHAR(100),
    password VARCHAR(60) NOT NULL
);

/*create products table*/
CREATE TABLE products (
    product_id INT UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY,
    product_name VARCHAR(50) UNIQUE NOT NULL,
    artist_name VARCHAR(50) NOT NULL,
    music_genre VARCHAR(20),
    year_released YEAR,
    quantity int
);

/*insert some values into products table*/
INSERT INTO products (product_name, artist_name, music_genre, year_released, quantity)
VALUES ('Pixie Dust - Single', 'Baelor Swift', 'Pop', 2025, 50),
       ('Acid Death - LP', 'Non-Metallica', 'Metal', 1990, 50),
       ('Cherry Fields - Single', 'Nuns N Noses', 'Rock', 1982, 50),
       ('The Grey Album - Double-sided LP', 'The Bees', 'Rock', 1968, 50),
       ('Horizon - Single', 'Draft Funk', 'Electronic', 2004, 50);