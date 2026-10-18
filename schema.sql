DROP DATABASE IF EXISTS cybersecurity_jobs_db;
CREATE DATABASE cybersecurity_jobs_db CHARACTER SET utf8mb4;
USE cybersecurity_jobs_db;

CREATE TABLE applications (
    application_id   INT AUTO_INCREMENT PRIMARY KEY,
    first_name       VARCHAR(50)  NOT NULL,
    last_name        VARCHAR(50)  NOT NULL,
    email            VARCHAR(100) NOT NULL,
    phone_number     VARCHAR(20)  NOT NULL,
    position_applied VARCHAR(50)  NOT NULL,
    years_experience INT          NOT NULL DEFAULT 0,
    certification    VARCHAR(50)  NOT NULL,
    date_added       TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);