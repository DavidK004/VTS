CREATE DATABASE IF NOT EXISTS web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE web;

-- Positions table
CREATE TABLE positions (
  id_position INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

-- Workers table
CREATE TABLE worker (
  id_worker INT AUTO_INCREMENT PRIMARY KEY,
  id_position INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  salary DECIMAL(10,2) NOT NULL,
  is_admin TINYINT(1) NOT NULL DEFAULT 0,
  FOREIGN KEY (id_position) REFERENCES positions(id_position)
);

-- Comments table
CREATE TABLE comment (
  id_comment INT AUTO_INCREMENT PRIMARY KEY,
  id_worker INT NOT NULL,
  comment TEXT NOT NULL,
  date_added DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_worker) REFERENCES worker(id_worker)
);

-- Insert positions
INSERT INTO positions (name) VALUES ('Manager'), ('Developer'), ('HR');

-- Insert workers with hashed passwords
-- Replace the hashes with your PHP-generated bcrypt hashes

INSERT INTO worker (id_position, name, email, username, password, salary, is_admin) VALUES
(1, 'Alice Johnson', 'alice@example.com', 'alice', '$2y$10$abcdefghijklmnopqrstuv', 70000.00, 1), -- admin
(2, 'Bob Smith', 'bob@example.com', 'bob', '$2y$10$abcdefghijklmnopqrstuv', 50000.00, 0),
(2, 'Charlie Brown', 'charlie@example.com', 'charlie', '$2y$10$abcdefghijklmnopqrstuv', 48000.00, 0),
(3, 'Diana Prince', 'diana@example.com', 'diana', '$2y$10$abcdefghijklmnopqrstuv', 45000.00, 0),
(3, 'Eve Adams', 'eve@example.com', 'eve', '$2y$10$abcdefghijklmnopqrstuv', 46000.00, 0);
