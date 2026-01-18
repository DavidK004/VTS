CREATE DATABASE it CHARACTER SET utf8 COLLATE utf8_general_ci;

USE it;

CREATE TABLE developers (
    id_developer INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    clear_password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('admin','frontend developer','backend developer','full stack developer','boss') NOT NULL
);

CREATE TABLE projects (
    id_project INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE,
    finish_date DATE,
    type SET('web','mobile','design','integrated') NOT NULL
);

CREATE TABLE logs (
    id_logs INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    date_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE projects_developers (
    id_project INT,
    id_developer INT,
    date_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id_project, id_developer),
    FOREIGN KEY (id_project) REFERENCES projects(id_project),
    FOREIGN KEY (id_developer) REFERENCES developers(id_developer)
);
