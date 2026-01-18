CREATE DATABASE IF NOT EXISTS news CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE news;

-- Users tabela
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    clear_password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    city VARCHAR(100),
    role ENUM('admin','user') NOT NULL DEFAULT 'user',
    date_time_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Posts tabela
CREATE TABLE posts (
    id_post INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    date_time_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Comments tabela
CREATE TABLE comments (
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_post INT NOT NULL,
    comment TEXT NOT NULL,
    work_status ENUM('added','rejected','accepted') DEFAULT 'added',
    status ENUM('private','public') DEFAULT 'private',
    date_time_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_post) REFERENCES posts(id_post) ON DELETE CASCADE
);
