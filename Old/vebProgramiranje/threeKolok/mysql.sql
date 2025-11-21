/*
==========================
MySQL Cheat Sheet (Basic & Useful Commands)
==========================

-- 1. Create Database
CREATE DATABASE dog;

-- 2. Use Database
USE dog;

-- 3. Create Tables

CREATE TABLE breed (
    id_breed INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE descriptions (
    id_description INT AUTO_INCREMENT PRIMARY KEY,
    id_breed INT,
    description TEXT NOT NULL,
    date_added DATE,
    FOREIGN KEY (id_breed) REFERENCES breed(id_breed)
);

CREATE TABLE votes (
    id_vote INT AUTO_INCREMENT PRIMARY KEY,
    id_breed INT,
    votes INT DEFAULT 0,
    FOREIGN KEY (id_breed) REFERENCES breed(id_breed)
);

-- 4. Insert Data

INSERT INTO breed (name) VALUES ('Beagle'), ('Labrador'), ('German Shepherd');

INSERT INTO descriptions (id_breed, description, date_added)
VALUES (1, 'Small hound dog', '2025-07-01'),
       (2, 'Friendly retriever', '2025-07-01'),
       (3, 'Loyal working dog', '2025-07-01');

INSERT INTO votes (id_breed, votes)
VALUES (1, 0), (2, 0), (3, 0);

-- 5. Select Data

SELECT * FROM breed;

SELECT d.description, b.name
FROM descriptions d
JOIN breed b ON d.id_breed = b.id_breed;

-- 6. Update Data

UPDATE votes SET votes = votes + 1 WHERE id_breed = 2;

-- 7. Delete Data

DELETE FROM descriptions WHERE id_description = 5;

-- 8. Alter Table (add column)

ALTER TABLE breed ADD COLUMN origin VARCHAR(100);

-- 9. Drop Table

DROP TABLE votes;

-- 10. Export Database (command line example)

mysqldump -u username -p dog > dog_backup.sql;

-- 11. Import Database (command line example)

mysql -u username -p dog < dog_backup.sql;

-- 12. Show Tables

SHOW TABLES;

-- 13. Show Columns

SHOW COLUMNS FROM breed;

-- 14. Count rows

SELECT COUNT(*) FROM breed;

-- 15. Order By

SELECT * FROM breed ORDER BY name ASC;

-- 16. Limit results

SELECT * FROM breed LIMIT 3;
