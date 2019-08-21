-- re-invent-db

CREATE TABLE notes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title TEXT NOT NULL,
    text LONGTEXT,
    time TIMESTAMP
);
