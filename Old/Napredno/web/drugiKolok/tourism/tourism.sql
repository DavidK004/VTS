CREATE DATABASE tourism;
USE tourism;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    clear_password VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('admin', 'worker', 'guide') NOT NULL,
    date_time_added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id_category INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    popularity INT DEFAULT 0,
    date_time_added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cities (
    id_city INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    date_time_added DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE destinations (
    id_destination INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_category INT NOT NULL,
    id_city INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    status ENUM('private','public') NOT NULL,
    date_time_added DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_category) REFERENCES categories(id_category),
    FOREIGN KEY (id_city) REFERENCES cities(id_city)
);
