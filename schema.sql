CREATE DATABASE IF NOT EXISTS library_db;

USE library_db;

CREATE TABLE IF NOT EXISTS books (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(50) NOT NULL,
    book_author VARCHAR(50) NOT NULL,
    book_publisher VARCHAR(50) NOT NULL,
    book_category VARCHAR(50) NOT NULL,
	book_isbn VARCHAR(13) NOT NULL
);

INSERT INTO books (book_title, book_author, book_publisher, book_category, book_isbn) 
VALUES("The Great Gatsby", "F. Scott Fitzgerald", "Scribner", "Fiction", "978-0743273565");
